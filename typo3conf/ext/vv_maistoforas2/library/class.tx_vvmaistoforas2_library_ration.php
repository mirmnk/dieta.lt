<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2007 Elmar Hinz 
 *  Contact: elmar.hinz@team-red.net
 *  All rights reserved
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 ***************************************************************/

/** 
 * Depends on: lib/div  
 *
 * @author Miroslav Monkevic <m@vektorius.lt>
 * @package TYPO3
 * @subpackage tx_vvlssfdb
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 */

class tx_vvmaistoforas2_library_ration extends tx_lib_object {
	var $className = 'tx_vvmaistoforas2_library_ration';

	function isAllAmmountsSet() {
		$retval = false;

		for($this->rewind();$this->valid();$this->next()) {
			$entry = $this->current();
			if (!($entry->has('ammount') && intval($entry->get('ammount')))) {
				$retval = false;
				break;
			} else {
				$retval = true;
			}
		}
		return $retval;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_lssfdb/library/class.tx_vvlssfdb_library_ration.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_lssfdb/library/class.tx_vvlssfdb_library_ration.php']);
}
?>
