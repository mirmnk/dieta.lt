<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<div  class="form-container" id="tx_vvmaistoforas2_plist">
<?php $this->printFormTag('vv_maistoforas2-mainform'); ?>

<div id="plist_search_form_container">
<div id="plist_search_form">
<fieldset>
<legend><strong>%%%tx_vvmaistoforas2_pListForm_fieldset1_legend%%%</strong></legend>
<div>
<label for="vv_maistoforas2-plist-vitamin">%%%tx_vvmaistoforas2_pListForm_vitamins_label%%%</label>
<select id="vv_maistoforas2-plist-vitamin" name="vv_maistoforas2_plist[vitamin]"><?php print $this->createSelectorOptions('pListSearchFormItems_vitamins',$this->controller->parameters->get('vitamin')); ?></select>
</div>
<div>
<label for="vv_maistoforas2-plist-ns">%%%tx_vvmaistoforas2_pListForm_nutritionalSupplements_label%%%</label>
<select id="vv_maistoforas2-plist-ns" name="vv_maistoforas2_plist[ns]"><?php print $this->createSelectorOptions('pListSearchFormItems_nutritionalSupplements', $this->controller->parameters->get('ns')); ?></select>
</div>
<div>
<label for="vv_maistoforas2-plist-ms">%%%tx_vvmaistoforas2_pListForm_mineralSupplements_label%%%</label>
<select id="vv_maistoforas2-plist-ms" name="vv_maistoforas2_plist[ms]"><?php print $this->createSelectorOptions('pListSearchFormItems_mineralSupplements', $this->controller->parameters->get('ms')); ?></select>
</div>
<div>
<label for="vv_maistoforas2-plist-ed">%%%tx_vvmaistoforas2_pListForm_energydensity_label%%%</label>
<input id ="vv_maistoforas2-plist-ed" type="checkbox" name="vv_maistoforas2_plist[ed]" <?php print (($this->controller->parameters->get('ed'))?' checked="checked"':''); ?>value="1" />
</div>
<div>
<label for="vv_maistoforas2-plist-hl">%%%tx_vvmaistoforas2_pListForm_holestirol_label%%%</label>
<input id ="vv_maistoforas2-plist-hl" type="checkbox" name="vv_maistoforas2_plist[hl]" <?php print (($this->controller->parameters->get('hl'))?' checked="checked"':''); ?>value="1" />
</div>
<div>
<label for="vv_maistoforas2-plist-searchstr">%%%tx_vvmaistoforas2_pListForm_pname_label%%%</label>
<input id ="vv_maistoforas2-plist-searchstr" name="vv_maistoforas2_plist[srchstr]" value="<?php print $this->controller->parameters->get('srchstr'); ?>"/>
</div>
<?php $entryList = $this->get('pGroupsList'); ?>
<?php if($entryList->isNotEmpty()): ?>
<div>
<label for="vv_maistoforas2-plist-pgroups">%%%tx_vvmaistoforas2_pListForm_pgroups_label%%%</label>
<select id="vv_maistoforas2-plist-pgroups" name="vv_maistoforas2_plist[group]"><?php print $this->createPGroupOptions(); ?></select>
</div>
<?php endif; ?>
</fieldset>

<fieldset>
<legend><strong>%%%tx_vvmaistoforas2_pListForm_fieldset2_legend%%%</strong></legend>
<div class="controlset">
<span class="label">%%%tx_vvmaistoforas2_pListForm_sortIn_label%%%</span>
<input type="radio" id="vv_maistoforas2-plist-sort-0" name="vv_maistoforas2_plist[sort]" <?php print ((!$this->controller->parameters->get('sort'))?' checked="checked"':''); ?>value="0" /> <label for="vv_maistoforas2-plist-sort-0">%%%tx_vvmaistoforas2_pListForm_order_asc_label%%%</label>
<input type="radio" id="vv_maistoforas2-plist-sort-1" name="vv_maistoforas2_plist[sort]" <?php print (($this->controller->parameters->get('sort'))?' checked="checked"':''); ?>value="1" /> <label for="vv_maistoforas2-plist-sort-1">%%%tx_vvmaistoforas2_pListForm_order_desc_label%%%</label>
<span>%%%tx_vvmaistoforas2_pListForm_order_label%%%</span>
</div>
<div>
<label for="vv_maistoforas2-plist-limit">%%%tx_vvmaistoforas2_pListForm_displayBy_label%%%</label>
<select id="vv_maistoforas2-plist-limit" name="vv_maistoforas2_plist[limit]"><?php print $this->createSelectorOptions('pListSearchFormItems_limit', $this->controller->parameters->get('limit')); ?></select>
<span>%%%tx_vvmaistoforas2_pListForm_displayByitems_label%%%</span>
</div>
</fieldset>
<div class="submit-controls">
<input type="submit" name="vv_maistoforas2_plist[action][filter]" value="%%%tx_vvmaistoforas2_pValue_products_submit_filter_label%%%" />
<input type="submit" name="vv_maistoforas2_plist[action][filterclear]" value="%%%tx_vvmaistoforas2_pValue_products_reset_filter_label%%%" />
</div>
</div>
</div>

</form>
</div>





