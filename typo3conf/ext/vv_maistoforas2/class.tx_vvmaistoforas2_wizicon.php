<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2004 Kasper Sk�rh�j (kasper@typo3.com)
*  (c) 2004-2006 Rupert Germann (rupi@gmx.li)
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Class that adds the wizard icon.
 *
 * $Id: class.tx_ttnews_wizicon.php,v 1.15 2006/04/19 12:10:14 rupertgermann Exp $
 *
* @author Miroslav Monkevic <m@vektorius.lt>
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   55: class tx_ttnews_wizicon
 *   63:     function proc($wizardItems)
 *   83:     function includeLocalLang()
 *
 * TOTAL FUNCTIONS: 2
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */





/**
 * Class that adds the wizard icon.
 *
 * @author Miroslav Monkevic <m@vektorius.lt>
 */
class tx_ttnews_wizicon {

	/**
	 * Adds the vv_maistoforas2 wizard icon
	 *
	 * @param	array		Input array with wizard items for plugins
	 * @return	array		Modified input array, having the item for vv_maistoforas2 added.
	 */
	function proc($wizardItems)	{
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems['plugins_tx_vvmaistoforas2_pi'] = array(
			'icon'=>t3lib_extMgm::extRelPath('vv_maistoforas2').'res/ce_wiz.gif',
			'title'=>$LANG->getLLL('pi_title',$LL),
			'description'=>$LANG->getLLL('pi_plus_wiz_description',$LL),
			'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=tx_vvmaistoforas2'
		);

		return $wizardItems;
	}

	/**
	 * Includes the locallang file for the 'tt_news' extension
	 *
	 * @return	array		The LOCAL_LANG array
	 */
	function includeLocalLang()	{
		$llFile = t3lib_extMgm::extPath('vv_maistoforas2').'llxml/locallang_db.xml';
		$LOCAL_LANG = t3lib_div::readLLXMLfile($llFile, $GLOBALS['LANG']->lang);
		return $LOCAL_LANG;
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/class.tx_vvmaistoforas2_wizicon.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/class.tx_vvmaistoforas2_wizicon.php']);
}

?>