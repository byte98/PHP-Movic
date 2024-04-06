<?php
// PHP-Movic - base platform for PHP applications.
// Copyright (C) 2024 Jiri Skoda <developer@skodaj.cz>
// 
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
// 

namespace PHPMovic;

use PHPMovic\Model\Configuration\Configuration;
use PHPMovic\Model\Database\DatabaseManager;
use PHPMovic\Model\Database\Driver;
use PHPMovic\Model\Server\Responder;
use PHPMovic\Router\Router;
use PHPMovic\Utils\Log\Logger;
use PHPMovic\SourceLoader;
use PHPMovic\Bootloader;
use PHPMovic\Model\Server\Request;
use PHPMovic\Model\Server\HttpMethod;
use PHPMovic\Utils\Counter\CountersManager;
use PHPMovic\Utils\StringUtils;
use PHPMovic\Utils\DateUtils;
use PHPMovic\View\SimpleView;

/**
 * Class which represents whole application.
 */
class Application
{
    /**
     * Configuration of whole application.
     */
    private readonly Configuration $configuration;

    /**
     * Logger of whole application.
     */
    private static ?Logger $logger = null;

    /**
     * Source loader of external source code.
     */
    private static ?SourceLoader $sourceLoader = null;

    /**
     * Bootloader of whole application.
     */
    private readonly Bootloader $bootloader;

    /**
     * Router of the application.
     */
    private readonly Router $router;

    /**
     * Responder to the requests.
     */
    private readonly Responder $responder;

    /**
     * Manager of counters.
     */
    private static ?CountersManager $countersManager = null;

    /**
     * Manager of connections to the database.
     */
    private static ?DatabaseManager $databaseManager = null;

    /**
     * Loader of addons.
     */
    private readonly AddonLoader $addonLoader;

    /**
     * Creates new instance of application.
     * @param Bootloader $bootloader Bootloader of whole application.
     * @param Configuration $configuration Configuration of application.
     */
    public function __construct(Bootloader $bootloader, Configuration $configuration)
    {
        $this->bootloader = $bootloader;
        $this->configuration = $configuration;
        Application::$logger = new Logger($configuration->getLogModel(), $configuration->getDateTimeFormat());
        Application::$countersManager = new CountersManager($this->configuration->getCountersModel());
        Application::$sourceLoader = new SourceLoader($configuration->getSourcesModel());
        $this->changeAutoloader();
        $this->router = new Router($this->configuration);
        $this->responder = new Responder();
        Application::$databaseManager = new DatabaseManager($this->configuration->getConnectionModel());
        $this->addonLoader = new AddonLoader($_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "ADDONS");
        $this->init();
    }

    /**
     * Changes default autoloader of classes.
     */
    private function changeAutoloader(): void
    {
        spl_autoload_register(Application::$sourceLoader);
        spl_autoload_unregister($this->bootloader->getBaseLoader());
    }

    /**
     * Initializes application according to the configuration.
     */
    private function init(): void
    {
        if ($this->configuration->getPhpErrors() == true)
        {   // Enable PHP error reporting
            ini_set("display_errors", 1);
            ini_set("display_startup_errors", 1);
            error_reporting(E_ALL);
        }

        // Reset requests counter
        //$counter = Application::counters()->create("REQUESTS");
        //$counter->reset();

        // Set namespace for views
        SimpleView::setRoot($this->configuration->getSourcesModel()->getUserNamespace());

        // Load addons
        $this->addonLoader->loadAll();

        Application::logger()->low("Application loaded in " . DateUtils::elapsed($this->bootloader->getStart(), DateUtils::now())); 

    }

    /**
     * Runs application.
     * @param Request $request Request which should be handled by application.
     */
    public function run(Request $request): void
    {
        Application::logger()->base("Incoming request(#" . StringUtils::intFloat($request->getNumber()) . " from " . $request->getAddress() . " [" . $request->getMethod()->toString() . "]): " . $request->getResource());
        $route = $this->router->route($request->getResource());
        if ($route != null)
        {
            $data = $route->getData($request->getResource());
            $request->addData($data);
            $controller = $route->getController();
            Application::logger()->low("Route found: giving control to '" . $controller::class . "'.");
            $response = null;
            $start = DateUtils::now();
            switch($request->getMethod())
            {
                case HttpMethod::GET:    $response = $controller->get($request); break;
                case HttpMethod::POST:   $response = $controller->post($request); break;
                case HttpMethod::PUT:    $response = $controller->put($request); break;
                case HttpMethod::DELETE: $response = $controller->delete($request); break;
            }
            if ($response != null)
            {
                Application::logger()->low("Controller '" . $controller::class . "' finished its job in " . DateUtils::elapsed($start, DateUtils::now()) . " (response #" . $response->getNumber() . " to " . $response->getAddress() . ").");
                $this->responder->respond($response);
            }
            else
            {
                Application::logger()->error("Cannot respond to request(#" . StringUtils::intFloat($request->getNumber()) . " from " . $request->getAddress() . " [" . $request->getMethod()->toString() . "]): response from controller is NULL!");
            }
        }
        else
        {
            Application::logger()->warning("Request cannot be handled: no route defined for '" . $request->getResource() . "'!");
        }
        $this->addonLoader->stopAll();
        Application::$databaseManager->closeAll();
        Application::logger()->low("Application finished in " . DateUtils::elapsed($this->bootloader->getStart(), DateUtils::now()));
    }

    /**
     * Gets logger of application.
     * @return Logger Logger of application.
     */
    public static function logger(): Logger
    {
        return Application::$logger;
    }

    /**
     * Loads source code.
     * @param string $className Fully qualified name of class.
     */
    public static function loadSource(string $className): void
    {
        Application::$sourceLoader->includeSource($className);
    }

    /**
     * Gets loader of external sources.
     * @return SourceLoader Loader of external sources.
     */
    public function getSourceLoader(): SourceLoader
    {
        return Application::$sourceLoader;
    }

    /**
     * Gets manager of counters of application.
     * @return CountersManager Manager of counters of application.
     */
    public static function counters(): CountersManager
    {
        return Application::$countersManager;
    }

    /**
     * Gets connection to the database.
     * @return Driver Driver which provides connection to the database.
     */
    public static function db(): Driver
    {
        $reti = Application::$databaseManager->get();
        return $reti;
    }
}

?>

