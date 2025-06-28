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
 * Created on 2007.08.31
 *
 * @author	Miroslav Monkevic <m@vektorius.lt>
 * @package
 * @subpackage 
 */
 
/**
* [CLASS/FUNCTION INDEX of SCRIPT]
*/

class tx_vvmaistoforas2_library_utility extends tx_lib_object {

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

	function asObjectOfObjects($objectList, $listClassName = 'tx_lib_object', $entryClassName = 'tx_lib_object', $eController=null) {
		$objectList->checkController(__FILE__, __LINE__);
		$entryClassName = tx_div::makeInstanceClassName($entryClassName);
		$listClassName = tx_div::makeInstanceClassName($listClassName);
		$ouptputList = new $listClassName($objectList->controller);
		if(is_object($eController) && is_subclass_of($eController, 'tx_lib_controller')) {
			$entryController = &$eController;
			
		} else {
			$entryController = &$objectList->controller;
		}
		for($objectList->rewind(); $objectList->valid(); $objectList->next()) {
			$ouptputList->set($objectList->key(), new $entryClassName($entryController, tx_div::toHashArray($objectList->current())));
		}
		return $ouptputList;
	}
}
 
?>
