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

class tx_vvmaistoforas2_controllers_nNormResultsRation extends tx_vvmaistoforas2_controllers_nNormCommon {
	var $templateKey = 'nNormResults';
	var $defaultAction = 'step3';
	var $viewClassName = 'tx_vvmaistoforas2_views_nNormResults';
	var $modelClassName = 'tx_vvmaistoforas2_models_nNormResults';
	var $className = 'tx_vvmaistoforas2_controllers_nNormResults';
	
	
	function clearAction() {
		$this->parameters->clear();
		return $this->step1Action();
	}

	function step2Action() {
		return '';	
	}

	function step1Action() {
		return '';	
	}

	function step3Action() {

		// finding classnames
		$viewClassName = tx_div::makeInstanceClassName($this->viewClassName);
		$modelClassName = tx_div::makeInstanceClassName($this->modelClassName);		
		$translatorClassName = tx_div::makeInstanceClassName($this->translatorClassName);
		// the chain
		$model = new $modelClassName($this);
		$model->loadProducts();
		$model->loadUnitsTable();
		
		
		$view = new $viewClassName($this, $model);
		
		tx_div::load('tx_vvmaistoforas2_library_utility');
		$view->set('ration', tx_vvmaistoforas2_library_utility::asObjectOfObjects($this->ration, 'tx_lib_phpFormEngine', 'tx_vvmaistoforas2_views_nNormpValueProduct'));	
		
		$view->setPathToTemplateDirectory($this->configurations->get($this->templatePathKey));
		$view->render('nutritionalNormResultsRation');

		$translator = new $translatorClassName($view, $this);
		$translator->setPathToLanguageFile($this->configurations->get($this->keyOfPathToLanguageFile));

		return $translator->translateContent();
	}
	

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_nNormResults.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_nNormResults.php']);
}
 
?>
