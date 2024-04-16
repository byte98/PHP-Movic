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

namespace PHPMovic\Model;
use PHPMovic\Utils\PathUtils;
use PHPMovic\Utils\StringUtils;

/**
 * Enumeration of all available mime types.
 * Source of data: https://github.com/patrickmccallum/mimetype-io/
 */
enum MimeType
{

    /**
     * video/3gpp
     */
    case _3gpp;

    /**
     * video/3gpp2
     */
    case _3gpp2;

    // /**
    //  * audio/3gpp2
    //  */
    // case _3gpp2;

    /**
     * audio/aac
     */
    case aac;

    /**
     * audio/aacp
     */
    case aacp;

    /**
     * audio/adpcm
     */
    case adpcm;

    /**
     * audio/aiff
     */
    case aiff;

    /**
     * application/andrew-inset
     */
    case andrew_inset;

    /**
     * application/applixware
     */
    case applixware;

    /**
     * application/atom+xml
     */
    case atom_xml;

    /**
     * application/atomcat+xml
     */
    case atomcat_xml;

    /**
     * application/atomsvc+xml
     */
    case atomsvc_xml;

    /**
     * image/avif
     */
    case avif;

    /**
     * audio/basic
     */
    case basic;

    /**
     * image/bmp
     */
    case bmp;

    /**
     * text/calendar
     */
    case calendar;

    /**
     * application/ccxml+xml
     */
    case ccxml_xml;

    /**
     * image/cgm
     */
    case cgm;

    /**
     * text/css
     */
    case css;

    /**
     * text/csv
     */
    case csv;

    /**
     * application/cu-seeme
     */
    case cu_seeme;

    /**
     * application/davmount+xml
     */
    case davmount_xml;

    /**
     * application/ecmascript
     */
    case ecmascript;

    /**
     * application/emma+xml
     */
    case emma_xml;

    /**
     * application/epub+zip
     */
    case epub_zip;

    /**
     * audio/flac
     */
    case flac;

    /**
     * application/font-tdpfr
     */
    case font_tdpfr;

    /**
     * image/g3fax
     */
    case g3fax;

    /**
     * gcode
     */
    case gcode;

    /**
     * image/gif
     */
    case gif;

    /**
     * application/gzip
     */
    case gzip;

    /**
     * video/h261
     */
    case h261;

    /**
     * video/h263
     */
    case h263;

    /**
     * video/h264
     */
    case h264;

    /**
     * image/heic
     */
    case heic;

    /**
     * text/html
     */
    case html;

    /**
     * application/hyperstudio
     */
    case hyperstudio;

    /**
     * image/ief
     */
    case ief;

    /**
     * model/iges
     */
    case iges;

    /**
     * application/java-archive
     */
    case java_archive;

    /**
     * application/java-serialized-object
     */
    case java_serialized_object;

    /**
     * application/java-vm
     */
    case java_vm;

    /**
     * text/javascript
     */
    case javascript;

    /**
     * image/jpeg
     */
    case jpeg;

    // /**
    //  * video/jpeg
    //  */
    // case jpeg;

    /**
     * video/jpm
     */
    case jpm;

    /**
     * application/json
     */
    case json;

    /**
     * application/lost+xml
     */
    case lost_xml;

    /**
     * application/mac-binhex40
     */
    case mac_binhex40;

    /**
     * application/mac-compactpro
     */
    case mac_compactpro;

    /**
     * application/marc
     */
    case marc;

    /**
     * text/markdown
     */
    case markdown;

    /**
     * application/mathematica
     */
    case mathematica;

    /**
     * text/mathml
     */
    case mathml;

    /**
     * application/mathml+xml
     */
    case mathml_xml;

    /**
     * application/mbox
     */
    case mbox;

    /**
     * application/mediaservercontrol+xml
     */
    case mediaservercontrol_xml;

    /**
     * model/mesh
     */
    case mesh;

    /**
     * audio/midi
     */
    case midi;

    /**
     * test/mimetype
     */
    case mimetype;

    /**
     * video/mj2
     */
    case mj2;

    /**
     * video/mp2t
     */
    case mp2t;

    /**
     * audio/mp4
     */
    case mp4;

    // /**
    //  * video/mp4
    //  */
    // case mp4;

    // /**
    //  * application/mp4
    //  */
    // case mp4;

    /**
     * audio/mp4a-latm
     */
    case mp4a_latm;

    /**
     * video/mpeg
     */
    case mpeg;

    // /**
    //  * audio/mpeg
    //  */
    // case mpeg;

    /**
     * application/msword
     */
    case msword;

    /**
     * application/mxf
     */
    case mxf;

    /**
     * application/octet-stream
     */
    case octet_stream;

    /**
     * application/oda
     */
    case oda;

    /**
     * application/oebps-package+xml
     */
    case oebps_package_xml;

    /**
     * audio/ogg
     */
    case ogg;

    // /**
    //  * video/ogg
    //  */
    // case ogg;

    // /**
    //  * application/ogg
    //  */
    // case ogg;

    /**
     * application/onenote
     */
    case onenote;

    /**
     * audio/opus
     */
    case opus;

    /**
     * font/otf
     */
    case otf;

    /**
     * application/patch-ops-error+xml
     */
    case patch_ops_error_xml;

    /**
     * application/pdf
     */
    case pdf;

    /**
     * application/pgp-encrypted
     */
    case pgp_encrypted;

    /**
     * application/pgp-signature
     */
    case pgp_signature;

    /**
     * application/pics-rules
     */
    case pics_rules;

    /**
     * image/pjpeg
     */
    case pjpeg;

    /**
     * application/pkcs10
     */
    case pkcs10;

    /**
     * application/pkcs7-mime
     */
    case pkcs7_mime;

    /**
     * application/pkcs7-signature
     */
    case pkcs7_signature;

    /**
     * application/pkix-cert
     */
    case pkix_cert;

    /**
     * application/pkix-crl
     */
    case pkix_crl;

    /**
     * application/pkix-pkipath
     */
    case pkix_pkipath;

    /**
     * application/pkixcmp
     */
    case pkixcmp;

    /**
     * text/plain
     */
    case plain;

    /**
     * application/pls+xml
     */
    case pls_xml;

    /**
     * image/png
     */
    case png;

    /**
     * application/postscript
     */
    case postscript;

    /**
     * application/prql
     */
    case prql;

    /**
     * image/prs.btif
     */
    case prs_btif;

    /**
     * application/prs.cww
     */
    case prs_cww;

    /**
     * text/prs.lines.tag
     */
    case prs_lines_tag;

    /**
     * video/quicktime
     */
    case quicktime;

    /**
     * application/rdf+xml
     */
    case rdf_xml;

    /**
     * application/reginfo+xml
     */
    case reginfo_xml;

    /**
     * application/relax-ng-compact-syntax
     */
    case relax_ng_compact_syntax;

    /**
     * application/resource-lists-diff+xml
     */
    case resource_lists_diff_xml;

    /**
     * application/resource-lists+xml
     */
    case resource_lists_xml;

    /**
     * message/rfc822
     */
    case rfc822;

    /**
     * text/richtext
     */
    case richtext;

    /**
     * application/rls-services+xml
     */
    case rls_services_xml;

    /**
     * application/rsd+xml
     */
    case rsd_xml;

    /**
     * application/rss+xml
     */
    case rss_xml;

    /**
     * application/rtf
     */
    case rtf;

    /**
     * application/sbml+xml
     */
    case sbml_xml;

    /**
     * application/scvp-cv-request
     */
    case scvp_cv_request;

    /**
     * application/scvp-cv-response
     */
    case scvp_cv_response;

    /**
     * application/scvp-vp-request
     */
    case scvp_vp_request;

    /**
     * application/scvp-vp-response
     */
    case scvp_vp_response;

    /**
     * application/sdp
     */
    case sdp;

    /**
     * application/set-payment-initiation
     */
    case set_payment_initiation;

    /**
     * application/set-registration-initiation
     */
    case set_registration_initiation;

    /**
     * text/sgml
     */
    case sgml;

    /**
     * application/shf+xml
     */
    case shf_xml;

    /**
     * application/smil+xml
     */
    case smil_xml;

    /**
     * application/sparql-query
     */
    case sparql_query;

    /**
     * application/sparql-results+xml
     */
    case sparql_results_xml;

    /**
     * application/srgs
     */
    case srgs;

    /**
     * application/srgs+xml
     */
    case srgs_xml;

    /**
     * application/ssml+xml
     */
    case ssml_xml;

    /**
     * image/svg+xml
     */
    case svg_xml;

    /**
     * text/tab-separated-values
     */
    case tab_separated_values;

    /**
     * image/tiff
     */
    case tiff;

    /**
     * text/troff
     */
    case troff;

    /**
     * text/uri-list
     */
    case uri_list;

    /**
     * application/vnd.3gpp.pic-bw-large
     */
    case vnd_3gpp_pic_bw_large;

    /**
     * application/vnd.3gpp.pic-bw-small
     */
    case vnd_3gpp_pic_bw_small;

    /**
     * application/vnd.3gpp.pic-bw-var
     */
    case vnd_3gpp_pic_bw_var;

    /**
     * application/vnd.3gpp2.tcap
     */
    case vnd_3gpp2_tcap;

    /**
     * application/vnd.3m.post-it-notes
     */
    case vnd_3m_post_it_notes;

    /**
     * application/vnd.accpac.simply.aso
     */
    case vnd_accpac_simply_aso;

    /**
     * application/vnd.accpac.simply.imp
     */
    case vnd_accpac_simply_imp;

    /**
     * application/vnd.acucobol
     */
    case vnd_acucobol;

    /**
     * application/vnd.acucorp
     */
    case vnd_acucorp;

    /**
     * application/vnd.adobe.air-application-installer-package+zip
     */
    case vnd_adobe_air_application_installer_package_zip;

    /**
     * image/vnd.adobe.photoshop
     */
    case vnd_adobe_photoshop;

    /**
     * application/vnd.adobe.xdp+xml
     */
    case vnd_adobe_xdp_xml;

    /**
     * application/vnd.adobe.xfdf
     */
    case vnd_adobe_xfdf;

    /**
     * application/vnd.airzip.filesecure.azf
     */
    case vnd_airzip_filesecure_azf;

    /**
     * application/vnd.airzip.filesecure.azs
     */
    case vnd_airzip_filesecure_azs;

    /**
     * application/vnd.amazon.ebook
     */
    case vnd_amazon_ebook;

    /**
     * application/vnd.americandynamics.acc
     */
    case vnd_americandynamics_acc;

    /**
     * application/vnd.amiga.ami
     */
    case vnd_amiga_ami;

    /**
     * application/vnd.android.package-archive
     */
    case vnd_android_package_archive;

    /**
     * application/vnd.anser-web-certificate-issue-initiation
     */
    case vnd_anser_web_certificate_issue_initiation;

    /**
     * application/vnd.anser-web-funds-transfer-initiation
     */
    case vnd_anser_web_funds_transfer_initiation;

    /**
     * application/vnd.antix.game-component
     */
    case vnd_antix_game_component;

    /**
     * application/vnd.apple.installer+xml
     */
    case vnd_apple_installer_xml;

    /**
     * application/vnd.arastra.swi
     */
    case vnd_arastra_swi;

    /**
     * application/vnd.audiograph
     */
    case vnd_audiograph;

    /**
     * application/vnd.blueice.multipass
     */
    case vnd_blueice_multipass;

    /**
     * application/vnd.bmi
     */
    case vnd_bmi;

    /**
     * application/vnd.businessobjects
     */
    case vnd_businessobjects;

    /**
     * application/vnd.chemdraw+xml
     */
    case vnd_chemdraw_xml;

    /**
     * application/vnd.chipnuts.karaoke-mmd
     */
    case vnd_chipnuts_karaoke_mmd;

    /**
     * application/vnd.cinderella
     */
    case vnd_cinderella;

    /**
     * application/vnd.claymore
     */
    case vnd_claymore;

    /**
     * application/vnd.clonk.c4group
     */
    case vnd_clonk_c4group;

    /**
     * application/vnd.commonspace
     */
    case vnd_commonspace;

    /**
     * application/vnd.contact.cmsg
     */
    case vnd_contact_cmsg;

    /**
     * application/vnd.cosmocaller
     */
    case vnd_cosmocaller;

    /**
     * application/vnd.crick.clicker
     */
    case vnd_crick_clicker;

    /**
     * application/vnd.crick.clicker.keyboard
     */
    case vnd_crick_clicker_keyboard;

    /**
     * application/vnd.crick.clicker.palette
     */
    case vnd_crick_clicker_palette;

    /**
     * application/vnd.crick.clicker.template
     */
    case vnd_crick_clicker_template;

    /**
     * application/vnd.crick.clicker.wordbank
     */
    case vnd_crick_clicker_wordbank;

    /**
     * application/vnd.criticaltools.wbs+xml
     */
    case vnd_criticaltools_wbs_xml;

    /**
     * application/vnd.ctc-posml
     */
    case vnd_ctc_posml;

    /**
     * application/vnd.cups-ppd
     */
    case vnd_cups_ppd;

    /**
     * text/vnd.curl
     */
    case vnd_curl;

    /**
     * application/vnd.curl.car
     */
    case vnd_curl_car;

    /**
     * text/vnd.curl.dcurl
     */
    case vnd_curl_dcurl;

    /**
     * text/vnd.curl.mcurl
     */
    case vnd_curl_mcurl;

    /**
     * application/vnd.curl.pcurl
     */
    case vnd_curl_pcurl;

    /**
     * text/vnd.curl.scurl
     */
    case vnd_curl_scurl;

    /**
     * application/vnd.data-vision.rdz
     */
    case vnd_data_vision_rdz;

    /**
     * application/vnd.debian.binary-package
     */
    case vnd_debian_binary_package;

    /**
     * application/vnd.denovo.fcselayout-link
     */
    case vnd_denovo_fcselayout_link;

    /**
     * audio/vnd.digital-winds
     */
    case vnd_digital_winds;

    /**
     * image/vnd.djvu
     */
    case vnd_djvu;

    /**
     * application/vnd.dna
     */
    case vnd_dna;

    /**
     * application/vnd.dolby.mlp
     */
    case vnd_dolby_mlp;

    /**
     * application/vnd.dpgraph
     */
    case vnd_dpgraph;

    /**
     * application/vnd.dreamfactory
     */
    case vnd_dreamfactory;

    /**
     * audio/vnd.dts
     */
    case vnd_dts;

    /**
     * audio/vnd.dts.hd
     */
    case vnd_dts_hd;

    /**
     * model/vnd.dwf
     */
    case vnd_dwf;

    /**
     * image/vnd.dwg
     */
    case vnd_dwg;

    /**
     * image/vnd.dxf
     */
    case vnd_dxf;

    /**
     * application/vnd.dynageo
     */
    case vnd_dynageo;

    /**
     * application/vnd.ecowin.chart
     */
    case vnd_ecowin_chart;

    /**
     * application/vnd.enliven
     */
    case vnd_enliven;

    /**
     * application/vnd.epson.esf
     */
    case vnd_epson_esf;

    /**
     * application/vnd.epson.msf
     */
    case vnd_epson_msf;

    /**
     * application/vnd.epson.quickanime
     */
    case vnd_epson_quickanime;

    /**
     * application/vnd.epson.salt
     */
    case vnd_epson_salt;

    /**
     * application/vnd.epson.ssf
     */
    case vnd_epson_ssf;

    /**
     * application/vnd.eszigno3+xml
     */
    case vnd_eszigno3_xml;

    /**
     * application/vnd.ezpix-album
     */
    case vnd_ezpix_album;

    /**
     * application/vnd.ezpix-package
     */
    case vnd_ezpix_package;

    /**
     * image/vnd.fastbidsheet
     */
    case vnd_fastbidsheet;

    /**
     * application/vnd.fdf
     */
    case vnd_fdf;

    /**
     * application/vnd.fdsn.mseed
     */
    case vnd_fdsn_mseed;

    /**
     * application/vnd.fdsn.seed
     */
    case vnd_fdsn_seed;

    /**
     * application/vnd.flographit
     */
    case vnd_flographit;

    /**
     * application/vnd.fluxtime.clip
     */
    case vnd_fluxtime_clip;

    /**
     * text/vnd.fly
     */
    case vnd_fly;

    /**
     * text/vnd.fmi.flexstor
     */
    case vnd_fmi_flexstor;

    /**
     * image/vnd.fpx
     */
    case vnd_fpx;

    /**
     * application/vnd.framemaker
     */
    case vnd_framemaker;

    /**
     * application/vnd.frogans.fnc
     */
    case vnd_frogans_fnc;

    /**
     * application/vnd.frogans.ltf
     */
    case vnd_frogans_ltf;

    /**
     * application/vnd.fsc.weblaunch
     */
    case vnd_fsc_weblaunch;

    /**
     * image/vnd.fst
     */
    case vnd_fst;

    /**
     * application/vnd.fujitsu.oasys
     */
    case vnd_fujitsu_oasys;

    /**
     * application/vnd.fujitsu.oasys2
     */
    case vnd_fujitsu_oasys2;

    /**
     * application/vnd.fujitsu.oasys3
     */
    case vnd_fujitsu_oasys3;

    /**
     * application/vnd.fujitsu.oasysgp
     */
    case vnd_fujitsu_oasysgp;

    /**
     * application/vnd.fujitsu.oasysprs
     */
    case vnd_fujitsu_oasysprs;

    /**
     * application/vnd.fujixerox.ddd
     */
    case vnd_fujixerox_ddd;

    /**
     * application/vnd.fujixerox.docuworks
     */
    case vnd_fujixerox_docuworks;

    /**
     * application/vnd.fujixerox.docuworks.binder
     */
    case vnd_fujixerox_docuworks_binder;

    /**
     * image/vnd.fujixerox.edmics-mmr
     */
    case vnd_fujixerox_edmics_mmr;

    /**
     * image/vnd.fujixerox.edmics-rlc
     */
    case vnd_fujixerox_edmics_rlc;

    /**
     * application/vnd.fuzzysheet
     */
    case vnd_fuzzysheet;

    /**
     * video/vnd.fvt
     */
    case vnd_fvt;

    /**
     * model/vnd.gdl
     */
    case vnd_gdl;

    /**
     * application/vnd.genomatix.tuxedo
     */
    case vnd_genomatix_tuxedo;

    /**
     * application/vnd.geogebra.file
     */
    case vnd_geogebra_file;

    /**
     * application/vnd.geogebra.tool
     */
    case vnd_geogebra_tool;

    /**
     * application/vnd.geometry-explorer
     */
    case vnd_geometry_explorer;

    /**
     * application/vnd.gerber
     */
    case vnd_gerber;

    /**
     * application/vnd.gmx
     */
    case vnd_gmx;

    /**
     * application/vnd.google-earth.kml+xml
     */
    case vnd_google_earth_kml_xml;

    /**
     * application/vnd.google-earth.kmz
     */
    case vnd_google_earth_kmz;

    /**
     * application/vnd.grafeq
     */
    case vnd_grafeq;

    /**
     * text/vnd.graphviz
     */
    case vnd_graphviz;

    /**
     * application/vnd.groove-account
     */
    case vnd_groove_account;

    /**
     * application/vnd.groove-help
     */
    case vnd_groove_help;

    /**
     * application/vnd.groove-identity-message
     */
    case vnd_groove_identity_message;

    /**
     * application/vnd.groove-injector
     */
    case vnd_groove_injector;

    /**
     * application/vnd.groove-tool-message
     */
    case vnd_groove_tool_message;

    /**
     * application/vnd.groove-tool-template
     */
    case vnd_groove_tool_template;

    /**
     * application/vnd.groove-vcard
     */
    case vnd_groove_vcard;

    /**
     * model/vnd.gtw
     */
    case vnd_gtw;

    /**
     * application/vnd.handheld-entertainment+xml
     */
    case vnd_handheld_entertainment_xml;

    /**
     * application/vnd.hbci
     */
    case vnd_hbci;

    /**
     * application/vnd.hhe.lesson-player
     */
    case vnd_hhe_lesson_player;

    /**
     * application/vnd.hp-hpgl
     */
    case vnd_hp_hpgl;

    /**
     * application/vnd.hp-hpid
     */
    case vnd_hp_hpid;

    /**
     * application/vnd.hp-hps
     */
    case vnd_hp_hps;

    /**
     * application/vnd.hp-jlyt
     */
    case vnd_hp_jlyt;

    /**
     * application/vnd.hp-pcl
     */
    case vnd_hp_pcl;

    /**
     * application/vnd.hp-pclxl
     */
    case vnd_hp_pclxl;

    /**
     * application/vnd.hydrostatix.sof-data
     */
    case vnd_hydrostatix_sof_data;

    /**
     * application/vnd.hzn-3d-crossword
     */
    case vnd_hzn_3d_crossword;

    /**
     * application/vnd.ibm.minipay
     */
    case vnd_ibm_minipay;

    /**
     * application/vnd.ibm.modcap
     */
    case vnd_ibm_modcap;

    /**
     * application/vnd.ibm.rights-management
     */
    case vnd_ibm_rights_management;

    /**
     * application/vnd.ibm.secure-container
     */
    case vnd_ibm_secure_container;

    /**
     * application/vnd.iccprofile
     */
    case vnd_iccprofile;

    /**
     * application/vnd.igloader
     */
    case vnd_igloader;

    /**
     * application/vnd.immervision-ivp
     */
    case vnd_immervision_ivp;

    /**
     * application/vnd.immervision-ivu
     */
    case vnd_immervision_ivu;

    /**
     * text/vnd.in3d.3dml
     */
    case vnd_in3d_3dml;

    /**
     * text/vnd.in3d.spot
     */
    case vnd_in3d_spot;

    /**
     * application/vnd.intercon.formnet
     */
    case vnd_intercon_formnet;

    /**
     * application/vnd.intu.qbo
     */
    case vnd_intu_qbo;

    /**
     * application/vnd.intu.qfx
     */
    case vnd_intu_qfx;

    /**
     * application/vnd.ipunplugged.rcprofile
     */
    case vnd_ipunplugged_rcprofile;

    /**
     * application/vnd.irepository.package+xml
     */
    case vnd_irepository_package_xml;

    /**
     * application/vnd.is-xpr
     */
    case vnd_is_xpr;

    /**
     * application/vnd.jam
     */
    case vnd_jam;

    /**
     * application/vnd.jcp.javame.midlet-rms
     */
    case vnd_jcp_javame_midlet_rms;

    /**
     * application/vnd.jisp
     */
    case vnd_jisp;

    /**
     * application/vnd.joost.joda-archive
     */
    case vnd_joost_joda_archive;

    /**
     * application/vnd.kahootz
     */
    case vnd_kahootz;

    /**
     * application/vnd.kde.karbon
     */
    case vnd_kde_karbon;

    /**
     * application/vnd.kde.kchart
     */
    case vnd_kde_kchart;

    /**
     * application/vnd.kde.kformula
     */
    case vnd_kde_kformula;

    /**
     * application/vnd.kde.kivio
     */
    case vnd_kde_kivio;

    /**
     * application/vnd.kde.kontour
     */
    case vnd_kde_kontour;

    /**
     * application/vnd.kde.kpresenter
     */
    case vnd_kde_kpresenter;

    /**
     * application/vnd.kde.kspread
     */
    case vnd_kde_kspread;

    /**
     * application/vnd.kde.kword
     */
    case vnd_kde_kword;

    /**
     * application/vnd.kenameaapp
     */
    case vnd_kenameaapp;

    /**
     * application/vnd.kidspiration
     */
    case vnd_kidspiration;

    /**
     * application/vnd.kinar
     */
    case vnd_kinar;

    /**
     * application/vnd.koan
     */
    case vnd_koan;

    /**
     * application/vnd.kodak-descriptor
     */
    case vnd_kodak_descriptor;

    /**
     * application/vnd.llamagraphics.life-balance.desktop
     */
    case vnd_llamagraphics_life_balance_desktop;

    /**
     * application/vnd.llamagraphics.life-balance.exchange+xml
     */
    case vnd_llamagraphics_life_balance_exchange_xml;

    /**
     * application/vnd.lotus-1-2-3
     */
    case vnd_lotus_1_2_3;

    /**
     * application/vnd.lotus-approach
     */
    case vnd_lotus_approach;

    /**
     * application/vnd.lotus-freelance
     */
    case vnd_lotus_freelance;

    /**
     * application/vnd.lotus-notes
     */
    case vnd_lotus_notes;

    /**
     * application/vnd.lotus-organizer
     */
    case vnd_lotus_organizer;

    /**
     * application/vnd.lotus-screencam
     */
    case vnd_lotus_screencam;

    /**
     * application/vnd.lotus-wordpro
     */
    case vnd_lotus_wordpro;

    /**
     * audio/vnd.lucent.voice
     */
    case vnd_lucent_voice;

    /**
     * application/vnd.macports.portpkg
     */
    case vnd_macports_portpkg;

    /**
     * application/vnd.mcd
     */
    case vnd_mcd;

    /**
     * application/vnd.medcalcdata
     */
    case vnd_medcalcdata;

    /**
     * application/vnd.mediastation.cdkey
     */
    case vnd_mediastation_cdkey;

    /**
     * application/vnd.mfer
     */
    case vnd_mfer;

    /**
     * application/vnd.mfmp
     */
    case vnd_mfmp;

    /**
     * application/vnd.micrografx.flo
     */
    case vnd_micrografx_flo;

    /**
     * application/vnd.micrografx.igx
     */
    case vnd_micrografx_igx;

    /**
     * application/vnd.mif
     */
    case vnd_mif;

    /**
     * application/vnd.mobius.daf
     */
    case vnd_mobius_daf;

    /**
     * application/vnd.mobius.dis
     */
    case vnd_mobius_dis;

    /**
     * application/vnd.mobius.mbk
     */
    case vnd_mobius_mbk;

    /**
     * application/vnd.mobius.mqy
     */
    case vnd_mobius_mqy;

    /**
     * application/vnd.mobius.msl
     */
    case vnd_mobius_msl;

    /**
     * application/vnd.mobius.plc
     */
    case vnd_mobius_plc;

    /**
     * application/vnd.mobius.txf
     */
    case vnd_mobius_txf;

    /**
     * application/vnd.mophun.application
     */
    case vnd_mophun_application;

    /**
     * application/vnd.mophun.certificate
     */
    case vnd_mophun_certificate;

    /**
     * application/vnd.mozilla.xul+xml
     */
    case vnd_mozilla_xul_xml;

    /**
     * video/vnd.mpegurl
     */
    case vnd_mpegurl;

    /**
     * application/vnd.ms-artgalry
     */
    case vnd_ms_artgalry;

    /**
     * application/vnd.ms-cab-compressed
     */
    case vnd_ms_cab_compressed;

    /**
     * application/vnd.ms-excel
     */
    case vnd_ms_excel;

    /**
     * application/vnd.ms-excel.addin.macroenabled.12
     */
    case vnd_ms_excel_addin_macroenabled_12;

    /**
     * application/vnd.ms-excel.sheet.binary.macroenabled.12
     */
    case vnd_ms_excel_sheet_binary_macroenabled_12;

    /**
     * application/vnd.ms-excel.sheet.macroenabled.12
     */
    case vnd_ms_excel_sheet_macroenabled_12;

    /**
     * application/vnd.ms-excel.template.macroenabled.12
     */
    case vnd_ms_excel_template_macroenabled_12;

    /**
     * application/vnd.ms-fontobject
     */
    case vnd_ms_fontobject;

    /**
     * application/vnd.ms-htmlhelp
     */
    case vnd_ms_htmlhelp;

    /**
     * application/vnd.ms-ims
     */
    case vnd_ms_ims;

    /**
     * application/vnd.ms-lrm
     */
    case vnd_ms_lrm;

    /**
     * image/vnd.ms-modi
     */
    case vnd_ms_modi;

    /**
     * application/vnd.ms-pki.seccat
     */
    case vnd_ms_pki_seccat;

    /**
     * application/vnd.ms-pki.stl
     */
    case vnd_ms_pki_stl;

    /**
     * audio/vnd.ms-playready.media.pya
     */
    case vnd_ms_playready_media_pya;

    /**
     * video/vnd.ms-playready.media.pyv
     */
    case vnd_ms_playready_media_pyv;

    /**
     * application/vnd.ms-powerpoint
     */
    case vnd_ms_powerpoint;

    /**
     * application/vnd.ms-powerpoint.addin.macroenabled.12
     */
    case vnd_ms_powerpoint_addin_macroenabled_12;

    /**
     * application/vnd.ms-powerpoint.presentation.macroenabled.12
     */
    case vnd_ms_powerpoint_presentation_macroenabled_12;

    /**
     * application/vnd.ms-powerpoint.slide.macroenabled.12
     */
    case vnd_ms_powerpoint_slide_macroenabled_12;

    /**
     * application/vnd.ms-powerpoint.slideshow.macroenabled.12
     */
    case vnd_ms_powerpoint_slideshow_macroenabled_12;

    /**
     * application/vnd.ms-powerpoint.template.macroenabled.12
     */
    case vnd_ms_powerpoint_template_macroenabled_12;

    /**
     * application/vnd.ms-project
     */
    case vnd_ms_project;

    /**
     * application/vnd.ms-word.document.macroenabled.12
     */
    case vnd_ms_word_document_macroenabled_12;

    /**
     * application/vnd.ms-word.template.macroenabled.12
     */
    case vnd_ms_word_template_macroenabled_12;

    /**
     * application/vnd.ms-works
     */
    case vnd_ms_works;

    /**
     * application/vnd.ms-wpl
     */
    case vnd_ms_wpl;

    /**
     * application/vnd.ms-xpsdocument
     */
    case vnd_ms_xpsdocument;

    /**
     * application/vnd.mseq
     */
    case vnd_mseq;

    /**
     * model/vnd.mts
     */
    case vnd_mts;

    /**
     * application/vnd.musician
     */
    case vnd_musician;

    /**
     * application/vnd.muvee.style
     */
    case vnd_muvee_style;

    /**
     * image/vnd.net-fpx
     */
    case vnd_net_fpx;

    /**
     * application/vnd.neurolanguage.nlu
     */
    case vnd_neurolanguage_nlu;

    /**
     * application/vnd.noblenet-directory
     */
    case vnd_noblenet_directory;

    /**
     * application/vnd.noblenet-sealer
     */
    case vnd_noblenet_sealer;

    /**
     * application/vnd.noblenet-web
     */
    case vnd_noblenet_web;

    /**
     * application/vnd.nokia.n-gage.data
     */
    case vnd_nokia_n_gage_data;

    /**
     * application/vnd.nokia.n-gage.symbian.install
     */
    case vnd_nokia_n_gage_symbian_install;

    /**
     * application/vnd.nokia.radio-preset
     */
    case vnd_nokia_radio_preset;

    /**
     * application/vnd.nokia.radio-presets
     */
    case vnd_nokia_radio_presets;

