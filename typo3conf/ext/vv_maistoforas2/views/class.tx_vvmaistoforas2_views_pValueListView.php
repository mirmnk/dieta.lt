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
tx_div::load('tx_lib_phpTemplateEngine');

class tx_vvmaistoforas2_views_pValueListView extends tx_lib_phpTemplateEngine{

	function createProductsOptions(&$obj) {
		$strOptions = '';
 		$i = 0;
		for($obj->rewind(); $obj->valid(); $obj->next()) {
			$i++;
			$entry=$obj->current();
			$selected = ($entry->get('uid') == $this->controller->parameters->get('pid'))?' selected="selected" ':'';
			$strOptions .= '<option '.$selected.'value="'.$entry->get('uid').'">'.$i.' '.$entry->get('title').'</option>';
		}
		
		return $strOptions;
	}

	function findAction() {
		$action = $this->controller->_findAction();
		if(substr($action, -6, 6) == 'Action') $action = substr($action, 0,-6);
		return $action;
	}	
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pValueListView.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pValueListView.php']);
} 
?>
