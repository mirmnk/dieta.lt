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

class tx_vvmaistoforas2_models_nNormInfo extends tx_lib_object {
	
	function getUserAge() {
		$age = $this->controller->parameters->get('age');
		if(!intval($age) && ($adodbTS = $GLOBALS['TSFE']->fe_user->user['date_of_birth'])) {
			include_once(t3lib_extMgm::extPath('sr_feuser_register').'pi1/class.tx_srfeuserregister_pi1_adodb_time.php');
				// prepare for handling dates before 1970
			$adodbTime = t3lib_div::makeInstance('tx_srfeuserregister_pi1_adodb_time');

			$year_diff = date("Y") - $adodbTime->adodb_date( 'Y', $adodbTS);
    		$month_diff = date("m") - $adodbTime->adodb_date( 'm', $adodbTS);
    		$day_diff = date("d") - $adodbTime->adodb_date( 'd', $adodbTS);
    		if ($month_diff < 0) {
      			$year_diff--;
    		} elseif ($month_diff == 0 && $day_diff < 0) {
      			$year_diff--;
    		}

			$age = $year_diff;
		}
		$this->set('age', $age);
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/models/class.tx_maistoforas2_models_nNormInfo.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/models/class.tx_maistoforas2_models_nNormInfo.php']);
}
 
?>
