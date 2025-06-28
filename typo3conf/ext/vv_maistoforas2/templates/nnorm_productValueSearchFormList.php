<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php $entryList = $this->get('pGroupsList'); ?>
<?php if($entryList->isNotEmpty()): ?>
<div id="tx_vvmaistoforas2_pvalue">
<ul id="filter_search_menu">
<li class="act li-first"><?php $this->printTabLink('%%%tx_vvmaistoforas2_pValue_tab1_label%%%'); ?></li>
<li class="li-second"><?php $this->printTabLink('%%%tx_vvmaistoforas2_pValue_tab2_label%%%', 'search'); ?></li>
</ul>
<div class="clear"> </div>
<div id="filter_search_form_container">
<div id="filter_search_form">
<label for="vv_maistoforas2-pgroups">%%%tx_vvmaistoforas2_pValue_pgroups_label%%%</label>
<select id="vv_maistoforas2-pgroups" name="vv_maistoforas2_pvalue[group]"><?php print $this->createPGroupOptions(); ?></select> <input type="submit" class="nnorm-srch-btn" name="vv_maistoforas2_pvalue[action][filter]" onclick="return !vv_maistoforas2_nnormLoadProductListNnorm(xajax.getFormValues('vv_maistoforas2-nnorminfoform'));" value="%%%tx_vvmaistoforas2_pValue_products_submit_filter_label%%%" />
</div>
</div>
</div>
<?php endif; ?>