    /**
     * application/vnd.novadigm.edm
     */
    case vnd_novadigm_edm;

    /**
     * application/vnd.novadigm.edx
     */
    case vnd_novadigm_edx;

    /**
     * application/vnd.novadigm.ext
     */
    case vnd_novadigm_ext;

    /**
     * audio/vnd.nuera.ecelp4800
     */
    case vnd_nuera_ecelp4800;

    /**
     * audio/vnd.nuera.ecelp7470
     */
    case vnd_nuera_ecelp7470;

    /**
     * audio/vnd.nuera.ecelp9600
     */
    case vnd_nuera_ecelp9600;

    /**
     * application/vnd.oasis.opendocument.chart
     */
    case vnd_oasis_opendocument_chart;

    /**
     * application/vnd.oasis.opendocument.chart-template
     */
    case vnd_oasis_opendocument_chart_template;

    /**
     * application/vnd.oasis.opendocument.database
     */
    case vnd_oasis_opendocument_database;

    /**
     * application/vnd.oasis.opendocument.formula
     */
    case vnd_oasis_opendocument_formula;

    /**
     * application/vnd.oasis.opendocument.formula-template
     */
    case vnd_oasis_opendocument_formula_template;

    /**
     * application/vnd.oasis.opendocument.graphics
     */
    case vnd_oasis_opendocument_graphics;

    /**
     * application/vnd.oasis.opendocument.graphics-template
     */
    case vnd_oasis_opendocument_graphics_template;

    /**
     * application/vnd.oasis.opendocument.image
     */
    case vnd_oasis_opendocument_image;

    /**
     * application/vnd.oasis.opendocument.image-template
     */
    case vnd_oasis_opendocument_image_template;

    /**
     * application/vnd.oasis.opendocument.presentation
     */
    case vnd_oasis_opendocument_presentation;

    /**
     * application/vnd.oasis.opendocument.presentation-template
     */
    case vnd_oasis_opendocument_presentation_template;

    /**
     * application/vnd.oasis.opendocument.spreadsheet
     */
    case vnd_oasis_opendocument_spreadsheet;

    /**
     * application/vnd.oasis.opendocument.spreadsheet-template
     */
    case vnd_oasis_opendocument_spreadsheet_template;

    /**
     * application/vnd.oasis.opendocument.text
     */
    case vnd_oasis_opendocument_text;

    /**
     * application/vnd.oasis.opendocument.text-master
     */
    case vnd_oasis_opendocument_text_master;

    /**
     * application/vnd.oasis.opendocument.text-template
     */
    case vnd_oasis_opendocument_text_template;

    /**
     * application/vnd.oasis.opendocument.text-web
     */
    case vnd_oasis_opendocument_text_web;

    /**
     * application/vnd.olpc-sugar
     */
    case vnd_olpc_sugar;

    /**
     * application/vnd.oma.dd2+xml
     */
    case vnd_oma_dd2_xml;

    /**
     * application/vnd.openofficeorg.extension
     */
    case vnd_openofficeorg_extension;

    /**
     * application/vnd.openxmlformats-officedocument.presentationml.presentation
     */
    case vnd_openxmlformats_officedocument_presentationml_presentation;

    /**
     * application/vnd.openxmlformats-officedocument.presentationml.slide
     */
    case vnd_openxmlformats_officedocument_presentationml_slide;

    /**
     * application/vnd.openxmlformats-officedocument.presentationml.slideshow
     */
    case vnd_openxmlformats_officedocument_presentationml_slideshow;

    /**
     * application/vnd.openxmlformats-officedocument.presentationml.template
     */
    case vnd_openxmlformats_officedocument_presentationml_template;

    /**
     * application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
     */
    case vnd_openxmlformats_officedocument_spreadsheetml_sheet;

    /**
     * application/vnd.openxmlformats-officedocument.spreadsheetml.template
     */
    case vnd_openxmlformats_officedocument_spreadsheetml_template;

    /**
     * application/vnd.openxmlformats-officedocument.wordprocessingml.document
     */
    case vnd_openxmlformats_officedocument_wordprocessingml_document;

    /**
     * application/vnd.openxmlformats-officedocument.wordprocessingml.template
     */
    case vnd_openxmlformats_officedocument_wordprocessingml_template;

    /**
     * application/vnd.osgi.dp
     */
    case vnd_osgi_dp;

    /**
     * application/vnd.palm
     */
    case vnd_palm;

    /**
     * application/vnd.pg.format
     */
    case vnd_pg_format;

    /**
     * application/vnd.pg.osasli
     */
    case vnd_pg_osasli;

    /**
     * application/vnd.picsel
     */
    case vnd_picsel;

    /**
     * application/vnd.pocketlearn
     */
    case vnd_pocketlearn;

    /**
     * application/vnd.powerbuilder6
     */
    case vnd_powerbuilder6;

    /**
     * application/vnd.previewsystems.box
     */
    case vnd_previewsystems_box;

    /**
     * application/vnd.proteus.magazine
     */
    case vnd_proteus_magazine;

    /**
     * application/vnd.publishare-delta-tree
     */
    case vnd_publishare_delta_tree;

    /**
     * application/vnd.pvi.ptid1
     */
    case vnd_pvi_ptid1;

    /**
     * application/vnd.quark.quarkxpress
     */
    case vnd_quark_quarkxpress;

    /**
     * application/vnd.rar
     */
    case vnd_rar;

    /**
     * application/vnd.recordare.musicxml
     */
    case vnd_recordare_musicxml;

    /**
     * application/vnd.recordare.musicxml+xml
     */
    case vnd_recordare_musicxml_xml;

    /**
     * application/vnd.rim.cod
     */
    case vnd_rim_cod;

    /**
     * application/vnd.rn-realmedia
     */
    case vnd_rn_realmedia;

    /**
     * application/vnd.route66.link66+xml
     */
    case vnd_route66_link66_xml;

    /**
     * application/vnd.seemail
     */
    case vnd_seemail;

    /**
     * application/vnd.sema
     */
    case vnd_sema;

    /**
     * application/vnd.semd
     */
    case vnd_semd;

    /**
     * application/vnd.semf
     */
    case vnd_semf;

    /**
     * application/vnd.shana.informed.formdata
     */
    case vnd_shana_informed_formdata;

    /**
     * application/vnd.shana.informed.formtemplate
     */
    case vnd_shana_informed_formtemplate;

    /**
     * application/vnd.shana.informed.interchange
     */
    case vnd_shana_informed_interchange;

    /**
     * application/vnd.shana.informed.package
     */
    case vnd_shana_informed_package;

    /**
     * application/vnd.simtech-mindmapper
     */
    case vnd_simtech_mindmapper;

    /**
     * application/vnd.smaf
     */
    case vnd_smaf;

    /**
     * application/vnd.smart.teacher
     */
    case vnd_smart_teacher;

    /**
     * application/vnd.solent.sdkm+xml
     */
    case vnd_solent_sdkm_xml;

    /**
     * application/vnd.spotfire.dxp
     */
    case vnd_spotfire_dxp;

    /**
     * application/vnd.spotfire.sfs
     */
    case vnd_spotfire_sfs;

    /**
     * application/vnd.sqlite3
     */
    case vnd_sqlite3;

    /**
     * application/vnd.stardivision.calc
     */
    case vnd_stardivision_calc;

    /**
     * application/vnd.stardivision.draw
     */
    case vnd_stardivision_draw;

    /**
     * application/vnd.stardivision.impress
     */
    case vnd_stardivision_impress;

    /**
     * application/vnd.stardivision.math
     */
    case vnd_stardivision_math;

    /**
     * application/vnd.stardivision.writer
     */
    case vnd_stardivision_writer;

    /**
     * application/vnd.stardivision.writer-global
     */
    case vnd_stardivision_writer_global;

    /**
     * text/vnd.sun.j2me.app-descriptor
     */
    case vnd_sun_j2me_app_descriptor;

    /**
     * application/vnd.sun.xml.calc
     */
    case vnd_sun_xml_calc;

    /**
     * application/vnd.sun.xml.calc.template
     */
    case vnd_sun_xml_calc_template;

    /**
     * application/vnd.sun.xml.draw
     */
    case vnd_sun_xml_draw;

    /**
     * application/vnd.sun.xml.draw.template
     */
    case vnd_sun_xml_draw_template;

    /**
     * application/vnd.sun.xml.impress
     */
    case vnd_sun_xml_impress;

    /**
     * application/vnd.sun.xml.impress.template
     */
    case vnd_sun_xml_impress_template;

    /**
     * application/vnd.sun.xml.math
     */
    case vnd_sun_xml_math;

    /**
     * application/vnd.sun.xml.writer
     */
    case vnd_sun_xml_writer;

    /**
     * application/vnd.sun.xml.writer.global
     */
    case vnd_sun_xml_writer_global;

    /**
     * application/vnd.sun.xml.writer.template
     */
    case vnd_sun_xml_writer_template;

    /**
     * application/vnd.sus-calendar
     */
    case vnd_sus_calendar;

    /**
     * application/vnd.svd
     */
    case vnd_svd;

    /**
     * application/vnd.symbian.install
     */
    case vnd_symbian_install;

    /**
     * application/vnd.syncml.dm+wbxml
     */
    case vnd_syncml_dm_wbxml;

    /**
     * application/vnd.syncml.dm+xml
     */
    case vnd_syncml_dm_xml;

    /**
     * application/vnd.syncml+xml
     */
    case vnd_syncml_xml;

    /**
     * application/vnd.tao.intent-module-archive
     */
    case vnd_tao_intent_module_archive;

    /**
     * application/vnd.tmobile-livetv
     */
    case vnd_tmobile_livetv;

    /**
     * application/vnd.trid.tpt
     */
    case vnd_trid_tpt;

    /**
     * application/vnd.triscape.mxs
     */
    case vnd_triscape_mxs;

    /**
     * application/vnd.trueapp
     */
    case vnd_trueapp;

    /**
     * application/vnd.ufdl
     */
    case vnd_ufdl;

    /**
     * application/vnd.uiq.theme
     */
    case vnd_uiq_theme;

    /**
     * application/vnd.umajin
     */
    case vnd_umajin;

    /**
     * application/vnd.unity
     */
    case vnd_unity;

    /**
     * application/vnd.uoml+xml
     */
    case vnd_uoml_xml;

    /**
     * application/vnd.vcx
     */
    case vnd_vcx;

    /**
     * application/vnd.visio
     */
    case vnd_visio;

    /**
     * application/vnd.visionary
     */
    case vnd_visionary;

    /**
     * video/vnd.vivo
     */
    case vnd_vivo;

    /**
     * application/vnd.vsf
     */
    case vnd_vsf;

    /**
     * model/vnd.vtu
     */
    case vnd_vtu;

    /**
     * text/vnd.wap.si
     */
    case vnd_wap_si;

    /**
     * application/vnd.wap.sic
     */
    case vnd_wap_sic;

    /**
     * text/vnd.wap.sl
     */
    case vnd_wap_sl;

    /**
     * application/vnd.wap.slc
     */
    case vnd_wap_slc;

    /**
     * image/vnd.wap.wbmp
     */
    case vnd_wap_wbmp;

    /**
     * application/vnd.wap.wbxml
     */
    case vnd_wap_wbxml;

    /**
     * text/vnd.wap.wml
     */
    case vnd_wap_wml;

    /**
     * application/vnd.wap.wmlc
     */
    case vnd_wap_wmlc;

    /**
     * text/vnd.wap.wmlscript
     */
    case vnd_wap_wmlscript;

    /**
     * application/vnd.wap.wmlscriptc
     */
    case vnd_wap_wmlscriptc;

    /**
     * audio/vnd.wav
     */
    case vnd_wav;

    /**
     * application/vnd.webturbo
     */
    case vnd_webturbo;

    /**
     * application/vnd.wordperfect
     */
    case vnd_wordperfect;

    /**
     * application/vnd.wqd
     */
    case vnd_wqd;

    /**
     * application/vnd.wt.stf
     */
    case vnd_wt_stf;

    /**
     * application/vnd.xara
     */
    case vnd_xara;

    /**
     * application/vnd.xfdl
     */
    case vnd_xfdl;

    /**
     * image/vnd.xiff
     */
    case vnd_xiff;

    /**
     * application/vnd.yamaha.hv-dic
     */
    case vnd_yamaha_hv_dic;

    /**
     * application/vnd.yamaha.hv-script
     */
    case vnd_yamaha_hv_script;

    /**
     * application/vnd.yamaha.hv-voice
     */
    case vnd_yamaha_hv_voice;

    /**
     * application/vnd.yamaha.openscoreformat
     */
    case vnd_yamaha_openscoreformat;

    /**
     * application/vnd.yamaha.openscoreformat.osfpvg+xml
     */
    case vnd_yamaha_openscoreformat_osfpvg_xml;

    /**
     * application/vnd.yamaha.smaf-audio
     */
    case vnd_yamaha_smaf_audio;

    /**
     * application/vnd.yamaha.smaf-phrase
     */
    case vnd_yamaha_smaf_phrase;

    /**
     * application/vnd.yellowriver-custom-menu
     */
    case vnd_yellowriver_custom_menu;

    /**
     * application/vnd.zul
     */
    case vnd_zul;

    /**
     * application/vnd.zzazz.deck+xml
     */
    case vnd_zzazz_deck_xml;

    /**
     * application/voicexml+xml
     */
    case voicexml_xml;

    /**
     * model/vrml
     */
    case vrml;

    /**
     * application/wasm
     */
    case wasm;

    /**
     * audio/webm
     */
    case webm;

    // /**
    //  * video/webm
    //  */
    // case webm;

    /**
     * image/webp
     */
    case webp;

    /**
     * application/winhlp
     */
    case winhlp;

    /**
     * font/woff
     */
    case woff;

    /**
     * font/woff2
     */
    case woff2;

    /**
     * application/wsdl+xml
     */
    case wsdl_xml;

    /**
     * application/wspolicy+xml
     */
    case wspolicy_xml;

    /**
     * application/x-7z-compressed
     */
    case x_7z_compressed;

    /**
     * application/x-abiword
     */
    case x_abiword;

    /**
     * application/x-ace-compressed
     */
    case x_ace_compressed;

    /**
     * image/x-adobe-dng
     */
    case x_adobe_dng;

    /**
     * text/x-asm
     */
    case x_asm;

    /**
     * application/x-authorware-bin
     */
    case x_authorware_bin;

    /**
     * application/x-authorware-map
     */
    case x_authorware_map;

    /**
     * application/x-authorware-seg
     */
    case x_authorware_seg;

    /**
     * application/x-bcpio
     */
    case x_bcpio;

    /**
     * application/x-bittorrent
     */
    case x_bittorrent;

    /**
     * application/x-bzip
     */
    case x_bzip;

    /**
     * application/x-bzip2
     */
    case x_bzip2;

    /**
     * text/x-c
     */
    case x_c;

    /**
     * image/x-canon-cr2
     */
    case x_canon_cr2;

    /**
     * image/x-canon-crw
     */
    case x_canon_crw;

    /**
     * application/x-cdlink
     */
    case x_cdlink;

    /**
     * chemical/x-cdx
     */
    case x_cdx;

    /**
     * application/x-chat
     */
    case x_chat;

    /**
     * application/x-chess-pgn
     */
    case x_chess_pgn;

    /**
     * chemical/x-cif
     */
    case x_cif;

    /**
     * chemical/x-cmdf
     */
    case x_cmdf;

    /**
     * chemical/x-cml
     */
    case x_cml;

    /**
     * image/x-cmu-raster
     */
    case x_cmu_raster;

    /**
     * image/x-cmx
     */
    case x_cmx;

    /**
     * x-conference/x-cooltalk
     */
    case x_cooltalk;

    /**
     * application/x-cpio
     */
    case x_cpio;

    /**
     * application/x-csh
     */
    case x_csh;

    /**
     * chemical/x-csml
     */
    case x_csml;

    /**
     * application/x-debian-package
     */
    case x_debian_package;

    /**
     * application/x-director
     */
    case x_director;

    /**
     * application/x-doom
     */
    case x_doom;

    /**
     * application/x-dtbncx+xml
     */
    case x_dtbncx_xml;

    /**
     * application/x-dtbook+xml
     */
    case x_dtbook_xml;

    /**
     * application/x-dtbresource+xml
     */
    case x_dtbresource_xml;

    /**
     * application/x-dvi
     */
    case x_dvi;

    /**
     * image/x-epson-erf
     */
    case x_epson_erf;

    /**
     * video/x-f4v
     */
    case x_f4v;

    /**
     * video/x-fli
     */
    case x_fli;

    /**
     * video/x-flv
     */
    case x_flv;

    /**
     * application/x-font-bdf
     */
    case x_font_bdf;

    /**
     * application/x-font-ghostscript
     */
    case x_font_ghostscript;

    /**
     * application/x-font-linux-psf
     */
    case x_font_linux_psf;

    /**
     * application/x-font-otf
     */
    case x_font_otf;

    /**
     * application/x-font-pcf
     */
    case x_font_pcf;

    /**
     * application/x-font-snf
     */
    case x_font_snf;

    /**
     * application/x-font-ttf
     */
    case x_font_ttf;

    /**
     * application/x-font-type1
     */
    case x_font_type1;

    /**
     * text/x-fortran
     */
    case x_fortran;

    /**
     * image/x-freehand
     */
    case x_freehand;

    /**
     * image/x-fuji-raf
     */
    case x_fuji_raf;

    /**
     * application/x-futuresplash
     */
    case x_futuresplash;

    /**
     * application/x-gnumeric
     */
    case x_gnumeric;

    /**
     * application/x-gtar
     */
    case x_gtar;

    /**
     * application/x-gzip
     */
    case x_gzip;

    /**
     * application/x-hdf
     */
    case x_hdf;

    /**
     * image/x-icns
     */
    case x_icns;

    /**
     * image/x-icon
     */
    case x_icon;

    /**
     * application/x-iso9660-image
     */
    case x_iso9660_image;

    /**
     * application/x-java-jnlp-file
     */
    case x_java_jnlp_file;

    /**
     * text/x-java-source
     */
    case x_java_source;

    /**
     * application/x-killustrator
     */
    case x_killustrator;

    /**
     * image/x-kodak-dcr
     */
    case x_kodak_dcr;

    /**
     * image/x-kodak-k25
     */
    case x_kodak_k25;

    /**
     * image/x-kodak-kdc
     */
    case x_kodak_kdc;

    /**
     * application/x-krita
     */
    case x_krita;

    /**
     * application/x-latex
     */
    case x_latex;

    /**
     * video/x-m4v
     */
    case x_m4v;

    /**
     * text/x-markdown
     */
    case x_markdown;

    /**
     * video/x-matroska
     */
    case x_matroska;

    // /**
    //  * audio/x-matroska
    //  */
    // case x_matroska;

    /**
     * image/x-minolta-mrw
     */
    case x_minolta_mrw;

    /**
     * application/x-mobipocket-ebook
     */
    case x_mobipocket_ebook;

    /**
     * audio/x-mpegurl
     */
    case x_mpegurl;

    /**
     * application/x-ms-application
     */
    case x_ms_application;

    /**
     * video/x-ms-asf
     */
    case x_ms_asf;

    /**
     * audio/x-ms-wax
     */
    case x_ms_wax;

    /**
     * video/x-ms-wm
     */
    case x_ms_wm;

    /**
     * audio/x-ms-wma
     */
    case x_ms_wma;

    /**
     * application/x-ms-wmd
     */
    case x_ms_wmd;

    /**
     * video/x-ms-wmv
     */
    case x_ms_wmv;

    /**
     * video/x-ms-wmx
     */
    case x_ms_wmx;

    /**
     * application/x-ms-wmz
     */
    case x_ms_wmz;

    /**
     * video/x-ms-wvx
     */
    case x_ms_wvx;

    /**
     * application/x-ms-xbap
     */
    case x_ms_xbap;

    /**
     * application/x-msaccess
     */
    case x_msaccess;

    /**
     * application/x-msbinder
     */
    case x_msbinder;

    /**
     * application/x-mscardfile
     */
    case x_mscardfile;

    /**
     * application/x-msclip
     */
    case x_msclip;

    /**
     * application/x-msdownload
     */
    case x_msdownload;

    /**
     * application/x-msmediaview
     */
    case x_msmediaview;

    /**
     * application/x-msmetafile
     */
    case x_msmetafile;

    /**
     * application/x-msmoney
     */
    case x_msmoney;

    /**
     * application/x-mspublisher
     */
    case x_mspublisher;

    /**
     * application/x-msschedule
     */
    case x_msschedule;

    /**
     * application/x-msterminal
     */
    case x_msterminal;

    /**
     * video/x-msvideo
     */
    case x_msvideo;

    /**
     * application/x-mswrite
     */
    case x_mswrite;

    /**
     * application/x-netcdf
     */
    case x_netcdf;

    /**
     * image/x-nikon-nef
     */
    case x_nikon_nef;

    /**
     * image/x-olympus-orf
     */
    case x_olympus_orf;

    /**
     * image/x-panasonic-raw
     */
    case x_panasonic_raw;

    /**
     * text/x-pascal
     */
    case x_pascal;

    /**
     * image/x-pcx
     */
    case x_pcx;

    /**
     * image/x-pentax-pef
     */
    case x_pentax_pef;

    /**
     * application/x-perl
     */
    case x_perl;

    /**
     * image/x-pict
     */
    case x_pict;

    /**
     * application/x-pkcs12
     */
    case x_pkcs12;

    /**
     * application/x-pkcs7-certificates
     */
    case x_pkcs7_certificates;

    /**
     * application/x-pkcs7-certreqresp
     */
    case x_pkcs7_certreqresp;

    /**
     * audio/x-pn-realaudio
     */
    case x_pn_realaudio;

    /**
     * audio/x-pn-realaudio-plugin
     */
    case x_pn_realaudio_plugin;

    /**
     * image/x-portable-anymap
     */
    case x_portable_anymap;

    /**
     * image/x-portable-bitmap
     */
    case x_portable_bitmap;

    /**
     * image/x-portable-graymap
     */
    case x_portable_graymap;

    /**
     * image/x-portable-pixmap
     */
    case x_portable_pixmap;

    /**
     * text/x-python
     */
    case x_python;

    /**
     * application/x-python-code
     */
    case x_python_code;

    /**
     * application/x-rar-compressed
     */
    case x_rar_compressed;

    /**
     * application/x-redhat-package-manager
     */
    case x_redhat_package_manager;

    /**
     * image/x-rgb
     */
    case x_rgb;

    /**
     * application/x-rpm
     */
    case x_rpm;

    /**
     * text/x-setext
     */
    case x_setext;

    /**
     * video/x-sgi-movie
     */
    case x_sgi_movie;

    /**
     * application/x-sh
     */
    case x_sh;

    /**
     * application/x-shar
     */
    case x_shar;

    /**
     * application/x-shellscript
     */
    case x_shellscript;

    /**
     * application/x-shockwave-flash
     */
    case x_shockwave_flash;

    /**
     * image/x-sigma-x3f
     */
    case x_sigma_x3f;

    /**
     * application/x-silverlight-app
     */
    case x_silverlight_app;

    /**
     * image/x-sony-arw
     */
    case x_sony_arw;

    /**
     * image/x-sony-sr2
     */
    case x_sony_sr2;

    /**
     * image/x-sony-srf
     */
    case x_sony_srf;

    /**
     * application/x-sqlite3
     */
    case x_sqlite3;

    /**
     * application/x-stuffit
     */
    case x_stuffit;

    /**
     * application/x-stuffitx
     */
    case x_stuffitx;

    /**
     * application/x-sv4cpio
     */
    case x_sv4cpio;

    /**
     * application/x-sv4crc
     */
    case x_sv4crc;

    /**
     * application/x-tar
     */
    case x_tar;

    /**
     * application/x-tcl
     */
    case x_tcl;

    /**
     * application/x-tex
     */
    case x_tex;

    /**
     * application/x-tex-tfm
     */
    case x_tex_tfm;

    /**
     * application/x-texinfo
     */
    case x_texinfo;

    /**
     * application/x-trash
     */
    case x_trash;

    /**
     * application/x-ustar
     */
    case x_ustar;

    /**
     * text/x-uuencode
     */
    case x_uuencode;

    /**
     * text/x-vcalendar
     */
    case x_vcalendar;

    /**
     * text/x-vcard
     */
    case x_vcard;

    /**
     * application/x-wais-source
     */
    case x_wais_source;

    /**
     * application/x-x509-ca-cert
     */
    case x_x509_ca_cert;

    /**
     * image/x-xbitmap
     */
    case x_xbitmap;

    /**
     * application/x-xfig
     */
    case x_xfig;

    /**
     * application/x-xpinstall
     */
    case x_xpinstall;

    /**
     * image/x-xpixmap
     */
    case x_xpixmap;

    /**
     * image/x-xwindowdump
     */
    case x_xwindowdump;

    /**
     * chemical/x-xyz
     */
    case x_xyz;

    /**
     * application/x-zip-compressed
     */
    case x_zip_compressed;

    /**
     * application/xenc+xml
     */
    case xenc_xml;

    /**
     * application/xhtml+xml
     */
    case xhtml_xml;

    /**
     * application/xml
     */
    case xml;

    /**
     * application/xml-dtd
     */
    case xml_dtd;

    /**
     * application/xop+xml
     */
    case xop_xml;

    /**
     * application/xslt+xml
     */
    case xslt_xml;

    /**
     * application/xspf+xml
     */
    case xspf_xml;

    /**
     * application/xv+xml
     */
    case xv_xml;

    /**
     * application/yaml
     */
    case yaml;

    /**
     * application/zip
     */
    case zip;

    /**
     * application/zip-compressed
     */
    case zip_compressed;




