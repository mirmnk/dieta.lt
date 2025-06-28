<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<div  class="form-container  printHide" id="tx_vvmaistoforas2_plist_simple">
<?php $this->printFormTag('vv_maistoforas2-mainform'); ?>

<div id="plist_search_form_container">
<div id="plist_search_form">
<fieldset id="fieldset1">
<legend><strong>%%%tx_vvmaistoforas2_pListForm_fieldset1_legend%%%</strong></legend>
<?php $entryList = $this->get('pListSearchFormItems_substances'); ?>
<?php if(is_object($entryList) && $entryList->isNotEmpty()): ?>
	<?php if($this->controller->parameters->has('subst') && $this->controller->parameters->get('subst')): ?>
<div id="selector-one" class="stepOne-complete">
	<?php else: ?>
<div id="selector-one" class="stepOne-uncomplete">
	<?php endif; ?>
<select id="vv_maistoforas2-plist-vitamin" name="vv_maistoforas2_plist[subst]" onchange="vv_maistoforas2_plistProcessSubst(xajax.getFormValues('vv_maistoforas2-mainform'))"><?php print $this->createSelectorOptions('pListSearchFormItems_substances',$this->controller->parameters->get('subst')); ?></select>
</div>
<?php endif; ?>
<?php if($this->has('spinner')): ?>
<?php print $this->get('spinner'); ?>
<?php endif; ?>
	<?php if($this->controller->parameters->has('subst') && $this->controller->parameters->has($this->controller->parameters->get('subst')) && $this->controller->parameters->get($this->controller->parameters->get('subst'))): ?>
<div id="substSubSelect" class="stepTwo-complete">
	<?php else: ?>
<div id="substSubSelect" class="stepTwo-uncomplete">
	<?php endif; ?>
<?php if($this->controller->parameters->get('subst') == 'vitamin'): ?>
	<?php $entryList = $this->get('pListSearchFormItems_vitamins'); ?>
	<?php if(is_object($entryList) && $entryList->isNotEmpty()): ?>
<div>
<select id="vv_maistoforas2-plist-vitamin" name="vv_maistoforas2_plist[vitamin]" onchange="vv_maistoforas2_plistProcessSubSubst(xajax.getFormValues('vv_maistoforas2-mainform'))"><?php print $this->createSelectorOptions('pListSearchFormItems_vitamins',$this->controller->parameters->get('vitamin')); ?></select>
</div>
	<?php endif; ?>
<?php endif; ?>
<?php if($this->controller->parameters->get('subst') == 'ns'): ?>
	<?php $entryList = $this->get('pListSearchFormItems_nutritionalSupplements'); ?>
	<?php if(is_object($entryList) && $entryList->isNotEmpty()): ?>

<div>
<select id="vv_maistoforas2-plist-ns" name="vv_maistoforas2_plist[ns]" onclick="vv_maistoforas2_plistProcessSubSubst(xajax.getFormValues('vv_maistoforas2-mainform'))"><?php print $this->createSelectorOptions('pListSearchFormItems_nutritionalSupplements', $this->controller->parameters->get('ns')); ?></select>
</div>
	<?php endif; ?>
<?php endif; ?>
<?php if($this->controller->parameters->get('subst') == 'ms'): ?>
	<?php $entryList = $this->get('pListSearchFormItems_mineralSupplements'); ?>
	<?php if(is_object($entryList) && $entryList->isNotEmpty()): ?>
<div>
<select id="vv_maistoforas2-plist-ms" name="vv_maistoforas2_plist[ms]" onclick="vv_maistoforas2_plistProcessSubSubst(xajax.getFormValues('vv_maistoforas2-mainform'))"><?php print $this->createSelectorOptions('pListSearchFormItems_mineralSupplements', $this->controller->parameters->get('ms')); ?></select>
</div>
	<?php endif; ?>
<?php endif; ?>
</div>
</fieldset>

<fieldset id="fieldset2">
<legend><strong>%%%tx_vvmaistoforas2_pListForm_fieldset2_legend%%%</strong></legend>
	<?php if($this->controller->parameters->has('subst') && ($this->controller->parameters->get('subst') == 'vitamin' || $this->controller->parameters->get('subst') == 'ms' || $this->controller->parameters->get('subst') == 'ns')): ?>
<div id="selector-three" class="stepThree-complete">
	<?php else: ?>
<div id="selector-three" class="stepTwo-complete">
	<?php endif; ?>

<div class="controlset">
<span class="label">%%%tx_vvmaistoforas2_pListForm_sortIn_label%%%</span>
<input type="radio" id="vv_maistoforas2-plist-sort-1" name="vv_maistoforas2_plist[sort]" <?php print ((intval($this->controller->parameters->get('sort')) == 1 )?' checked="checked"':''); ?> value="1" /> <label for="vv_maistoforas2-plist-sort-1">%%%tx_vvmaistoforas2_pListForm_order_asc_label%%%</label>
<input type="radio" id="vv_maistoforas2-plist-sort-0" name="vv_maistoforas2_plist[sort]" <?php print ((intval($this->controller->parameters->get('sort')) == 0)?' checked="checked"':''); ?> value="0" /> <label for="vv_maistoforas2-plist-sort-0">%%%tx_vvmaistoforas2_pListForm_order_desc_label%%%</label>
<span>%%%tx_vvmaistoforas2_pListForm_order_label%%%</span>
</div>
<?php $entryList = $this->get('pListSearchFormItems_limit'); ?>
<?php if(is_object($entryList) && $entryList->isNotEmpty()): ?>
<div>
<label for="vv_maistoforas2-plist-limit">%%%tx_vvmaistoforas2_pListForm_displayBy_label%%%</label>
<select id="vv_maistoforas2-plist-limit" name="vv_maistoforas2_plist[limit]"><?php print $this->createSelectorOptions('pListSearchFormItems_limit', $this->controller->parameters->get('limit')); ?></select>
<span>%%%tx_vvmaistoforas2_pListForm_displayByitems_label%%%</span>
</div>
</div>
<?php endif; /*?>
<div class="controlset">
<span class="label">%%%tx_vvmaistoforas2_pListForm_layout_label%%%</span>
<input type="radio" id="vv_maistoforas2-plist-layout-1" name="vv_maistoforas2_plist[layout]" <?php print ((intval($this->controller->parameters->get('layout')) == 1)?' checked="checked"':''); ?> value="1" /> <label for="vv_maistoforas2-plist-sort-1">%%%tx_vvmaistoforas2_pListForm_layout_block_label%%%</label>
<input type="radio" id="vv_maistoforas2-plist-layout-0" name="vv_maistoforas2_plist[layout]" <?php print ((intval($this->controller->parameters->get('layout')) == 0)?' checked="checked"':''); ?> value="0" /> <label for="vv_maistoforas2-plist-sort-0">%%%tx_vvmaistoforas2_pListForm_layout_table_label%%%</label>
</div>
<?php */?>
</fieldset>
<div class="submit-controls">
<input type="submit" name="vv_maistoforas2_plist[action][filter]" value="%%%tx_vvmaistoforas2_pValue_products_submit_filter_label%%%" />
<input type="submit" name="vv_maistoforas2_plist[action][clear]" value="%%%tx_vvmaistoforas2_pValue_products_reset_filter_label%%%" />
</div>
</div>
</div>

</form>
</div>





