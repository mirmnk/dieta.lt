<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005 Miroslav Monkevic (m@vektorius.lt)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Plugin 'BMI calculator' for the 'vv_bmi_calculator' extension.
 *
 * @author	Miroslav Monkevic <m@vektorius.lt>
 */


require_once(PATH_tslib.'class.tslib_pibase.php');

class tx_vvbmicalculator_pi1 extends tslib_pibase {
	var $prefixId 		= 'tx_vvbmicalculator_pi1';		// Same as class name
	var $scriptRelPath  = 'pi1/class.tx_vvbmicalculator_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey 		= 'vv_bmi_calculator';	// The extension key.
	
	/**
	 * [Put your description here]
	 */
	function main($content,$conf)	{
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_initPIflexform(); // Init and get the flexform data of the plugin
		$this->pi_USER_INT_obj=1;	// Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!

		$this->partsTmplCode = $this->cObj->fileResource($this->conf['templateFile']);
		$this->intsPid = $this->initPidList();

		$this->submitToPID = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'submitTo', 's_misc');
		
		$this->height = (float)$this->piVars['height']/100;
		$this->weight = (float)$this->piVars['weight'];
		
		
		$content .= $this->getBMIHTML();

		return $this->pi_wrapInBaseClass($content);
	}

	function _getBMI() {
		return (!empty($this->weight) && !empty($this->height))?$this->getBMI($this->height,$this->weight):'';
	}
	
	function getBMI($height, $weight) {
		return (float)$weight/pow($height, 2);
	}

	function _getWeightFromBMI($bmi) {
				
		return (!empty($this->height))?$this->getWeightFromBMI($this->height,$bmi):'';
	}
	
	function getWeightFromBMI($height, $bmi) {
		return (float)(pow($height, 2)*$bmi);
	}

	function getBMIDescription($dblBMI) {	
		$retVal = (!empty($dblBMI))?
			$GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
				'descr',
				'tx_vvbmicalculator_bmi_item',
				'pid IN ('.$this->intsPid .') AND '.$dblBMI.' < intend AND '.$dblBMI.' >= intstart'
			) : '';
		return (is_array($retVal))?$retVal[0]['descr']:$retVal;
	}
	
	/**
	 * extends the pid_list given from $conf or FF recursively by the pids of the subpages
	 * generates an array from the pagetitles of those pages
	 *
	 * @return	void
	 */
	function initPidList () {
		$pid_list = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'pages', 'sDEF');
		$recursive = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'recursive', 'sDEF');

		$pid_list = $pid_list ? implode(t3lib_div::intExplode(',', $pid_list), ','):
		$GLOBALS['TSFE']->id;

		$recursive = is_numeric($recursive)?$recursive:0;
		// extend the pid_list by recursive levels
		$pid_list = $this->pi_getPidList($pid_list, $recursive);
		$pid_list = $pid_list?$pid_list:0;
		return $pid_list;
	}

	function fillInputMarkers($elementName) {

		return  array(
			'###BMICALC_SFORM_CONTROL_INPUT_NAME###'  => $this->prefixId . '['.$elementName.']',
			'###BMICALC_SFORM_CONTROL_INPUT_ID###'  => $this->prefixId . '-'.$elementName,
			'###BMICALC_SFORM_CONTROL_INPUT_LABEL###' => $this->pi_getLL('tx_vvbmicalculator_'.$elementName),
			'###BMICALC_SFORM_CONTROL_INPUT_VALUE###' => $this->piVars[$elementName],
		);
	}

	function getBMISForm() {
		$tmplBMIForm 	 = $this->cObj->getSubpart($this->partsTmplCode, '###BMICALC_SFORM_BLOCK###');
		$tmplBMIControls = $this->cObj->getSubpart($tmplBMIForm, '###BMICALC_SFORM_CONTROLS_BLOCK###');
		$tmplBMIInput 	 = $this->cObj->getSubpart($tmplBMIControls, '###BMICALC_SFORM_CONTROL_INPUT###');

		$marksArray = $this->fillInputMarkers('height');
		$subpartsArray = array(
			'###BMICALC_SFORM_CONTROLS_BLOCK###' => $this->cObj->substituteMarkerArrayCached($tmplBMIInput, $marksArray ),
		);
		$marksArray = $this->fillInputMarkers('weight');
		$subpartsArray ['###BMICALC_SFORM_CONTROLS_BLOCK###'] .= $this->cObj->substituteMarkerArrayCached($tmplBMIInput, $marksArray);
	
		$marksArray = array(
			'###BMICALC_SFORM_ACTION###' => $this->pi_getPageLink(((!empty($this->submitToPID ))?$this->submitToPID:$GLOBALS['TSFE']->id)),
			'###BMICALC_SFORM_HEADING###' => $this->pi_getLL('bmicalc_for_head1'),
			'###BMICALC_SFORM_SUBMIT_LABEL###' => $this->pi_getLL('bmicalc_submit_label','Pirmyn',TRUE),
			'###BMICALC_SFORM_SUBMIT_PARAMS###' => $this->pi_classParam('bmicalc-submit'),
		);

	  return $this->cObj->substituteMarkerArrayCached($tmplBMIForm , $marksArray, $subpartsArray);
		
	}

	function getBMIResult($dblBMI) {
		$retVal = '';

		if (!empty($dblBMI)) {
	
			$tmplBMIResult	 = $this->cObj->getSubpart($this->partsTmplCode, '###BMICALC_RESULT_BLOCK###');		
			$marksArray = array(
				'###BMICALC_BMI_VALUE###' => number_format($dblBMI, 2),
				'###BMICALC_DESCRIPTION###' => $this->getBMIDescription($dblBMI),
			);
			$retVal = $this->cObj->substituteMarkerArrayCached($tmplBMIResult, $marksArray);
		}
		return $retVal;
	}

	function getBMISuggestion($dblBMI) {
		$retVal = '';

		if (!empty($dblBMI)) {
	
			$tmplBMISuggestion	 = $this->cObj->getSubpart($this->partsTmplCode, '###BMICALC_SUGGESTION_BLOCK###');		

			$arrWeight = array();
			$arrWeight['min']   = $this->_getWeightFromBMI($this->conf['bmi.']['min']);
			$arrWeight['max']	= $this->_getWeightFromBMI($this->conf['bmi.']['max']);
			$arrWeight['ideal'] = $this->_getWeightFromBMI($this->conf['bmi.']['ideal']); 

			$arrSugg = array();
			$arrSugg['min']   = -(number_format($this->weight-$arrWeight['min'], 2));
			$arrSugg['max']	  = -(number_format($this->weight-$arrWeight['max'], 2));
			$arrSugg['ideal'] = -(number_format($this->weight-$arrWeight['ideal'], 2)); 

			$marksArray = array(
				'###BMICALC_BMI_MIN_VALUE###' 		=> sprintf($this->pi_getLL('tx_vvbmicalculator_suggestion_min'),$arrSugg['min'], number_format($arrWeight['min'], 2), $this->conf['bmi.']['min']),
				'###BMICALC_BMI_MAX_VALUE###' 		=> sprintf($this->pi_getLL('tx_vvbmicalculator_suggestion_max'),$arrSugg['max'], number_format($arrWeight['max'], 2), $this->conf['bmi.']['max']),
				'###BMICALC_BMI_IDEAL_VALUE###' 	=> sprintf($this->pi_getLL('tx_vvbmicalculator_suggestion_ideal'),$arrSugg['ideal'], number_format($arrWeight['ideal'], 2), $this->conf['bmi.']['ideal']),
				'###BMICALC_BMI_SUGGESTION_HEAD###' => $this->pi_getLL('tx_vvbmicalculator_suggestion_head'), 
			);
			$retVal = $this->cObj->substituteMarkerArrayCached($tmplBMISuggestion, $marksArray);
		}
		return $retVal;
	}

	function getBMIHTML()
	{	
		$dblBMI = $this->_getBMI();
		$bmiForm = $this->getBMISForm();
		$bmiResult = $this->getBMIResult($dblBMI);
		$bmiSuggestion = $this->getBMISuggestion($dblBMI);		
		
		$bolDNTShowResults = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'show_result', 's_misc');
		$retVal =  (!$bolDNTShowResults)?$bmiResult.$bmiForm:$bmiForm;
		
		if (!empty($dblBMI) && !$bolDNTShowResults) {
			$tmplBMILayout	 = $this->cObj->getSubpart($this->partsTmplCode, '###BMICALC_TWO_COLUMN_GRID###');
			$marksArray = array(
				'###BMICALC_TWO_COLUMN_GRID_COL1###' => $retVal,
				'###BMICALC_TWO_COLUMN_GRID_COL2###' => $bmiSuggestion,
			);
			$GLOBALS['TSFE']->additionalHeaderData[$this->extKey] = '<style>.vv-maistoforas-sform .frmName {float: left; line-height: 1.5em; margin: 0; padding: 5px 5px 0 2px; text-align: right;width: 38px; }</style>';
			$retVal = $this->cObj->substituteMarkerArrayCached($tmplBMILayout, $marksArray);
		}		

		return $retVal;
	}		
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_bmi_calculator/pi1/class.tx_vvbmicalculator_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_bmi_calculator/pi1/class.tx_vvbmicalculator_pi1.php']);
}

?>