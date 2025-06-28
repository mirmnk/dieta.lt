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
 * @package TYPO3
 * @subpackage tx_vvmaistoforas2
 */
 
/**
* [CLASS/FUNCTION INDEX of SCRIPT]
*/
tx_div::load('tx_lib_phpTemplateEngine');


class tx_vvmaistoforas2_views_nNormpValueProduct extends tx_lib_phpTemplateEngine{
	
	
	function getProductLink($type='add', $title='') {
		
		$link = tx_div::makeInstance('tx_lib_link');
		$link->designator($this->getDesignator());
		$link->destination($this->getDestination());

		if($title == '') {
			$title = $this->get('title');
		}

		$link->label($title, 1);
		$link->parameters(
				array(
					'action' => $this->controller->_getParameterAction(),
				)
		);



		if($this->controller->parameters->get('group')) {
			$link->parameters['group'] = intval($this->controller->parameters->get('group'));
		}
		
		if($this->controller->parameters->get('srchstr')) {
			$link->parameters['srchstr'] = $this->controller->parameters->get('srchstr');
		}
		$link->noHash();
		
		$nNorm = t3lib_div::_GP('vv_maistoforas2_nnorm');
		$link2 = tx_div::makeInstance('tx_lib_link');
		$link2->designator('vv_maistoforas2_nnorm');
		$link2->destination($this->getDestination());
		$arrParameters = array(
			'age' => $nNorm['age'],
			'gender' => $nNorm['gender'],
			'const' => $nNorm['const'],
			'activity' => $nNorm['activity'],
			'action' => (is_array($nNorm['action'])?key($nNorm['action']):$nNorm['action']) ,		
		);
		switch($type) {
			case 'add':
				$arrParameters['pid'] = $this->get('uid');
				$link->attributes(array('onclick' => "return !vv_maistoforas2_nnormAdjustRationItem(".$this->get('uid').")"));
			break;
		
			case 'remove':
				$arrParameters['rpid'] = $this->get('uid');
				$link->attributes(array('onclick' => "return !vv_maistoforas2_nnormRemoveRationItem(".$this->get('uid').")"));
			break;	
	
		}
		
		$link2->parameters($arrParameters);
		$link2->noHash();
		list(,$addParams) = explode('?', $link2->makeUrl(false));


		$conf = $link->_makeConfig('tag');
		$conf['additionalParams'] .='&'.$addParams;

		
		print $link->cObject->typolink($link->_makeLabel(), $conf);


	}
	
	function printProductLink($type='add', $title='') {
		print $this->getProductLink($type, $title);	
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_nNormpValueProduct.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_nNormpValueProduct.php']);
}
 
?>
