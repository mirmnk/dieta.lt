<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php if($this->get('editform') == 1): ?>
<input type="text" id="vv_maistoforas2_pvalue_pammount_<?php print $this->get('uid'); ?>" name="vv_maistoforas2_pvalue[pammount]" size="5" value="<?php print $this->get('ammount'); ?>" />
<input type="hidden" name="vv_maistoforas2_pvalue[pid]" value="<?php print $this->get('uid'); ?>" />
<input type="submit" class="submit-ok-ctrl" name="vv_maistoforas2_pvalue[action][filter]"  onclick="return !vv_maistoforas2_nnormAdjustRationItem(<?php print $this->get('uid'); ?>, xajax.$('vv_maistoforas2_pvalue_pammount_<?php print $this->get('uid'); ?>').value)" value="OK" />
<?php else: ?>
<strong><?php $this->printProductLink('add', $this->get('ammount')); ?></strong>
<?php endif; ?>