    /**
     * Gets string representation of MIME type.
     * @return string String representation of MIME type.
     */
    public function toString(): string
    {
        $reti = "application/octet-stream";
        switch($this)
        {
            case MimeType::_3gpp: $reti = "video/3gpp"; break;
            case MimeType::_3gpp2: $reti = "audio/3gpp2"; break;
            // case MimeType::_3gpp2: $reti = "video/3gpp2"; break;
            case MimeType::aac: $reti = "audio/aac"; break;
            case MimeType::aacp: $reti = "audio/aacp"; break;
            case MimeType::adpcm: $reti = "audio/adpcm"; break;
            case MimeType::aiff: $reti = "audio/aiff"; break;
            case MimeType::andrew_inset: $reti = "application/andrew-inset"; break;
            case MimeType::applixware: $reti = "application/applixware"; break;
            case MimeType::atom_xml: $reti = "application/atom+xml"; break;
            case MimeType::atomcat_xml: $reti = "application/atomcat+xml"; break;
            case MimeType::atomsvc_xml: $reti = "application/atomsvc+xml"; break;
            case MimeType::avif: $reti = "image/avif"; break;
            case MimeType::basic: $reti = "audio/basic"; break;
            case MimeType::bmp: $reti = "image/bmp"; break;
            case MimeType::calendar: $reti = "text/calendar"; break;
            case MimeType::ccxml_xml: $reti = "application/ccxml+xml"; break;
            case MimeType::cgm: $reti = "image/cgm"; break;
            case MimeType::css: $reti = "text/css"; break;
            case MimeType::csv: $reti = "text/csv"; break;
            case MimeType::cu_seeme: $reti = "application/cu-seeme"; break;
            case MimeType::davmount_xml: $reti = "application/davmount+xml"; break;
            case MimeType::ecmascript: $reti = "application/ecmascript"; break;
            case MimeType::emma_xml: $reti = "application/emma+xml"; break;
            case MimeType::epub_zip: $reti = "application/epub+zip"; break;
            case MimeType::flac: $reti = "audio/flac"; break;
            case MimeType::font_tdpfr: $reti = "application/font-tdpfr"; break;
            case MimeType::g3fax: $reti = "image/g3fax"; break;
            case MimeType::gcode: $reti = "gcode"; break;
            case MimeType::gif: $reti = "image/gif"; break;
            case MimeType::gzip: $reti = "application/gzip"; break;
            case MimeType::h261: $reti = "video/h261"; break;
            case MimeType::h263: $reti = "video/h263"; break;
            case MimeType::h264: $reti = "video/h264"; break;
            case MimeType::heic: $reti = "image/heic"; break;
            case MimeType::html: $reti = "text/html"; break;
            case MimeType::hyperstudio: $reti = "application/hyperstudio"; break;
            case MimeType::ief: $reti = "image/ief"; break;
            case MimeType::iges: $reti = "model/iges"; break;
            case MimeType::java_archive: $reti = "application/java-archive"; break;
            case MimeType::java_serialized_object: $reti = "application/java-serialized-object"; break;
            case MimeType::java_vm: $reti = "application/java-vm"; break;
            case MimeType::javascript: $reti = "text/javascript"; break;
            case MimeType::jpeg: $reti = "image/jpeg"; break;
            // case MimeType::jpeg: $reti = "video/jpeg"; break;
            case MimeType::jpm: $reti = "video/jpm"; break;
            case MimeType::json: $reti = "application/json"; break;
            case MimeType::lost_xml: $reti = "application/lost+xml"; break;
            case MimeType::mac_binhex40: $reti = "application/mac-binhex40"; break;
            case MimeType::mac_compactpro: $reti = "application/mac-compactpro"; break;
            case MimeType::marc: $reti = "application/marc"; break;
            case MimeType::markdown: $reti = "text/markdown"; break;
            case MimeType::mathematica: $reti = "application/mathematica"; break;
            case MimeType::mathml: $reti = "text/mathml"; break;
            case MimeType::mathml_xml: $reti = "application/mathml+xml"; break;
            case MimeType::mbox: $reti = "application/mbox"; break;
            case MimeType::mediaservercontrol_xml: $reti = "application/mediaservercontrol+xml"; break;
            case MimeType::mesh: $reti = "model/mesh"; break;
            case MimeType::midi: $reti = "audio/midi"; break;
            case MimeType::mimetype: $reti = "test/mimetype"; break;
            case MimeType::mj2: $reti = "video/mj2"; break;
            case MimeType::mp2t: $reti = "video/mp2t"; break;
            case MimeType::mp4: $reti = "application/mp4"; break;
            // case MimeType::mp4: $reti = "audio/mp4"; break;
            // case MimeType::mp4: $reti = "video/mp4"; break;
            case MimeType::mp4a_latm: $reti = "audio/mp4a-latm"; break;
            case MimeType::mpeg: $reti = "audio/mpeg"; break;
            // case MimeType::mpeg: $reti = "video/mpeg"; break;
            case MimeType::msword: $reti = "application/msword"; break;
            case MimeType::mxf: $reti = "application/mxf"; break;
            case MimeType::octet_stream: $reti = "application/octet-stream"; break;
            case MimeType::oda: $reti = "application/oda"; break;
            case MimeType::oebps_package_xml: $reti = "application/oebps-package+xml"; break;
            case MimeType::ogg: $reti = "application/ogg"; break;
            // case MimeType::ogg: $reti = "audio/ogg"; break;
            // case MimeType::ogg: $reti = "video/ogg"; break;
            case MimeType::onenote: $reti = "application/onenote"; break;
            case MimeType::opus: $reti = "audio/opus"; break;
            case MimeType::otf: $reti = "font/otf"; break;
            case MimeType::patch_ops_error_xml: $reti = "application/patch-ops-error+xml"; break;
            case MimeType::pdf: $reti = "application/pdf"; break;
            case MimeType::pgp_encrypted: $reti = "application/pgp-encrypted"; break;
            case MimeType::pgp_signature: $reti = "application/pgp-signature"; break;
            case MimeType::pics_rules: $reti = "application/pics-rules"; break;
            case MimeType::pjpeg: $reti = "image/pjpeg"; break;
            case MimeType::pkcs10: $reti = "application/pkcs10"; break;
            case MimeType::pkcs7_mime: $reti = "application/pkcs7-mime"; break;
            case MimeType::pkcs7_signature: $reti = "application/pkcs7-signature"; break;
            case MimeType::pkix_cert: $reti = "application/pkix-cert"; break;
            case MimeType::pkix_crl: $reti = "application/pkix-crl"; break;
            case MimeType::pkix_pkipath: $reti = "application/pkix-pkipath"; break;
            case MimeType::pkixcmp: $reti = "application/pkixcmp"; break;
            case MimeType::plain: $reti = "text/plain"; break;
            case MimeType::pls_xml: $reti = "application/pls+xml"; break;
            case MimeType::png: $reti = "image/png"; break;
            case MimeType::postscript: $reti = "application/postscript"; break;
            case MimeType::prql: $reti = "application/prql"; break;
            case MimeType::prs_btif: $reti = "image/prs.btif"; break;
            case MimeType::prs_cww: $reti = "application/prs.cww"; break;
            case MimeType::prs_lines_tag: $reti = "text/prs.lines.tag"; break;
            case MimeType::quicktime: $reti = "video/quicktime"; break;
            case MimeType::rdf_xml: $reti = "application/rdf+xml"; break;
            case MimeType::reginfo_xml: $reti = "application/reginfo+xml"; break;
            case MimeType::relax_ng_compact_syntax: $reti = "application/relax-ng-compact-syntax"; break;
            case MimeType::resource_lists_diff_xml: $reti = "application/resource-lists-diff+xml"; break;
            case MimeType::resource_lists_xml: $reti = "application/resource-lists+xml"; break;
            case MimeType::rfc822: $reti = "message/rfc822"; break;
            case MimeType::richtext: $reti = "text/richtext"; break;
            case MimeType::rls_services_xml: $reti = "application/rls-services+xml"; break;
            case MimeType::rsd_xml: $reti = "application/rsd+xml"; break;
            case MimeType::rss_xml: $reti = "application/rss+xml"; break;
            case MimeType::rtf: $reti = "application/rtf"; break;
            case MimeType::sbml_xml: $reti = "application/sbml+xml"; break;
            case MimeType::scvp_cv_request: $reti = "application/scvp-cv-request"; break;
            case MimeType::scvp_cv_response: $reti = "application/scvp-cv-response"; break;
            case MimeType::scvp_vp_request: $reti = "application/scvp-vp-request"; break;
            case MimeType::scvp_vp_response: $reti = "application/scvp-vp-response"; break;
            case MimeType::sdp: $reti = "application/sdp"; break;
            case MimeType::set_payment_initiation: $reti = "application/set-payment-initiation"; break;
            case MimeType::set_registration_initiation: $reti = "application/set-registration-initiation"; break;
            case MimeType::sgml: $reti = "text/sgml"; break;
            case MimeType::shf_xml: $reti = "application/shf+xml"; break;
            case MimeType::smil_xml: $reti = "application/smil+xml"; break;
            case MimeType::sparql_query: $reti = "application/sparql-query"; break;
            case MimeType::sparql_results_xml: $reti = "application/sparql-results+xml"; break;
            case MimeType::srgs: $reti = "application/srgs"; break;
            case MimeType::srgs_xml: $reti = "application/srgs+xml"; break;
            case MimeType::ssml_xml: $reti = "application/ssml+xml"; break;
            case MimeType::svg_xml: $reti = "image/svg+xml"; break;
            case MimeType::tab_separated_values: $reti = "text/tab-separated-values"; break;
            case MimeType::tiff: $reti = "image/tiff"; break;
            case MimeType::troff: $reti = "text/troff"; break;
            case MimeType::uri_list: $reti = "text/uri-list"; break;
            case MimeType::vnd_3gpp_pic_bw_large: $reti = "application/vnd.3gpp.pic-bw-large"; break;
            case MimeType::vnd_3gpp_pic_bw_small: $reti = "application/vnd.3gpp.pic-bw-small"; break;
            case MimeType::vnd_3gpp_pic_bw_var: $reti = "application/vnd.3gpp.pic-bw-var"; break;
            case MimeType::vnd_3gpp2_tcap: $reti = "application/vnd.3gpp2.tcap"; break;
            case MimeType::vnd_3m_post_it_notes: $reti = "application/vnd.3m.post-it-notes"; break;
            case MimeType::vnd_accpac_simply_aso: $reti = "application/vnd.accpac.simply.aso"; break;
            case MimeType::vnd_accpac_simply_imp: $reti = "application/vnd.accpac.simply.imp"; break;
            case MimeType::vnd_acucobol: $reti = "application/vnd.acucobol"; break;
            case MimeType::vnd_acucorp: $reti = "application/vnd.acucorp"; break;
            case MimeType::vnd_adobe_air_application_installer_package_zip: $reti = "application/vnd.adobe.air-application-installer-package+zip"; break;
            case MimeType::vnd_adobe_photoshop: $reti = "image/vnd.adobe.photoshop"; break;
            case MimeType::vnd_adobe_xdp_xml: $reti = "application/vnd.adobe.xdp+xml"; break;
            case MimeType::vnd_adobe_xfdf: $reti = "application/vnd.adobe.xfdf"; break;
            case MimeType::vnd_airzip_filesecure_azf: $reti = "application/vnd.airzip.filesecure.azf"; break;
            case MimeType::vnd_airzip_filesecure_azs: $reti = "application/vnd.airzip.filesecure.azs"; break;
            case MimeType::vnd_amazon_ebook: $reti = "application/vnd.amazon.ebook"; break;
            case MimeType::vnd_americandynamics_acc: $reti = "application/vnd.americandynamics.acc"; break;
            case MimeType::vnd_amiga_ami: $reti = "application/vnd.amiga.ami"; break;
            case MimeType::vnd_android_package_archive: $reti = "application/vnd.android.package-archive"; break;
            case MimeType::vnd_anser_web_certificate_issue_initiation: $reti = "application/vnd.anser-web-certificate-issue-initiation"; break;
            case MimeType::vnd_anser_web_funds_transfer_initiation: $reti = "application/vnd.anser-web-funds-transfer-initiation"; break;
            case MimeType::vnd_antix_game_component: $reti = "application/vnd.antix.game-component"; break;
            case MimeType::vnd_apple_installer_xml: $reti = "application/vnd.apple.installer+xml"; break;
            case MimeType::vnd_arastra_swi: $reti = "application/vnd.arastra.swi"; break;
            case MimeType::vnd_audiograph: $reti = "application/vnd.audiograph"; break;
            case MimeType::vnd_blueice_multipass: $reti = "application/vnd.blueice.multipass"; break;
            case MimeType::vnd_bmi: $reti = "application/vnd.bmi"; break;
            case MimeType::vnd_businessobjects: $reti = "application/vnd.businessobjects"; break;
            case MimeType::vnd_chemdraw_xml: $reti = "application/vnd.chemdraw+xml"; break;
            case MimeType::vnd_chipnuts_karaoke_mmd: $reti = "application/vnd.chipnuts.karaoke-mmd"; break;
            case MimeType::vnd_cinderella: $reti = "application/vnd.cinderella"; break;
            case MimeType::vnd_claymore: $reti = "application/vnd.claymore"; break;
            case MimeType::vnd_clonk_c4group: $reti = "application/vnd.clonk.c4group"; break;
            case MimeType::vnd_commonspace: $reti = "application/vnd.commonspace"; break;
            case MimeType::vnd_contact_cmsg: $reti = "application/vnd.contact.cmsg"; break;
            case MimeType::vnd_cosmocaller: $reti = "application/vnd.cosmocaller"; break;
            case MimeType::vnd_crick_clicker: $reti = "application/vnd.crick.clicker"; break;
            case MimeType::vnd_crick_clicker_keyboard: $reti = "application/vnd.crick.clicker.keyboard"; break;
            case MimeType::vnd_crick_clicker_palette: $reti = "application/vnd.crick.clicker.palette"; break;
            case MimeType::vnd_crick_clicker_template: $reti = "application/vnd.crick.clicker.template"; break;
            case MimeType::vnd_crick_clicker_wordbank: $reti = "application/vnd.crick.clicker.wordbank"; break;
            case MimeType::vnd_criticaltools_wbs_xml: $reti = "application/vnd.criticaltools.wbs+xml"; break;
            case MimeType::vnd_ctc_posml: $reti = "application/vnd.ctc-posml"; break;
            case MimeType::vnd_cups_ppd: $reti = "application/vnd.cups-ppd"; break;
            case MimeType::vnd_curl: $reti = "text/vnd.curl"; break;
            case MimeType::vnd_curl_car: $reti = "application/vnd.curl.car"; break;
            case MimeType::vnd_curl_dcurl: $reti = "text/vnd.curl.dcurl"; break;
            case MimeType::vnd_curl_mcurl: $reti = "text/vnd.curl.mcurl"; break;
            case MimeType::vnd_curl_pcurl: $reti = "application/vnd.curl.pcurl"; break;
            case MimeType::vnd_curl_scurl: $reti = "text/vnd.curl.scurl"; break;
            case MimeType::vnd_data_vision_rdz: $reti = "application/vnd.data-vision.rdz"; break;
            case MimeType::vnd_debian_binary_package: $reti = "application/vnd.debian.binary-package"; break;
            case MimeType::vnd_denovo_fcselayout_link: $reti = "application/vnd.denovo.fcselayout-link"; break;
            case MimeType::vnd_digital_winds: $reti = "audio/vnd.digital-winds"; break;
            case MimeType::vnd_djvu: $reti = "image/vnd.djvu"; break;
            case MimeType::vnd_dna: $reti = "application/vnd.dna"; break;
            case MimeType::vnd_dolby_mlp: $reti = "application/vnd.dolby.mlp"; break;
            case MimeType::vnd_dpgraph: $reti = "application/vnd.dpgraph"; break;
            case MimeType::vnd_dreamfactory: $reti = "application/vnd.dreamfactory"; break;
            case MimeType::vnd_dts: $reti = "audio/vnd.dts"; break;
            case MimeType::vnd_dts_hd: $reti = "audio/vnd.dts.hd"; break;
            case MimeType::vnd_dwf: $reti = "model/vnd.dwf"; break;
            case MimeType::vnd_dwg: $reti = "image/vnd.dwg"; break;
            case MimeType::vnd_dxf: $reti = "image/vnd.dxf"; break;
            case MimeType::vnd_dynageo: $reti = "application/vnd.dynageo"; break;
            case MimeType::vnd_ecowin_chart: $reti = "application/vnd.ecowin.chart"; break;
            case MimeType::vnd_enliven: $reti = "application/vnd.enliven"; break;
            case MimeType::vnd_epson_esf: $reti = "application/vnd.epson.esf"; break;
            case MimeType::vnd_epson_msf: $reti = "application/vnd.epson.msf"; break;
            case MimeType::vnd_epson_quickanime: $reti = "application/vnd.epson.quickanime"; break;
            case MimeType::vnd_epson_salt: $reti = "application/vnd.epson.salt"; break;
            case MimeType::vnd_epson_ssf: $reti = "application/vnd.epson.ssf"; break;
            case MimeType::vnd_eszigno3_xml: $reti = "application/vnd.eszigno3+xml"; break;
            case MimeType::vnd_ezpix_album: $reti = "application/vnd.ezpix-album"; break;
            case MimeType::vnd_ezpix_package: $reti = "application/vnd.ezpix-package"; break;
            case MimeType::vnd_fastbidsheet: $reti = "image/vnd.fastbidsheet"; break;
            case MimeType::vnd_fdf: $reti = "application/vnd.fdf"; break;
            case MimeType::vnd_fdsn_mseed: $reti = "application/vnd.fdsn.mseed"; break;
            case MimeType::vnd_fdsn_seed: $reti = "application/vnd.fdsn.seed"; break;
            case MimeType::vnd_flographit: $reti = "application/vnd.flographit"; break;
            case MimeType::vnd_fluxtime_clip: $reti = "application/vnd.fluxtime.clip"; break;
            case MimeType::vnd_fly: $reti = "text/vnd.fly"; break;
            case MimeType::vnd_fmi_flexstor: $reti = "text/vnd.fmi.flexstor"; break;
            case MimeType::vnd_fpx: $reti = "image/vnd.fpx"; break;
            case MimeType::vnd_framemaker: $reti = "application/vnd.framemaker"; break;
            case MimeType::vnd_frogans_fnc: $reti = "application/vnd.frogans.fnc"; break;
            case MimeType::vnd_frogans_ltf: $reti = "application/vnd.frogans.ltf"; break;
            case MimeType::vnd_fsc_weblaunch: $reti = "application/vnd.fsc.weblaunch"; break;
            case MimeType::vnd_fst: $reti = "image/vnd.fst"; break;
            case MimeType::vnd_fujitsu_oasys: $reti = "application/vnd.fujitsu.oasys"; break;
            case MimeType::vnd_fujitsu_oasys2: $reti = "application/vnd.fujitsu.oasys2"; break;
            case MimeType::vnd_fujitsu_oasys3: $reti = "application/vnd.fujitsu.oasys3"; break;
            case MimeType::vnd_fujitsu_oasysgp: $reti = "application/vnd.fujitsu.oasysgp"; break;
            case MimeType::vnd_fujitsu_oasysprs: $reti = "application/vnd.fujitsu.oasysprs"; break;
            case MimeType::vnd_fujixerox_ddd: $reti = "application/vnd.fujixerox.ddd"; break;
            case MimeType::vnd_fujixerox_docuworks: $reti = "application/vnd.fujixerox.docuworks"; break;
            case MimeType::vnd_fujixerox_docuworks_binder: $reti = "application/vnd.fujixerox.docuworks.binder"; break;
            case MimeType::vnd_fujixerox_edmics_mmr: $reti = "image/vnd.fujixerox.edmics-mmr"; break;
            case MimeType::vnd_fujixerox_edmics_rlc: $reti = "image/vnd.fujixerox.edmics-rlc"; break;
            case MimeType::vnd_fuzzysheet: $reti = "application/vnd.fuzzysheet"; break;
            case MimeType::vnd_fvt: $reti = "video/vnd.fvt"; break;
            case MimeType::vnd_gdl: $reti = "model/vnd.gdl"; break;
            case MimeType::vnd_genomatix_tuxedo: $reti = "application/vnd.genomatix.tuxedo"; break;
            case MimeType::vnd_geogebra_file: $reti = "application/vnd.geogebra.file"; break;
            case MimeType::vnd_geogebra_tool: $reti = "application/vnd.geogebra.tool"; break;
            case MimeType::vnd_geometry_explorer: $reti = "application/vnd.geometry-explorer"; break;
            case MimeType::vnd_gerber: $reti = "application/vnd.gerber"; break;
            case MimeType::vnd_gmx: $reti = "application/vnd.gmx"; break;
            case MimeType::vnd_google_earth_kml_xml: $reti = "application/vnd.google-earth.kml+xml"; break;
            case MimeType::vnd_google_earth_kmz: $reti = "application/vnd.google-earth.kmz"; break;
            case MimeType::vnd_grafeq: $reti = "application/vnd.grafeq"; break;
            case MimeType::vnd_graphviz: $reti = "text/vnd.graphviz"; break;
            case MimeType::vnd_groove_account: $reti = "application/vnd.groove-account"; break;
            case MimeType::vnd_groove_help: $reti = "application/vnd.groove-help"; break;
            case MimeType::vnd_groove_identity_message: $reti = "application/vnd.groove-identity-message"; break;
            case MimeType::vnd_groove_injector: $reti = "application/vnd.groove-injector"; break;
            case MimeType::vnd_groove_tool_message: $reti = "application/vnd.groove-tool-message"; break;
            case MimeType::vnd_groove_tool_template: $reti = "application/vnd.groove-tool-template"; break;
            case MimeType::vnd_groove_vcard: $reti = "application/vnd.groove-vcard"; break;
            case MimeType::vnd_gtw: $reti = "model/vnd.gtw"; break;
            case MimeType::vnd_handheld_entertainment_xml: $reti = "application/vnd.handheld-entertainment+xml"; break;
            case MimeType::vnd_hbci: $reti = "application/vnd.hbci"; break;
            case MimeType::vnd_hhe_lesson_player: $reti = "application/vnd.hhe.lesson-player"; break;
            case MimeType::vnd_hp_hpgl: $reti = "application/vnd.hp-hpgl"; break;
            case MimeType::vnd_hp_hpid: $reti = "application/vnd.hp-hpid"; break;
            case MimeType::vnd_hp_hps: $reti = "application/vnd.hp-hps"; break;
            case MimeType::vnd_hp_jlyt: $reti = "application/vnd.hp-jlyt"; break;
            case MimeType::vnd_hp_pcl: $reti = "application/vnd.hp-pcl"; break;
            case MimeType::vnd_hp_pclxl: $reti = "application/vnd.hp-pclxl"; break;
            case MimeType::vnd_hydrostatix_sof_data: $reti = "application/vnd.hydrostatix.sof-data"; break;
            case MimeType::vnd_hzn_3d_crossword: $reti = "application/vnd.hzn-3d-crossword"; break;
            case MimeType::vnd_ibm_minipay: $reti = "application/vnd.ibm.minipay"; break;
            case MimeType::vnd_ibm_modcap: $reti = "application/vnd.ibm.modcap"; break;
            case MimeType::vnd_ibm_rights_management: $reti = "application/vnd.ibm.rights-management"; break;
            case MimeType::vnd_ibm_secure_container: $reti = "application/vnd.ibm.secure-container"; break;
            case MimeType::vnd_iccprofile: $reti = "application/vnd.iccprofile"; break;
            case MimeType::vnd_igloader: $reti = "application/vnd.igloader"; break;
            case MimeType::vnd_immervision_ivp: $reti = "application/vnd.immervision-ivp"; break;
            case MimeType::vnd_immervision_ivu: $reti = "application/vnd.immervision-ivu"; break;
            case MimeType::vnd_in3d_3dml: $reti = "text/vnd.in3d.3dml"; break;
            case MimeType::vnd_in3d_spot: $reti = "text/vnd.in3d.spot"; break;
            case MimeType::vnd_intercon_formnet: $reti = "application/vnd.intercon.formnet"; break;
            case MimeType::vnd_intu_qbo: $reti = "application/vnd.intu.qbo"; break;
            case MimeType::vnd_intu_qfx: $reti = "application/vnd.intu.qfx"; break;
            case MimeType::vnd_ipunplugged_rcprofile: $reti = "application/vnd.ipunplugged.rcprofile"; break;
            case MimeType::vnd_irepository_package_xml: $reti = "application/vnd.irepository.package+xml"; break;
            case MimeType::vnd_is_xpr: $reti = "application/vnd.is-xpr"; break;
            case MimeType::vnd_jam: $reti = "application/vnd.jam"; break;
            case MimeType::vnd_jcp_javame_midlet_rms: $reti = "application/vnd.jcp.javame.midlet-rms"; break;
            case MimeType::vnd_jisp: $reti = "application/vnd.jisp"; break;
            case MimeType::vnd_joost_joda_archive: $reti = "application/vnd.joost.joda-archive"; break;
            case MimeType::vnd_kahootz: $reti = "application/vnd.kahootz"; break;
            case MimeType::vnd_kde_karbon: $reti = "application/vnd.kde.karbon"; break;
            case MimeType::vnd_kde_kchart: $reti = "application/vnd.kde.kchart"; break;
            case MimeType::vnd_kde_kformula: $reti = "application/vnd.kde.kformula"; break;
            case MimeType::vnd_kde_kivio: $reti = "application/vnd.kde.kivio"; break;
            case MimeType::vnd_kde_kontour: $reti = "application/vnd.kde.kontour"; break;
            case MimeType::vnd_kde_kpresenter: $reti = "application/vnd.kde.kpresenter"; break;
            case MimeType::vnd_kde_kspread: $reti = "application/vnd.kde.kspread"; break;
            case MimeType::vnd_kde_kword: $reti = "application/vnd.kde.kword"; break;
            case MimeType::vnd_kenameaapp: $reti = "application/vnd.kenameaapp"; break;
            case MimeType::vnd_kidspiration: $reti = "application/vnd.kidspiration"; break;
            case MimeType::vnd_kinar: $reti = "application/vnd.kinar"; break;
            case MimeType::vnd_koan: $reti = "application/vnd.koan"; break;
            case MimeType::vnd_kodak_descriptor: $reti = "application/vnd.kodak-descriptor"; break;
            case MimeType::vnd_llamagraphics_life_balance_desktop: $reti = "application/vnd.llamagraphics.life-balance.desktop"; break;
            case MimeType::vnd_llamagraphics_life_balance_exchange_xml: $reti = "application/vnd.llamagraphics.life-balance.exchange+xml"; break;
            case MimeType::vnd_lotus_1_2_3: $reti = "application/vnd.lotus-1-2-3"; break;
            case MimeType::vnd_lotus_approach: $reti = "application/vnd.lotus-approach"; break;
            case MimeType::vnd_lotus_freelance: $reti = "application/vnd.lotus-freelance"; break;
            case MimeType::vnd_lotus_notes: $reti = "application/vnd.lotus-notes"; break;
            case MimeType::vnd_lotus_organizer: $reti = "application/vnd.lotus-organizer"; break;
            case MimeType::vnd_lotus_screencam: $reti = "application/vnd.lotus-screencam"; break;
            case MimeType::vnd_lotus_wordpro: $reti = "application/vnd.lotus-wordpro"; break;
            case MimeType::vnd_lucent_voice: $reti = "audio/vnd.lucent.voice"; break;
            case MimeType::vnd_macports_portpkg: $reti = "application/vnd.macports.portpkg"; break;
            case MimeType::vnd_mcd: $reti = "application/vnd.mcd"; break;
            case MimeType::vnd_medcalcdata: $reti = "application/vnd.medcalcdata"; break;
            case MimeType::vnd_mediastation_cdkey: $reti = "application/vnd.mediastation.cdkey"; break;
            case MimeType::vnd_mfer: $reti = "application/vnd.mfer"; break;
            case MimeType::vnd_mfmp: $reti = "application/vnd.mfmp"; break;
            case MimeType::vnd_micrografx_flo: $reti = "application/vnd.micrografx.flo"; break;
            case MimeType::vnd_micrografx_igx: $reti = "application/vnd.micrografx.igx"; break;
            case MimeType::vnd_mif: $reti = "application/vnd.mif"; break;
            case MimeType::vnd_mobius_daf: $reti = "application/vnd.mobius.daf"; break;
            case MimeType::vnd_mobius_dis: $reti = "application/vnd.mobius.dis"; break;
            case MimeType::vnd_mobius_mbk: $reti = "application/vnd.mobius.mbk"; break;
            case MimeType::vnd_mobius_mqy: $reti = "application/vnd.mobius.mqy"; break;
            case MimeType::vnd_mobius_msl: $reti = "application/vnd.mobius.msl"; break;
            case MimeType::vnd_mobius_plc: $reti = "application/vnd.mobius.plc"; break;
            case MimeType::vnd_mobius_txf: $reti = "application/vnd.mobius.txf"; break;
            case MimeType::vnd_mophun_application: $reti = "application/vnd.mophun.application"; break;
            case MimeType::vnd_mophun_certificate: $reti = "application/vnd.mophun.certificate"; break;
            case MimeType::vnd_mozilla_xul_xml: $reti = "application/vnd.mozilla.xul+xml"; break;
            case MimeType::vnd_mpegurl: $reti = "video/vnd.mpegurl"; break;
            case MimeType::vnd_ms_artgalry: $reti = "application/vnd.ms-artgalry"; break;
            case MimeType::vnd_ms_cab_compressed: $reti = "application/vnd.ms-cab-compressed"; break;
            case MimeType::vnd_ms_excel: $reti = "application/vnd.ms-excel"; break;
            case MimeType::vnd_ms_excel_addin_macroenabled_12: $reti = "application/vnd.ms-excel.addin.macroenabled.12"; break;
            case MimeType::vnd_ms_excel_sheet_binary_macroenabled_12: $reti = "application/vnd.ms-excel.sheet.binary.macroenabled.12"; break;
            case MimeType::vnd_ms_excel_sheet_macroenabled_12: $reti = "application/vnd.ms-excel.sheet.macroenabled.12"; break;
            case MimeType::vnd_ms_excel_template_macroenabled_12: $reti = "application/vnd.ms-excel.template.macroenabled.12"; break;
            case MimeType::vnd_ms_fontobject: $reti = "application/vnd.ms-fontobject"; break;
            case MimeType::vnd_ms_htmlhelp: $reti = "application/vnd.ms-htmlhelp"; break;
            case MimeType::vnd_ms_ims: $reti = "application/vnd.ms-ims"; break;
            case MimeType::vnd_ms_lrm: $reti = "application/vnd.ms-lrm"; break;
            case MimeType::vnd_ms_modi: $reti = "image/vnd.ms-modi"; break;
            case MimeType::vnd_ms_pki_seccat: $reti = "application/vnd.ms-pki.seccat"; break;
            case MimeType::vnd_ms_pki_stl: $reti = "application/vnd.ms-pki.stl"; break;
            case MimeType::vnd_ms_playready_media_pya: $reti = "audio/vnd.ms-playready.media.pya"; break;
            case MimeType::vnd_ms_playready_media_pyv: $reti = "video/vnd.ms-playready.media.pyv"; break;
            case MimeType::vnd_ms_powerpoint: $reti = "application/vnd.ms-powerpoint"; break;
            case MimeType::vnd_ms_powerpoint_addin_macroenabled_12: $reti = "application/vnd.ms-powerpoint.addin.macroenabled.12"; break;
            case MimeType::vnd_ms_powerpoint_presentation_macroenabled_12: $reti = "application/vnd.ms-powerpoint.presentation.macroenabled.12"; break;
            case MimeType::vnd_ms_powerpoint_slide_macroenabled_12: $reti = "application/vnd.ms-powerpoint.slide.macroenabled.12"; break;
            case MimeType::vnd_ms_powerpoint_slideshow_macroenabled_12: $reti = "application/vnd.ms-powerpoint.slideshow.macroenabled.12"; break;
            case MimeType::vnd_ms_powerpoint_template_macroenabled_12: $reti = "application/vnd.ms-powerpoint.template.macroenabled.12"; break;
            case MimeType::vnd_ms_project: $reti = "application/vnd.ms-project"; break;
            case MimeType::vnd_ms_word_document_macroenabled_12: $reti = "application/vnd.ms-word.document.macroenabled.12"; break;
            case MimeType::vnd_ms_word_template_macroenabled_12: $reti = "application/vnd.ms-word.template.macroenabled.12"; break;
            case MimeType::vnd_ms_works: $reti = "application/vnd.ms-works"; break;
            case MimeType::vnd_ms_wpl: $reti = "application/vnd.ms-wpl"; break;
            case MimeType::vnd_ms_xpsdocument: $reti = "application/vnd.ms-xpsdocument"; break;
            case MimeType::vnd_mseq: $reti = "application/vnd.mseq"; break;
            case MimeType::vnd_mts: $reti = "model/vnd.mts"; break;
            case MimeType::vnd_musician: $reti = "application/vnd.musician"; break;
            case MimeType::vnd_muvee_style: $reti = "application/vnd.muvee.style"; break;
            case MimeType::vnd_net_fpx: $reti = "image/vnd.net-fpx"; break;
            case MimeType::vnd_neurolanguage_nlu: $reti = "application/vnd.neurolanguage.nlu"; break;
            case MimeType::vnd_noblenet_directory: $reti = "application/vnd.noblenet-directory"; break;
            case MimeType::vnd_noblenet_sealer: $reti = "application/vnd.noblenet-sealer"; break;
            case MimeType::vnd_noblenet_web: $reti = "application/vnd.noblenet-web"; break;
            case MimeType::vnd_nokia_n_gage_data: $reti = "application/vnd.nokia.n-gage.data"; break;
            case MimeType::vnd_nokia_n_gage_symbian_install: $reti = "application/vnd.nokia.n-gage.symbian.install"; break;
            case MimeType::vnd_nokia_radio_preset: $reti = "application/vnd.nokia.radio-preset"; break;
            case MimeType::vnd_nokia_radio_presets: $reti = "application/vnd.nokia.radio-presets"; break;
            case MimeType::vnd_novadigm_edm: $reti = "application/vnd.novadigm.edm"; break;
            case MimeType::vnd_novadigm_edx: $reti = "application/vnd.novadigm.edx"; break;
            case MimeType::vnd_novadigm_ext: $reti = "application/vnd.novadigm.ext"; break;
            case MimeType::vnd_nuera_ecelp4800: $reti = "audio/vnd.nuera.ecelp4800"; break;
            case MimeType::vnd_nuera_ecelp7470: $reti = "audio/vnd.nuera.ecelp7470"; break;
            case MimeType::vnd_nuera_ecelp9600: $reti = "audio/vnd.nuera.ecelp9600"; break;
            case MimeType::vnd_oasis_opendocument_chart: $reti = "application/vnd.oasis.opendocument.chart"; break;
            case MimeType::vnd_oasis_opendocument_chart_template: $reti = "application/vnd.oasis.opendocument.chart-template"; break;
            case MimeType::vnd_oasis_opendocument_database: $reti = "application/vnd.oasis.opendocument.database"; break;
            case MimeType::vnd_oasis_opendocument_formula: $reti = "application/vnd.oasis.opendocument.formula"; break;
            case MimeType::vnd_oasis_opendocument_formula_template: $reti = "application/vnd.oasis.opendocument.formula-template"; break;
            case MimeType::vnd_oasis_opendocument_graphics: $reti = "application/vnd.oasis.opendocument.graphics"; break;
            case MimeType::vnd_oasis_opendocument_graphics_template: $reti = "application/vnd.oasis.opendocument.graphics-template"; break;
            case MimeType::vnd_oasis_opendocument_image: $reti = "application/vnd.oasis.opendocument.image"; break;
            case MimeType::vnd_oasis_opendocument_image_template: $reti = "application/vnd.oasis.opendocument.image-template"; break;
            case MimeType::vnd_oasis_opendocument_presentation: $reti = "application/vnd.oasis.opendocument.presentation"; break;
            case MimeType::vnd_oasis_opendocument_presentation_template: $reti = "application/vnd.oasis.opendocument.presentation-template"; break;
            case MimeType::vnd_oasis_opendocument_spreadsheet: $reti = "application/vnd.oasis.opendocument.spreadsheet"; break;
            case MimeType::vnd_oasis_opendocument_spreadsheet_template: $reti = "application/vnd.oasis.opendocument.spreadsheet-template"; break;
            case MimeType::vnd_oasis_opendocument_text: $reti = "application/vnd.oasis.opendocument.text"; break;
            case MimeType::vnd_oasis_opendocument_text_master: $reti = "application/vnd.oasis.opendocument.text-master"; break;
            case MimeType::vnd_oasis_opendocument_text_template: $reti = "application/vnd.oasis.opendocument.text-template"; break;
            case MimeType::vnd_oasis_opendocument_text_web: $reti = "application/vnd.oasis.opendocument.text-web"; break;
            case MimeType::vnd_olpc_sugar: $reti = "application/vnd.olpc-sugar"; break;
            case MimeType::vnd_oma_dd2_xml: $reti = "application/vnd.oma.dd2+xml"; break;
            case MimeType::vnd_openofficeorg_extension: $reti = "application/vnd.openofficeorg.extension"; break;
            case MimeType::vnd_openxmlformats_officedocument_presentationml_presentation: $reti = "application/vnd.openxmlformats-officedocument.presentationml.presentation"; break;
            case MimeType::vnd_openxmlformats_officedocument_presentationml_slide: $reti = "application/vnd.openxmlformats-officedocument.presentationml.slide"; break;
            case MimeType::vnd_openxmlformats_officedocument_presentationml_slideshow: $reti = "application/vnd.openxmlformats-officedocument.presentationml.slideshow"; break;
            case MimeType::vnd_openxmlformats_officedocument_presentationml_template: $reti = "application/vnd.openxmlformats-officedocument.presentationml.template"; break;
            case MimeType::vnd_openxmlformats_officedocument_spreadsheetml_sheet: $reti = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"; break;
            case MimeType::vnd_openxmlformats_officedocument_spreadsheetml_template: $reti = "application/vnd.openxmlformats-officedocument.spreadsheetml.template"; break;
            case MimeType::vnd_openxmlformats_officedocument_wordprocessingml_document: $reti = "application/vnd.openxmlformats-officedocument.wordprocessingml.document"; break;
            case MimeType::vnd_openxmlformats_officedocument_wordprocessingml_template: $reti = "application/vnd.openxmlformats-officedocument.wordprocessingml.template"; break;
            case MimeType::vnd_osgi_dp: $reti = "application/vnd.osgi.dp"; break;
            case MimeType::vnd_palm: $reti = "application/vnd.palm"; break;
            case MimeType::vnd_pg_format: $reti = "application/vnd.pg.format"; break;
            case MimeType::vnd_pg_osasli: $reti = "application/vnd.pg.osasli"; break;
            case MimeType::vnd_picsel: $reti = "application/vnd.picsel"; break;
            case MimeType::vnd_pocketlearn: $reti = "application/vnd.pocketlearn"; break;
            case MimeType::vnd_powerbuilder6: $reti = "application/vnd.powerbuilder6"; break;
            case MimeType::vnd_previewsystems_box: $reti = "application/vnd.previewsystems.box"; break;
            case MimeType::vnd_proteus_magazine: $reti = "application/vnd.proteus.magazine"; break;
            case MimeType::vnd_publishare_delta_tree: $reti = "application/vnd.publishare-delta-tree"; break;
            case MimeType::vnd_pvi_ptid1: $reti = "application/vnd.pvi.ptid1"; break;
            case MimeType::vnd_quark_quarkxpress: $reti = "application/vnd.quark.quarkxpress"; break;
            case MimeType::vnd_rar: $reti = "application/vnd.rar"; break;
            case MimeType::vnd_recordare_musicxml: $reti = "application/vnd.recordare.musicxml"; break;
            case MimeType::vnd_recordare_musicxml_xml: $reti = "application/vnd.recordare.musicxml+xml"; break;
            case MimeType::vnd_rim_cod: $reti = "application/vnd.rim.cod"; break;
            case MimeType::vnd_rn_realmedia: $reti = "application/vnd.rn-realmedia"; break;
            case MimeType::vnd_route66_link66_xml: $reti = "application/vnd.route66.link66+xml"; break;
            case MimeType::vnd_seemail: $reti = "application/vnd.seemail"; break;
            case MimeType::vnd_sema: $reti = "application/vnd.sema"; break;
            case MimeType::vnd_semd: $reti = "application/vnd.semd"; break;
            case MimeType::vnd_semf: $reti = "application/vnd.semf"; break;
            case MimeType::vnd_shana_informed_formdata: $reti = "application/vnd.shana.informed.formdata"; break;
            case MimeType::vnd_shana_informed_formtemplate: $reti = "application/vnd.shana.informed.formtemplate"; break;
            case MimeType::vnd_shana_informed_interchange: $reti = "application/vnd.shana.informed.interchange"; break;
            case MimeType::vnd_shana_informed_package: $reti = "application/vnd.shana.informed.package"; break;
            case MimeType::vnd_simtech_mindmapper: $reti = "application/vnd.simtech-mindmapper"; break;
            case MimeType::vnd_smaf: $reti = "application/vnd.smaf"; break;
            case MimeType::vnd_smart_teacher: $reti = "application/vnd.smart.teacher"; break;
            case MimeType::vnd_solent_sdkm_xml: $reti = "application/vnd.solent.sdkm+xml"; break;
            case MimeType::vnd_spotfire_dxp: $reti = "application/vnd.spotfire.dxp"; break;
            case MimeType::vnd_spotfire_sfs: $reti = "application/vnd.spotfire.sfs"; break;
            case MimeType::vnd_sqlite3: $reti = "application/vnd.sqlite3"; break;
            case MimeType::vnd_stardivision_calc: $reti = "application/vnd.stardivision.calc"; break;
            case MimeType::vnd_stardivision_draw: $reti = "application/vnd.stardivision.draw"; break;
            case MimeType::vnd_stardivision_impress: $reti = "application/vnd.stardivision.impress"; break;
            case MimeType::vnd_stardivision_math: $reti = "application/vnd.stardivision.math"; break;
            case MimeType::vnd_stardivision_writer: $reti = "application/vnd.stardivision.writer"; break;
            case MimeType::vnd_stardivision_writer_global: $reti = "application/vnd.stardivision.writer-global"; break;
            case MimeType::vnd_sun_j2me_app_descriptor: $reti = "text/vnd.sun.j2me.app-descriptor"; break;
            case MimeType::vnd_sun_xml_calc: $reti = "application/vnd.sun.xml.calc"; break;
            case MimeType::vnd_sun_xml_calc_template: $reti = "application/vnd.sun.xml.calc.template"; break;
            case MimeType::vnd_sun_xml_draw: $reti = "application/vnd.sun.xml.draw"; break;
            case MimeType::vnd_sun_xml_draw_template: $reti = "application/vnd.sun.xml.draw.template"; break;
            case MimeType::vnd_sun_xml_impress: $reti = "application/vnd.sun.xml.impress"; break;
            case MimeType::vnd_sun_xml_impress_template: $reti = "application/vnd.sun.xml.impress.template"; break;
            case MimeType::vnd_sun_xml_math: $reti = "application/vnd.sun.xml.math"; break;
            case MimeType::vnd_sun_xml_writer: $reti = "application/vnd.sun.xml.writer"; break;
            case MimeType::vnd_sun_xml_writer_global: $reti = "application/vnd.sun.xml.writer.global"; break;
            case MimeType::vnd_sun_xml_writer_template: $reti = "application/vnd.sun.xml.writer.template"; break;
            case MimeType::vnd_sus_calendar: $reti = "application/vnd.sus-calendar"; break;
            case MimeType::vnd_svd: $reti = "application/vnd.svd"; break;
            case MimeType::vnd_symbian_install: $reti = "application/vnd.symbian.install"; break;
            case MimeType::vnd_syncml_dm_wbxml: $reti = "application/vnd.syncml.dm+wbxml"; break;
            case MimeType::vnd_syncml_dm_xml: $reti = "application/vnd.syncml.dm+xml"; break;
            case MimeType::vnd_syncml_xml: $reti = "application/vnd.syncml+xml"; break;
            case MimeType::vnd_tao_intent_module_archive: $reti = "application/vnd.tao.intent-module-archive"; break;
            case MimeType::vnd_tmobile_livetv: $reti = "application/vnd.tmobile-livetv"; break;
            case MimeType::vnd_trid_tpt: $reti = "application/vnd.trid.tpt"; break;
            case MimeType::vnd_triscape_mxs: $reti = "application/vnd.triscape.mxs"; break;
            case MimeType::vnd_trueapp: $reti = "application/vnd.trueapp"; break;
            case MimeType::vnd_ufdl: $reti = "application/vnd.ufdl"; break;
            case MimeType::vnd_uiq_theme: $reti = "application/vnd.uiq.theme"; break;
            case MimeType::vnd_umajin: $reti = "application/vnd.umajin"; break;
            case MimeType::vnd_unity: $reti = "application/vnd.unity"; break;
            case MimeType::vnd_uoml_xml: $reti = "application/vnd.uoml+xml"; break;
            case MimeType::vnd_vcx: $reti = "application/vnd.vcx"; break;
            case MimeType::vnd_visio: $reti = "application/vnd.visio"; break;
            case MimeType::vnd_visionary: $reti = "application/vnd.visionary"; break;
            case MimeType::vnd_vivo: $reti = "video/vnd.vivo"; break;
            case MimeType::vnd_vsf: $reti = "application/vnd.vsf"; break;
            case MimeType::vnd_vtu: $reti = "model/vnd.vtu"; break;
            case MimeType::vnd_wap_si: $reti = "text/vnd.wap.si"; break;
            case MimeType::vnd_wap_sic: $reti = "application/vnd.wap.sic"; break;
            case MimeType::vnd_wap_sl: $reti = "text/vnd.wap.sl"; break;
            case MimeType::vnd_wap_slc: $reti = "application/vnd.wap.slc"; break;
            case MimeType::vnd_wap_wbmp: $reti = "image/vnd.wap.wbmp"; break;
            case MimeType::vnd_wap_wbxml: $reti = "application/vnd.wap.wbxml"; break;
            case MimeType::vnd_wap_wml: $reti = "text/vnd.wap.wml"; break;
            case MimeType::vnd_wap_wmlc: $reti = "application/vnd.wap.wmlc"; break;
            case MimeType::vnd_wap_wmlscript: $reti = "text/vnd.wap.wmlscript"; break;
            case MimeType::vnd_wap_wmlscriptc: $reti = "application/vnd.wap.wmlscriptc"; break;
            case MimeType::vnd_wav: $reti = "audio/vnd.wav"; break;
            case MimeType::vnd_webturbo: $reti = "application/vnd.webturbo"; break;
            case MimeType::vnd_wordperfect: $reti = "application/vnd.wordperfect"; break;
            case MimeType::vnd_wqd: $reti = "application/vnd.wqd"; break;
            case MimeType::vnd_wt_stf: $reti = "application/vnd.wt.stf"; break;
            case MimeType::vnd_xara: $reti = "application/vnd.xara"; break;
            case MimeType::vnd_xfdl: $reti = "application/vnd.xfdl"; break;
            case MimeType::vnd_xiff: $reti = "image/vnd.xiff"; break;
            case MimeType::vnd_yamaha_hv_dic: $reti = "application/vnd.yamaha.hv-dic"; break;
            case MimeType::vnd_yamaha_hv_script: $reti = "application/vnd.yamaha.hv-script"; break;
            case MimeType::vnd_yamaha_hv_voice: $reti = "application/vnd.yamaha.hv-voice"; break;
            case MimeType::vnd_yamaha_openscoreformat: $reti = "application/vnd.yamaha.openscoreformat"; break;
            case MimeType::vnd_yamaha_openscoreformat_osfpvg_xml: $reti = "application/vnd.yamaha.openscoreformat.osfpvg+xml"; break;
            case MimeType::vnd_yamaha_smaf_audio: $reti = "application/vnd.yamaha.smaf-audio"; break;
            case MimeType::vnd_yamaha_smaf_phrase: $reti = "application/vnd.yamaha.smaf-phrase"; break;
            case MimeType::vnd_yellowriver_custom_menu: $reti = "application/vnd.yellowriver-custom-menu"; break;
            case MimeType::vnd_zul: $reti = "application/vnd.zul"; break;
            case MimeType::vnd_zzazz_deck_xml: $reti = "application/vnd.zzazz.deck+xml"; break;
            case MimeType::voicexml_xml: $reti = "application/voicexml+xml"; break;
            case MimeType::vrml: $reti = "model/vrml"; break;
            case MimeType::wasm: $reti = "application/wasm"; break;
            case MimeType::webm: $reti = "audio/webm"; break;
            // case MimeType::webm: $reti = "video/webm"; break;
            case MimeType::webp: $reti = "image/webp"; break;
            case MimeType::winhlp: $reti = "application/winhlp"; break;
            case MimeType::woff: $reti = "font/woff"; break;
            case MimeType::woff2: $reti = "font/woff2"; break;
            case MimeType::wsdl_xml: $reti = "application/wsdl+xml"; break;
            case MimeType::wspolicy_xml: $reti = "application/wspolicy+xml"; break;
            case MimeType::x_7z_compressed: $reti = "application/x-7z-compressed"; break;
            case MimeType::x_abiword: $reti = "application/x-abiword"; break;
            case MimeType::x_ace_compressed: $reti = "application/x-ace-compressed"; break;
            case MimeType::x_adobe_dng: $reti = "image/x-adobe-dng"; break;
            case MimeType::x_asm: $reti = "text/x-asm"; break;
            case MimeType::x_authorware_bin: $reti = "application/x-authorware-bin"; break;
            case MimeType::x_authorware_map: $reti = "application/x-authorware-map"; break;
            case MimeType::x_authorware_seg: $reti = "application/x-authorware-seg"; break;
            case MimeType::x_bcpio: $reti = "application/x-bcpio"; break;
            case MimeType::x_bittorrent: $reti = "application/x-bittorrent"; break;
            case MimeType::x_bzip: $reti = "application/x-bzip"; break;
            case MimeType::x_bzip2: $reti = "application/x-bzip2"; break;
            case MimeType::x_c: $reti = "text/x-c"; break;
            case MimeType::x_canon_cr2: $reti = "image/x-canon-cr2"; break;
            case MimeType::x_canon_crw: $reti = "image/x-canon-crw"; break;
            case MimeType::x_cdlink: $reti = "application/x-cdlink"; break;
            case MimeType::x_cdx: $reti = "chemical/x-cdx"; break;
            case MimeType::x_chat: $reti = "application/x-chat"; break;
            case MimeType::x_chess_pgn: $reti = "application/x-chess-pgn"; break;
            case MimeType::x_cif: $reti = "chemical/x-cif"; break;
            case MimeType::x_cmdf: $reti = "chemical/x-cmdf"; break;
            case MimeType::x_cml: $reti = "chemical/x-cml"; break;
            case MimeType::x_cmu_raster: $reti = "image/x-cmu-raster"; break;
            case MimeType::x_cmx: $reti = "image/x-cmx"; break;
            case MimeType::x_cooltalk: $reti = "x-conference/x-cooltalk"; break;
            case MimeType::x_cpio: $reti = "application/x-cpio"; break;
            case MimeType::x_csh: $reti = "application/x-csh"; break;
            case MimeType::x_csml: $reti = "chemical/x-csml"; break;
            case MimeType::x_debian_package: $reti = "application/x-debian-package"; break;
            case MimeType::x_director: $reti = "application/x-director"; break;
            case MimeType::x_doom: $reti = "application/x-doom"; break;
            case MimeType::x_dtbncx_xml: $reti = "application/x-dtbncx+xml"; break;
            case MimeType::x_dtbook_xml: $reti = "application/x-dtbook+xml"; break;
            case MimeType::x_dtbresource_xml: $reti = "application/x-dtbresource+xml"; break;
            case MimeType::x_dvi: $reti = "application/x-dvi"; break;
            case MimeType::x_epson_erf: $reti = "image/x-epson-erf"; break;
            case MimeType::x_f4v: $reti = "video/x-f4v"; break;
            case MimeType::x_fli: $reti = "video/x-fli"; break;
            case MimeType::x_flv: $reti = "video/x-flv"; break;
            case MimeType::x_font_bdf: $reti = "application/x-font-bdf"; break;
            case MimeType::x_font_ghostscript: $reti = "application/x-font-ghostscript"; break;
            case MimeType::x_font_linux_psf: $reti = "application/x-font-linux-psf"; break;
            case MimeType::x_font_otf: $reti = "application/x-font-otf"; break;
            case MimeType::x_font_pcf: $reti = "application/x-font-pcf"; break;
            case MimeType::x_font_snf: $reti = "application/x-font-snf"; break;
            case MimeType::x_font_ttf: $reti = "application/x-font-ttf"; break;
            case MimeType::x_font_type1: $reti = "application/x-font-type1"; break;
            case MimeType::x_fortran: $reti = "text/x-fortran"; break;
            case MimeType::x_freehand: $reti = "image/x-freehand"; break;
            case MimeType::x_fuji_raf: $reti = "image/x-fuji-raf"; break;
            case MimeType::x_futuresplash: $reti = "application/x-futuresplash"; break;
            case MimeType::x_gnumeric: $reti = "application/x-gnumeric"; break;
            case MimeType::x_gtar: $reti = "application/x-gtar"; break;
            case MimeType::x_gzip: $reti = "application/x-gzip"; break;
            case MimeType::x_hdf: $reti = "application/x-hdf"; break;
            case MimeType::x_icns: $reti = "image/x-icns"; break;
            case MimeType::x_icon: $reti = "image/x-icon"; break;
            case MimeType::x_iso9660_image: $reti = "application/x-iso9660-image"; break;
            case MimeType::x_java_jnlp_file: $reti = "application/x-java-jnlp-file"; break;
            case MimeType::x_java_source: $reti = "text/x-java-source"; break;
            case MimeType::x_killustrator: $reti = "application/x-killustrator"; break;
            case MimeType::x_kodak_dcr: $reti = "image/x-kodak-dcr"; break;
            case MimeType::x_kodak_k25: $reti = "image/x-kodak-k25"; break;
            case MimeType::x_kodak_kdc: $reti = "image/x-kodak-kdc"; break;
            case MimeType::x_krita: $reti = "application/x-krita"; break;
            case MimeType::x_latex: $reti = "application/x-latex"; break;
            case MimeType::x_m4v: $reti = "video/x-m4v"; break;
            case MimeType::x_markdown: $reti = "text/x-markdown"; break;
            case MimeType::x_matroska: $reti = "audio/x-matroska"; break;
            // case MimeType::x_matroska: $reti = "video/x-matroska"; break;
            case MimeType::x_minolta_mrw: $reti = "image/x-minolta-mrw"; break;
            case MimeType::x_mobipocket_ebook: $reti = "application/x-mobipocket-ebook"; break;
            case MimeType::x_mpegurl: $reti = "audio/x-mpegurl"; break;
            case MimeType::x_ms_application: $reti = "application/x-ms-application"; break;
            case MimeType::x_ms_asf: $reti = "video/x-ms-asf"; break;
            case MimeType::x_ms_wax: $reti = "audio/x-ms-wax"; break;
            case MimeType::x_ms_wm: $reti = "video/x-ms-wm"; break;
            case MimeType::x_ms_wma: $reti = "audio/x-ms-wma"; break;
            case MimeType::x_ms_wmd: $reti = "application/x-ms-wmd"; break;
            case MimeType::x_ms_wmv: $reti = "video/x-ms-wmv"; break;
            case MimeType::x_ms_wmx: $reti = "video/x-ms-wmx"; break;
            case MimeType::x_ms_wmz: $reti = "application/x-ms-wmz"; break;
            case MimeType::x_ms_wvx: $reti = "video/x-ms-wvx"; break;
            case MimeType::x_ms_xbap: $reti = "application/x-ms-xbap"; break;
            case MimeType::x_msaccess: $reti = "application/x-msaccess"; break;
            case MimeType::x_msbinder: $reti = "application/x-msbinder"; break;
            case MimeType::x_mscardfile: $reti = "application/x-mscardfile"; break;
            case MimeType::x_msclip: $reti = "application/x-msclip"; break;
            case MimeType::x_msdownload: $reti = "application/x-msdownload"; break;
            case MimeType::x_msmediaview: $reti = "application/x-msmediaview"; break;
            case MimeType::x_msmetafile: $reti = "application/x-msmetafile"; break;
            case MimeType::x_msmoney: $reti = "application/x-msmoney"; break;
            case MimeType::x_mspublisher: $reti = "application/x-mspublisher"; break;
            case MimeType::x_msschedule: $reti = "application/x-msschedule"; break;
            case MimeType::x_msterminal: $reti = "application/x-msterminal"; break;
            case MimeType::x_msvideo: $reti = "video/x-msvideo"; break;
            case MimeType::x_mswrite: $reti = "application/x-mswrite"; break;
            case MimeType::x_netcdf: $reti = "application/x-netcdf"; break;
            case MimeType::x_nikon_nef: $reti = "image/x-nikon-nef"; break;
            case MimeType::x_olympus_orf: $reti = "image/x-olympus-orf"; break;
            case MimeType::x_panasonic_raw: $reti = "image/x-panasonic-raw"; break;
            case MimeType::x_pascal: $reti = "text/x-pascal"; break;
            case MimeType::x_pcx: $reti = "image/x-pcx"; break;
            case MimeType::x_pentax_pef: $reti = "image/x-pentax-pef"; break;
            case MimeType::x_perl: $reti = "application/x-perl"; break;
            case MimeType::x_pict: $reti = "image/x-pict"; break;
            case MimeType::x_pkcs12: $reti = "application/x-pkcs12"; break;
            case MimeType::x_pkcs7_certificates: $reti = "application/x-pkcs7-certificates"; break;
            case MimeType::x_pkcs7_certreqresp: $reti = "application/x-pkcs7-certreqresp"; break;
            case MimeType::x_pn_realaudio: $reti = "audio/x-pn-realaudio"; break;
            case MimeType::x_pn_realaudio_plugin: $reti = "audio/x-pn-realaudio-plugin"; break;
            case MimeType::x_portable_anymap: $reti = "image/x-portable-anymap"; break;
            case MimeType::x_portable_bitmap: $reti = "image/x-portable-bitmap"; break;
            case MimeType::x_portable_graymap: $reti = "image/x-portable-graymap"; break;
            case MimeType::x_portable_pixmap: $reti = "image/x-portable-pixmap"; break;
            case MimeType::x_python: $reti = "text/x-python"; break;
            case MimeType::x_python_code: $reti = "application/x-python-code"; break;
            case MimeType::x_rar_compressed: $reti = "application/x-rar-compressed"; break;
            case MimeType::x_redhat_package_manager: $reti = "application/x-redhat-package-manager"; break;
            case MimeType::x_rgb: $reti = "image/x-rgb"; break;
            case MimeType::x_rpm: $reti = "application/x-rpm"; break;
            case MimeType::x_setext: $reti = "text/x-setext"; break;
            case MimeType::x_sgi_movie: $reti = "video/x-sgi-movie"; break;
            case MimeType::x_sh: $reti = "application/x-sh"; break;
            case MimeType::x_shar: $reti = "application/x-shar"; break;
            case MimeType::x_shellscript: $reti = "application/x-shellscript"; break;
            case MimeType::x_shockwave_flash: $reti = "application/x-shockwave-flash"; break;
            case MimeType::x_sigma_x3f: $reti = "image/x-sigma-x3f"; break;
            case MimeType::x_silverlight_app: $reti = "application/x-silverlight-app"; break;
            case MimeType::x_sony_arw: $reti = "image/x-sony-arw"; break;
            case MimeType::x_sony_sr2: $reti = "image/x-sony-sr2"; break;
            case MimeType::x_sony_srf: $reti = "image/x-sony-srf"; break;
            case MimeType::x_sqlite3: $reti = "application/x-sqlite3"; break;
            case MimeType::x_stuffit: $reti = "application/x-stuffit"; break;
            case MimeType::x_stuffitx: $reti = "application/x-stuffitx"; break;
            case MimeType::x_sv4cpio: $reti = "application/x-sv4cpio"; break;
            case MimeType::x_sv4crc: $reti = "application/x-sv4crc"; break;
            case MimeType::x_tar: $reti = "application/x-tar"; break;
            case MimeType::x_tcl: $reti = "application/x-tcl"; break;
            case MimeType::x_tex: $reti = "application/x-tex"; break;
            case MimeType::x_tex_tfm: $reti = "application/x-tex-tfm"; break;
            case MimeType::x_texinfo: $reti = "application/x-texinfo"; break;
            case MimeType::x_trash: $reti = "application/x-trash"; break;
            case MimeType::x_ustar: $reti = "application/x-ustar"; break;
            case MimeType::x_uuencode: $reti = "text/x-uuencode"; break;
            case MimeType::x_vcalendar: $reti = "text/x-vcalendar"; break;
            case MimeType::x_vcard: $reti = "text/x-vcard"; break;
            case MimeType::x_wais_source: $reti = "application/x-wais-source"; break;
            case MimeType::x_x509_ca_cert: $reti = "application/x-x509-ca-cert"; break;
            case MimeType::x_xbitmap: $reti = "image/x-xbitmap"; break;
            case MimeType::x_xfig: $reti = "application/x-xfig"; break;
            case MimeType::x_xpinstall: $reti = "application/x-xpinstall"; break;
            case MimeType::x_xpixmap: $reti = "image/x-xpixmap"; break;
            case MimeType::x_xwindowdump: $reti = "image/x-xwindowdump"; break;
            case MimeType::x_xyz: $reti = "chemical/x-xyz"; break;
            case MimeType::x_zip_compressed: $reti = "application/x-zip-compressed"; break;
            case MimeType::xenc_xml: $reti = "application/xenc+xml"; break;
            case MimeType::xhtml_xml: $reti = "application/xhtml+xml"; break;
            case MimeType::xml: $reti = "application/xml"; break;
            case MimeType::xml_dtd: $reti = "application/xml-dtd"; break;
            case MimeType::xop_xml: $reti = "application/xop+xml"; break;
            case MimeType::xslt_xml: $reti = "application/xslt+xml"; break;
            case MimeType::xspf_xml: $reti = "application/xspf+xml"; break;
            case MimeType::xv_xml: $reti = "application/xv+xml"; break;
            case MimeType::yaml: $reti = "application/yaml"; break;
            case MimeType::zip: $reti = "application/zip"; break;
            case MimeType::zip_compressed: $reti = "application/zip-compressed"; break;

            default: $reti = "application/octet-stream"; break;
        }
        return $reti;
    }
    
