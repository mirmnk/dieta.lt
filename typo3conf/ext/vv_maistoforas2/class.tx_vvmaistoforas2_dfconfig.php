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
 * Created on 2007.08.28
 *
 * @author	Miroslav Monkevic <m@vektorius.lt>
 * @package TYPO3
 * @subpackage vv_maistoforas2
 */
 
/**
* [CLASS/FUNCTION INDEX of SCRIPT]
*/
class tx_vvmaistoforas2_dfconfig {
 
	var $rowChecks = array (

		// add your checks here

	);

	var $DCA = array (

			0 => array (
	
				'path' => 'tx_dynaflextut_test/columns/flexdata/config/ds/default',
	
				'modifications' => array (
	
				)

			)

		);

	var $cleanUpField = 'pi_flexform';

	var $hooks = array(

		'EXT:dynaflex_tut/class.tx_dynaflextut_dcahooks.php:tx_dynaflextut_dcahooks'

	);

}
?>
