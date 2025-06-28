<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php $product = $this->get('product'); ?>
<?php if($product->isNotEmpty()): ?>
<div id="tx_vvmaistoforas2_pvalue-single">
<a class="printButton" href="javascript:void(0);" onclick="window.print();return false;">&nbsp;</a>
<div class="clear"></div>
<table class="vvmaistoforas2-ptable pvalue-table">
<tr><th class="first-cell" colspan="2"><?php $product->printAsText('title')?></th></tr>
	<?php if($product->has('ecode')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_ecode%%%</td><td><?php $product->printAsText('ecode'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('coefficient')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_coefficient%%%</td><td><?php $product->printAsFloat('coefficient'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('water')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_water%%%</td><td><?php $product->printAsFloat('water'); ?>&nbsp;<?php $this->printUnits('water'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('drysubst')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_drysubst%%%</td><td><?php $product->printAsFloat('drysubst'); ?>&nbsp;<?php $this->printUnits('drysubst'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('proteins')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_proteins%%%</td><td><?php $product->printAsFloat('proteins'); ?>&nbsp;<?php $this->printUnits('proteins'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('animal_proteins')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_animal_proteins%%%</td><td><?php $product->printAsFloat('animal_proteins'); ?>&nbsp;<?php $this->printUnits('animal_proteins'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vegetable_proteins')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vegetable_proteins%%%</td><td><?php $product->printAsFloat('vegetable_proteins'); ?>&nbsp;<?php $this->printUnits('vegetable_proteins'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('fats')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_fats%%%</td><td><?php $product->printAsFloat('fats'); ?>&nbsp;<?php $this->printUnits('fats'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('saturated_fat')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_saturated_fat%%%</td><td><?php $product->printAsFloat('saturated_fat'); ?>&nbsp;<?php $this->printUnits('saturated_fat'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('monounsaturated_fat')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_monounsaturated_fat%%%</td><td><?php $product->printAsFloat('monounsaturated_fat'); ?>&nbsp;<?php $this->printUnits('monounsaturated_fat'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('polyunsaturated_fat')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_polyunsaturated_fat%%%</td><td><?php $product->printAsFloat('polyunsaturated_fat'); ?>&nbsp;<?php $this->printUnits('polyunsaturated_fat'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('cholesterol')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_cholesterol%%%</td><td><?php $product->printAsFloat('cholesterol'); ?>&nbsp;<?php $this->printUnits('cholesterol'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('carbohydrate')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_carbohydrate%%%</td><td><?php $product->printAsFloat('carbohydrate'); ?>&nbsp;<?php $this->printUnits('carbohydrate'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('starch')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_starch%%%</td><td><?php $product->printAsFloat('starch'); ?>&nbsp;<?php $this->printUnits('starch'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('sugar')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_sugar%%%</td><td><?php $product->printAsFloat('sugar'); ?>&nbsp;<?php $this->printUnits('sugar'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('fiber')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_fiber%%%</td><td><?php $product->printAsFloat('fiber'); ?>&nbsp;<?php $this->printUnits('fiber'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('mineral_subst')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_mineral_subst%%%</td><td><?php $product->printAsFloat('mineral_subst'); ?>&nbsp;<?php $this->printUnits('mineral_subst'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('na')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_na%%%</td><td><?php $product->printAsFloat('na'); ?>&nbsp;<?php $this->printUnits('na'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('mg')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_mg%%%</td><td><?php $product->printAsFloat('mg'); ?>&nbsp;<?php $this->printUnits('mg'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('p')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_p%%%</td><td><?php $product->printAsFloat('p'); ?>&nbsp;<?php $this->printUnits('p'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('k')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_k%%%</td><td><?php $product->printAsFloat('k'); ?>&nbsp;<?php $this->printUnits('k'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('ca')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_ca%%%</td><td><?php $product->printAsFloat('ca'); ?>&nbsp;<?php $this->printUnits('ca'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('fe')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_fe%%%</td><td><?php $product->printAsFloat('fe'); ?>&nbsp;<?php $this->printUnits('fe'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('zn')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_zn%%%</td><td><?php $product->printAsFloat('zn'); ?>&nbsp;<?php $this->printUnits('zn'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('se')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_se%%%</td><td><?php $product->printAsFloat('se'); ?>&nbsp;<?php $this->printUnits('se'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('i')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_i%%%</td><td><?php $product->printAsFloat('i'); ?>&nbsp;<?php $this->printUnits('i'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vitamin_a')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vitamin_a%%%</td><td><?php $product->printAsFloat('vitamin_a'); ?>&nbsp;<?php $this->printUnits('vitamin_a'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vitamin_d')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vitamin_d%%%</td><td><?php $product->printAsFloat('vitamin_d'); ?>&nbsp;<?php $this->printUnits('vitamin_d'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vitamin_e')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vitamin_e%%%</td><td><?php $product->printAsFloat('vitamin_e'); ?>&nbsp;<?php $this->printUnits('vitamin_e'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vitamin_b1')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vitamin_b1%%%</td><td><?php $product->printAsFloat('vitamin_b1'); ?>&nbsp;<?php $this->printUnits('vitamin_b1'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vitamin_b2')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vitamin_b2%%%</td><td><?php $product->printAsFloat('vitamin_b2'); ?>&nbsp;<?php $this->printUnits('vitamin_b2'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('niacin')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_niacin%%%</td><td><?php $product->printAsFloat('niacin'); ?>&nbsp;<?php $this->printUnits('niacin'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('niacin_ekv')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_niacin_ekv%%%</td><td><?php $product->printAsFloat('niacin_ekv'); ?>&nbsp;<?php $this->printUnits('niacin_ekv'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('folic_acid')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_folic_acid%%%</td><td><?php $product->printAsFloat('folic_acid'); ?>&nbsp;<?php $this->printUnits('folic_acid'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vitamin_b6')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vitamin_b6%%%</td><td><?php $product->printAsFloat('vitamin_b6'); ?>&nbsp;<?php $this->printUnits('vitamin_b6'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vitamin_b12')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vitamin_b12%%%</td><td><?php $product->printAsFloat('vitamin_b12'); ?>&nbsp;<?php $this->printUnits('vitamin_b12'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('vitamin_c')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_vitamin_c%%%</td><td><?php $product->printAsFloat('vitamin_c'); ?>&nbsp;<?php $this->printUnits('vitamin_c'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('alcohol')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_alcohol%%%</td><td><?php $product->printAsFloat('alcohol'); ?>&nbsp;<?php $this->printUnits('alcohol'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('energy_density_kj')): ?>
<tr><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_energy_density_kj%%%</td><td><?php $product->printAsInteger('energy_density_kj'); ?>&nbsp;<?php $this->printUnits('energy_density_kj'); ?></td></tr>
	<?php endif; ?>
	<?php if($product->has('energy_density_kcal')): ?>
<tr class="even"><td class="first-cell">%%%tx_vvmaistoforas2_basicproduct_energy_density_kcal%%%</td><td><?php $product->printAsInteger('energy_density_kcal'); ?>&nbsp;<?php $this->printUnits('energy_density_kcal'); ?></td></tr>
	<?php endif; ?>
</table>
<p><?php #$this->printBackLink('%%%back%%%'); ?></p>
</div>
<?php endif; ?>