    /**
     * Gets MIME type from file extension.
     * @param string $extension Extension of file.
     * @return MimeType MIME type according to the extension.
     */
    public static function fromExtension(string $extension): MimeType
    {
        $reti = MimeType::octet_stream;
        $input = strtolower(StringUtils::trim($extension));
        switch($input)
        {
            case ".123": $reti = MimeType::vnd_lotus_1_2_3; break;
            case ".3dml": $reti = MimeType::vnd_in3d_3dml; break;
            case ".3g2": $reti = MimeType::_3gpp2; break;
            // case ".3g2": $reti = MimeType::mp4; break;
            // case ".3g2": $reti = MimeType::_3gpp2; break;
            case ".3ga": $reti = MimeType::mp4; break;
            case ".3gp": $reti = MimeType::mp4; break;
            // case ".3gp": $reti = MimeType::_3gpp; break;
            case ".3gp2": $reti = MimeType::mp4; break;
            case ".3gpa": $reti = MimeType::mp4; break;
            case ".3gpp": $reti = MimeType::mp4; break;
            case ".3gpp2": $reti = MimeType::mp4; break;
            case ".7z": $reti = MimeType::x_7z_compressed; break;
            case ".a": $reti = MimeType::octet_stream; break;
            case ".aab": $reti = MimeType::x_authorware_bin; break;
            case ".aac": $reti = MimeType::aac; break;
            case ".aacp": $reti = MimeType::aacp; break;
            case ".aam": $reti = MimeType::x_authorware_map; break;
            case ".aas": $reti = MimeType::x_authorware_seg; break;
            case ".abw": $reti = MimeType::x_abiword; break;
            case ".acc": $reti = MimeType::vnd_americandynamics_acc; break;
            case ".ace": $reti = MimeType::x_ace_compressed; break;
            case ".acu": $reti = MimeType::vnd_acucobol; break;
            case ".acutc": $reti = MimeType::vnd_acucorp; break;
            case ".adp": $reti = MimeType::adpcm; break;
            case ".aep": $reti = MimeType::vnd_audiograph; break;
            case ".aff": $reti = MimeType::aiff; break;
            case ".afm": $reti = MimeType::x_font_type1; break;
            case ".afp": $reti = MimeType::vnd_ibm_modcap; break;
            case ".ai": $reti = MimeType::postscript; break;
            case ".aif": $reti = MimeType::aiff; break;
            case ".aiff": $reti = MimeType::aiff; break;
            case ".air": $reti = MimeType::vnd_adobe_air_application_installer_package_zip; break;
            case ".ami": $reti = MimeType::vnd_amiga_ami; break;
            case ".apk": $reti = MimeType::vnd_android_package_archive; break;
            case ".application": $reti = MimeType::x_ms_application; break;
            case ".apr": $reti = MimeType::vnd_lotus_approach; break;
            case ".arw": $reti = MimeType::x_sony_arw; break;
            case ".asc": $reti = MimeType::pgp_signature; break;
            case ".asf": $reti = MimeType::x_ms_asf; break;
            case ".asm": $reti = MimeType::x_asm; break;
            case ".aso": $reti = MimeType::vnd_accpac_simply_aso; break;
            case ".asx": $reti = MimeType::x_ms_asf; break;
            case ".atc": $reti = MimeType::vnd_acucorp; break;
            case ".atom": $reti = MimeType::atom_xml; break;
            case ".atomcat": $reti = MimeType::atomcat_xml; break;
            case ".atomsvc": $reti = MimeType::atomsvc_xml; break;
            case ".atx": $reti = MimeType::vnd_antix_game_component; break;
            case ".au": $reti = MimeType::basic; break;
            case ".avi": $reti = MimeType::x_msvideo; break;
            case ".avif": $reti = MimeType::avif; break;
            case ".avifs": $reti = MimeType::avif; break;
            case ".aw": $reti = MimeType::applixware; break;
            case ".azf": $reti = MimeType::vnd_airzip_filesecure_azf; break;
            case ".azs": $reti = MimeType::vnd_airzip_filesecure_azs; break;
            case ".azw": $reti = MimeType::vnd_amazon_ebook; break;
            case ".bat": $reti = MimeType::x_msdownload; break;
            case ".bcpio": $reti = MimeType::x_bcpio; break;
            case ".bdf": $reti = MimeType::x_font_bdf; break;
            case ".bdm": $reti = MimeType::vnd_syncml_dm_wbxml; break;
            case ".bh2": $reti = MimeType::vnd_fujitsu_oasysprs; break;
            case ".bin": $reti = MimeType::octet_stream; break;
            case ".bmi": $reti = MimeType::vnd_bmi; break;
            case ".bmp": $reti = MimeType::bmp; break;
            case ".book": $reti = MimeType::vnd_framemaker; break;
            case ".box": $reti = MimeType::vnd_previewsystems_box; break;
            case ".boz": $reti = MimeType::x_bzip2; break;
            case ".bpk": $reti = MimeType::octet_stream; break;
            case ".btif": $reti = MimeType::prs_btif; break;
            case ".bz": $reti = MimeType::x_bzip; break;
            case ".bz2": $reti = MimeType::x_bzip2; break;
            case ".c": $reti = MimeType::x_c; break;
            case ".c4d": $reti = MimeType::vnd_clonk_c4group; break;
            case ".c4f": $reti = MimeType::vnd_clonk_c4group; break;
            case ".c4g": $reti = MimeType::vnd_clonk_c4group; break;
            case ".c4p": $reti = MimeType::vnd_clonk_c4group; break;
            case ".c4u": $reti = MimeType::vnd_clonk_c4group; break;
            case ".cab": $reti = MimeType::vnd_ms_cab_compressed; break;
            case ".car": $reti = MimeType::vnd_curl_car; break;
            case ".cat": $reti = MimeType::vnd_ms_pki_seccat; break;
            case ".cc": $reti = MimeType::x_c; break;
            case ".cct": $reti = MimeType::x_director; break;
            case ".ccxml": $reti = MimeType::ccxml_xml; break;
            case ".cdbcmsg": $reti = MimeType::vnd_contact_cmsg; break;
            case ".cdf": $reti = MimeType::x_netcdf; break;
            case ".cdkey": $reti = MimeType::vnd_mediastation_cdkey; break;
            case ".cdr": $reti = MimeType::x_iso9660_image; break;
            case ".cdx": $reti = MimeType::x_cdx; break;
            case ".cdxml": $reti = MimeType::vnd_chemdraw_xml; break;
            case ".cdy": $reti = MimeType::vnd_cinderella; break;
            case ".cer": $reti = MimeType::pkix_cert; break;
            case ".cgm": $reti = MimeType::cgm; break;
            case ".chat": $reti = MimeType::x_chat; break;
            case ".chm": $reti = MimeType::vnd_ms_htmlhelp; break;
            case ".chrt": $reti = MimeType::vnd_kde_kchart; break;
            case ".cif": $reti = MimeType::x_cif; break;
            case ".cii": $reti = MimeType::vnd_anser_web_certificate_issue_initiation; break;
            case ".cil": $reti = MimeType::vnd_ms_artgalry; break;
            case ".cla": $reti = MimeType::vnd_claymore; break;
            case ".class": $reti = MimeType::java_vm; break;
            case ".clkk": $reti = MimeType::vnd_crick_clicker_keyboard; break;
            case ".clkp": $reti = MimeType::vnd_crick_clicker_palette; break;
            case ".clkt": $reti = MimeType::vnd_crick_clicker_template; break;
            case ".clkw": $reti = MimeType::vnd_crick_clicker_wordbank; break;
            case ".clkx": $reti = MimeType::vnd_crick_clicker; break;
            case ".clp": $reti = MimeType::x_msclip; break;
            case ".cmc": $reti = MimeType::vnd_cosmocaller; break;
            case ".cmdf": $reti = MimeType::x_cmdf; break;
            case ".cml": $reti = MimeType::x_cml; break;
            case ".cmp": $reti = MimeType::vnd_yellowriver_custom_menu; break;
            case ".cmx": $reti = MimeType::x_cmx; break;
            case ".cod": $reti = MimeType::vnd_rim_cod; break;
            case ".com": $reti = MimeType::x_msdownload; break;
            case ".conf": $reti = MimeType::plain; break;
            case ".cpio": $reti = MimeType::x_cpio; break;
            case ".cpp": $reti = MimeType::x_c; break;
            case ".cpt": $reti = MimeType::mac_compactpro; break;
            case ".cr2": $reti = MimeType::x_canon_cr2; break;
            case ".crd": $reti = MimeType::x_mscardfile; break;
            case ".crl": $reti = MimeType::pkix_crl; break;
            case ".crt": $reti = MimeType::x_x509_ca_cert; break;
            case ".crw": $reti = MimeType::x_canon_crw; break;
            case ".csh": $reti = MimeType::x_csh; break;
            case ".csml": $reti = MimeType::x_csml; break;
            case ".csp": $reti = MimeType::vnd_commonspace; break;
            case ".css": $reti = MimeType::css; break;
            case ".cst": $reti = MimeType::x_director; break;
            case ".csv": $reti = MimeType::csv; break;
            case ".cu": $reti = MimeType::cu_seeme; break;
            case ".curl": $reti = MimeType::vnd_curl; break;
            case ".cww": $reti = MimeType::prs_cww; break;
            case ".cxt": $reti = MimeType::x_director; break;
            case ".cxx": $reti = MimeType::x_c; break;
            case ".daf": $reti = MimeType::vnd_mobius_daf; break;
            case ".dataless": $reti = MimeType::vnd_fdsn_seed; break;
            case ".davmount": $reti = MimeType::davmount_xml; break;
            case ".db": $reti = MimeType::vnd_sqlite3; break;
            // case ".db": $reti = MimeType::x_sqlite3; break;
            case ".db-shm": $reti = MimeType::vnd_sqlite3; break;
            // case ".db-shm": $reti = MimeType::x_sqlite3; break;
            case ".db-wal": $reti = MimeType::vnd_sqlite3; break;
            // case ".db-wal": $reti = MimeType::x_sqlite3; break;
            case ".dcr": $reti = MimeType::x_director; break;
            // case ".dcr": $reti = MimeType::x_kodak_dcr; break;
            case ".dcurl": $reti = MimeType::vnd_curl_dcurl; break;
            case ".dd2": $reti = MimeType::vnd_oma_dd2_xml; break;
            case ".ddd": $reti = MimeType::vnd_fujixerox_ddd; break;
            case ".deb": $reti = MimeType::vnd_debian_binary_package; break;
            // case ".deb": $reti = MimeType::x_debian_package; break;
            case ".def": $reti = MimeType::plain; break;
            case ".deploy": $reti = MimeType::octet_stream; break;
            case ".der": $reti = MimeType::x_x509_ca_cert; break;
            case ".dfac": $reti = MimeType::vnd_dreamfactory; break;
            case ".dic": $reti = MimeType::x_c; break;
            case ".diff": $reti = MimeType::plain; break;
            case ".dir": $reti = MimeType::x_director; break;
            case ".dis": $reti = MimeType::vnd_mobius_dis; break;
            case ".dist": $reti = MimeType::octet_stream; break;
            case ".distz": $reti = MimeType::octet_stream; break;
            case ".djv": $reti = MimeType::vnd_djvu; break;
            case ".djvu": $reti = MimeType::vnd_djvu; break;
            case ".dll": $reti = MimeType::x_msdownload; break;
            case ".dmg": $reti = MimeType::octet_stream; break;
            case ".dms": $reti = MimeType::octet_stream; break;
            case ".dna": $reti = MimeType::vnd_dna; break;
            case ".dng": $reti = MimeType::x_adobe_dng; break;
            case ".doc": $reti = MimeType::msword; break;
            case ".docm": $reti = MimeType::vnd_ms_word_document_macroenabled_12; break;
            case ".docx": $reti = MimeType::vnd_openxmlformats_officedocument_wordprocessingml_document; break;
            case ".dot": $reti = MimeType::msword; break;
            case ".dotm": $reti = MimeType::vnd_ms_word_template_macroenabled_12; break;
            case ".dotx": $reti = MimeType::vnd_openxmlformats_officedocument_wordprocessingml_template; break;
            case ".dp": $reti = MimeType::vnd_osgi_dp; break;
            case ".dpg": $reti = MimeType::vnd_dpgraph; break;
            case ".dsc": $reti = MimeType::prs_lines_tag; break;
            case ".dtb": $reti = MimeType::x_dtbook_xml; break;
            case ".dtd": $reti = MimeType::xml_dtd; break;
            case ".dts": $reti = MimeType::vnd_dts; break;
            case ".dtshd": $reti = MimeType::vnd_dts_hd; break;
            case ".dump": $reti = MimeType::octet_stream; break;
            case ".dvi": $reti = MimeType::x_dvi; break;
            case ".dwf": $reti = MimeType::vnd_dwf; break;
            case ".dwg": $reti = MimeType::vnd_dwg; break;
            case ".dxf": $reti = MimeType::vnd_dxf; break;
            case ".dxp": $reti = MimeType::vnd_spotfire_dxp; break;
            case ".dxr": $reti = MimeType::x_director; break;
            case ".ecelp4800": $reti = MimeType::vnd_nuera_ecelp4800; break;
            case ".ecelp7470": $reti = MimeType::vnd_nuera_ecelp7470; break;
            case ".ecelp9600": $reti = MimeType::vnd_nuera_ecelp9600; break;
            case ".ecma": $reti = MimeType::ecmascript; break;
            case ".edm": $reti = MimeType::vnd_novadigm_edm; break;
            case ".edx": $reti = MimeType::vnd_novadigm_edx; break;
            case ".efif": $reti = MimeType::vnd_picsel; break;
            case ".ei6": $reti = MimeType::vnd_pg_osasli; break;
            case ".elc": $reti = MimeType::octet_stream; break;
            case ".eml": $reti = MimeType::rfc822; break;
            case ".emma": $reti = MimeType::emma_xml; break;
            case ".eol": $reti = MimeType::vnd_digital_winds; break;
            case ".eot": $reti = MimeType::vnd_ms_fontobject; break;
            case ".eps": $reti = MimeType::postscript; break;
            case ".epub": $reti = MimeType::epub_zip; break;
            case ".erf": $reti = MimeType::x_epson_erf; break;
            case ".es3": $reti = MimeType::vnd_eszigno3_xml; break;
            case ".esf": $reti = MimeType::vnd_epson_esf; break;
            case ".et3": $reti = MimeType::vnd_eszigno3_xml; break;
            case ".etx": $reti = MimeType::x_setext; break;
            case ".exe": $reti = MimeType::x_msdownload; break;
            case ".ext": $reti = MimeType::vnd_novadigm_ext; break;
            case ".ez": $reti = MimeType::andrew_inset; break;
            case ".ez2": $reti = MimeType::vnd_ezpix_album; break;
            case ".ez3": $reti = MimeType::vnd_ezpix_package; break;
            case ".f": $reti = MimeType::x_fortran; break;
            case ".f4v": $reti = MimeType::x_f4v; break;
            case ".f77": $reti = MimeType::x_fortran; break;
            case ".f90": $reti = MimeType::x_fortran; break;
            case ".fbs": $reti = MimeType::vnd_fastbidsheet; break;
            case ".fdf": $reti = MimeType::vnd_fdf; break;
            case ".fe_launch": $reti = MimeType::vnd_denovo_fcselayout_link; break;
            case ".fg5": $reti = MimeType::vnd_fujitsu_oasysgp; break;
            case ".fgd": $reti = MimeType::x_director; break;
            case ".fh": $reti = MimeType::x_freehand; break;
            case ".fh4": $reti = MimeType::x_freehand; break;
            case ".fh5": $reti = MimeType::x_freehand; break;
            case ".fh7": $reti = MimeType::x_freehand; break;
            case ".fhc": $reti = MimeType::x_freehand; break;
            case ".fig": $reti = MimeType::x_xfig; break;
            case ".flac": $reti = MimeType::flac; break;
            case ".fli": $reti = MimeType::x_fli; break;
            case ".flo": $reti = MimeType::vnd_micrografx_flo; break;
            case ".flv": $reti = MimeType::x_flv; break;
            case ".flw": $reti = MimeType::vnd_kde_kivio; break;
            case ".flx": $reti = MimeType::vnd_fmi_flexstor; break;
            case ".fly": $reti = MimeType::vnd_fly; break;
            case ".fm": $reti = MimeType::vnd_framemaker; break;
            case ".fnc": $reti = MimeType::vnd_frogans_fnc; break;
            case ".for": $reti = MimeType::x_fortran; break;
            case ".fpx": $reti = MimeType::vnd_fpx; break;
            case ".frame": $reti = MimeType::vnd_framemaker; break;
            case ".fsc": $reti = MimeType::vnd_fsc_weblaunch; break;
            case ".fst": $reti = MimeType::vnd_fst; break;
            case ".ftc": $reti = MimeType::vnd_fluxtime_clip; break;
            case ".fti": $reti = MimeType::vnd_anser_web_funds_transfer_initiation; break;
            case ".fvt": $reti = MimeType::vnd_fvt; break;
            case ".fzs": $reti = MimeType::vnd_fuzzysheet; break;
            case ".g3": $reti = MimeType::g3fax; break;
            case ".gac": $reti = MimeType::vnd_groove_account; break;
            case ".gbr": $reti = MimeType::vnd_gerber; break;
            case ".gcode": $reti = MimeType::gcode; break;
            case ".gdl": $reti = MimeType::vnd_gdl; break;
            case ".geo": $reti = MimeType::vnd_dynageo; break;
            case ".gex": $reti = MimeType::vnd_geometry_explorer; break;
            case ".ggb": $reti = MimeType::vnd_geogebra_file; break;
            case ".ggt": $reti = MimeType::vnd_geogebra_tool; break;
            case ".ghf": $reti = MimeType::vnd_groove_help; break;
            case ".gif": $reti = MimeType::gif; break;
            case ".gim": $reti = MimeType::vnd_groove_identity_message; break;
            case ".gmx": $reti = MimeType::vnd_gmx; break;
            case ".gnumeric": $reti = MimeType::x_gnumeric; break;
            case ".gph": $reti = MimeType::vnd_flographit; break;
            case ".gqf": $reti = MimeType::vnd_grafeq; break;
            case ".gqs": $reti = MimeType::vnd_grafeq; break;
            case ".gram": $reti = MimeType::srgs; break;
            case ".gre": $reti = MimeType::vnd_geometry_explorer; break;
            case ".grv": $reti = MimeType::vnd_groove_injector; break;
            case ".grxml": $reti = MimeType::srgs_xml; break;
            case ".gsf": $reti = MimeType::x_font_ghostscript; break;
            case ".gtar": $reti = MimeType::x_gtar; break;
            case ".gtm": $reti = MimeType::vnd_groove_tool_message; break;
            case ".gtw": $reti = MimeType::vnd_gtw; break;
            case ".gv": $reti = MimeType::vnd_graphviz; break;
            case ".gz": $reti = MimeType::gzip; break;
            // case ".gz": $reti = MimeType::x_gzip; break;
            case ".h": $reti = MimeType::x_c; break;
            case ".h261": $reti = MimeType::h261; break;
            case ".h263": $reti = MimeType::h263; break;
            case ".h264": $reti = MimeType::h264; break;
            case ".hbci": $reti = MimeType::vnd_hbci; break;
            case ".hdf": $reti = MimeType::x_hdf; break;
            case ".heic": $reti = MimeType::heic; break;
            case ".heif": $reti = MimeType::heic; break;
            case ".hh": $reti = MimeType::x_c; break;
            case ".hlp": $reti = MimeType::winhlp; break;
            case ".hpgl": $reti = MimeType::vnd_hp_hpgl; break;
            case ".hpid": $reti = MimeType::vnd_hp_hpid; break;
            case ".hps": $reti = MimeType::vnd_hp_hps; break;
            case ".hqx": $reti = MimeType::mac_binhex40; break;
            case ".htke": $reti = MimeType::vnd_kenameaapp; break;
            case ".htm": $reti = MimeType::html; break;
            case ".html": $reti = MimeType::html; break;
            case ".hvd": $reti = MimeType::vnd_yamaha_hv_dic; break;
            case ".hvp": $reti = MimeType::vnd_yamaha_hv_voice; break;
            case ".hvs": $reti = MimeType::vnd_yamaha_hv_script; break;
            case ".icc": $reti = MimeType::vnd_iccprofile; break;
            case ".ice": $reti = MimeType::x_cooltalk; break;
            case ".icm": $reti = MimeType::vnd_iccprofile; break;
            case ".icns": $reti = MimeType::x_icns; break;
            case ".ico": $reti = MimeType::x_icon; break;
            case ".ics": $reti = MimeType::calendar; break;
            case ".ief": $reti = MimeType::ief; break;
            case ".ifb": $reti = MimeType::calendar; break;
            case ".ifm": $reti = MimeType::vnd_shana_informed_formdata; break;
            case ".iges": $reti = MimeType::iges; break;
            case ".igl": $reti = MimeType::vnd_igloader; break;
            case ".igs": $reti = MimeType::iges; break;
            case ".igx": $reti = MimeType::vnd_micrografx_igx; break;
            case ".iif": $reti = MimeType::vnd_shana_informed_interchange; break;
            case ".imp": $reti = MimeType::vnd_accpac_simply_imp; break;
            case ".ims": $reti = MimeType::vnd_ms_ims; break;
            case ".in": $reti = MimeType::plain; break;
            case ".inc": $reti = MimeType::x_pascal; break;
            case ".ipk": $reti = MimeType::vnd_shana_informed_package; break;
            case ".irm": $reti = MimeType::vnd_ibm_rights_management; break;
            case ".irp": $reti = MimeType::vnd_irepository_package_xml; break;
            case ".iso": $reti = MimeType::x_iso9660_image; break;
            case ".isoimg": $reti = MimeType::x_iso9660_image; break;
            case ".itp": $reti = MimeType::vnd_shana_informed_formtemplate; break;
            case ".ivp": $reti = MimeType::vnd_immervision_ivp; break;
            case ".ivu": $reti = MimeType::vnd_immervision_ivu; break;
            case ".jad": $reti = MimeType::vnd_sun_j2me_app_descriptor; break;
            case ".jam": $reti = MimeType::vnd_jam; break;
            case ".jar": $reti = MimeType::java_archive; break;
            case ".java": $reti = MimeType::x_java_source; break;
            case ".jfi": $reti = MimeType::pjpeg; break;
            case ".jfif": $reti = MimeType::jpeg; break;
            // case ".jfif": $reti = MimeType::pjpeg; break;
            case ".jfif-tbnl": $reti = MimeType::jpeg; break;
            // case ".jfif-tbnl": $reti = MimeType::pjpeg; break;
            case ".jif": $reti = MimeType::jpeg; break;
            // case ".jif": $reti = MimeType::pjpeg; break;
            case ".jisp": $reti = MimeType::vnd_jisp; break;
            case ".jlt": $reti = MimeType::vnd_hp_jlyt; break;
            case ".jnlp": $reti = MimeType::x_java_jnlp_file; break;
            case ".joda": $reti = MimeType::vnd_joost_joda_archive; break;
            case ".jpe": $reti = MimeType::jpeg; break;
            // case ".jpe": $reti = MimeType::pjpeg; break;
            case ".jpeg": $reti = MimeType::jpeg; break;
            // case ".jpeg": $reti = MimeType::pjpeg; break;
            case ".jpg": $reti = MimeType::jpeg; break;
            // case ".jpg": $reti = MimeType::pjpeg; break;
            case ".jpgm": $reti = MimeType::jpm; break;
            case ".jpgv": $reti = MimeType::jpeg; break;
            case ".jpm": $reti = MimeType::jpm; break;
            case ".js": $reti = MimeType::javascript; break;
            case ".json": $reti = MimeType::json; break;
            case ".k25": $reti = MimeType::x_kodak_k25; break;
            case ".kar": $reti = MimeType::midi; break;
            case ".karbon": $reti = MimeType::vnd_kde_karbon; break;
            case ".kdc": $reti = MimeType::x_kodak_kdc; break;
            case ".kfo": $reti = MimeType::vnd_kde_kformula; break;
            case ".kia": $reti = MimeType::vnd_kidspiration; break;
            case ".kil": $reti = MimeType::x_killustrator; break;
            case ".kml": $reti = MimeType::vnd_google_earth_kml_xml; break;
            case ".kmz": $reti = MimeType::vnd_google_earth_kmz; break;
            case ".kne": $reti = MimeType::vnd_kinar; break;
            case ".knp": $reti = MimeType::vnd_kinar; break;
            case ".kon": $reti = MimeType::vnd_kde_kontour; break;
            case ".kpr": $reti = MimeType::vnd_kde_kpresenter; break;
            case ".kpt": $reti = MimeType::vnd_kde_kpresenter; break;
            case ".kra": $reti = MimeType::x_krita; break;
            case ".krz": $reti = MimeType::x_krita; break;
            case ".ksh": $reti = MimeType::plain; break;
            case ".ksp": $reti = MimeType::vnd_kde_kspread; break;
            case ".ktr": $reti = MimeType::vnd_kahootz; break;
            case ".ktz": $reti = MimeType::vnd_kahootz; break;
            case ".kwd": $reti = MimeType::vnd_kde_kword; break;
            case ".kwt": $reti = MimeType::vnd_kde_kword; break;
            case ".latex": $reti = MimeType::x_latex; break;
            case ".lbd": $reti = MimeType::vnd_llamagraphics_life_balance_desktop; break;
            case ".lbe": $reti = MimeType::vnd_llamagraphics_life_balance_exchange_xml; break;
            case ".les": $reti = MimeType::vnd_hhe_lesson_player; break;
            case ".lha": $reti = MimeType::octet_stream; break;
            case ".link66": $reti = MimeType::vnd_route66_link66_xml; break;
            case ".list": $reti = MimeType::plain; break;
            case ".list3820": $reti = MimeType::vnd_ibm_modcap; break;
            case ".listafp": $reti = MimeType::vnd_ibm_modcap; break;
            case ".log": $reti = MimeType::plain; break;
            case ".lostxml": $reti = MimeType::lost_xml; break;
            case ".lrf": $reti = MimeType::octet_stream; break;
            case ".lrm": $reti = MimeType::vnd_ms_lrm; break;
            case ".ltf": $reti = MimeType::vnd_frogans_ltf; break;
            case ".lvp": $reti = MimeType::vnd_lucent_voice; break;
            case ".lwp": $reti = MimeType::vnd_lotus_wordpro; break;
            case ".lzh": $reti = MimeType::octet_stream; break;
            case ".m13": $reti = MimeType::x_msmediaview; break;
            case ".m14": $reti = MimeType::x_msmediaview; break;
            case ".m1v": $reti = MimeType::mpeg; break;
            case ".m2a": $reti = MimeType::mpeg; break;
            case ".m2v": $reti = MimeType::mpeg; break;
            case ".m3a": $reti = MimeType::mpeg; break;
            case ".m3u": $reti = MimeType::x_mpegurl; break;
            case ".m4a": $reti = MimeType::aac; break;
            // case ".m4a": $reti = MimeType::mp4; break;
            case ".m4b": $reti = MimeType::mp4; break;
            case ".m4p": $reti = MimeType::mp4; break;
            case ".m4r": $reti = MimeType::mp4; break;
            case ".m4u": $reti = MimeType::vnd_mpegurl; break;
            case ".m4v": $reti = MimeType::mp4; break;
            // case ".m4v": $reti = MimeType::x_m4v; break;
            case ".ma": $reti = MimeType::mathematica; break;
            case ".mag": $reti = MimeType::vnd_ecowin_chart; break;
            case ".maker": $reti = MimeType::vnd_framemaker; break;
            case ".man": $reti = MimeType::troff; break;
            case ".markdn": $reti = MimeType::markdown; break;
            // case ".markdn": $reti = MimeType::x_markdown; break;
            case ".markdown": $reti = MimeType::markdown; break;
            // case ".markdown": $reti = MimeType::x_markdown; break;
            case ".mathml": $reti = MimeType::mathml_xml; break;
            // case ".mathml": $reti = MimeType::mathml; break;
            case ".mb": $reti = MimeType::mathematica; break;
            case ".mbk": $reti = MimeType::vnd_mobius_mbk; break;
            case ".mbox": $reti = MimeType::mbox; break;
            case ".mc1": $reti = MimeType::vnd_medcalcdata; break;
            case ".mcd": $reti = MimeType::vnd_mcd; break;
            case ".mcurl": $reti = MimeType::vnd_curl_mcurl; break;
            case ".md": $reti = MimeType::markdown; break;
            // case ".md": $reti = MimeType::x_markdown; break;
            case ".mdb": $reti = MimeType::x_msaccess; break;
            case ".mdi": $reti = MimeType::vnd_ms_modi; break;
            case ".mdown": $reti = MimeType::markdown; break;
            // case ".mdown": $reti = MimeType::x_markdown; break;
            case ".me": $reti = MimeType::troff; break;
            case ".mesh": $reti = MimeType::mesh; break;
            case ".mfm": $reti = MimeType::vnd_mfmp; break;
            case ".mgz": $reti = MimeType::vnd_proteus_magazine; break;
            case ".mht": $reti = MimeType::rfc822; break;
            case ".mhtml": $reti = MimeType::rfc822; break;
            case ".mid": $reti = MimeType::midi; break;
            case ".midi": $reti = MimeType::midi; break;
            case ".mif": $reti = MimeType::vnd_mif; break;
            case ".mime": $reti = MimeType::rfc822; break;
            case ".mj2": $reti = MimeType::mj2; break;
            case ".mjp2": $reti = MimeType::mj2; break;
            case ".mka": $reti = MimeType::x_matroska; break;
            case ".mkv": $reti = MimeType::x_matroska; break;
            case ".mlp": $reti = MimeType::vnd_dolby_mlp; break;
            case ".mmd": $reti = MimeType::vnd_chipnuts_karaoke_mmd; break;
            case ".mmf": $reti = MimeType::vnd_smaf; break;
            case ".mml": $reti = MimeType::mathml_xml; break;
            // case ".mml": $reti = MimeType::mathml; break;
            case ".mmr": $reti = MimeType::vnd_fujixerox_edmics_mmr; break;
            case ".mny": $reti = MimeType::x_msmoney; break;
            case ".mobi": $reti = MimeType::x_mobipocket_ebook; break;
            case ".mov": $reti = MimeType::quicktime; break;
            case ".movie": $reti = MimeType::x_sgi_movie; break;
            case ".mp2": $reti = MimeType::mpeg; break;
            case ".mp2a": $reti = MimeType::mpeg; break;
            case ".mp3": $reti = MimeType::mpeg; break;
            case ".mp4": $reti = MimeType::mp4; break;
            // case ".mp4": $reti = MimeType::mp4; break;
            case ".mp4s": $reti = MimeType::mp4; break;
            case ".mp4v": $reti = MimeType::mp4; break;
            // case ".mp4v": $reti = MimeType::mp4; break;
            case ".mpa": $reti = MimeType::mpeg; break;
            case ".mpc": $reti = MimeType::vnd_mophun_certificate; break;
            case ".mpe": $reti = MimeType::mpeg; break;
            case ".mpeg": $reti = MimeType::mpeg; break;
            case ".mpg": $reti = MimeType::mpeg; break;
            case ".mpg4": $reti = MimeType::mp4; break;
            case ".mpga": $reti = MimeType::mpeg; break;
            case ".mpkg": $reti = MimeType::vnd_apple_installer_xml; break;
            case ".mpm": $reti = MimeType::vnd_blueice_multipass; break;
            case ".mpn": $reti = MimeType::vnd_mophun_application; break;
            case ".mpp": $reti = MimeType::vnd_ms_project; break;
            case ".mpt": $reti = MimeType::vnd_ms_project; break;
            case ".mpy": $reti = MimeType::vnd_ibm_minipay; break;
            case ".mqy": $reti = MimeType::vnd_mobius_mqy; break;
            case ".mrc": $reti = MimeType::marc; break;
            case ".mrw": $reti = MimeType::x_minolta_mrw; break;
            case ".ms": $reti = MimeType::troff; break;
            case ".mscml": $reti = MimeType::mediaservercontrol_xml; break;
            case ".mseed": $reti = MimeType::vnd_fdsn_mseed; break;
            case ".mseq": $reti = MimeType::vnd_mseq; break;
            case ".msf": $reti = MimeType::vnd_epson_msf; break;
            case ".msh": $reti = MimeType::mesh; break;
            case ".msi": $reti = MimeType::x_msdownload; break;
            case ".msl": $reti = MimeType::vnd_mobius_msl; break;
            case ".msty": $reti = MimeType::vnd_muvee_style; break;
            case ".mts": $reti = MimeType::vnd_mts; break;
            case ".mus": $reti = MimeType::vnd_musician; break;
            case ".musicxml": $reti = MimeType::vnd_recordare_musicxml_xml; break;
            case ".mvb": $reti = MimeType::x_msmediaview; break;
            case ".mwf": $reti = MimeType::vnd_mfer; break;
            case ".mxf": $reti = MimeType::mxf; break;
            case ".mxl": $reti = MimeType::vnd_recordare_musicxml; break;
            case ".mxml": $reti = MimeType::xv_xml; break;
            case ".mxs": $reti = MimeType::vnd_triscape_mxs; break;
            case ".mxu": $reti = MimeType::vnd_mpegurl; break;
            case ".n-gage": $reti = MimeType::vnd_nokia_n_gage_symbian_install; break;
            case ".nb": $reti = MimeType::mathematica; break;
            case ".nc": $reti = MimeType::x_netcdf; break;
            case ".ncx": $reti = MimeType::x_dtbncx_xml; break;
            case ".nef": $reti = MimeType::x_nikon_nef; break;
            case ".ngdat": $reti = MimeType::vnd_nokia_n_gage_data; break;
            case ".nlu": $reti = MimeType::vnd_neurolanguage_nlu; break;
            case ".nml": $reti = MimeType::vnd_enliven; break;
            case ".nnd": $reti = MimeType::vnd_noblenet_directory; break;
            case ".nns": $reti = MimeType::vnd_noblenet_sealer; break;
            case ".nnw": $reti = MimeType::vnd_noblenet_web; break;
            case ".npx": $reti = MimeType::vnd_net_fpx; break;
            case ".nsf": $reti = MimeType::vnd_lotus_notes; break;
            case ".nws": $reti = MimeType::rfc822; break;
            case ".o": $reti = MimeType::octet_stream; break;
            case ".oa2": $reti = MimeType::vnd_fujitsu_oasys2; break;
            case ".oa3": $reti = MimeType::vnd_fujitsu_oasys3; break;
            case ".oas": $reti = MimeType::vnd_fujitsu_oasys; break;
            case ".obd": $reti = MimeType::x_msbinder; break;
            case ".obj": $reti = MimeType::octet_stream; break;
            case ".oda": $reti = MimeType::oda; break;
            case ".odb": $reti = MimeType::vnd_oasis_opendocument_database; break;
            case ".odc": $reti = MimeType::vnd_oasis_opendocument_chart; break;
            case ".odf": $reti = MimeType::vnd_oasis_opendocument_formula; break;
            case ".odft": $reti = MimeType::vnd_oasis_opendocument_formula_template; break;
            case ".odg": $reti = MimeType::vnd_oasis_opendocument_graphics; break;
            case ".odi": $reti = MimeType::vnd_oasis_opendocument_image; break;
            case ".odp": $reti = MimeType::vnd_oasis_opendocument_presentation; break;
            case ".ods": $reti = MimeType::vnd_oasis_opendocument_spreadsheet; break;
            case ".odt": $reti = MimeType::vnd_oasis_opendocument_text; break;
            case ".oga": $reti = MimeType::ogg; break;
            case ".ogg": $reti = MimeType::ogg; break;
            case ".ogv": $reti = MimeType::ogg; break;
            case ".ogx": $reti = MimeType::ogg; break;
            case ".onepkg": $reti = MimeType::onenote; break;
            case ".onetmp": $reti = MimeType::onenote; break;
            case ".onetoc": $reti = MimeType::onenote; break;
            case ".onetoc2": $reti = MimeType::onenote; break;
            case ".opf": $reti = MimeType::oebps_package_xml; break;
            case ".oprc": $reti = MimeType::vnd_palm; break;
            case ".opus": $reti = MimeType::opus; break;
            case ".orf": $reti = MimeType::x_olympus_orf; break;
            case ".org": $reti = MimeType::vnd_lotus_organizer; break;
            case ".osf": $reti = MimeType::vnd_yamaha_openscoreformat; break;
            case ".osfpvg": $reti = MimeType::vnd_yamaha_openscoreformat_osfpvg_xml; break;
            case ".otc": $reti = MimeType::vnd_oasis_opendocument_chart_template; break;
            case ".otf": $reti = MimeType::x_font_otf; break;
            // case ".otf": $reti = MimeType::otf; break;
            case ".otg": $reti = MimeType::vnd_oasis_opendocument_graphics_template; break;
            case ".oth": $reti = MimeType::vnd_oasis_opendocument_text_web; break;
            case ".oti": $reti = MimeType::vnd_oasis_opendocument_image_template; break;
            case ".otm": $reti = MimeType::vnd_oasis_opendocument_text_master; break;
            case ".otp": $reti = MimeType::vnd_oasis_opendocument_presentation_template; break;
            case ".ots": $reti = MimeType::vnd_oasis_opendocument_spreadsheet_template; break;
            case ".ott": $reti = MimeType::vnd_oasis_opendocument_text_template; break;
            case ".oxt": $reti = MimeType::vnd_openofficeorg_extension; break;
            case ".p": $reti = MimeType::x_pascal; break;
            case ".p10": $reti = MimeType::pkcs10; break;
            case ".p12": $reti = MimeType::x_pkcs12; break;
            case ".p7b": $reti = MimeType::x_pkcs7_certificates; break;
            case ".p7c": $reti = MimeType::pkcs7_mime; break;
            case ".p7m": $reti = MimeType::pkcs7_mime; break;
            case ".p7r": $reti = MimeType::x_pkcs7_certreqresp; break;
            case ".p7s": $reti = MimeType::pkcs7_signature; break;
            case ".pas": $reti = MimeType::x_pascal; break;
            case ".pbd": $reti = MimeType::vnd_powerbuilder6; break;
            case ".pbm": $reti = MimeType::x_portable_bitmap; break;
            case ".pcf": $reti = MimeType::x_font_pcf; break;
            case ".pcl": $reti = MimeType::vnd_hp_pcl; break;
            case ".pclxl": $reti = MimeType::vnd_hp_pclxl; break;
            case ".pct": $reti = MimeType::x_pict; break;
            case ".pcurl": $reti = MimeType::vnd_curl_pcurl; break;
            case ".pcx": $reti = MimeType::x_pcx; break;
            case ".pdb": $reti = MimeType::vnd_palm; break;
            case ".pdf": $reti = MimeType::pdf; break;
            case ".pef": $reti = MimeType::x_pentax_pef; break;
            case ".pfa": $reti = MimeType::x_font_type1; break;
            case ".pfb": $reti = MimeType::x_font_type1; break;
            case ".pfm": $reti = MimeType::x_font_type1; break;
            case ".pfr": $reti = MimeType::font_tdpfr; break;
            case ".pfx": $reti = MimeType::x_pkcs12; break;
            case ".pgm": $reti = MimeType::x_portable_graymap; break;
            case ".pgn": $reti = MimeType::x_chess_pgn; break;
            case ".pgp": $reti = MimeType::pgp_encrypted; break;
            case ".pic": $reti = MimeType::x_pict; break;
            case ".pjpg": $reti = MimeType::jpeg; break;
            // case ".pjpg": $reti = MimeType::pjpeg; break;
            case ".pkg": $reti = MimeType::octet_stream; break;
            case ".pki": $reti = MimeType::pkixcmp; break;
            case ".pkipath": $reti = MimeType::pkix_pkipath; break;
            case ".pl": $reti = MimeType::x_perl; break;
            // case ".pl": $reti = MimeType::plain; break;
            case ".plb": $reti = MimeType::vnd_3gpp_pic_bw_large; break;
            case ".plc": $reti = MimeType::vnd_mobius_plc; break;
            case ".plf": $reti = MimeType::vnd_pocketlearn; break;
            case ".pls": $reti = MimeType::pls_xml; break;
            case ".pm": $reti = MimeType::x_perl; break;
            case ".pml": $reti = MimeType::vnd_ctc_posml; break;
            case ".png": $reti = MimeType::png; break;
            case ".pnm": $reti = MimeType::x_portable_anymap; break;
            case ".portpkg": $reti = MimeType::vnd_macports_portpkg; break;
            case ".pot": $reti = MimeType::vnd_ms_powerpoint; break;
            case ".potm": $reti = MimeType::vnd_ms_powerpoint_template_macroenabled_12; break;
            case ".potx": $reti = MimeType::vnd_openxmlformats_officedocument_presentationml_template; break;
            case ".pp": $reti = MimeType::x_pascal; break;
            case ".ppa": $reti = MimeType::vnd_ms_powerpoint; break;
            case ".ppam": $reti = MimeType::vnd_ms_powerpoint_addin_macroenabled_12; break;
            case ".ppd": $reti = MimeType::vnd_cups_ppd; break;
            case ".ppm": $reti = MimeType::x_portable_pixmap; break;
            case ".pps": $reti = MimeType::vnd_ms_powerpoint; break;
            case ".ppsm": $reti = MimeType::vnd_ms_powerpoint_slideshow_macroenabled_12; break;
            case ".ppsx": $reti = MimeType::vnd_openxmlformats_officedocument_presentationml_slideshow; break;
            case ".ppt": $reti = MimeType::vnd_ms_powerpoint; break;
            case ".pptm": $reti = MimeType::vnd_ms_powerpoint_presentation_macroenabled_12; break;
            case ".pptx": $reti = MimeType::vnd_openxmlformats_officedocument_presentationml_presentation; break;
            case ".pqa": $reti = MimeType::vnd_palm; break;
            case ".prc": $reti = MimeType::x_mobipocket_ebook; break;
            case ".pre": $reti = MimeType::vnd_lotus_freelance; break;
            case ".prf": $reti = MimeType::pics_rules; break;
            case ".prql": $reti = MimeType::prql; break;
            case ".ps": $reti = MimeType::postscript; break;
            case ".psb": $reti = MimeType::vnd_3gpp_pic_bw_small; break;
            case ".psd": $reti = MimeType::vnd_adobe_photoshop; break;
            case ".psf": $reti = MimeType::x_font_linux_psf; break;
            case ".ptid": $reti = MimeType::vnd_pvi_ptid1; break;
            case ".ptx": $reti = MimeType::x_pentax_pef; break;
            case ".pub": $reti = MimeType::x_mspublisher; break;
            case ".pvb": $reti = MimeType::vnd_3gpp_pic_bw_var; break;
            case ".pwn": $reti = MimeType::vnd_3m_post_it_notes; break;
            case ".pwz": $reti = MimeType::vnd_ms_powerpoint; break;
            case ".py": $reti = MimeType::x_python; break;
            case ".pya": $reti = MimeType::vnd_ms_playready_media_pya; break;
            case ".pyc": $reti = MimeType::x_python_code; break;
            case ".pyo": $reti = MimeType::x_python_code; break;
            case ".pyv": $reti = MimeType::vnd_ms_playready_media_pyv; break;
            case ".qam": $reti = MimeType::vnd_epson_quickanime; break;
            case ".qbo": $reti = MimeType::vnd_intu_qbo; break;
            case ".qfx": $reti = MimeType::vnd_intu_qfx; break;
            case ".qps": $reti = MimeType::vnd_publishare_delta_tree; break;
            case ".qt": $reti = MimeType::quicktime; break;
            case ".qwd": $reti = MimeType::vnd_quark_quarkxpress; break;
            case ".qwt": $reti = MimeType::vnd_quark_quarkxpress; break;
            case ".qxb": $reti = MimeType::vnd_quark_quarkxpress; break;
            case ".qxd": $reti = MimeType::vnd_quark_quarkxpress; break;
            case ".qxl": $reti = MimeType::vnd_quark_quarkxpress; break;
            case ".qxt": $reti = MimeType::vnd_quark_quarkxpress; break;
            case ".ra": $reti = MimeType::x_pn_realaudio; break;
            case ".raf": $reti = MimeType::x_fuji_raf; break;
            case ".ram": $reti = MimeType::x_pn_realaudio; break;
            case ".rar": $reti = MimeType::vnd_rar; break;
            // case ".rar": $reti = MimeType::x_rar_compressed; break;
            case ".ras": $reti = MimeType::x_cmu_raster; break;
            case ".raw": $reti = MimeType::x_panasonic_raw; break;
            case ".rcprofile": $reti = MimeType::vnd_ipunplugged_rcprofile; break;
            case ".rdf": $reti = MimeType::rdf_xml; break;
            case ".rdz": $reti = MimeType::vnd_data_vision_rdz; break;
            case ".rep": $reti = MimeType::vnd_businessobjects; break;
            case ".res": $reti = MimeType::x_dtbresource_xml; break;
            case ".rgb": $reti = MimeType::x_rgb; break;
            case ".rif": $reti = MimeType::reginfo_xml; break;
            case ".rl": $reti = MimeType::resource_lists_xml; break;
            case ".rlc": $reti = MimeType::vnd_fujixerox_edmics_rlc; break;
            case ".rld": $reti = MimeType::resource_lists_diff_xml; break;
            case ".rm": $reti = MimeType::vnd_rn_realmedia; break;
            case ".rmi": $reti = MimeType::midi; break;
            case ".rmp": $reti = MimeType::x_pn_realaudio_plugin; break;
            case ".rms": $reti = MimeType::vnd_jcp_javame_midlet_rms; break;
            case ".rnc": $reti = MimeType::relax_ng_compact_syntax; break;
            case ".roff": $reti = MimeType::troff; break;
            case ".rpa": $reti = MimeType::x_redhat_package_manager; break;
            case ".rpm": $reti = MimeType::x_rpm; break;
            case ".rpss": $reti = MimeType::vnd_nokia_radio_presets; break;
            case ".rpst": $reti = MimeType::vnd_nokia_radio_preset; break;
            case ".rq": $reti = MimeType::sparql_query; break;
            case ".rs": $reti = MimeType::rls_services_xml; break;
            case ".rsd": $reti = MimeType::rsd_xml; break;
            case ".rss": $reti = MimeType::rss_xml; break;
            case ".rtf": $reti = MimeType::rtf; break;
            case ".rtx": $reti = MimeType::richtext; break;
            case ".rw2": $reti = MimeType::x_panasonic_raw; break;
            case ".rwl": $reti = MimeType::x_panasonic_raw; break;
            case ".s": $reti = MimeType::x_asm; break;
            case ".saf": $reti = MimeType::vnd_yamaha_smaf_audio; break;
            case ".sbml": $reti = MimeType::sbml_xml; break;
            case ".sc": $reti = MimeType::vnd_ibm_secure_container; break;
            case ".scd": $reti = MimeType::x_msschedule; break;
            case ".scm": $reti = MimeType::vnd_lotus_screencam; break;
            case ".scq": $reti = MimeType::scvp_cv_request; break;
            case ".scs": $reti = MimeType::scvp_cv_response; break;
            case ".scurl": $reti = MimeType::vnd_curl_scurl; break;
            case ".sda": $reti = MimeType::vnd_stardivision_draw; break;
            case ".sdc": $reti = MimeType::vnd_stardivision_calc; break;
            case ".sdd": $reti = MimeType::vnd_stardivision_impress; break;
            case ".sdkd": $reti = MimeType::vnd_solent_sdkm_xml; break;
            case ".sdkm": $reti = MimeType::vnd_solent_sdkm_xml; break;
            case ".sdp": $reti = MimeType::sdp; break;
            case ".sdw": $reti = MimeType::vnd_stardivision_writer; break;
            case ".see": $reti = MimeType::vnd_seemail; break;
            case ".seed": $reti = MimeType::vnd_fdsn_seed; break;
            case ".sema": $reti = MimeType::vnd_sema; break;
            case ".semd": $reti = MimeType::vnd_semd; break;
            case ".semf": $reti = MimeType::vnd_semf; break;
            case ".ser": $reti = MimeType::java_serialized_object; break;
            case ".setpay": $reti = MimeType::set_payment_initiation; break;
            case ".setreg": $reti = MimeType::set_registration_initiation; break;
            case ".sfd-hdstx": $reti = MimeType::vnd_hydrostatix_sof_data; break;
            case ".sfs": $reti = MimeType::vnd_spotfire_sfs; break;
            case ".sgl": $reti = MimeType::vnd_stardivision_writer_global; break;
            case ".sgm": $reti = MimeType::sgml; break;
            case ".sgml": $reti = MimeType::sgml; break;
            case ".sh": $reti = MimeType::x_sh; break;
            // case ".sh": $reti = MimeType::x_shellscript; break;
            case ".shar": $reti = MimeType::x_shar; break;
            case ".shf": $reti = MimeType::shf_xml; break;
            case ".si": $reti = MimeType::vnd_wap_si; break;
            case ".sic": $reti = MimeType::vnd_wap_sic; break;
            case ".sig": $reti = MimeType::pgp_signature; break;
            case ".silo": $reti = MimeType::mesh; break;
            case ".sis": $reti = MimeType::vnd_symbian_install; break;
            case ".sisx": $reti = MimeType::vnd_symbian_install; break;
            case ".sit": $reti = MimeType::x_stuffit; break;
            case ".sitx": $reti = MimeType::x_stuffitx; break;
            case ".skd": $reti = MimeType::vnd_koan; break;
            case ".skm": $reti = MimeType::vnd_koan; break;
            case ".skp": $reti = MimeType::vnd_koan; break;
            case ".skt": $reti = MimeType::vnd_koan; break;
            case ".sl": $reti = MimeType::vnd_wap_sl; break;
            case ".slc": $reti = MimeType::vnd_wap_slc; break;
            case ".sldm": $reti = MimeType::vnd_ms_powerpoint_slide_macroenabled_12; break;
            case ".sldx": $reti = MimeType::vnd_openxmlformats_officedocument_presentationml_slide; break;
            case ".slt": $reti = MimeType::vnd_epson_salt; break;
            case ".smf": $reti = MimeType::vnd_stardivision_math; break;
            case ".smi": $reti = MimeType::smil_xml; break;
            case ".smil": $reti = MimeType::smil_xml; break;
            case ".snd": $reti = MimeType::basic; break;
            case ".snf": $reti = MimeType::x_font_snf; break;
            case ".so": $reti = MimeType::octet_stream; break;
            case ".spc": $reti = MimeType::x_pkcs7_certificates; break;
            case ".spf": $reti = MimeType::vnd_yamaha_smaf_phrase; break;
            case ".spl": $reti = MimeType::x_futuresplash; break;
            case ".spot": $reti = MimeType::vnd_in3d_spot; break;
            case ".spp": $reti = MimeType::scvp_vp_response; break;
            case ".spq": $reti = MimeType::scvp_vp_request; break;
            case ".spx": $reti = MimeType::ogg; break;
            case ".sqlite": $reti = MimeType::vnd_sqlite3; break;
            // case ".sqlite": $reti = MimeType::x_sqlite3; break;
            case ".sqlite-shm": $reti = MimeType::vnd_sqlite3; break;
            // case ".sqlite-shm": $reti = MimeType::x_sqlite3; break;
            case ".sqlite-wal": $reti = MimeType::vnd_sqlite3; break;
            // case ".sqlite-wal": $reti = MimeType::x_sqlite3; break;
            case ".sqlite3": $reti = MimeType::vnd_sqlite3; break;
            // case ".sqlite3": $reti = MimeType::x_sqlite3; break;
            case ".sr2": $reti = MimeType::x_sony_sr2; break;
            case ".src": $reti = MimeType::x_wais_source; break;
            case ".srf": $reti = MimeType::x_sony_srf; break;
            case ".srx": $reti = MimeType::sparql_results_xml; break;
            case ".sse": $reti = MimeType::vnd_kodak_descriptor; break;
            case ".ssf": $reti = MimeType::vnd_epson_ssf; break;
            case ".ssml": $reti = MimeType::ssml_xml; break;
            case ".stc": $reti = MimeType::vnd_sun_xml_calc_template; break;
            case ".std": $reti = MimeType::vnd_sun_xml_draw_template; break;
            case ".stf": $reti = MimeType::vnd_wt_stf; break;
            case ".sti": $reti = MimeType::vnd_sun_xml_impress_template; break;
            case ".stk": $reti = MimeType::hyperstudio; break;
            case ".stl": $reti = MimeType::vnd_ms_pki_stl; break;
            case ".str": $reti = MimeType::vnd_pg_format; break;
            case ".stw": $reti = MimeType::vnd_sun_xml_writer_template; break;
            case ".sus": $reti = MimeType::vnd_sus_calendar; break;
            case ".susp": $reti = MimeType::vnd_sus_calendar; break;
            case ".sv4cpio": $reti = MimeType::x_sv4cpio; break;
            case ".sv4crc": $reti = MimeType::x_sv4crc; break;
            case ".svd": $reti = MimeType::vnd_svd; break;
            case ".svg": $reti = MimeType::svg_xml; break;
            case ".svgz": $reti = MimeType::svg_xml; break;
            case ".swa": $reti = MimeType::x_director; break;
            case ".swf": $reti = MimeType::x_shockwave_flash; break;
            case ".swi": $reti = MimeType::vnd_arastra_swi; break;
            case ".sxc": $reti = MimeType::vnd_sun_xml_calc; break;
            case ".sxd": $reti = MimeType::vnd_sun_xml_draw; break;
            case ".sxg": $reti = MimeType::vnd_sun_xml_writer_global; break;
            case ".sxi": $reti = MimeType::vnd_sun_xml_impress; break;
            case ".sxm": $reti = MimeType::vnd_sun_xml_math; break;
            case ".sxw": $reti = MimeType::vnd_sun_xml_writer; break;
            case ".t": $reti = MimeType::troff; break;
            case ".tao": $reti = MimeType::vnd_tao_intent_module_archive; break;
            case ".tar": $reti = MimeType::x_tar; break;
            case ".tcap": $reti = MimeType::vnd_3gpp2_tcap; break;
            case ".tcl": $reti = MimeType::x_tcl; break;
            case ".teacher": $reti = MimeType::vnd_smart_teacher; break;
            case ".test": $reti = MimeType::mimetype; break;
            case ".tex": $reti = MimeType::x_tex; break;
            case ".texi": $reti = MimeType::x_texinfo; break;
            case ".texinfo": $reti = MimeType::x_texinfo; break;
            case ".text": $reti = MimeType::plain; break;
            case ".tfm": $reti = MimeType::x_tex_tfm; break;
            case ".tgz": $reti = MimeType::gzip; break;
            // case ".tgz": $reti = MimeType::x_gzip; break;
            case ".tif": $reti = MimeType::tiff; break;
            case ".tiff": $reti = MimeType::tiff; break;
            case ".tmo": $reti = MimeType::vnd_tmobile_livetv; break;
            case ".torrent": $reti = MimeType::x_bittorrent; break;
            case ".tpl": $reti = MimeType::vnd_groove_tool_template; break;
            case ".tpt": $reti = MimeType::vnd_trid_tpt; break;
            case ".tr": $reti = MimeType::troff; break;
            case ".tra": $reti = MimeType::vnd_trueapp; break;
            case ".trm": $reti = MimeType::x_msterminal; break;
            case ".ts": $reti = MimeType::mp2t; break;
            case ".tsv": $reti = MimeType::tab_separated_values; break;
            case ".ttc": $reti = MimeType::x_font_ttf; break;
            case ".ttf": $reti = MimeType::x_font_ttf; break;
            case ".twd": $reti = MimeType::vnd_simtech_mindmapper; break;
            case ".twds": $reti = MimeType::vnd_simtech_mindmapper; break;
            case ".txd": $reti = MimeType::vnd_genomatix_tuxedo; break;
            case ".txf": $reti = MimeType::vnd_mobius_txf; break;
            case ".txt": $reti = MimeType::plain; break;
            case ".u32": $reti = MimeType::x_authorware_bin; break;
            case ".udeb": $reti = MimeType::vnd_debian_binary_package; break;
            // case ".udeb": $reti = MimeType::x_debian_package; break;
            case ".ufd": $reti = MimeType::vnd_ufdl; break;
            case ".ufdl": $reti = MimeType::vnd_ufdl; break;
            case ".umj": $reti = MimeType::vnd_umajin; break;
            case ".unityweb": $reti = MimeType::vnd_unity; break;
            case ".uoml": $reti = MimeType::vnd_uoml_xml; break;
            case ".uri": $reti = MimeType::uri_list; break;
            case ".uris": $reti = MimeType::uri_list; break;
            case ".urls": $reti = MimeType::uri_list; break;
            case ".ustar": $reti = MimeType::x_ustar; break;
            case ".utz": $reti = MimeType::vnd_uiq_theme; break;
            case ".uu": $reti = MimeType::x_uuencode; break;
            case ".vcd": $reti = MimeType::x_cdlink; break;
            case ".vcf": $reti = MimeType::x_vcard; break;
            case ".vcg": $reti = MimeType::vnd_groove_vcard; break;
            case ".vcs": $reti = MimeType::x_vcalendar; break;
            case ".vcx": $reti = MimeType::vnd_vcx; break;
            case ".vis": $reti = MimeType::vnd_visionary; break;
            case ".viv": $reti = MimeType::vnd_vivo; break;
            case ".vor": $reti = MimeType::vnd_stardivision_writer; break;
            case ".vox": $reti = MimeType::x_authorware_bin; break;
            case ".vrml": $reti = MimeType::vrml; break;
            case ".vsd": $reti = MimeType::vnd_visio; break;
            case ".vsdx": $reti = MimeType::vnd_visio; break;
            case ".vsf": $reti = MimeType::vnd_vsf; break;
            case ".vss": $reti = MimeType::vnd_visio; break;
            case ".vssm": $reti = MimeType::vnd_visio; break;
            case ".vssx": $reti = MimeType::vnd_visio; break;
            case ".vst": $reti = MimeType::vnd_visio; break;
            case ".vstm": $reti = MimeType::vnd_visio; break;
            case ".vstx": $reti = MimeType::vnd_visio; break;
            case ".vsw": $reti = MimeType::vnd_visio; break;
            case ".vtu": $reti = MimeType::vnd_vtu; break;
            case ".vxml": $reti = MimeType::voicexml_xml; break;
            case ".w3d": $reti = MimeType::x_director; break;
            case ".wad": $reti = MimeType::x_doom; break;
            case ".wasm": $reti = MimeType::wasm; break;
            case ".wav": $reti = MimeType::vnd_wav; break;
            case ".wax": $reti = MimeType::x_ms_wax; break;
            case ".wbmp": $reti = MimeType::vnd_wap_wbmp; break;
            case ".wbs": $reti = MimeType::vnd_criticaltools_wbs_xml; break;
            case ".wbxml": $reti = MimeType::vnd_wap_wbxml; break;
            case ".wcm": $reti = MimeType::vnd_ms_works; break;
            case ".wdb": $reti = MimeType::vnd_ms_works; break;
            case ".weba": $reti = MimeType::webm; break;
            case ".webm": $reti = MimeType::webm; break;
            case ".webp": $reti = MimeType::webp; break;
            case ".wiz": $reti = MimeType::msword; break;
            case ".wks": $reti = MimeType::vnd_ms_works; break;
            case ".wm": $reti = MimeType::x_ms_wm; break;
            case ".wma": $reti = MimeType::x_ms_wma; break;
            case ".wmd": $reti = MimeType::x_ms_wmd; break;
            case ".wmf": $reti = MimeType::x_msmetafile; break;
            case ".wml": $reti = MimeType::vnd_wap_wml; break;
            case ".wmlc": $reti = MimeType::vnd_wap_wmlc; break;
            case ".wmls": $reti = MimeType::vnd_wap_wmlscript; break;
            case ".wmlsc": $reti = MimeType::vnd_wap_wmlscriptc; break;
            case ".wmv": $reti = MimeType::x_ms_wmv; break;
            case ".wmx": $reti = MimeType::x_ms_wmx; break;
            case ".wmz": $reti = MimeType::x_ms_wmz; break;
            case ".woff": $reti = MimeType::woff; break;
            case ".woff2": $reti = MimeType::woff2; break;
            case ".wpd": $reti = MimeType::vnd_wordperfect; break;
            case ".wpl": $reti = MimeType::vnd_ms_wpl; break;
            case ".wps": $reti = MimeType::vnd_ms_works; break;
            case ".wqd": $reti = MimeType::vnd_wqd; break;
            case ".wri": $reti = MimeType::x_mswrite; break;
            case ".wrl": $reti = MimeType::vrml; break;
            case ".wsdl": $reti = MimeType::wsdl_xml; break;
            case ".wspolicy": $reti = MimeType::wspolicy_xml; break;
            case ".wtb": $reti = MimeType::vnd_webturbo; break;
            case ".wvx": $reti = MimeType::x_ms_wvx; break;
            case ".x32": $reti = MimeType::x_authorware_bin; break;
            case ".x3d": $reti = MimeType::vnd_hzn_3d_crossword; break;
            case ".x3f": $reti = MimeType::x_sigma_x3f; break;
            case ".xap": $reti = MimeType::x_silverlight_app; break;
            case ".xar": $reti = MimeType::vnd_xara; break;
            case ".xbap": $reti = MimeType::x_ms_xbap; break;
            case ".xbd": $reti = MimeType::vnd_fujixerox_docuworks_binder; break;
            case ".xbm": $reti = MimeType::x_xbitmap; break;
            case ".xdm": $reti = MimeType::vnd_syncml_dm_xml; break;
            case ".xdp": $reti = MimeType::vnd_adobe_xdp_xml; break;
            case ".xdw": $reti = MimeType::vnd_fujixerox_docuworks; break;
            case ".xenc": $reti = MimeType::xenc_xml; break;
            case ".xer": $reti = MimeType::patch_ops_error_xml; break;
            case ".xfdf": $reti = MimeType::vnd_adobe_xfdf; break;
            case ".xfdl": $reti = MimeType::vnd_xfdl; break;
            case ".xht": $reti = MimeType::xhtml_xml; break;
            case ".xhtml": $reti = MimeType::xhtml_xml; break;
            case ".xhvml": $reti = MimeType::xv_xml; break;
            case ".xif": $reti = MimeType::vnd_xiff; break;
            case ".xla": $reti = MimeType::vnd_ms_excel; break;
            case ".xlam": $reti = MimeType::vnd_ms_excel_addin_macroenabled_12; break;
            case ".xlb": $reti = MimeType::vnd_ms_excel; break;
            case ".xlc": $reti = MimeType::vnd_ms_excel; break;
            case ".xlm": $reti = MimeType::vnd_ms_excel; break;
            case ".xls": $reti = MimeType::vnd_ms_excel; break;
            case ".xlsb": $reti = MimeType::vnd_ms_excel_sheet_binary_macroenabled_12; break;
            case ".xlsm": $reti = MimeType::vnd_ms_excel_sheet_macroenabled_12; break;
            case ".xlsx": $reti = MimeType::vnd_openxmlformats_officedocument_spreadsheetml_sheet; break;
            case ".xlt": $reti = MimeType::vnd_ms_excel; break;
            case ".xltm": $reti = MimeType::vnd_ms_excel_template_macroenabled_12; break;
            case ".xltx": $reti = MimeType::vnd_openxmlformats_officedocument_spreadsheetml_template; break;
            case ".xlw": $reti = MimeType::vnd_ms_excel; break;
            case ".xml": $reti = MimeType::rss_xml; break;
            // case ".xml": $reti = MimeType::xml; break;
            case ".xo": $reti = MimeType::vnd_olpc_sugar; break;
            case ".xop": $reti = MimeType::xop_xml; break;
            case ".xpdl": $reti = MimeType::xml; break;
            case ".xpi": $reti = MimeType::x_xpinstall; break;
            case ".xpm": $reti = MimeType::x_xpixmap; break;
            case ".xpr": $reti = MimeType::vnd_is_xpr; break;
            case ".xps": $reti = MimeType::vnd_ms_xpsdocument; break;
            case ".xpw": $reti = MimeType::vnd_intercon_formnet; break;
            case ".xpx": $reti = MimeType::vnd_intercon_formnet; break;
            case ".xsl": $reti = MimeType::xml; break;
            case ".xslt": $reti = MimeType::xslt_xml; break;
            case ".xsm": $reti = MimeType::vnd_syncml_xml; break;
            case ".xspf": $reti = MimeType::xspf_xml; break;
            case ".xul": $reti = MimeType::vnd_mozilla_xul_xml; break;
            case ".xvm": $reti = MimeType::xv_xml; break;
            case ".xvml": $reti = MimeType::xv_xml; break;
            case ".xwd": $reti = MimeType::x_xwindowdump; break;
            case ".xyz": $reti = MimeType::x_xyz; break;
            case ".yaml": $reti = MimeType::yaml; break;
            case ".yml": $reti = MimeType::yaml; break;
            case ".zaz": $reti = MimeType::vnd_zzazz_deck_xml; break;
            case ".zip": $reti = MimeType::x_zip_compressed; break;
            // case ".zip": $reti = MimeType::zip; break;
            // case ".zip": $reti = MimeType::zip_compressed; break;
            case ".zir": $reti = MimeType::vnd_zul; break;
            case ".zirz": $reti = MimeType::vnd_zul; break;
            case ".zmm": $reti = MimeType::vnd_handheld_entertainment_xml; break;

            default: $reti = MimeType::octet_stream; break;
        }
        return $reti;
    }

