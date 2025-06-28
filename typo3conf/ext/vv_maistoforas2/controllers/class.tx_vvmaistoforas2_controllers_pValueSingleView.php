<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2007 Miroslav Monkevic <m@vektorius.lt>
*  All rights reserved
*
*  This script is free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Module: 
 * 
 * Created on 2007.07.18
 *
 * @author	Miroslav Monkevic <m@vektorius.lt>
 * @package
 * @subpackage 
 */
 
/**
* [CLASS/FUNCTION INDEX of SCRIPT]
*/
tx_div::load('tx_lib_controller');

class tx_vvmaistoforas2_controllers_pValueSingleView extends tx_vvmaistoforas2_controllers_xajax {
	var $defaultDesignator = 'vv_maistoforas2_pvalue';
	var $defaultAction = 'show';
	var $templateKey = 'pValueShowProduct';
	var $templatePathKey = 'phpTemplatePath';
	var $keyOfPathToLanguageFile = 'pathToLanguageFile';
	var $viewClassName = 'tx_vvmaistoforas2_views_pValueSingleView';
	var $productViewClassName = 'tx_vvmaistoforas2_views_pValueProduct';
	var $modelClassName = 'tx_vvmaistoforas2_models_pValueSingleView';
	var $translatorClassName = 'tx_lib_translator';
	var $className = 'tx_vvmaistoforas2_controllers_pValueSingleView';

	function searchAction() {
		return '<div id="tx_vvmaistoforas2_pvalue-single"></div>';
	}

	function filterAction() {
		return '<div id="tx_vvmaistoforas2_pvalue-single"></div>';
	}

	function searchclearAction() {
		return $this->searchAction();
	}


	function filterclearAction() {
		return $this->filterAction();
	}

	function showAction() {
		
		return $this->makeProductValueTable();
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_pValueSingleView.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_pValueSingleView.php']);
} 
?>
