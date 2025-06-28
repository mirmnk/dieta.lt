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


class tx_vvmaistoforas2_views_pList extends tx_lib_phpTemplateEngine{
	
	function printPagerPageLink($label, $pointer) {
		$link = tx_div::makeInstance('tx_lib_link');
		$link->designator($this->getDesignator());
		$link->destination($this->getDestination());
		$link->label($label);
		$link->anchor('pager-top');
		$link->parameters(
				array(
					'subst'		=> $this->controller->parameters->get('subst'),
					'action' 	=> substr($this->controller->_findAction($this->controller->parameters, $this->controller->configurations), 0, -6),
					'sort'		=> $this->controller->parameters->get('sort'),
					'limit'		=> $this->controller->parameters->get('limit'),
					'pointer'	=> intval($pointer),
				)
		);
		if($this->controller->parameters->get($this->controller->parameters->get('subst'))) {
			$link->parameters[$this->controller->parameters->get('subst')] = $this->controller->parameters->get($this->controller->parameters->get('subst'));
		}	

		if($this->controller->parameters->get('layout')) {
			$link->parameters['layout'] = 1;
		}	

		
		$curPointer = ($this->controller->parameters->get('pointer'))?$this->controller->parameters->get('pointer'):1;

		$strLink = ($curPointer == $pointer) ?
				tslib_cObj::wrap($link->makeTag(), $this->controller->configurations->get('pagerActivePageWrap')):
				$link->makeTag();
		print $strLink;			

	}
	
	function printUnits() {
		if($this->has('units') && $this->isNotEmpty('units')) {
			print htmlentities($this->get('units'),ENT_NOQUOTES, 'UTF-8');
		}
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pList.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_pList.php']);
}
 
?>
