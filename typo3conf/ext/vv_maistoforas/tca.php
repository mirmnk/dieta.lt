<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA["tx_vvmaistoforas_product"] = Array (
	"ctrl" => $TCA["tx_vvmaistoforas_product"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,starttime,endtime,fe_group,gr_equivalent,title,augaliniai_baltymai,augaliniai_riebalai,angliavandeniai_krakmolas,angliavandeniai_cukrus,angliavandeniai_maistines_skaidulos,na,mg,p,k,ca,fe,zn,se,j,a,d,e,b1,b2,b5,b6,b9,b12,c,kj,kcal,h,b3,vit_k,baltymai,angliavandeniai,riebalai,cholestirolis,maisto_grupe,maistoforo_sviesa,description,pictures"
	),
	"feInterface" => $TCA["tx_vvmaistoforas_product"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"starttime" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.starttime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"default" => "0",
				"checkbox" => "0"
			)
		),
		"endtime" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.endtime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0",
				"range" => Array (
					"upper" => mktime(0,0,0,12,31,2020),
					"lower" => mktime(0,0,0,date("m")-1,date("d"),date("Y"))
				)
			)
		),
		"fe_group" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.fe_group",
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("", 0),
					Array("LLL:EXT:lang/locallang_general.php:LGL.hide_at_login", -1),
					Array("LLL:EXT:lang/locallang_general.php:LGL.any_login", -2),
					Array("LLL:EXT:lang/locallang_general.php:LGL.usergroups", "--div--")
				),
				"foreign_table" => "fe_groups"
			)
		),
		"gr_equivalent" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.gr_equivalent",		
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required,trim",
			)
		),
		"augaliniai_baltymai" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.augaliniai_baltymai",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"augaliniai_riebalai" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.augaliniai_riebalai",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"angliavandeniai_krakmolas" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.angliavandeniai_krakmolas",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"angliavandeniai_cukrus" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.angliavandeniai_cukrus",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"angliavandeniai_maistines_skaidulos" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.angliavandeniai_maistines_skaidulos",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"na" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.na",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"mg" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.mg",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"p" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.p",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"k" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.k",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"ca" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.ca",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"fe" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.fe",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"zn" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.zn",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"se" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.se",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"j" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.j",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"a" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.a",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"d" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.d",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"e" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.e",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"b1" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.b1",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"b2" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.b2",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"b5" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.b5",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"b6" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.b6",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"b9" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.b9",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"b12" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.b12",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"c" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.c",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"kj" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.kj",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"kcal" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.kcal",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"h" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.h",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"b3" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.b3",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"vit_k" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.vit_k",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"baltymai" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.baltymai",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"angliavandeniai" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.angliavandeniai",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"riebalai" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.riebalai",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"cholestirolis" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.cholestirolis",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",	
				"eval" => "double2,nospace",
			)
		),
		"maisto_grupe" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maisto_grupe",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maisto_grupe.I.0", "0"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maisto_grupe.I.1", "1"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maisto_grupe.I.2", "2"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maisto_grupe.I.3", "3"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maisto_grupe.I.4", "4"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maisto_grupe.I.5", "5"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maisto_grupe.I.6", "6"),
				),
				"size" => 1,	
				"maxitems" => 1,
			)
		),
		"maistoforo_sviesa" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maistoforo_sviesa",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maistoforo_sviesa.I.0", "0", t3lib_extMgm::extRelPath("vv_maistoforas")."selicon_tx_vvmaistoforas_product_maistoforo_sviesa_0.gif"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maistoforo_sviesa.I.1", "1", t3lib_extMgm::extRelPath("vv_maistoforas")."selicon_tx_vvmaistoforas_product_maistoforo_sviesa_1.gif"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maistoforo_sviesa.I.2", "2", t3lib_extMgm::extRelPath("vv_maistoforas")."selicon_tx_vvmaistoforas_product_maistoforo_sviesa_2.gif"),
					Array("LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.maistoforo_sviesa.I.3", "3", t3lib_extMgm::extRelPath("vv_maistoforas")."selicon_tx_vvmaistoforas_product_maistoforo_sviesa_3.gif"),
				),
				"size" => 1,	
				"maxitems" => 1,
			)
		),
		"description" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.description",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => Array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
		"pictures" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_product.pictures",		
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => "gif,png,jpeg,jpg",	
				"max_size" => 500,	
				"uploadfolder" => "uploads/tx_vvmaistoforas",
				"show_thumbs" => 1,	
				"size" => 5,	
				"minitems" => 0,
				"maxitems" => 8,
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "hidden;;1;;1-1-1, gr_equivalent, title;;;;2-2-2, augaliniai_baltymai;;;;3-3-3, augaliniai_riebalai, angliavandeniai_krakmolas, angliavandeniai_cukrus, angliavandeniai_maistines_skaidulos, na, mg, p, k, ca, fe, zn, se, j, a, d, e, b1, b2, b5, b6, b9, b12, c, kj, kcal, h, b3, vit_k, baltymai, angliavandeniai, riebalai, cholestirolis, maisto_grupe, maistoforo_sviesa, description;;;richtext[cut|copy|paste|formatblock|textcolor|bold|italic|underline|left|center|right|orderedlist|unorderedlist|outdent|indent|link|table|image|line|chMode]:rte_transform[mode=ts_css|imgpath=uploads/tx_vvmaistoforas/rte/], pictures")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "starttime, endtime, fe_group")
	)
);