    /**
     * Gets MIME type of file.
     * @param string $path Path to file.
     * @return MimeType MIME type of given file.
     */
    public static function fromPath(string $path): MimeType
    {
        return MimeType::fromExtension(strtolower(PathUtils::getExtension($path)));
    }

    /**
     * Gets MIME type from its string representation.
     * @param string String containing MIME type.
     * @return MimeType MIME type parsed from given string.
     */
    public static function fromString(string $string): MimeType
    {
        $reti = MimeType::octet_stream;
        $input = strtolower(StringUtils::trim($string));
        switch ($input)
        {
            case "application/andrew-inset": $reti = MimeType::andrew_inset; break;
            case "application/applixware": $reti = MimeType::applixware; break;
            case "application/atom+xml": $reti = MimeType::atom_xml; break;
            case "application/atomcat+xml": $reti = MimeType::atomcat_xml; break;
            case "application/atomsvc+xml": $reti = MimeType::atomsvc_xml; break;
            case "application/ccxml+xml": $reti = MimeType::ccxml_xml; break;
            case "application/cu-seeme": $reti = MimeType::cu_seeme; break;
            case "application/davmount+xml": $reti = MimeType::davmount_xml; break;
            case "application/ecmascript": $reti = MimeType::ecmascript; break;
            case "application/emma+xml": $reti = MimeType::emma_xml; break;
            case "application/epub+zip": $reti = MimeType::epub_zip; break;
            case "application/font-tdpfr": $reti = MimeType::font_tdpfr; break;
            case "application/gzip": $reti = MimeType::gzip; break;
            case "application/hyperstudio": $reti = MimeType::hyperstudio; break;
            case "application/java-archive": $reti = MimeType::java_archive; break;
            case "application/java-serialized-object": $reti = MimeType::java_serialized_object; break;
            case "application/java-vm": $reti = MimeType::java_vm; break;
            case "application/json": $reti = MimeType::json; break;
            case "application/lost+xml": $reti = MimeType::lost_xml; break;
            case "application/mac-binhex40": $reti = MimeType::mac_binhex40; break;
            case "application/mac-compactpro": $reti = MimeType::mac_compactpro; break;
            case "application/marc": $reti = MimeType::marc; break;
            case "application/mathematica": $reti = MimeType::mathematica; break;
            case "application/mathml+xml": $reti = MimeType::mathml_xml; break;
            case "application/mbox": $reti = MimeType::mbox; break;
            case "application/mediaservercontrol+xml": $reti = MimeType::mediaservercontrol_xml; break;
            case "application/mp4": $reti = MimeType::mp4; break;
            case "application/msword": $reti = MimeType::msword; break;
            case "application/mxf": $reti = MimeType::mxf; break;
            case "application/octet-stream": $reti = MimeType::octet_stream; break;
            case "application/oda": $reti = MimeType::oda; break;
            case "application/oebps-package+xml": $reti = MimeType::oebps_package_xml; break;
            case "application/ogg": $reti = MimeType::ogg; break;
            case "application/onenote": $reti = MimeType::onenote; break;
            case "application/patch-ops-error+xml": $reti = MimeType::patch_ops_error_xml; break;
            case "application/pdf": $reti = MimeType::pdf; break;
            case "application/pgp-encrypted": $reti = MimeType::pgp_encrypted; break;
            case "application/pgp-signature": $reti = MimeType::pgp_signature; break;
            case "application/pics-rules": $reti = MimeType::pics_rules; break;
            case "application/pkcs10": $reti = MimeType::pkcs10; break;
            case "application/pkcs7-mime": $reti = MimeType::pkcs7_mime; break;
            case "application/pkcs7-signature": $reti = MimeType::pkcs7_signature; break;
            case "application/pkix-cert": $reti = MimeType::pkix_cert; break;
            case "application/pkix-crl": $reti = MimeType::pkix_crl; break;
            case "application/pkix-pkipath": $reti = MimeType::pkix_pkipath; break;
            case "application/pkixcmp": $reti = MimeType::pkixcmp; break;
            case "application/pls+xml": $reti = MimeType::pls_xml; break;
            case "application/postscript": $reti = MimeType::postscript; break;
            case "application/prql": $reti = MimeType::prql; break;
            case "application/prs.cww": $reti = MimeType::prs_cww; break;
            case "application/rdf+xml": $reti = MimeType::rdf_xml; break;
            case "application/reginfo+xml": $reti = MimeType::reginfo_xml; break;
            case "application/relax-ng-compact-syntax": $reti = MimeType::relax_ng_compact_syntax; break;
            case "application/resource-lists-diff+xml": $reti = MimeType::resource_lists_diff_xml; break;
            case "application/resource-lists+xml": $reti = MimeType::resource_lists_xml; break;
            case "application/rls-services+xml": $reti = MimeType::rls_services_xml; break;
            case "application/rsd+xml": $reti = MimeType::rsd_xml; break;
            case "application/rss+xml": $reti = MimeType::rss_xml; break;
            case "application/rtf": $reti = MimeType::rtf; break;
            case "application/sbml+xml": $reti = MimeType::sbml_xml; break;
            case "application/scvp-cv-request": $reti = MimeType::scvp_cv_request; break;
            case "application/scvp-cv-response": $reti = MimeType::scvp_cv_response; break;
            case "application/scvp-vp-request": $reti = MimeType::scvp_vp_request; break;
            case "application/scvp-vp-response": $reti = MimeType::scvp_vp_response; break;
            case "application/sdp": $reti = MimeType::sdp; break;
            case "application/set-payment-initiation": $reti = MimeType::set_payment_initiation; break;
            case "application/set-registration-initiation": $reti = MimeType::set_registration_initiation; break;
            case "application/shf+xml": $reti = MimeType::shf_xml; break;
            case "application/smil+xml": $reti = MimeType::smil_xml; break;
            case "application/sparql-query": $reti = MimeType::sparql_query; break;
            case "application/sparql-results+xml": $reti = MimeType::sparql_results_xml; break;
            case "application/srgs": $reti = MimeType::srgs; break;
            case "application/srgs+xml": $reti = MimeType::srgs_xml; break;
            case "application/ssml+xml": $reti = MimeType::ssml_xml; break;
            case "application/vnd.3gpp.pic-bw-large": $reti = MimeType::vnd_3gpp_pic_bw_large; break;
            case "application/vnd.3gpp.pic-bw-small": $reti = MimeType::vnd_3gpp_pic_bw_small; break;
            case "application/vnd.3gpp.pic-bw-var": $reti = MimeType::vnd_3gpp_pic_bw_var; break;
            case "application/vnd.3gpp2.tcap": $reti = MimeType::vnd_3gpp2_tcap; break;
            case "application/vnd.3m.post-it-notes": $reti = MimeType::vnd_3m_post_it_notes; break;
            case "application/vnd.accpac.simply.aso": $reti = MimeType::vnd_accpac_simply_aso; break;
            case "application/vnd.accpac.simply.imp": $reti = MimeType::vnd_accpac_simply_imp; break;
            case "application/vnd.acucobol": $reti = MimeType::vnd_acucobol; break;
            case "application/vnd.acucorp": $reti = MimeType::vnd_acucorp; break;
            case "application/vnd.adobe.air-application-installer-package+zip": $reti = MimeType::vnd_adobe_air_application_installer_package_zip; break;
            case "application/vnd.adobe.xdp+xml": $reti = MimeType::vnd_adobe_xdp_xml; break;
            case "application/vnd.adobe.xfdf": $reti = MimeType::vnd_adobe_xfdf; break;
            case "application/vnd.airzip.filesecure.azf": $reti = MimeType::vnd_airzip_filesecure_azf; break;
            case "application/vnd.airzip.filesecure.azs": $reti = MimeType::vnd_airzip_filesecure_azs; break;
            case "application/vnd.amazon.ebook": $reti = MimeType::vnd_amazon_ebook; break;
            case "application/vnd.americandynamics.acc": $reti = MimeType::vnd_americandynamics_acc; break;
            case "application/vnd.amiga.ami": $reti = MimeType::vnd_amiga_ami; break;
            case "application/vnd.android.package-archive": $reti = MimeType::vnd_android_package_archive; break;
            case "application/vnd.anser-web-certificate-issue-initiation": $reti = MimeType::vnd_anser_web_certificate_issue_initiation; break;
            case "application/vnd.anser-web-funds-transfer-initiation": $reti = MimeType::vnd_anser_web_funds_transfer_initiation; break;
            case "application/vnd.antix.game-component": $reti = MimeType::vnd_antix_game_component; break;
            case "application/vnd.apple.installer+xml": $reti = MimeType::vnd_apple_installer_xml; break;
            case "application/vnd.arastra.swi": $reti = MimeType::vnd_arastra_swi; break;
            case "application/vnd.audiograph": $reti = MimeType::vnd_audiograph; break;
            case "application/vnd.blueice.multipass": $reti = MimeType::vnd_blueice_multipass; break;
            case "application/vnd.bmi": $reti = MimeType::vnd_bmi; break;
            case "application/vnd.businessobjects": $reti = MimeType::vnd_businessobjects; break;
            case "application/vnd.chemdraw+xml": $reti = MimeType::vnd_chemdraw_xml; break;
            case "application/vnd.chipnuts.karaoke-mmd": $reti = MimeType::vnd_chipnuts_karaoke_mmd; break;
            case "application/vnd.cinderella": $reti = MimeType::vnd_cinderella; break;
            case "application/vnd.claymore": $reti = MimeType::vnd_claymore; break;
            case "application/vnd.clonk.c4group": $reti = MimeType::vnd_clonk_c4group; break;
            case "application/vnd.commonspace": $reti = MimeType::vnd_commonspace; break;
            case "application/vnd.contact.cmsg": $reti = MimeType::vnd_contact_cmsg; break;
            case "application/vnd.cosmocaller": $reti = MimeType::vnd_cosmocaller; break;
            case "application/vnd.crick.clicker": $reti = MimeType::vnd_crick_clicker; break;
            case "application/vnd.crick.clicker.keyboard": $reti = MimeType::vnd_crick_clicker_keyboard; break;
            case "application/vnd.crick.clicker.palette": $reti = MimeType::vnd_crick_clicker_palette; break;
            case "application/vnd.crick.clicker.template": $reti = MimeType::vnd_crick_clicker_template; break;
            case "application/vnd.crick.clicker.wordbank": $reti = MimeType::vnd_crick_clicker_wordbank; break;
            case "application/vnd.criticaltools.wbs+xml": $reti = MimeType::vnd_criticaltools_wbs_xml; break;
            case "application/vnd.ctc-posml": $reti = MimeType::vnd_ctc_posml; break;
            case "application/vnd.cups-ppd": $reti = MimeType::vnd_cups_ppd; break;
            case "application/vnd.curl.car": $reti = MimeType::vnd_curl_car; break;
            case "application/vnd.curl.pcurl": $reti = MimeType::vnd_curl_pcurl; break;
            case "application/vnd.data-vision.rdz": $reti = MimeType::vnd_data_vision_rdz; break;
            case "application/vnd.debian.binary-package": $reti = MimeType::vnd_debian_binary_package; break;
            case "application/vnd.denovo.fcselayout-link": $reti = MimeType::vnd_denovo_fcselayout_link; break;
            case "application/vnd.dna": $reti = MimeType::vnd_dna; break;
            case "application/vnd.dolby.mlp": $reti = MimeType::vnd_dolby_mlp; break;
            case "application/vnd.dpgraph": $reti = MimeType::vnd_dpgraph; break;
            case "application/vnd.dreamfactory": $reti = MimeType::vnd_dreamfactory; break;
            case "application/vnd.dynageo": $reti = MimeType::vnd_dynageo; break;
            case "application/vnd.ecowin.chart": $reti = MimeType::vnd_ecowin_chart; break;
            case "application/vnd.enliven": $reti = MimeType::vnd_enliven; break;
            case "application/vnd.epson.esf": $reti = MimeType::vnd_epson_esf; break;
            case "application/vnd.epson.msf": $reti = MimeType::vnd_epson_msf; break;
            case "application/vnd.epson.quickanime": $reti = MimeType::vnd_epson_quickanime; break;
            case "application/vnd.epson.salt": $reti = MimeType::vnd_epson_salt; break;
            case "application/vnd.epson.ssf": $reti = MimeType::vnd_epson_ssf; break;
            case "application/vnd.eszigno3+xml": $reti = MimeType::vnd_eszigno3_xml; break;
            case "application/vnd.ezpix-album": $reti = MimeType::vnd_ezpix_album; break;
            case "application/vnd.ezpix-package": $reti = MimeType::vnd_ezpix_package; break;
            case "application/vnd.fdf": $reti = MimeType::vnd_fdf; break;
            case "application/vnd.fdsn.mseed": $reti = MimeType::vnd_fdsn_mseed; break;
            case "application/vnd.fdsn.seed": $reti = MimeType::vnd_fdsn_seed; break;
            case "application/vnd.flographit": $reti = MimeType::vnd_flographit; break;
            case "application/vnd.fluxtime.clip": $reti = MimeType::vnd_fluxtime_clip; break;
            case "application/vnd.framemaker": $reti = MimeType::vnd_framemaker; break;
            case "application/vnd.frogans.fnc": $reti = MimeType::vnd_frogans_fnc; break;
            case "application/vnd.frogans.ltf": $reti = MimeType::vnd_frogans_ltf; break;
            case "application/vnd.fsc.weblaunch": $reti = MimeType::vnd_fsc_weblaunch; break;
            case "application/vnd.fujitsu.oasys": $reti = MimeType::vnd_fujitsu_oasys; break;
            case "application/vnd.fujitsu.oasys2": $reti = MimeType::vnd_fujitsu_oasys2; break;
            case "application/vnd.fujitsu.oasys3": $reti = MimeType::vnd_fujitsu_oasys3; break;
            case "application/vnd.fujitsu.oasysgp": $reti = MimeType::vnd_fujitsu_oasysgp; break;
            case "application/vnd.fujitsu.oasysprs": $reti = MimeType::vnd_fujitsu_oasysprs; break;
            case "application/vnd.fujixerox.ddd": $reti = MimeType::vnd_fujixerox_ddd; break;
            case "application/vnd.fujixerox.docuworks": $reti = MimeType::vnd_fujixerox_docuworks; break;
            case "application/vnd.fujixerox.docuworks.binder": $reti = MimeType::vnd_fujixerox_docuworks_binder; break;
            case "application/vnd.fuzzysheet": $reti = MimeType::vnd_fuzzysheet; break;
            case "application/vnd.genomatix.tuxedo": $reti = MimeType::vnd_genomatix_tuxedo; break;
            case "application/vnd.geogebra.file": $reti = MimeType::vnd_geogebra_file; break;
            case "application/vnd.geogebra.tool": $reti = MimeType::vnd_geogebra_tool; break;
            case "application/vnd.geometry-explorer": $reti = MimeType::vnd_geometry_explorer; break;
            case "application/vnd.gerber": $reti = MimeType::vnd_gerber; break;
            case "application/vnd.gmx": $reti = MimeType::vnd_gmx; break;
            case "application/vnd.google-earth.kml+xml": $reti = MimeType::vnd_google_earth_kml_xml; break;
            case "application/vnd.google-earth.kmz": $reti = MimeType::vnd_google_earth_kmz; break;
            case "application/vnd.grafeq": $reti = MimeType::vnd_grafeq; break;
            case "application/vnd.groove-account": $reti = MimeType::vnd_groove_account; break;
            case "application/vnd.groove-help": $reti = MimeType::vnd_groove_help; break;
            case "application/vnd.groove-identity-message": $reti = MimeType::vnd_groove_identity_message; break;
            case "application/vnd.groove-injector": $reti = MimeType::vnd_groove_injector; break;
            case "application/vnd.groove-tool-message": $reti = MimeType::vnd_groove_tool_message; break;
            case "application/vnd.groove-tool-template": $reti = MimeType::vnd_groove_tool_template; break;
            case "application/vnd.groove-vcard": $reti = MimeType::vnd_groove_vcard; break;
            case "application/vnd.handheld-entertainment+xml": $reti = MimeType::vnd_handheld_entertainment_xml; break;
            case "application/vnd.hbci": $reti = MimeType::vnd_hbci; break;
            case "application/vnd.hhe.lesson-player": $reti = MimeType::vnd_hhe_lesson_player; break;
            case "application/vnd.hp-hpgl": $reti = MimeType::vnd_hp_hpgl; break;
            case "application/vnd.hp-hpid": $reti = MimeType::vnd_hp_hpid; break;
            case "application/vnd.hp-hps": $reti = MimeType::vnd_hp_hps; break;
            case "application/vnd.hp-jlyt": $reti = MimeType::vnd_hp_jlyt; break;
            case "application/vnd.hp-pcl": $reti = MimeType::vnd_hp_pcl; break;
            case "application/vnd.hp-pclxl": $reti = MimeType::vnd_hp_pclxl; break;
            case "application/vnd.hydrostatix.sof-data": $reti = MimeType::vnd_hydrostatix_sof_data; break;
            case "application/vnd.hzn-3d-crossword": $reti = MimeType::vnd_hzn_3d_crossword; break;
            case "application/vnd.ibm.minipay": $reti = MimeType::vnd_ibm_minipay; break;
            case "application/vnd.ibm.modcap": $reti = MimeType::vnd_ibm_modcap; break;
            case "application/vnd.ibm.rights-management": $reti = MimeType::vnd_ibm_rights_management; break;
            case "application/vnd.ibm.secure-container": $reti = MimeType::vnd_ibm_secure_container; break;
            case "application/vnd.iccprofile": $reti = MimeType::vnd_iccprofile; break;
            case "application/vnd.igloader": $reti = MimeType::vnd_igloader; break;
            case "application/vnd.immervision-ivp": $reti = MimeType::vnd_immervision_ivp; break;
            case "application/vnd.immervision-ivu": $reti = MimeType::vnd_immervision_ivu; break;
            case "application/vnd.intercon.formnet": $reti = MimeType::vnd_intercon_formnet; break;
            case "application/vnd.intu.qbo": $reti = MimeType::vnd_intu_qbo; break;
            case "application/vnd.intu.qfx": $reti = MimeType::vnd_intu_qfx; break;
            case "application/vnd.ipunplugged.rcprofile": $reti = MimeType::vnd_ipunplugged_rcprofile; break;
            case "application/vnd.irepository.package+xml": $reti = MimeType::vnd_irepository_package_xml; break;
            case "application/vnd.is-xpr": $reti = MimeType::vnd_is_xpr; break;
            case "application/vnd.jam": $reti = MimeType::vnd_jam; break;
            case "application/vnd.jcp.javame.midlet-rms": $reti = MimeType::vnd_jcp_javame_midlet_rms; break;
            case "application/vnd.jisp": $reti = MimeType::vnd_jisp; break;
            case "application/vnd.joost.joda-archive": $reti = MimeType::vnd_joost_joda_archive; break;
            case "application/vnd.kahootz": $reti = MimeType::vnd_kahootz; break;
            case "application/vnd.kde.karbon": $reti = MimeType::vnd_kde_karbon; break;
            case "application/vnd.kde.kchart": $reti = MimeType::vnd_kde_kchart; break;
            case "application/vnd.kde.kformula": $reti = MimeType::vnd_kde_kformula; break;
            case "application/vnd.kde.kivio": $reti = MimeType::vnd_kde_kivio; break;
            case "application/vnd.kde.kontour": $reti = MimeType::vnd_kde_kontour; break;
            case "application/vnd.kde.kpresenter": $reti = MimeType::vnd_kde_kpresenter; break;
            case "application/vnd.kde.kspread": $reti = MimeType::vnd_kde_kspread; break;
            case "application/vnd.kde.kword": $reti = MimeType::vnd_kde_kword; break;
            case "application/vnd.kenameaapp": $reti = MimeType::vnd_kenameaapp; break;
            case "application/vnd.kidspiration": $reti = MimeType::vnd_kidspiration; break;
            case "application/vnd.kinar": $reti = MimeType::vnd_kinar; break;
            case "application/vnd.koan": $reti = MimeType::vnd_koan; break;
            case "application/vnd.kodak-descriptor": $reti = MimeType::vnd_kodak_descriptor; break;
            case "application/vnd.llamagraphics.life-balance.desktop": $reti = MimeType::vnd_llamagraphics_life_balance_desktop; break;
            case "application/vnd.llamagraphics.life-balance.exchange+xml": $reti = MimeType::vnd_llamagraphics_life_balance_exchange_xml; break;
            case "application/vnd.lotus-1-2-3": $reti = MimeType::vnd_lotus_1_2_3; break;
            case "application/vnd.lotus-approach": $reti = MimeType::vnd_lotus_approach; break;
            case "application/vnd.lotus-freelance": $reti = MimeType::vnd_lotus_freelance; break;
            case "application/vnd.lotus-notes": $reti = MimeType::vnd_lotus_notes; break;
            case "application/vnd.lotus-organizer": $reti = MimeType::vnd_lotus_organizer; break;
            case "application/vnd.lotus-screencam": $reti = MimeType::vnd_lotus_screencam; break;
            case "application/vnd.lotus-wordpro": $reti = MimeType::vnd_lotus_wordpro; break;
            case "application/vnd.macports.portpkg": $reti = MimeType::vnd_macports_portpkg; break;
            case "application/vnd.mcd": $reti = MimeType::vnd_mcd; break;
            case "application/vnd.medcalcdata": $reti = MimeType::vnd_medcalcdata; break;
            case "application/vnd.mediastation.cdkey": $reti = MimeType::vnd_mediastation_cdkey; break;
            case "application/vnd.mfer": $reti = MimeType::vnd_mfer; break;
            case "application/vnd.mfmp": $reti = MimeType::vnd_mfmp; break;
            case "application/vnd.micrografx.flo": $reti = MimeType::vnd_micrografx_flo; break;
            case "application/vnd.micrografx.igx": $reti = MimeType::vnd_micrografx_igx; break;
            case "application/vnd.mif": $reti = MimeType::vnd_mif; break;
            case "application/vnd.mobius.daf": $reti = MimeType::vnd_mobius_daf; break;
            case "application/vnd.mobius.dis": $reti = MimeType::vnd_mobius_dis; break;
            case "application/vnd.mobius.mbk": $reti = MimeType::vnd_mobius_mbk; break;
            case "application/vnd.mobius.mqy": $reti = MimeType::vnd_mobius_mqy; break;
            case "application/vnd.mobius.msl": $reti = MimeType::vnd_mobius_msl; break;
            case "application/vnd.mobius.plc": $reti = MimeType::vnd_mobius_plc; break;
            case "application/vnd.mobius.txf": $reti = MimeType::vnd_mobius_txf; break;
            case "application/vnd.mophun.application": $reti = MimeType::vnd_mophun_application; break;
            case "application/vnd.mophun.certificate": $reti = MimeType::vnd_mophun_certificate; break;
            case "application/vnd.mozilla.xul+xml": $reti = MimeType::vnd_mozilla_xul_xml; break;
            case "application/vnd.ms-artgalry": $reti = MimeType::vnd_ms_artgalry; break;
            case "application/vnd.ms-cab-compressed": $reti = MimeType::vnd_ms_cab_compressed; break;
            case "application/vnd.ms-excel": $reti = MimeType::vnd_ms_excel; break;
            case "application/vnd.ms-excel.addin.macroenabled.12": $reti = MimeType::vnd_ms_excel_addin_macroenabled_12; break;
            case "application/vnd.ms-excel.sheet.binary.macroenabled.12": $reti = MimeType::vnd_ms_excel_sheet_binary_macroenabled_12; break;
            case "application/vnd.ms-excel.sheet.macroenabled.12": $reti = MimeType::vnd_ms_excel_sheet_macroenabled_12; break;
            case "application/vnd.ms-excel.template.macroenabled.12": $reti = MimeType::vnd_ms_excel_template_macroenabled_12; break;
            case "application/vnd.ms-fontobject": $reti = MimeType::vnd_ms_fontobject; break;
            case "application/vnd.ms-htmlhelp": $reti = MimeType::vnd_ms_htmlhelp; break;
            case "application/vnd.ms-ims": $reti = MimeType::vnd_ms_ims; break;
            case "application/vnd.ms-lrm": $reti = MimeType::vnd_ms_lrm; break;
            case "application/vnd.ms-pki.seccat": $reti = MimeType::vnd_ms_pki_seccat; break;
            case "application/vnd.ms-pki.stl": $reti = MimeType::vnd_ms_pki_stl; break;
            case "application/vnd.ms-powerpoint": $reti = MimeType::vnd_ms_powerpoint; break;
            case "application/vnd.ms-powerpoint.addin.macroenabled.12": $reti = MimeType::vnd_ms_powerpoint_addin_macroenabled_12; break;
            case "application/vnd.ms-powerpoint.presentation.macroenabled.12": $reti = MimeType::vnd_ms_powerpoint_presentation_macroenabled_12; break;
            case "application/vnd.ms-powerpoint.slide.macroenabled.12": $reti = MimeType::vnd_ms_powerpoint_slide_macroenabled_12; break;
            case "application/vnd.ms-powerpoint.slideshow.macroenabled.12": $reti = MimeType::vnd_ms_powerpoint_slideshow_macroenabled_12; break;
            case "application/vnd.ms-powerpoint.template.macroenabled.12": $reti = MimeType::vnd_ms_powerpoint_template_macroenabled_12; break;
            case "application/vnd.ms-project": $reti = MimeType::vnd_ms_project; break;
            case "application/vnd.ms-word.document.macroenabled.12": $reti = MimeType::vnd_ms_word_document_macroenabled_12; break;
            case "application/vnd.ms-word.template.macroenabled.12": $reti = MimeType::vnd_ms_word_template_macroenabled_12; break;
            case "application/vnd.ms-works": $reti = MimeType::vnd_ms_works; break;
            case "application/vnd.ms-wpl": $reti = MimeType::vnd_ms_wpl; break;
            case "application/vnd.ms-xpsdocument": $reti = MimeType::vnd_ms_xpsdocument; break;
            case "application/vnd.mseq": $reti = MimeType::vnd_mseq; break;
            case "application/vnd.musician": $reti = MimeType::vnd_musician; break;
            case "application/vnd.muvee.style": $reti = MimeType::vnd_muvee_style; break;
            case "application/vnd.neurolanguage.nlu": $reti = MimeType::vnd_neurolanguage_nlu; break;
            case "application/vnd.noblenet-directory": $reti = MimeType::vnd_noblenet_directory; break;
            case "application/vnd.noblenet-sealer": $reti = MimeType::vnd_noblenet_sealer; break;
            case "application/vnd.noblenet-web": $reti = MimeType::vnd_noblenet_web; break;
            case "application/vnd.nokia.n-gage.data": $reti = MimeType::vnd_nokia_n_gage_data; break;
            case "application/vnd.nokia.n-gage.symbian.install": $reti = MimeType::vnd_nokia_n_gage_symbian_install; break;
            case "application/vnd.nokia.radio-preset": $reti = MimeType::vnd_nokia_radio_preset; break;
            case "application/vnd.nokia.radio-presets": $reti = MimeType::vnd_nokia_radio_presets; break;
            case "application/vnd.novadigm.edm": $reti = MimeType::vnd_novadigm_edm; break;
            case "application/vnd.novadigm.edx": $reti = MimeType::vnd_novadigm_edx; break;
            case "application/vnd.novadigm.ext": $reti = MimeType::vnd_novadigm_ext; break;
            case "application/vnd.oasis.opendocument.chart": $reti = MimeType::vnd_oasis_opendocument_chart; break;
            case "application/vnd.oasis.opendocument.chart-template": $reti = MimeType::vnd_oasis_opendocument_chart_template; break;
            case "application/vnd.oasis.opendocument.database": $reti = MimeType::vnd_oasis_opendocument_database; break;
            case "application/vnd.oasis.opendocument.formula": $reti = MimeType::vnd_oasis_opendocument_formula; break;
            case "application/vnd.oasis.opendocument.formula-template": $reti = MimeType::vnd_oasis_opendocument_formula_template; break;
            case "application/vnd.oasis.opendocument.graphics": $reti = MimeType::vnd_oasis_opendocument_graphics; break;
            case "application/vnd.oasis.opendocument.graphics-template": $reti = MimeType::vnd_oasis_opendocument_graphics_template; break;
            case "application/vnd.oasis.opendocument.image": $reti = MimeType::vnd_oasis_opendocument_image; break;
            case "application/vnd.oasis.opendocument.image-template": $reti = MimeType::vnd_oasis_opendocument_image_template; break;
            case "application/vnd.oasis.opendocument.presentation": $reti = MimeType::vnd_oasis_opendocument_presentation; break;
            case "application/vnd.oasis.opendocument.presentation-template": $reti = MimeType::vnd_oasis_opendocument_presentation_template; break;
            case "application/vnd.oasis.opendocument.spreadsheet": $reti = MimeType::vnd_oasis_opendocument_spreadsheet; break;
            case "application/vnd.oasis.opendocument.spreadsheet-template": $reti = MimeType::vnd_oasis_opendocument_spreadsheet_template; break;
            case "application/vnd.oasis.opendocument.text": $reti = MimeType::vnd_oasis_opendocument_text; break;
            case "application/vnd.oasis.opendocument.text-master": $reti = MimeType::vnd_oasis_opendocument_text_master; break;
            case "application/vnd.oasis.opendocument.text-template": $reti = MimeType::vnd_oasis_opendocument_text_template; break;
            case "application/vnd.oasis.opendocument.text-web": $reti = MimeType::vnd_oasis_opendocument_text_web; break;
            case "application/vnd.olpc-sugar": $reti = MimeType::vnd_olpc_sugar; break;
            case "application/vnd.oma.dd2+xml": $reti = MimeType::vnd_oma_dd2_xml; break;
            case "application/vnd.openofficeorg.extension": $reti = MimeType::vnd_openofficeorg_extension; break;
            case "application/vnd.openxmlformats-officedocument.presentationml.presentation": $reti = MimeType::vnd_openxmlformats_officedocument_presentationml_presentation; break;
            case "application/vnd.openxmlformats-officedocument.presentationml.slide": $reti = MimeType::vnd_openxmlformats_officedocument_presentationml_slide; break;
            case "application/vnd.openxmlformats-officedocument.presentationml.slideshow": $reti = MimeType::vnd_openxmlformats_officedocument_presentationml_slideshow; break;
            case "application/vnd.openxmlformats-officedocument.presentationml.template": $reti = MimeType::vnd_openxmlformats_officedocument_presentationml_template; break;
            case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet": $reti = MimeType::vnd_openxmlformats_officedocument_spreadsheetml_sheet; break;
            case "application/vnd.openxmlformats-officedocument.spreadsheetml.template": $reti = MimeType::vnd_openxmlformats_officedocument_spreadsheetml_template; break;
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document": $reti = MimeType::vnd_openxmlformats_officedocument_wordprocessingml_document; break;
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.template": $reti = MimeType::vnd_openxmlformats_officedocument_wordprocessingml_template; break;
            case "application/vnd.osgi.dp": $reti = MimeType::vnd_osgi_dp; break;
            case "application/vnd.palm": $reti = MimeType::vnd_palm; break;
            case "application/vnd.pg.format": $reti = MimeType::vnd_pg_format; break;
            case "application/vnd.pg.osasli": $reti = MimeType::vnd_pg_osasli; break;
            case "application/vnd.picsel": $reti = MimeType::vnd_picsel; break;
            case "application/vnd.pocketlearn": $reti = MimeType::vnd_pocketlearn; break;
            case "application/vnd.powerbuilder6": $reti = MimeType::vnd_powerbuilder6; break;
            case "application/vnd.previewsystems.box": $reti = MimeType::vnd_previewsystems_box; break;
            case "application/vnd.proteus.magazine": $reti = MimeType::vnd_proteus_magazine; break;
            case "application/vnd.publishare-delta-tree": $reti = MimeType::vnd_publishare_delta_tree; break;
            case "application/vnd.pvi.ptid1": $reti = MimeType::vnd_pvi_ptid1; break;
            case "application/vnd.quark.quarkxpress": $reti = MimeType::vnd_quark_quarkxpress; break;
            case "application/vnd.rar": $reti = MimeType::vnd_rar; break;
            case "application/vnd.recordare.musicxml": $reti = MimeType::vnd_recordare_musicxml; break;
            case "application/vnd.recordare.musicxml+xml": $reti = MimeType::vnd_recordare_musicxml_xml; break;
            case "application/vnd.rim.cod": $reti = MimeType::vnd_rim_cod; break;
            case "application/vnd.rn-realmedia": $reti = MimeType::vnd_rn_realmedia; break;
            case "application/vnd.route66.link66+xml": $reti = MimeType::vnd_route66_link66_xml; break;
            case "application/vnd.seemail": $reti = MimeType::vnd_seemail; break;
            case "application/vnd.sema": $reti = MimeType::vnd_sema; break;
            case "application/vnd.semd": $reti = MimeType::vnd_semd; break;
            case "application/vnd.semf": $reti = MimeType::vnd_semf; break;
            case "application/vnd.shana.informed.formdata": $reti = MimeType::vnd_shana_informed_formdata; break;
            case "application/vnd.shana.informed.formtemplate": $reti = MimeType::vnd_shana_informed_formtemplate; break;
            case "application/vnd.shana.informed.interchange": $reti = MimeType::vnd_shana_informed_interchange; break;
            case "application/vnd.shana.informed.package": $reti = MimeType::vnd_shana_informed_package; break;
            case "application/vnd.simtech-mindmapper": $reti = MimeType::vnd_simtech_mindmapper; break;
            case "application/vnd.smaf": $reti = MimeType::vnd_smaf; break;
            case "application/vnd.smart.teacher": $reti = MimeType::vnd_smart_teacher; break;
            case "application/vnd.solent.sdkm+xml": $reti = MimeType::vnd_solent_sdkm_xml; break;
            case "application/vnd.spotfire.dxp": $reti = MimeType::vnd_spotfire_dxp; break;
            case "application/vnd.spotfire.sfs": $reti = MimeType::vnd_spotfire_sfs; break;
            case "application/vnd.sqlite3": $reti = MimeType::vnd_sqlite3; break;
            case "application/vnd.stardivision.calc": $reti = MimeType::vnd_stardivision_calc; break;
            case "application/vnd.stardivision.draw": $reti = MimeType::vnd_stardivision_draw; break;
            case "application/vnd.stardivision.impress": $reti = MimeType::vnd_stardivision_impress; break;
            case "application/vnd.stardivision.math": $reti = MimeType::vnd_stardivision_math; break;
            case "application/vnd.stardivision.writer": $reti = MimeType::vnd_stardivision_writer; break;
            case "application/vnd.stardivision.writer-global": $reti = MimeType::vnd_stardivision_writer_global; break;
            case "application/vnd.sun.xml.calc": $reti = MimeType::vnd_sun_xml_calc; break;
            case "application/vnd.sun.xml.calc.template": $reti = MimeType::vnd_sun_xml_calc_template; break;
            case "application/vnd.sun.xml.draw": $reti = MimeType::vnd_sun_xml_draw; break;
            case "application/vnd.sun.xml.draw.template": $reti = MimeType::vnd_sun_xml_draw_template; break;
            case "application/vnd.sun.xml.impress": $reti = MimeType::vnd_sun_xml_impress; break;
            case "application/vnd.sun.xml.impress.template": $reti = MimeType::vnd_sun_xml_impress_template; break;
            case "application/vnd.sun.xml.math": $reti = MimeType::vnd_sun_xml_math; break;
            case "application/vnd.sun.xml.writer": $reti = MimeType::vnd_sun_xml_writer; break;
            case "application/vnd.sun.xml.writer.global": $reti = MimeType::vnd_sun_xml_writer_global; break;
            case "application/vnd.sun.xml.writer.template": $reti = MimeType::vnd_sun_xml_writer_template; break;
            case "application/vnd.sus-calendar": $reti = MimeType::vnd_sus_calendar; break;
            case "application/vnd.svd": $reti = MimeType::vnd_svd; break;
            case "application/vnd.symbian.install": $reti = MimeType::vnd_symbian_install; break;
            case "application/vnd.syncml.dm+wbxml": $reti = MimeType::vnd_syncml_dm_wbxml; break;
            case "application/vnd.syncml.dm+xml": $reti = MimeType::vnd_syncml_dm_xml; break;
            case "application/vnd.syncml+xml": $reti = MimeType::vnd_syncml_xml; break;
            case "application/vnd.tao.intent-module-archive": $reti = MimeType::vnd_tao_intent_module_archive; break;
            case "application/vnd.tmobile-livetv": $reti = MimeType::vnd_tmobile_livetv; break;
            case "application/vnd.trid.tpt": $reti = MimeType::vnd_trid_tpt; break;
            case "application/vnd.triscape.mxs": $reti = MimeType::vnd_triscape_mxs; break;
            case "application/vnd.trueapp": $reti = MimeType::vnd_trueapp; break;
            case "application/vnd.ufdl": $reti = MimeType::vnd_ufdl; break;
            case "application/vnd.uiq.theme": $reti = MimeType::vnd_uiq_theme; break;
            case "application/vnd.umajin": $reti = MimeType::vnd_umajin; break;
            case "application/vnd.unity": $reti = MimeType::vnd_unity; break;
            case "application/vnd.uoml+xml": $reti = MimeType::vnd_uoml_xml; break;
            case "application/vnd.vcx": $reti = MimeType::vnd_vcx; break;
            case "application/vnd.visio": $reti = MimeType::vnd_visio; break;
            case "application/vnd.visionary": $reti = MimeType::vnd_visionary; break;
            case "application/vnd.vsf": $reti = MimeType::vnd_vsf; break;
            case "application/vnd.wap.sic": $reti = MimeType::vnd_wap_sic; break;
            case "application/vnd.wap.slc": $reti = MimeType::vnd_wap_slc; break;
            case "application/vnd.wap.wbxml": $reti = MimeType::vnd_wap_wbxml; break;
            case "application/vnd.wap.wmlc": $reti = MimeType::vnd_wap_wmlc; break;
            case "application/vnd.wap.wmlscriptc": $reti = MimeType::vnd_wap_wmlscriptc; break;
            case "application/vnd.webturbo": $reti = MimeType::vnd_webturbo; break;
            case "application/vnd.wordperfect": $reti = MimeType::vnd_wordperfect; break;
            case "application/vnd.wqd": $reti = MimeType::vnd_wqd; break;
            case "application/vnd.wt.stf": $reti = MimeType::vnd_wt_stf; break;
            case "application/vnd.xara": $reti = MimeType::vnd_xara; break;
            case "application/vnd.xfdl": $reti = MimeType::vnd_xfdl; break;
            case "application/vnd.yamaha.hv-dic": $reti = MimeType::vnd_yamaha_hv_dic; break;
            case "application/vnd.yamaha.hv-script": $reti = MimeType::vnd_yamaha_hv_script; break;
            case "application/vnd.yamaha.hv-voice": $reti = MimeType::vnd_yamaha_hv_voice; break;
            case "application/vnd.yamaha.openscoreformat": $reti = MimeType::vnd_yamaha_openscoreformat; break;
            case "application/vnd.yamaha.openscoreformat.osfpvg+xml": $reti = MimeType::vnd_yamaha_openscoreformat_osfpvg_xml; break;
            case "application/vnd.yamaha.smaf-audio": $reti = MimeType::vnd_yamaha_smaf_audio; break;
            case "application/vnd.yamaha.smaf-phrase": $reti = MimeType::vnd_yamaha_smaf_phrase; break;
            case "application/vnd.yellowriver-custom-menu": $reti = MimeType::vnd_yellowriver_custom_menu; break;
            case "application/vnd.zul": $reti = MimeType::vnd_zul; break;
            case "application/vnd.zzazz.deck+xml": $reti = MimeType::vnd_zzazz_deck_xml; break;
            case "application/voicexml+xml": $reti = MimeType::voicexml_xml; break;
            case "application/wasm": $reti = MimeType::wasm; break;
            case "application/winhlp": $reti = MimeType::winhlp; break;
            case "application/wsdl+xml": $reti = MimeType::wsdl_xml; break;
            case "application/wspolicy+xml": $reti = MimeType::wspolicy_xml; break;
            case "application/x-7z-compressed": $reti = MimeType::x_7z_compressed; break;
            case "application/x-abiword": $reti = MimeType::x_abiword; break;
            case "application/x-ace-compressed": $reti = MimeType::x_ace_compressed; break;
            case "application/x-authorware-bin": $reti = MimeType::x_authorware_bin; break;
            case "application/x-authorware-map": $reti = MimeType::x_authorware_map; break;
            case "application/x-authorware-seg": $reti = MimeType::x_authorware_seg; break;
            case "application/x-bcpio": $reti = MimeType::x_bcpio; break;
            case "application/x-bittorrent": $reti = MimeType::x_bittorrent; break;
            case "application/x-bzip": $reti = MimeType::x_bzip; break;
            case "application/x-bzip2": $reti = MimeType::x_bzip2; break;
            case "application/x-cdlink": $reti = MimeType::x_cdlink; break;
            case "application/x-chat": $reti = MimeType::x_chat; break;
            case "application/x-chess-pgn": $reti = MimeType::x_chess_pgn; break;
            case "application/x-cpio": $reti = MimeType::x_cpio; break;
            case "application/x-csh": $reti = MimeType::x_csh; break;
            case "application/x-debian-package": $reti = MimeType::x_debian_package; break;
            case "application/x-director": $reti = MimeType::x_director; break;
            case "application/x-doom": $reti = MimeType::x_doom; break;
            case "application/x-dtbncx+xml": $reti = MimeType::x_dtbncx_xml; break;
            case "application/x-dtbook+xml": $reti = MimeType::x_dtbook_xml; break;
            case "application/x-dtbresource+xml": $reti = MimeType::x_dtbresource_xml; break;
            case "application/x-dvi": $reti = MimeType::x_dvi; break;
            case "application/x-font-bdf": $reti = MimeType::x_font_bdf; break;
            case "application/x-font-ghostscript": $reti = MimeType::x_font_ghostscript; break;
            case "application/x-font-linux-psf": $reti = MimeType::x_font_linux_psf; break;
            case "application/x-font-otf": $reti = MimeType::x_font_otf; break;
            case "application/x-font-pcf": $reti = MimeType::x_font_pcf; break;
            case "application/x-font-snf": $reti = MimeType::x_font_snf; break;
            case "application/x-font-ttf": $reti = MimeType::x_font_ttf; break;
            case "application/x-font-type1": $reti = MimeType::x_font_type1; break;
            case "application/x-futuresplash": $reti = MimeType::x_futuresplash; break;
            case "application/x-gnumeric": $reti = MimeType::x_gnumeric; break;
            case "application/x-gtar": $reti = MimeType::x_gtar; break;
            case "application/x-gzip": $reti = MimeType::x_gzip; break;
            case "application/x-hdf": $reti = MimeType::x_hdf; break;
            case "application/x-iso9660-image": $reti = MimeType::x_iso9660_image; break;
            case "application/x-java-jnlp-file": $reti = MimeType::x_java_jnlp_file; break;
            case "application/x-killustrator": $reti = MimeType::x_killustrator; break;
            case "application/x-krita": $reti = MimeType::x_krita; break;
            case "application/x-latex": $reti = MimeType::x_latex; break;
            case "application/x-mobipocket-ebook": $reti = MimeType::x_mobipocket_ebook; break;
            case "application/x-ms-application": $reti = MimeType::x_ms_application; break;
            case "application/x-ms-wmd": $reti = MimeType::x_ms_wmd; break;
            case "application/x-ms-wmz": $reti = MimeType::x_ms_wmz; break;
            case "application/x-ms-xbap": $reti = MimeType::x_ms_xbap; break;
            case "application/x-msaccess": $reti = MimeType::x_msaccess; break;
            case "application/x-msbinder": $reti = MimeType::x_msbinder; break;
            case "application/x-mscardfile": $reti = MimeType::x_mscardfile; break;
            case "application/x-msclip": $reti = MimeType::x_msclip; break;
            case "application/x-msdownload": $reti = MimeType::x_msdownload; break;
            case "application/x-msmediaview": $reti = MimeType::x_msmediaview; break;
            case "application/x-msmetafile": $reti = MimeType::x_msmetafile; break;
            case "application/x-msmoney": $reti = MimeType::x_msmoney; break;
            case "application/x-mspublisher": $reti = MimeType::x_mspublisher; break;
            case "application/x-msschedule": $reti = MimeType::x_msschedule; break;
            case "application/x-msterminal": $reti = MimeType::x_msterminal; break;
            case "application/x-mswrite": $reti = MimeType::x_mswrite; break;
            case "application/x-netcdf": $reti = MimeType::x_netcdf; break;
            case "application/x-perl": $reti = MimeType::x_perl; break;
            case "application/x-pkcs12": $reti = MimeType::x_pkcs12; break;
            case "application/x-pkcs7-certificates": $reti = MimeType::x_pkcs7_certificates; break;
            case "application/x-pkcs7-certreqresp": $reti = MimeType::x_pkcs7_certreqresp; break;
            case "application/x-python-code": $reti = MimeType::x_python_code; break;
            case "application/x-rar-compressed": $reti = MimeType::x_rar_compressed; break;
            case "application/x-redhat-package-manager": $reti = MimeType::x_redhat_package_manager; break;
            case "application/x-rpm": $reti = MimeType::x_rpm; break;
            case "application/x-sh": $reti = MimeType::x_sh; break;
            case "application/x-shar": $reti = MimeType::x_shar; break;
            case "application/x-shellscript": $reti = MimeType::x_shellscript; break;
            case "application/x-shockwave-flash": $reti = MimeType::x_shockwave_flash; break;
            case "application/x-silverlight-app": $reti = MimeType::x_silverlight_app; break;
            case "application/x-sqlite3": $reti = MimeType::x_sqlite3; break;
            case "application/x-stuffit": $reti = MimeType::x_stuffit; break;
            case "application/x-stuffitx": $reti = MimeType::x_stuffitx; break;
            case "application/x-sv4cpio": $reti = MimeType::x_sv4cpio; break;
            case "application/x-sv4crc": $reti = MimeType::x_sv4crc; break;
            case "application/x-tar": $reti = MimeType::x_tar; break;
            case "application/x-tcl": $reti = MimeType::x_tcl; break;
            case "application/x-tex": $reti = MimeType::x_tex; break;
            case "application/x-tex-tfm": $reti = MimeType::x_tex_tfm; break;
            case "application/x-texinfo": $reti = MimeType::x_texinfo; break;
            case "application/x-trash": $reti = MimeType::x_trash; break;
            case "application/x-ustar": $reti = MimeType::x_ustar; break;
            case "application/x-wais-source": $reti = MimeType::x_wais_source; break;
            case "application/x-x509-ca-cert": $reti = MimeType::x_x509_ca_cert; break;
            case "application/x-xfig": $reti = MimeType::x_xfig; break;
            case "application/x-xpinstall": $reti = MimeType::x_xpinstall; break;
            case "application/x-zip-compressed": $reti = MimeType::x_zip_compressed; break;
            case "application/xenc+xml": $reti = MimeType::xenc_xml; break;
            case "application/xhtml+xml": $reti = MimeType::xhtml_xml; break;
            case "application/xml": $reti = MimeType::xml; break;
            case "application/xml-dtd": $reti = MimeType::xml_dtd; break;
            case "application/xop+xml": $reti = MimeType::xop_xml; break;
            case "application/xslt+xml": $reti = MimeType::xslt_xml; break;
            case "application/xspf+xml": $reti = MimeType::xspf_xml; break;
            case "application/xv+xml": $reti = MimeType::xv_xml; break;
            case "application/yaml": $reti = MimeType::yaml; break;
            case "application/zip": $reti = MimeType::zip; break;
            case "application/zip-compressed": $reti = MimeType::zip_compressed; break;
            case "audio/3gpp2": $reti = MimeType::_3gpp2; break;
            case "audio/aac": $reti = MimeType::aac; break;
            case "audio/aacp": $reti = MimeType::aacp; break;
            case "audio/adpcm": $reti = MimeType::adpcm; break;
            case "audio/aiff": $reti = MimeType::aiff; break;
            case "audio/basic": $reti = MimeType::basic; break;
            case "audio/flac": $reti = MimeType::flac; break;
            case "audio/midi": $reti = MimeType::midi; break;
            case "audio/mp4": $reti = MimeType::mp4; break;
            case "audio/mp4a-latm": $reti = MimeType::mp4a_latm; break;
            case "audio/mpeg": $reti = MimeType::mpeg; break;
            case "audio/ogg": $reti = MimeType::ogg; break;
            case "audio/opus": $reti = MimeType::opus; break;
            case "audio/vnd.digital-winds": $reti = MimeType::vnd_digital_winds; break;
            case "audio/vnd.dts": $reti = MimeType::vnd_dts; break;
            case "audio/vnd.dts.hd": $reti = MimeType::vnd_dts_hd; break;
            case "audio/vnd.lucent.voice": $reti = MimeType::vnd_lucent_voice; break;
            case "audio/vnd.ms-playready.media.pya": $reti = MimeType::vnd_ms_playready_media_pya; break;
            case "audio/vnd.nuera.ecelp4800": $reti = MimeType::vnd_nuera_ecelp4800; break;
            case "audio/vnd.nuera.ecelp7470": $reti = MimeType::vnd_nuera_ecelp7470; break;
            case "audio/vnd.nuera.ecelp9600": $reti = MimeType::vnd_nuera_ecelp9600; break;
            case "audio/vnd.wav": $reti = MimeType::vnd_wav; break;
            case "audio/webm": $reti = MimeType::webm; break;
            case "audio/x-matroska": $reti = MimeType::x_matroska; break;
            case "audio/x-mpegurl": $reti = MimeType::x_mpegurl; break;
            case "audio/x-ms-wax": $reti = MimeType::x_ms_wax; break;
            case "audio/x-ms-wma": $reti = MimeType::x_ms_wma; break;
            case "audio/x-pn-realaudio": $reti = MimeType::x_pn_realaudio; break;
            case "audio/x-pn-realaudio-plugin": $reti = MimeType::x_pn_realaudio_plugin; break;
            case "chemical/x-cdx": $reti = MimeType::x_cdx; break;
            case "chemical/x-cif": $reti = MimeType::x_cif; break;
            case "chemical/x-cmdf": $reti = MimeType::x_cmdf; break;
            case "chemical/x-cml": $reti = MimeType::x_cml; break;
            case "chemical/x-csml": $reti = MimeType::x_csml; break;
            case "chemical/x-xyz": $reti = MimeType::x_xyz; break;
            case "font/otf": $reti = MimeType::otf; break;
            case "font/woff": $reti = MimeType::woff; break;
            case "font/woff2": $reti = MimeType::woff2; break;
            case "gcode": $reti = MimeType::gcode; break;
            case "image/avif": $reti = MimeType::avif; break;
            case "image/bmp": $reti = MimeType::bmp; break;
            case "image/cgm": $reti = MimeType::cgm; break;
            case "image/g3fax": $reti = MimeType::g3fax; break;
            case "image/gif": $reti = MimeType::gif; break;
            case "image/heic": $reti = MimeType::heic; break;
            case "image/ief": $reti = MimeType::ief; break;
            case "image/jpeg": $reti = MimeType::jpeg; break;
            case "image/pjpeg": $reti = MimeType::pjpeg; break;
            case "image/png": $reti = MimeType::png; break;
            case "image/prs.btif": $reti = MimeType::prs_btif; break;
            case "image/svg+xml": $reti = MimeType::svg_xml; break;
            case "image/tiff": $reti = MimeType::tiff; break;
            case "image/vnd.adobe.photoshop": $reti = MimeType::vnd_adobe_photoshop; break;
            case "image/vnd.djvu": $reti = MimeType::vnd_djvu; break;
            case "image/vnd.dwg": $reti = MimeType::vnd_dwg; break;
            case "image/vnd.dxf": $reti = MimeType::vnd_dxf; break;
            case "image/vnd.fastbidsheet": $reti = MimeType::vnd_fastbidsheet; break;
            case "image/vnd.fpx": $reti = MimeType::vnd_fpx; break;
            case "image/vnd.fst": $reti = MimeType::vnd_fst; break;
            case "image/vnd.fujixerox.edmics-mmr": $reti = MimeType::vnd_fujixerox_edmics_mmr; break;
            case "image/vnd.fujixerox.edmics-rlc": $reti = MimeType::vnd_fujixerox_edmics_rlc; break;
            case "image/vnd.ms-modi": $reti = MimeType::vnd_ms_modi; break;
            case "image/vnd.net-fpx": $reti = MimeType::vnd_net_fpx; break;
            case "image/vnd.wap.wbmp": $reti = MimeType::vnd_wap_wbmp; break;
            case "image/vnd.xiff": $reti = MimeType::vnd_xiff; break;
            case "image/webp": $reti = MimeType::webp; break;
            case "image/x-adobe-dng": $reti = MimeType::x_adobe_dng; break;
            case "image/x-canon-cr2": $reti = MimeType::x_canon_cr2; break;
            case "image/x-canon-crw": $reti = MimeType::x_canon_crw; break;
            case "image/x-cmu-raster": $reti = MimeType::x_cmu_raster; break;
            case "image/x-cmx": $reti = MimeType::x_cmx; break;
            case "image/x-epson-erf": $reti = MimeType::x_epson_erf; break;
            case "image/x-freehand": $reti = MimeType::x_freehand; break;
            case "image/x-fuji-raf": $reti = MimeType::x_fuji_raf; break;
            case "image/x-icns": $reti = MimeType::x_icns; break;
            case "image/x-icon": $reti = MimeType::x_icon; break;
            case "image/x-kodak-dcr": $reti = MimeType::x_kodak_dcr; break;
            case "image/x-kodak-k25": $reti = MimeType::x_kodak_k25; break;
            case "image/x-kodak-kdc": $reti = MimeType::x_kodak_kdc; break;
            case "image/x-minolta-mrw": $reti = MimeType::x_minolta_mrw; break;
            case "image/x-nikon-nef": $reti = MimeType::x_nikon_nef; break;
            case "image/x-olympus-orf": $reti = MimeType::x_olympus_orf; break;
            case "image/x-panasonic-raw": $reti = MimeType::x_panasonic_raw; break;
            case "image/x-pcx": $reti = MimeType::x_pcx; break;
            case "image/x-pentax-pef": $reti = MimeType::x_pentax_pef; break;
            case "image/x-pict": $reti = MimeType::x_pict; break;
            case "image/x-portable-anymap": $reti = MimeType::x_portable_anymap; break;
            case "image/x-portable-bitmap": $reti = MimeType::x_portable_bitmap; break;
            case "image/x-portable-graymap": $reti = MimeType::x_portable_graymap; break;
            case "image/x-portable-pixmap": $reti = MimeType::x_portable_pixmap; break;
            case "image/x-rgb": $reti = MimeType::x_rgb; break;
            case "image/x-sigma-x3f": $reti = MimeType::x_sigma_x3f; break;
            case "image/x-sony-arw": $reti = MimeType::x_sony_arw; break;
            case "image/x-sony-sr2": $reti = MimeType::x_sony_sr2; break;
            case "image/x-sony-srf": $reti = MimeType::x_sony_srf; break;
            case "image/x-xbitmap": $reti = MimeType::x_xbitmap; break;
            case "image/x-xpixmap": $reti = MimeType::x_xpixmap; break;
            case "image/x-xwindowdump": $reti = MimeType::x_xwindowdump; break;
            case "message/rfc822": $reti = MimeType::rfc822; break;
            case "model/iges": $reti = MimeType::iges; break;
            case "model/mesh": $reti = MimeType::mesh; break;
            case "model/vnd.dwf": $reti = MimeType::vnd_dwf; break;
            case "model/vnd.gdl": $reti = MimeType::vnd_gdl; break;
            case "model/vnd.gtw": $reti = MimeType::vnd_gtw; break;
            case "model/vnd.mts": $reti = MimeType::vnd_mts; break;
            case "model/vnd.vtu": $reti = MimeType::vnd_vtu; break;
            case "model/vrml": $reti = MimeType::vrml; break;
            case "test/mimetype": $reti = MimeType::mimetype; break;
            case "text/calendar": $reti = MimeType::calendar; break;
            case "text/css": $reti = MimeType::css; break;
            case "text/csv": $reti = MimeType::csv; break;
            case "text/html": $reti = MimeType::html; break;
            case "text/javascript": $reti = MimeType::javascript; break;
            case "text/markdown": $reti = MimeType::markdown; break;
            case "text/mathml": $reti = MimeType::mathml; break;
            case "text/plain": $reti = MimeType::plain; break;
            case "text/prs.lines.tag": $reti = MimeType::prs_lines_tag; break;
            case "text/richtext": $reti = MimeType::richtext; break;
            case "text/sgml": $reti = MimeType::sgml; break;
            case "text/tab-separated-values": $reti = MimeType::tab_separated_values; break;
            case "text/troff": $reti = MimeType::troff; break;
            case "text/uri-list": $reti = MimeType::uri_list; break;
            case "text/vnd.curl": $reti = MimeType::vnd_curl; break;
            case "text/vnd.curl.dcurl": $reti = MimeType::vnd_curl_dcurl; break;
            case "text/vnd.curl.mcurl": $reti = MimeType::vnd_curl_mcurl; break;
            case "text/vnd.curl.scurl": $reti = MimeType::vnd_curl_scurl; break;
            case "text/vnd.fly": $reti = MimeType::vnd_fly; break;
            case "text/vnd.fmi.flexstor": $reti = MimeType::vnd_fmi_flexstor; break;
            case "text/vnd.graphviz": $reti = MimeType::vnd_graphviz; break;
            case "text/vnd.in3d.3dml": $reti = MimeType::vnd_in3d_3dml; break;
            case "text/vnd.in3d.spot": $reti = MimeType::vnd_in3d_spot; break;
            case "text/vnd.sun.j2me.app-descriptor": $reti = MimeType::vnd_sun_j2me_app_descriptor; break;
            case "text/vnd.wap.si": $reti = MimeType::vnd_wap_si; break;
            case "text/vnd.wap.sl": $reti = MimeType::vnd_wap_sl; break;
            case "text/vnd.wap.wml": $reti = MimeType::vnd_wap_wml; break;
            case "text/vnd.wap.wmlscript": $reti = MimeType::vnd_wap_wmlscript; break;
            case "text/x-asm": $reti = MimeType::x_asm; break;
            case "text/x-c": $reti = MimeType::x_c; break;
            case "text/x-fortran": $reti = MimeType::x_fortran; break;
            case "text/x-java-source": $reti = MimeType::x_java_source; break;
            case "text/x-markdown": $reti = MimeType::x_markdown; break;
            case "text/x-pascal": $reti = MimeType::x_pascal; break;
            case "text/x-python": $reti = MimeType::x_python; break;
            case "text/x-setext": $reti = MimeType::x_setext; break;
            case "text/x-uuencode": $reti = MimeType::x_uuencode; break;
            case "text/x-vcalendar": $reti = MimeType::x_vcalendar; break;
            case "text/x-vcard": $reti = MimeType::x_vcard; break;
            case "video/3gpp": $reti = MimeType::_3gpp; break;
            case "video/3gpp2": $reti = MimeType::_3gpp2; break;
            case "video/h261": $reti = MimeType::h261; break;
            case "video/h263": $reti = MimeType::h263; break;
            case "video/h264": $reti = MimeType::h264; break;
            case "video/jpeg": $reti = MimeType::jpeg; break;
            case "video/jpm": $reti = MimeType::jpm; break;
            case "video/mj2": $reti = MimeType::mj2; break;
            case "video/mp2t": $reti = MimeType::mp2t; break;
            case "video/mp4": $reti = MimeType::mp4; break;
            case "video/mpeg": $reti = MimeType::mpeg; break;
            case "video/ogg": $reti = MimeType::ogg; break;
            case "video/quicktime": $reti = MimeType::quicktime; break;
            case "video/vnd.fvt": $reti = MimeType::vnd_fvt; break;
            case "video/vnd.mpegurl": $reti = MimeType::vnd_mpegurl; break;
            case "video/vnd.ms-playready.media.pyv": $reti = MimeType::vnd_ms_playready_media_pyv; break;
            case "video/vnd.vivo": $reti = MimeType::vnd_vivo; break;
            case "video/webm": $reti = MimeType::webm; break;
            case "video/x-f4v": $reti = MimeType::x_f4v; break;
            case "video/x-fli": $reti = MimeType::x_fli; break;
            case "video/x-flv": $reti = MimeType::x_flv; break;
            case "video/x-m4v": $reti = MimeType::x_m4v; break;
            case "video/x-matroska": $reti = MimeType::x_matroska; break;
            case "video/x-ms-asf": $reti = MimeType::x_ms_asf; break;
            case "video/x-ms-wm": $reti = MimeType::x_ms_wm; break;
            case "video/x-ms-wmv": $reti = MimeType::x_ms_wmv; break;
            case "video/x-ms-wmx": $reti = MimeType::x_ms_wmx; break;
            case "video/x-ms-wvx": $reti = MimeType::x_ms_wvx; break;
            case "video/x-msvideo": $reti = MimeType::x_msvideo; break;
            case "video/x-sgi-movie": $reti = MimeType::x_sgi_movie; break;
            case "x-conference/x-cooltalk": $reti = MimeType::x_cooltalk; break;
            default: $reti = MimeType::octet_stream;
        }
        return $reti;
    }
}

?>
