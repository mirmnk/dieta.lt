<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>
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
<select id="vv_maistoforas2-plist-ns" name="vv_maistoforas2_plist[ns]" onchange="vv_maistoforas2_plistProcessSubSubst(xajax.getFormValues('vv_maistoforas2-mainform'))"><?php print $this->createSelectorOptions('pListSearchFormItems_nutritionalSupplements', $this->controller->parameters->get('ns')); ?></select>
</div>
	<?php endif; ?>
<?php endif; ?>
<?php if($this->controller->parameters->get('subst') == 'ms'): ?>
	<?php $entryList = $this->get('pListSearchFormItems_mineralSupplements'); ?>
	<?php if(is_object($entryList) && $entryList->isNotEmpty()): ?>
<div>
<select id="vv_maistoforas2-plist-ms" name="vv_maistoforas2_plist[ms]" onchange="vv_maistoforas2_plistProcessSubSubst(xajax.getFormValues('vv_maistoforas2-mainform'))"><?php print $this->createSelectorOptions('pListSearchFormItems_mineralSupplements', $this->controller->parameters->get('ms')); ?></select>
</div>
	<?php endif; ?>
<?php endif; ?>