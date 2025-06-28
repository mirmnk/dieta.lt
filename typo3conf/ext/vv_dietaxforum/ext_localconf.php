<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

$TYPO3_CONF_VARS['FE']['XCLASS']['ext/chc_forum/pi1/class.tx_chcforum_author.php'] = t3lib_extMgm::extPath($_EXTKEY).'class.tx_ux_chcforum_author.php';
$TYPO3_CONF_VARS['FE']['XCLASS']['ext/chc_forum/pi1/class.tx_chcforum_user.php'] = t3lib_extMgm::extPath($_EXTKEY).'class.tx_ux_chcforum_user.php';
$TYPO3_CONF_VARS['FE']['XCLASS']['ext/chc_forum/pi1/class.tx_chcforum_conference.php'] = t3lib_extMgm::extPath($_EXTKEY).'class.tx_ux_chcforum_conference.php';
$TYPO3_CONF_VARS['FE']['XCLASS']['ext/chc_forum/pi1/class.tx_chcforum_display.php'] = t3lib_extMgm::extPath($_EXTKEY).'class.tx_ux_chcforum_display.php';
$TYPO3_CONF_VARS['FE']['XCLASS']['ext/chc_forum/pi1/class.tx_chcforum_post.php'] = t3lib_extMgm::extPath($_EXTKEY).'class.tx_ux_chcforum_post.php';

?>
