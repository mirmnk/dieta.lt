<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_vvmaistoforas_product=1
');
t3lib_extMgm::addPageTSConfig('

	# ***************************************************************************************
	# CONFIGURATION of RTE in table "tx_vvmaistoforas_product", field "description"
	# ***************************************************************************************
RTE.config.tx_vvmaistoforas_product.description {
  hidePStyleItems = H1, H4, H5, H6
  proc.exitHTMLparser_db=1
  proc.exitHTMLparser_db {
    keepNonMatchedTags=1
    tags.font.allowedAttribs= color
    tags.font.rmTagIfNoAttrib = 1
    tags.font.nesting = global
  }
}
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_vvmaistoforas_receptas=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_vvmaistoforas_ingridient=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_vvmaistoforas_substance=1
');


  ## Extending TypoScript from static template uid=43 to set up userdefined tag:
t3lib_extMgm::addTypoScript($_EXTKEY,'editorcfg','
	tt_content.CSS_editor.ch.tx_vvmaistoforas_pi1 = < plugin.tx_vvmaistoforas_pi1.CSS_editor
',43);


t3lib_extMgm::addPItoST43($_EXTKEY,'pi1/class.tx_vvmaistoforas_pi1.php','_pi1','list_type',1);
?>