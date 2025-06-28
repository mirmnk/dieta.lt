<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php $entryList = $this->get('pGroupsList'); ?>
<?php if($entryList->isNotEmpty()): ?>
<div id="tx_vvmaistoforas2_pvalue">

<ul id="filter_search_menu">
<li class="act"><?php $this->printTabLink('%%%tx_vvmaistoforas2_pValue_tab1_label%%%'); ?></li>
<li><?php $this->printTabLink('%%%tx_vvmaistoforas2_pValue_tab2_label%%%', 'search'); ?></li>
</ul>
<div id="filter_search_form_container">
<div id="filter_search_form">
<label for="vv_maistoforas2-pgroups">%%%tx_vvmaistoforas2_pValue_pgroups_label%%%</label>
<select id="vv_maistoforas2-pgroups" name="vv_maistoforas2_pvalue[group]"><?php print $this->createPGroupOptions(); ?></select>
<div class="submit-controls">
<input type="submit" name="vv_maistoforas2_pvalue[action][filter]" value="%%%tx_vvmaistoforas2_pValue_products_submit_filter_label%%%" />
</div>
</div>
</div>

</div>
<?php endif; ?>




