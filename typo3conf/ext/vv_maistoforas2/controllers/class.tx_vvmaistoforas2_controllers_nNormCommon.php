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
 * Created on 2007.06.21
 *
 * @author	Miroslav Monkevic <m@vektorius.lt>
 * @package
 * @subpackage 
 */
 
/**
* [CLASS/FUNCTION INDEX of SCRIPT]
*/


tx_div::load('tx_lib_controller');

class tx_vvmaistoforas2_controllers_nNormCommon extends tx_vvmaistoforas2_controllers_xajax {
	var $defaultDesignator = 'vv_maistoforas2_nnorm';
	var $defaultAction = 'clear';
	var $templatePathKey = 'phpTemplatePath';
	var $keyOfPathToLanguageFile = 'pathToLanguageFile';
	var $translatorClassName = 'tx_lib_translator';
	var $className = 'tx_vvmaistoforas2_controllers_nNormCommon';
	var $rationClassName = 'tx_vvmaistoforas2_library_ration';
	
	function unknownAction() {
		return '';
	}

	function doPreActionProcessings() {
		parent::doPreActionProcessings();
		$rationClassName = tx_div::makeInstanceClassName($this->rationClassName);
		$this->ration = new $rationClassName($this);
		$this->ration->loadFromSession('ration');		
	}

	function doPostActionProcessings() {
		if(is_object($this->ration)) {
			$this->ration->storeToSession('ration');
		}
	}
	
	function getValidator() {
        // finding classnames
        $validatorClassName = tx_div::makeInstanceClassName('tx_lib_validator');
    
        $validator = new $validatorClassName($this);
        return $validator;
    }
    
	function step1IsValid() {

		$validator = $this->validateStep1();
 
		return ($validator->ok() && $this->parameters->isNotEmpty());
	}
	
	function validateStep1($validator = null) {
		if($validator === null) {
			$validator = $this->getValidator();
		}
		if($this->parameters->isNotEmpty()) {
			$validator->useRules('validationRulesNormInfo.');
			$validator->validate($this->parameters);
		}

		return $validator;
	}

	function validateStep2($validator = null) {
		if($validator === null) {
			$validator = $this->getValidator();
		}
		$obj = new tx_lib_object(array('rationstatus' => ($this->ration->isAllAmmountsSet())?'true':'false'));
 
		$validator->useRules('validationRulesNormRation.');
		$validator->validate($obj);

		return $validator;
	}

	function step2IsValid() {

		$validator = $this->validateStep2();
 
		return $validator->OK();
	}
	function _buildController($controllerAndAction) {
		list($controllerName, $action) = $controllerAndAction;
		$controller = tx_div::makeInstance($controllerName);
		$controller->input = $this->input;
		$controller->output = '';
		$controller->context = $this->context;
		$controller->context->controller =& $controller;        // Setting the new controller.
		$controller->parameters = $this->parameters;
		$controller->parameters->controller =& $controller;     // Setting the new controller.
		$controller->configurations = $this->configurations;
		$controller->configurations->controller =& $controller; // Setting the new controller.
		$controller->action = $action;
		return $controller;
	}
	
	function undefinedAction() {
		return '';
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_nNormCommon.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_nNormCommon.php']);
}
 
?>
