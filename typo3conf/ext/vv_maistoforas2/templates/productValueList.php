<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php $entryList = $this->get('productList'); ?>
<?php if($entryList->isNotEmpty()): ?>
<div id="tx_vvmaistoforas2_pvalue_list">
<div class="general-container printHide">
  <h2>%%%tx_vvmaistoforas2_pValue_products_label%%%</h2>
  <div class="general-block"><?php $intCounu = 0;?><table>
<?php for($entryList->rewind(); $entryList->valid(); $entryList->next()): $entry = $entryList->current();	?>
	<tr class="pvalue-list-pointer"><td><?php print ++$intCount.'.</td><td> '; $entry->printProductLink(); ?> </td></tr>
<?php endfor; ?>
</table></div>
</div>
</div>
<?php elseif($this->controller->parameters->get('srchstr')): ?>
<div id="tx_vvmaistoforas2_pvalue_list">
<div class="general-container printHide">
  <h2>%%%tx_vvmaistoforas2_pValue_search_results_label%%%</h2>
  <div class="general-block">
	<p>%%%tx_vvmaistoforas2_pValue_no_results_label%%%</p>
	</div>
</div>
</div>
<?php endif; ?>




