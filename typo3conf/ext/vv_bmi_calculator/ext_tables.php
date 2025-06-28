<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::allowTableOnStandardPages("tx_vvbmicalculator_bmi_item");


t3lib_extMgm::addToInsertRecords("tx_vvbmicalculator_bmi_item");

$TCA["tx_vvbmicalculator_bmi_item"] = Array (
	"ctrl" => Array (
		"title" => "LLL:EXT:vv_bmi_calculator/locallang_db.php:tx_vvbmicalculator_bmi_item",		
		"label" => "descr",	
		"tstamp" => "tstamp",
		"crdate" => "crdate",
		"cruser_id" => "cruser_id",
		"versioning" => "1",	
		"languageField" => "sys_language_uid",	
		"transOrigPointerField" => "l18n_parent",	
		"transOrigDiffSourceField" => "l18n_diffsource",	
		"default_sortby" => "ORDER BY crdate",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",	
			"starttime" => "starttime",	
			"endtime" => "endtime",	
			"fe_group" => "fe_group",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_vvbmicalculator_bmi_item.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, starttime, endtime, fe_group, intstart, intend, descr",
	)
);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';

t3lib_extMgm::addPlugin(Array('LLL:EXT:vv_bmi_calculator/locallang_db.php:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:vv_bmi_calculator/flexform_ds.xml');

if (TYPO3_MODE=="BE")	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_vvbmicalculator_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_vvbmicalculator_pi1_wizicon.php';
?>