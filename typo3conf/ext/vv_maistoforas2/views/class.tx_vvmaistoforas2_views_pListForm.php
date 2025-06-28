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


class tx_vvmaistoforas2_views_pListForm extends tx_lib_phpTemplateEngine{

	function printFormTag($id) {
		$link = tx_div::makeInstance('tx_lib_link');
		$otherDestination = $this->controller->configurations->get('pfilter_lview_page');
		$link->destination((($otherDestination)?$otherDestination:$this->getDestination()));
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

	function createPGroupOptions() {
		$strOptions = '';
		$pGroupsList = $this->get('pGroupsList');
		for($pGroupsList->rewind(); $pGroupsList->valid(); $pGroupsList->next()) {
			$entry=$pGroupsList->current();
			$selected = ($entry->get('uid') == $this->controller->parameters->get('group'))?' selected="selected" ':'';
			$strOptions .= '<option '.$selected.'value="'.$entry->get('uid').'">'.$entry->get('ecode').' '.$entry->get('title').'</option>';
		}
		
		return $strOptions;
	}


}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pListForm.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pListForm.php']);
}
 
?>
