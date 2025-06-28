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
tx_div::load('tx_lib_phpTemplateEngine');


class tx_vvmaistoforas2_views_nNormCommon extends tx_lib_phpTemplateEngine{

	function printFormTag($id, $pid=0) {
		$link = tx_div::makeInstance('tx_lib_link');
		$link->destination((($pid)?$pid:$this->getDestination()));
		$link->noHash();
		$action = $link->makeUrl();
		printf(chr(10) . '<form id="%s" action="%s" method="get">' . chr(10), $id, $action);
	}
	
	function createSelectorOptions($keyName, $activeVal='') {
		$strOptions = '';
		$objOptions = $this->get($keyName);

		for($objOptions->rewind(); $objOptions->valid(); $objOptions->next()) {
			$selected = ($objOptions->current() == $activeVal)?' selected="selected" ':'';
			$strOptions .= '<option '.$selected.'value="'.$objOptions->current().'">'.$objOptions->key().'</option>';
		}
		
		return $strOptions;
	}

	function printTabLink($label, $tab = 'step1') {
		$link = tx_div::makeInstance('tx_lib_link');
		$link->designator($this->getDesignator());
		$link->destination($this->getDestination());
		$link->label($label);
		$params = &$this->controller->parameters;
		$arrParameters = ($tab === 'step2')?array('action' => 'step2'):(($tab === 'step3')?array('action' => 'step3'):array());
		if($params->get('age')) {
			$arrParameters['age'] = $params->get('age');
		}
		if($params->get('gender')) {
			$arrParameters['gender'] = $params->get('gender');
		}
		if($params->get('const')) {
			$arrParameters['const'] = $params->get('const');
		}
		if($params->get('pg')) {
			$arrParameters['pg'] = $params->get('pg');
		}
		
		if($params->get('activity')) {
			$arrParameters['activity'] = (isset($arrParameters['pg']) && $arrParameters['pg'] && isset($arrParameters['gender']) && $arrParameters['gender'] ==2)?1:$params->get('activity');
		}
		
		$arrAttributes = array();

		if($tab === 'step1' && 
			isset($arrParameters['age']) && 
			isset($arrParameters['gender']) && 
			isset($arrParameters['const']) && 
			isset($arrParameters['activity'])
		) {
			$arrAttributes['class'] = 'complete';
		}

		if(($tab === 'step3' || $tab === 'step2') && 
			isset($arrParameters['age']) && 
			isset($arrParameters['gender']) && 
			isset($arrParameters['const']) && 
			isset($arrParameters['activity'])
		) {
			$arrAttributes['class'] = 'uncomplete';
		}

		if(($tab === 'step3' || $tab === 'step2') && 
			$this->controller->ration->isNotEmpty() &&
			$this->controller->ration->isAllAmmountsSet()
		) {
			$arrAttributes['class'] = 'complete';
		}


		if(($tab === 'step3' || $tab === 'step2') && 
			!isset($arrParameters['age']) && 
			!isset($arrParameters['gender']) && 
			!isset($arrParameters['const']) && 
			!isset($arrParameters['activity'])
		) {
			$arrAttributes['onclick'] = 'return false;';
			unset($arrParameters['action']);
		}
		$link->attributes($arrAttributes);
		$link->parameters($arrParameters);
		$link->noHash();

		print $link->makeTag();
	}


}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_nNormCommon.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_nNormCommon.php']);
}
 
?>
