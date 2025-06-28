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


tx_div::load('tx_vvmaistoforas2_controllers_nNormCommon');

class tx_vvmaistoforas2_controllers_nNormInfo extends tx_vvmaistoforas2_controllers_nNormCommon{
	var $defaultAction = 'step1';
	var $templateKey = 'nNormInfoForm';
	var $viewClassName = 'tx_vvmaistoforas2_views_nNormInfo';
	var $modelClassName = 'tx_vvmaistoforas2_models_nNormInfo';
	var $className = 'tx_vvmaistoforas2_controllers_nNormInfo';
	
	
	function clearAction() {
		$this->parameters->clear();
		if(is_object($this->ration)) {
			$this->ration->clear();
			$this->ration->storeToSession('ration');
		}		
		return $this->step1Action();
	}

	function step2Action() {
		return '';	
	}

	function step3Action() {
		return '';	
	}
	
	function step1Action() {

		$isShorVersion = $this->configurations->get('isNormFormInfoShort');

		if(!$isShorVersion) {
			$this->includeMooTools();
		}
		
	
		// finding classnames
		$modelClassName = tx_div::makeInstanceClassName($this->modelClassName);
		$viewClassName = tx_div::makeInstanceClassName($this->viewClassName);
		$translatorClassName = tx_div::makeInstanceClassName($this->translatorClassName);

		// the chain
		$model = new $modelClassName($this);
		$model->getUserAge();


		$view = new $viewClassName($this, $model);
		if(!$this->parameters->get('from_short')) {
			$validator = $this->validateStep1();
			$view->overwriteArray($validator);
		}

		$view->setPathToTemplateDirectory($this->configurations->get($this->templatePathKey));
		if($isShorVersion) {
			$this->templateKey = 'nNormInfoFormShort';
		}
		$view->render($this->configurations->get($this->templateKey));

		$translator = new $translatorClassName($view, $this);
		$translator->setPathToLanguageFile($this->configurations->get($this->keyOfPathToLanguageFile));

		return $translator->translateContent();
	}
	
	function includeMooTools() {
		// checks if t3mootools is loaded
		
		if (t3lib_extMgm::isLoaded('t3mootools'))    {
		   require_once(t3lib_extMgm::extPath('t3mootools').'class.tx_t3mootools.php');
		}  
		
		// if t3mootools is loaded and the custom Library had been created
		
		if (defined('T3MOOTOOLS')) {
			tx_t3mootools::addMooJS();
			$GLOBALS['TSFE']->additionalHeaderData['rgformvalidator_formcheck_js'] = '<script src="'.t3lib_extMgm::siteRelPath('rgformvalidator').'res/formcheck.js'.'" type="text/javascript"></script>';
			$GLOBALS['TSFE']->additionalHeaderData['rgformvalidator_formcheck_css'] = '<link rel="stylesheet" type="text/css" href="'.t3lib_extMgm::siteRelPath('rgformvalidator').'res/formcheck.css'.'" />';
		}		
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_nNormInfo.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_nNormInfo.php']);
}
 
?>