$TCA["tx_vvmaistoforas_receptas"] = Array (
	"ctrl" => $TCA["tx_vvmaistoforas_receptas"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,starttime,endtime,fe_group,title,description,pictires,ingridients"
	),
	"feInterface" => $TCA["tx_vvmaistoforas_receptas"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"starttime" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.starttime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"default" => "0",
				"checkbox" => "0"
			)
		),
		"endtime" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.endtime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0",
				"range" => Array (
					"upper" => mktime(0,0,0,12,31,2020),
					"lower" => mktime(0,0,0,date("m")-1,date("d"),date("Y"))
				)
			)
		),
		"fe_group" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.fe_group",
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("", 0),
					Array("LLL:EXT:lang/locallang_general.php:LGL.hide_at_login", -1),
					Array("LLL:EXT:lang/locallang_general.php:LGL.any_login", -2),
					Array("LLL:EXT:lang/locallang_general.php:LGL.usergroups", "--div--")
				),
				"foreign_table" => "fe_groups"
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_receptas.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required,trim",
			)
		),
		"description" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_receptas.description",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => Array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
		"pictires" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_receptas.pictires",		
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => "gif,png,jpeg,jpg",	
				"max_size" => 500,	
				"uploadfolder" => "uploads/tx_vvmaistoforas",
				"show_thumbs" => 1,	
				"size" => 5,	
				"minitems" => 0,
				"maxitems" => 8,
			)
		),
		"ingridients" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_receptas.ingridients",		
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_vvmaistoforas_ingridient",	
				"size" => 6,	
				"minitems" => 0,
				"maxitems" => 100,	
				"MM" => "tx_vvmaistoforas_receptas_ingridients_mm",
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "hidden;;1;;1-1-1, title;;;;2-2-2, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts];3-3-3, pictires, ingridients")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "starttime, endtime, fe_group")
	)
);



$TCA["tx_vvmaistoforas_ingridient"] = Array (
	"ctrl" => $TCA["tx_vvmaistoforas_ingridient"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,starttime,endtime,fe_group,product,title,ammount"
	),
	"feInterface" => $TCA["tx_vvmaistoforas_ingridient"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"starttime" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.starttime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"default" => "0",
				"checkbox" => "0"
			)
		),
		"endtime" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.endtime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0",
				"range" => Array (
					"upper" => mktime(0,0,0,12,31,2020),
					"lower" => mktime(0,0,0,date("m")-1,date("d"),date("Y"))
				)
			)
		),
		"fe_group" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.fe_group",
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("", 0),
					Array("LLL:EXT:lang/locallang_general.php:LGL.hide_at_login", -1),
					Array("LLL:EXT:lang/locallang_general.php:LGL.any_login", -2),
					Array("LLL:EXT:lang/locallang_general.php:LGL.usergroups", "--div--")
				),
				"foreign_table" => "fe_groups"
			)
		),
		"product" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_ingridient.product",		
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_vvmaistoforas_product",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,	
				"MM" => "tx_vvmaistoforas_ingridient_product_mm",
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_ingridient.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required,trim",
			)
		),
		"ammount" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_ingridient.ammount",		
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "hidden;;1;;1-1-1, product, title;;;;2-2-2, ammount;;;;3-3-3")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "starttime, endtime, fe_group")
	)
);



$TCA["tx_vvmaistoforas_substance"] = Array (
	"ctrl" => $TCA["tx_vvmaistoforas_substance"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,starttime,endtime,fe_group,alias,units,description"
	),
	"feInterface" => $TCA["tx_vvmaistoforas_substance"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"starttime" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.starttime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"default" => "0",
				"checkbox" => "0"
			)
		),
		"endtime" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.endtime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0",
				"range" => Array (
					"upper" => mktime(0,0,0,12,31,2020),
					"lower" => mktime(0,0,0,date("m")-1,date("d"),date("Y"))
				)
			)
		),
		"fe_group" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.fe_group",
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("", 0),
					Array("LLL:EXT:lang/locallang_general.php:LGL.hide_at_login", -1),
					Array("LLL:EXT:lang/locallang_general.php:LGL.any_login", -2),
					Array("LLL:EXT:lang/locallang_general.php:LGL.usergroups", "--div--")
				),
				"foreign_table" => "fe_groups"
			)
		),
		"alias" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_substance.alias",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"units" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_substance.units",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"description" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:vv_maistoforas/locallang_db.php:tx_vvmaistoforas_substance.description",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => Array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "hidden;;1;;1-1-1, alias, units, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts]")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "starttime, endtime, fe_group")
	)
);



?>