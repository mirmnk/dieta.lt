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


class tx_vvmaistoforas2_views_pValueProduct extends tx_lib_phpTemplateEngine{
	
	
	function printProductLink() {
		$link = tx_div::makeInstance('tx_lib_link');
		$link->designator($this->getDesignator());
		$otherDestination = $this->controller->configurations->get('sview_page');
		$link->destination((($otherDestination)?$otherDestination:$this->getDestination()));
		$link->label($this->get('title'), 1);
		$link->parameters(
				array(
					'pid' => $this->get('uid'),
					'action' => 'show'
				)
		);
		if($this->controller->parameters->get('group')) {
			$link->parameters['group'] = intval($this->controller->parameters->get('group'));
		} else {
			$link->parameters['group'] = $this->get('pgroup');
		}
		
		if($this->controller->parameters->get('srchstr')) {
			$link->parameters['srchstr'] = $this->controller->parameters->get('srchstr');
		}

		if ($this->controller->singleViewAjax) {
#			$link->attributes(array('onclick' => "this.style.fontWeight='bold';return !vv_maistoforas2_pvalueLoadProduct('".t3lib_div::implodeArrayForUrl($this->getDesignator(),$link->parameters)."');"));
#			$link->attributes(array('onclick' => "this.style.fontWeight='bold';"));			
		}

		$atag = $link->makeTag();
		
		print ($this->get('uid') == $this->controller->parameters->get('pid'))?'<strong style="font-size: 110%;">'.$atag.'</strong>':$atag;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pValueProduct.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pValueProduct.php']);
}
 
?>
