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

class tx_vvmaistoforas2_controllers_pcommon extends tx_lib_controller{
#	var $configurationsClassName = 'tx_vvmaistoforas2_config';
	var $defaultAction = 'clear';
	var $templateKey = '';
	var $templatePathKey = 'phpTemplatePath';
	var $keyOfPathToLanguageFile = 'pathToLanguageFile';
	var $viewClassName = '';
	var $modelClassName = 'tx_vvmaistoforas2_models_pList';
	var $productListViewClassName = 'tx_lib_phpTemplateEngine';
	var $productViewClassName = 'tx_vvmaistoforas2_views_pValueProduct';
	var $translatorClassName = 'tx_lib_translator';
	var $className = 'tx_vvmaistoforas2_controllers_pcommon';
	var $highlighterClassName = 'tx_vvmaistoforas2_library_highlighter';
	

	function clearAction() {
		$this->parameters->clear();
		return $this->_compose();
	}

	
	function _getTemplateKey() {
		return $this->templateKey;
	}

	function _checkSettings() {
		// check settings
		if(!$this->_getTemplateKey()) {
			die('Please set the class variable templateKey in the controller ' . $this->getClassName());
		}
		if(!$this->viewClassName) {
			die('Please set the class variable viewClassName in the controller ' . $this->getClassName());

		}
		if(!$this->modelClassName) {
			die('Please set the class variable modelClassName in the controller ' . $this->getClassName());

		}		
	}
	
	function _createObjects() {
		// finding classnames
		$modelClassName = tx_div::makeInstanceClassName($this->modelClassName);
		$templateEngineClassName = tx_div::makeInstanceClassName($this->viewClassName);
		$translatorClassName = tx_div::makeInstanceClassName($this->translatorClassName);
		$this->highlightingFilterClassName = tx_div::makeInstanceClassName($this->highlighterClassName);
		
		$this->model = new $modelClassName($this);
		$this->view = new $templateEngineClassName($this);
		$this->translator = new $translatorClassName($this);				
	}
	
	function _compose() {

		$this->_checkSettings();
		$this->_createObjects();

		// the chain

		$this->model->load();

		$this->_chainOfCommand();		

		$this->view->setPathToTemplateDirectory($this->configurations->get($this->templatePathKey));
		$this->view->render($this->configurations->get($this->_getTemplateKey()));

		$this->translator->overwriteArray($this->view);
		$this->translator->setPathToLanguageFile($this->configurations->get($this->keyOfPathToLanguageFile));

		return $this->translator->translateContent();
	}
	
	function _chainOfCommand() {
		
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_pcommon.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_pcommon.php']);
}
 
?>
