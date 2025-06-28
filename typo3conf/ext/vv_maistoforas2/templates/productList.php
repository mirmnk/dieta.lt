<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php $entryList = $this->get('productList'); ?>
<?php if($entryList->isNotEmpty()): ?>
	<?php if($this->has('productListCount') && $this->get('productListCount')): ?>
<div class="yellow-block"><p><?php $this->printAsText('description') ?></p></div>
<div id="pager-top" class="plist_pager">	
	<?php $pageCount = ceil($this->get('productListCount')/$this->controller->parameters->get('limit')); ?>
	<?php $curPointer = ($this->controller->parameters->get('pointer'))?$this->controller->parameters->get('pointer'):1; ?>
<?php /*<p>%%%tx_vvmaistoforas2_pList_numberOfProducts%%% <?php $this->printAsInteger('productListCount'); ?></p> */?>
<p>%%%tx_vvmaistoforas2_pList_displayingPage_message%%% <?php print $curPointer; ?> %%%tx_vvmaistoforas2_pList_displayingPageOf_message%%% <?php print $pageCount; ?></p><span class="printHide">	
		<?php if($curPointer != 1): ?>
			<?php $this->printPagerPageLink('%%%tx_vvmaistoforas2_pList_pagerPrev%%%', $curPointer-1); print '&nbsp;'; ?>		
		<?php endif; ?>	
		<?php for($i=1; $i <= $pageCount; $i++):	?>
		 <?php $this->printPagerPageLink($i, $i); print '&nbsp;'; ?>
		<?php endfor; ?>
		<?php if($curPointer != $pageCount): ?>
			<?php $this->printPagerPageLink('%%%tx_vvmaistoforas2_pList_pagerNext%%%', $curPointer+1); print '&nbsp;'; ?>		
		<?php endif; ?>	
</span></div>
	<?php endif; ?>
	<?php $y = (intval($curPointer)-1)*intval($this->controller->parameters->get('limit'))+1; ?>
	<?php if(!$this->controller->parameters->get('layout')): ?>
  <a class="printButton" href="javascript:void(0);" onclick="window.print();return false;">&nbsp;</a>	
	<table class="vvmaistoforas2-ptable plist-table"><tr><th class="first-cell"></th><th>%%%tx_vvmaistoforas2_basicproduct_title%%%</th>
		<?php $arrSubst = tx_div::explode($this->get('subst')); ?>
		<?php for($i=0; $i < count($arrSubst);$i++): ?>    
			<th>%%%tx_vvmaistoforas2_basicproduct_<?php print $arrSubst[$i]; ?>%%%</th>
		<?php endfor; ?>  
	</tr>
	<?php endif; ?>	
	<?php for($entryList->rewind(); $entryList->valid(); $entryList->next(), ++$y): $entry = $entryList->current();	?>
		<?php if(!$this->controller->parameters->get('layout')): ?>
<tr<?php print (($y % 2)?'':' class="even"'); ?>>
<td class="first-cell"><?php print $y.'.'; ?></td>
<td class="second-cell"><?php print $entry->printAsText('title'); ?></td>
		<?php for($i=0; $i < count($arrSubst);$i++): ?>    
			<td><?php print $entry->printAsText($arrSubst[$i]); ?>&nbsp;<?php $this->printUnits();?></td>
		<?php endfor; ?>  
</tr>		
		<?php else: ?>
<div class="general-container">
  <h2><?php print $y.'. '; $entry->printAsText('title'); ?></h2>
  <div class="general-block">
  <a class="printButton" href="javascript:void(0);" onclick="window.print();return false;">&nbsp;</a>
  <table cellspasing="2" cellpadding="3">
  <tr><td><strong class="black">%%%tx_vvmaistoforas2_basicproduct_title%%%</strong></td><td><?php print $entry->printAsText('title'); ?></td></tr>
  <tr><td><strong class="black">%%%tx_vvmaistoforas2_basicproduct_ecode%%%</strong></td><td><em><?php print $entry->printAsText('ecode'); ?></em></td></tr>
		<?php $arrSubst = tx_div::explode($this->get('subst')); ?>
		<?php for($i=0; $i < count($arrSubst);$i++): ?>    
  <tr><td><strong class="gray">%%%tx_vvmaistoforas2_basicproduct_<?php print $arrSubst[$i]; ?>%%%</strong></td><td><?php print $entry->printAsText($arrSubst[$i]); ?></td></tr>
		<?php endfor; ?>  
  </table>
  </div>
</div>
		<?php endif; ?>
	<?php endfor; ?>
	<?php if(!$this->controller->parameters->get('layout')): ?>
	</table>
	<?php endif; ?>	

	<?php if($this->has('productListCount') && $this->get('productListCount')): ?>
<div class="plist_pager printHide">	
		<?php if($curPointer != 1): ?>
			<?php $this->printPagerPageLink('%%%tx_vvmaistoforas2_pList_pagerPrev%%%', $curPointer-1); print '&nbsp;'; ?>		
		<?php endif; ?>	
		<?php for($i=1; $i <= $pageCount; $i++):	?>
		 <?php $this->printPagerPageLink($i, $i); print '&nbsp;'; ?>
		<?php endfor; ?>
		<?php if($curPointer != $pageCount): ?>
			<?php $this->printPagerPageLink('%%%tx_vvmaistoforas2_pList_pagerNext%%%', $curPointer+1); print '&nbsp;'; ?>		
		<?php endif; ?>	
</div>
	<?php endif; ?>
<?php endif; ?>