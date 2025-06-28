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

class tx_vvmaistoforas2_views_pValueSingleView extends tx_lib_phpTemplateEngine{
	
	var $unitsHash = array();

	function printBackLink($label) {
		$link = tx_div::makeInstance('tx_lib_link');
		$link->designator($this->getDesignator());
		$otherDestination = $this->controller->configurations->get('lview_page');
		$link->destination((($otherDestination)?$otherDestination:$this->getDestination()));

		$parameters =array();
		

		if($this->controller->parameters->get('group')) {
			$parameters['group'] = $this->controller->parameters->get('group');
			$parameters['action'] = 'filter';
		} elseif($this->controller->parameters->get('srchstr')) {
			$parameters['srchstr'] = $this->controller->parameters->get('srchstr');
			$parameters['action'] = 'search';
		}


		$link->parameters($parameters);
		$link->noHash();

					
		$link->label($label);

		// print
		print $link->makeTag();
	}
	
	function printUnits($key) {
		if($this->has('units')) {
			if(!count($this->unitsHash)) {
				$objUnits = $this->get('units');
				$this->unitsHash = $objUnits->getHashArray();
			}
			if(isset($this->unitsHash[$key]) && !empty($this->unitsHash[$key])) {
				if(is_array($this->unitsHash[$key]) && isset($this->unitsHash[$key]['units']) && !empty($this->unitsHash[$key]['units'])) {
					print htmlentities($this->unitsHash[$key]['units'],ENT_NOQUOTES, 'UTF-8');
				}
			}
		}
		
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pValueSingleView.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pValueSingleView.php']);
} 
?>
