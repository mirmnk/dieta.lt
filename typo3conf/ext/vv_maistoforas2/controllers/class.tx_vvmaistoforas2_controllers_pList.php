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

class tx_vvmaistoforas2_controllers_pList extends tx_lib_controller{
	var $defaultDesignator = 'vv_maistoforas2_plist';
	var $defaultAction = 'clear';
	var $templateKey = 'pList';
	var $templatePathKey = 'phpTemplatePath';
	var $keyOfPathToLanguageFile = 'pathToLanguageFile';
	var $viewClassName = 'tx_vvmaistoforas2_views_pList';
	var $modelClassName = 'tx_vvmaistoforas2_models_pList';
	var $entryViewClassName = 'tx_lib_phpTemplateEngine';
	var $translatorClassName = 'tx_lib_translator';
	var $className = 'tx_vvmaistoforas2_controllers_pList';
	var $twoLevelDeepSubst = 'vitamin,ns,ms';              // categories of substances. Only their children are actual substances
	
	function clearAction() {
		$this->parameters->clear();
		return $this->filterAction();
	}

	function filterAction() {

		// check settings
		if(!$this->templateKey) {
			die('Please set the class variable templateKey in the controller ' . $this->getClassName());
		}
		if(!$this->viewClassName) {
			die('Please set the class variable viewClassName in the controller ' . $this->getClassName());

		}

		// finding classnames
		$modelClassName = tx_div::makeInstanceClassName($this->modelClassName);
		$viewClassName = tx_div::makeInstanceClassName($this->viewClassName);
		$translatorClassName = tx_div::makeInstanceClassName($this->translatorClassName);

		// the chain
		$model = new $modelClassName($this);

		$subst = $this->parameters->get('subst');
		if($this->parameters->has('subst') && !empty($subst)) {
			$subst = (t3lib_div::inList($this->twoLevelDeepSubst,$subst))?$this->parameters->get($subst):$subst;
		}		
		$model->loadSimple($subst);

		$view = new $viewClassName($this, $model);
		$view->set('subst', $subst);

		
		$list = tx_div::makeInstance('tx_lib_object');
		$list->controller($this);
		$list->asObjectOfObjects($model->get('productList'), $this->entryViewClassName);
		$view->set('productList', $list);		

		$view->setPathToTemplateDirectory($this->configurations->get($this->templatePathKey));
		$view->render($this->configurations->get($this->templateKey));

		$translator = new $translatorClassName($view, $this);
		$translator->setPathToLanguageFile($this->configurations->get($this->keyOfPathToLanguageFile));

		return $translator->translateContent();
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_pList.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/controllers/class.tx_vvmaistoforas2_controllers_pList.php']);
}
 
?>
