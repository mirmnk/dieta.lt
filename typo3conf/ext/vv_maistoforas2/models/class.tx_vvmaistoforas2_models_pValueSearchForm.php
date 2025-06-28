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

class tx_vvmaistoforas2_models_pValueSearchForm extends tx_lib_object {

	function loadPGroups() {
		$fields = 'uid, ecode, title';
		$table = 'tx_vvmaistoforas2_pgroups';
		$groupBy = null;
		$orderBy = 'ecode';
		$cObj = $this->findCObject();
		$where = '1=1 '.$cObj->enableFields($table);
		$where .= ' AND pid IN('.$this->pi_getPidList(
			$this->controller->configurations->get('products'),
			$this->controller->configurations->get('recursive')	
		).')';
		
		
		$query = $GLOBALS['TYPO3_DB']->SELECTquery(
			$fields,
			$table,
			$where,
			$groupBy,
			$orderBy
		);
		
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);
		$list = tx_div::makeInstance('tx_lib_object');
		if($result) {
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) {
				$entry = new tx_lib_object($row);
				$list->append($entry);
			}
			$GLOBALS['TYPO3_DB']->sql_free_result($result);
		}
		$this->set('pGroupsList', $list);
		
	}
	
	function pi_getPidList($pid_list,$recursive=0)	{
		if (!strcmp($pid_list,''))	$pid_list = $GLOBALS['TSFE']->id;
		$recursive = t3lib_div::intInRange($recursive,0);

		$pid_list_arr = array_unique(t3lib_div::trimExplode(',',$pid_list,1));
		$pid_list = array();

		$cObj = $this->findCObject();
		foreach($pid_list_arr as $val)	{
			$val = t3lib_div::intInRange($val,0);
			if ($val)	{
				$_list = $cObj->getTreeList(-1*$val, $recursive);
				if ($_list)		$pid_list[] = $_list;
			}
		}

		return implode(',', $pid_list);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/models/class.tx_vvmaistoforas2_models_pValueSearchForm.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/models/class.tx_vvmaistoforas2_models_pValueSearchForm.php']);
}
?>
