<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>


<div class="plist_search_form_container-right yellow-block">

<fieldset id="fieldset2">
<legend><strong>%%%tx_vvmaistoforas2_nNormRationForm_ration_label%%%</strong></legend>
<?php $entryList = $this->get('ration'); ?>
<?php if($entryList->isNotEmpty()): ?>
	<table cellspacing="0">
<?php if($subst = $this->controller->parameters->get('subst')): ?>
<tr><td colspan="4"></td><th>%%%tx_vvmaistoforas2_basicproduct_<?php print $subst;?>%%%</th></tr>
<?php endif; ?>
<?php $pCount = $grSum = $substSum = 0;?>
<?php for($entryList->rewind(); $entryList->valid(); $entryList->next()): $entry = $entryList->current();	?>
<?php $grSum += $entry->get('ammount');?>
	<tr><td><?php print ++$pCount.'.';?></td><td><?php $entry->printAsText('title'); ?></td><td> 
	<?php $entry->printAsText('ammount'); ?>
 %%%tx_vvmaistoforas2_nNormRationForm_grams_label%%% </td><td>&nbsp;</td>
<?php if($subst): ?>
<?php $pList = $this->get('productList'); ?>
<?php $product = $pList->get($entry->get('uid')); ?>
<td style="text-align: right;"><?php  print $substGr = number_format(($product->get($subst)*$product->get('coefficient')*($entry->asInteger('ammount')/100)), 2, '.', ' ');?>&nbsp;<?php $this->printUnits($subst)?></td>
<?php $substSum += $substGr;?>
<?php endif; ?>
	</tr>
<?php endfor; ?>
<tr class="tr-subtotal"><td colspan="2"></td><td><?php print $grSum;?> %%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%<td>
<?php if($subst): ?>
<td style="text-align: right;"><?php print number_format($substSum, 2, '.', ' ');?>&nbsp;<?php $this->printUnits($subst)?></td>
<?php endif; ?>
</tr>
	</table>
<?php endif; ?>
</fieldset>
</div>






