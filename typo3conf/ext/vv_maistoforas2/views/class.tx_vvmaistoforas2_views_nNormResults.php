<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2007 Miroslav Monkevic <m@vektorius.lt>
*  All rights reserved
*
*  This script is free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Module: 
 * 
 * Created on 2007.06.21
 *
 * @author	Miroslav Monkevic <m@vektorius.lt>
 * @package
 * @subpackage 
 */
 
/**
* [CLASS/FUNCTION INDEX of SCRIPT]
*/
tx_div::load('tx_vvmaistoforas2_views_nNormCommon');


class tx_vvmaistoforas2_views_nNormResults extends tx_vvmaistoforas2_views_nNormCommon {
	var $cObj = null;

	
	function key() {
		$key = parent::key();
		if($key === 'energy') {
			return 'energy_density_kcal';
		} else {
			return $key;
		}
	}
	 
	function printNormDiffValue($value, $substKey) {
		if (!is_object($this->cObj)) {
			$this->cObj = $this->controller->context->getContentObject();
		}
		$wrap = ($value > 0)?'<span class="nnorm-res-red">|</span>':'<span class="nnorm-res-green">|</span>';
		$value = ($value > 0)? '+'.$value:$value;
		$value = $value.'&nbsp;'.$this->getUnits($substKey);
		print $this->cObj->wrap($value, $wrap);
	}
	
	function printGenderLabel() {
		$gender = intval($this->controller->parameters->get('gender'));
		switch($gender) {
			case 1:
				$label = '%%%tx_vvmaistoforas2_nNormInfoForm_male_label%%%';
			break;
			
			case 2:
				$label = '%%%tx_vvmaistoforas2_nNormInfoForm_female_label%%%';
			break;
			
			default:
				$label = '';			
			break;

		}
		print $label;
	}

	function printConstitutionLabel() {
		$constitution = intval($this->controller->parameters->get('const'));
		switch($constitution) {
			case 1:
				$label = '%%%tx_vvmaistoforas2_nNormInfoForm_constitution_heavy_label%%%';
			break;
			
			case 2:
				$label = '%%%tx_vvmaistoforas2_nNormInfoForm_constitution_spare_label%%%';
			break;
			
			default:
				$label = '';			
			break;

		}
		print $label;
	}

	function printActivityLabel() {
		$activity = intval($this->controller->parameters->get('activity'));
		switch($activity) {
			case 1:
			case 2:
			case 3:
			case 4:
				$label = '%%%tx_vvmaistoforas2_nNormInfoForm_activity_'.$activity.'_label%%%';
			break;
			
			default:
				$label = '';			
			break;

		}
		print $label;
	}

	function printSubstLink($subst) {

		$link = tx_div::makeInstance('tx_lib_link');
		$link->designator($this->getDesignator());
		$link->destination($this->getDestination());
		$link->label('%%%tx_vvmaistoforas2_basicproduct_'.$subst.'%%%', 1);
		$params = &$this->controller->parameters;

		if($params->get('age')) {
			$arrParameters['age'] = $params->get('age');
		}
		if($params->get('gender')) {
			$arrParameters['gender'] = $params->get('gender');
		}
		if($params->get('const')) {
			$arrParameters['const'] = $params->get('const');
		}
		if($params->get('activity')) {
			$arrParameters['activity'] = $params->get('activity');
		}
		$arrParameters['action'] = $this->controller->_getParameterAction();
		$arrParameters['subst'] = $subst;
		$link->parameters($arrParameters);
		$link->noHash();

		if($this->controller->configurations->get('nnorm_ration_page')) {
			$link->destination($this->controller->configurations->get('nnorm_ration_page'));
			print $this->openAtagHrefInJSwindow($link->makeTag(), 'ration');
		} else {
			print $link->makeTag();
		}
		
#		print '%%%tx_vvmaistoforas2_basicproduct_'.$subst.'%%%';
	}

	/**
	 * Will change the href value from <a> in the input string and turn it into an onclick event that will open a new window with the URL
	 *
	 * @param	string		The string to process. This should be a string already wrapped/including a <a> tag which will be modified to contain an onclick handler. Only the attributes "href" and "onclick" will be left.
	 * @param	string		Window name for the pop-up window
	 * @param	string		Window parameters, see the default list for inspiration
	 * @return	string		The processed input string, modified IF a <a> tag was found
	 */
	function openAtagHrefInJSwindow($str,$winName='',$winParams='width=500,height=500,status=0,menubar=0,scrollbars=1,resizable=1')	{
		if (preg_match('/(.*)(<a[^>]*>)(.*)/i',$str,$match))	{
			$aTagContent = t3lib_div::get_tag_attributes($match[2]);
			$match[2]='<a href="#" onclick="'.
				'vHWin=window.open(\''.$GLOBALS['TSFE']->baseUrlWrap($aTagContent['href']).'\',\''.($winName?$winName:md5($aTagContent['href'])).'\',\''.$winParams.'\');vHWin.focus();return false;'.
				'">';
			$str=$match[1].$match[2].$match[3];
		}
		return $str;
	}
	
	function printUnits($key) {
		print $this->getUnits($key);
	}

	function getUnits($key) {
		$retVal = '';
		if($this->has('units')) {
			if(!count($this->unitsHash)) {
				$objUnits = $this->get('units');
				$this->unitsHash = $objUnits->getHashArray();
			}
			if(isset($this->unitsHash[$key]) && !empty($this->unitsHash[$key])) {
				if(is_array($this->unitsHash[$key]) && isset($this->unitsHash[$key]['units']) && !empty($this->unitsHash[$key]['units'])) {
					$retVal = htmlentities($this->unitsHash[$key]['units'],ENT_NOQUOTES, 'UTF-8');
				}
			}
		}
		return $retVal;		
	}
	
	function isBarPositive($strCode) {
		return preg_match('/positive/i', $strCode);
	}
	
	function getSugarBar() {
		$energy = $this->get('energy');
		$sugarGr = $this->get('sugar');
		$sugar = $sugarGr*4;
		$percent = ($energy)?number_format($sugar/$energy*100, 2, '.', ' '):0;
		$normPercent = $percent;
		$barPercent = round($percent);
		if($percent > 10) {
			$divClass = 'bar-negative';	
		} else {
			$divClass = 'bar-positive';
		}

		return $this->getBarCode3(
						$divClass, 
						$barPercent, 
						$normPercent.'%', 
						$sugarGr.'%%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%'
		);

	}
	function printSugarBar() {
		print $this->getSugarBar();
	}
	
	function getProteinsBar() {
		$energy = $this->get('energy');
		$proteinsGr = $this->get('proteins');
		$proteins = $proteinsGr*4;
		$percent = ($energy)?number_format($proteins/$energy*100, 2, '.', ' '):0;
		$normPercent = $percent;
		$barPercent = round($percent);
		if(($percent < 10) || ($percent > 15)) {
			$divClass = 'bar-negative';			
		} else {
			$divClass = 'bar-positive';					
		}
	
		return $this->getBarCode3(
						$divClass, 
						$barPercent, 
						$normPercent.'%', 
						$proteinsGr.'%%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%'
		);

	}

	function printProteinsBar() {
		print $this->getProteinsBar();
	}


	function getFatsBar() {
		$energy = $this->get('energy');
		$fatsGr = $this->get('fats');
		$fats = $fatsGr*9;
		$percent = ($energy)?number_format($fats/$energy*100, 2, '.', ' '):0;
		$normPercent = $percent;
		$barPercent = round($percent);

		if(($percent < 28) || ($percent > 30)) {
			$divClass = 'bar-negative';			
		} else {
			$divClass = 'bar-positive';					
		}

		return $this->getBarCode3(
						$divClass, 
						$barPercent, 
						$normPercent.'%', 
						$fatsGr.'%%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%'
		);

	}

	function printFatsBar() {
		print $this->getFatsBar();
	}
	
	function getCarbohydratesBar() {
		$energy = $this->get('energy');
		$carbohydrateGr = $this->get('carbohydrate');
		$carbohydrate = $carbohydrateGr*4;
		$percent = ($energy)?number_format($carbohydrate/$energy*100, 2, '.', ' '):0;
		$normPercent = $percent;
		$barPercent = round($percent);

		if(($percent < 55) || ($percent > 62)) {
			$divClass = 'bar-negative';			
		} else {
			$divClass = 'bar-positive';					
		}

		return $this->getBarCode3(
						$divClass, 
						$barPercent, 
						$normPercent.'%', 
						$carbohydrateGr.'%%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%'
		);
	}

	function printCarbohydratesBar() {
		print $this->getCarbohydratesBar();
	}
	
	function getBarCode($divClass, $barPercent, $barContent, $div2Content='', $pxCoefficient=1) {
		$content = $barContent.'<div class="bar-background"><div class="'.$divClass.'" style="width: '.$barPercent*$pxCoefficient.'px;">&nbsp;</div></div>';
		if(!empty($div2Content)) {
			$content = '<div class="bar-gr-kcal"> '.$div2Content.'</div>'.$content;
		}
		
		return $content; 
	}

	function getBarCode3($divClass, $barPercent, $barContent, $div2Content='', $pxCoefficient=1) {
		$imgNr = ($divClass === 'bar-positive')?'':'2';
		$content = $barContent.'<div class="bar-background" style="height: 10px;font-size: 1px;line-height: 10px;"><img style="" src="typo3conf/ext/vv_maistoforas2/res/bkg_bar_general'.$imgNr.'.gif" height="10" width="'.$barPercent*$pxCoefficient.'">&nbsp;</div></div>';
		
		if(!empty($div2Content)) {
			$content = '<div class="bar-gr-kcal"> '.$div2Content.'</div>'.$content;
		}
		
		return $content; 
	}
	
	function getBarCode2($divClass, $barPercent, $barContent, $div2Content='', $pxCoefficient=1) {
		$content = $barContent.'<div class="bar-background"><div class="'.$divClass.'" style="width: '.$barPercent*$pxCoefficient.'px;">&nbsp;</div></div>';
		if(!empty($div2Content)) {
			$content = '<div class="bar-gr-kcal"> '.$div2Content.'</div>'.$content;
		}
		
		return $content; 
	}
	
	
	function printSubstBar($arrValues, $subst) {
		$percent = number_format($arrValues[0]/$arrValues[2]*100, 2, '.', ' ');
		if($percent > 100) {
			$barPercent = 100;
			$divClass = 'bar-negative';	
			$normPercent = round($percent);
		} else {
			$normPercent = $barPercent = round($percent);
			$divClass = 'bar-positive';
		}
		
		print $this->getBarCode3(
						$divClass, 
						$barPercent, 
						$normPercent.'%',
						$arrValues[0].'&nbsp;'.$this->getUnits($subst)
		);		
	}
	
	function printNormLimits($coef, $limit1, $limit2='') {
		$energy = $this->get('energy');
		$content = number_format($energy*$limit1/100/$coef, 2, '.', ' ');
		$content .= ' %%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%';
		if(!empty($limit2)) {
			$content .= ' - '.number_format($energy*$limit2/100/$coef, 2, '.', ' ');
			$content .= ' %%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%';		
		}
		print '('.$content.')';
		
	}

	function printNormDiff($strSubst, $coef, $limit1, $limit2='') {
		$retVal = '';
		$energy = $this->get('energy');
		$substGr = $this->get($strSubst);
		$subst = $substGr*$coef;
		$percent = ($energy)?number_format($subst/$energy*100, 2, '.', ' '):0;
		
		$l1gr = number_format($energy*$limit1/100/$coef, 2, '.', ' ');

		if(!empty($limit2)) {
			$l2gr = number_format($energy*$limit2/100/$coef, 2, '.', ' ');	
		}

		if($percent < $limit1) {
			$retVal =  '<span class="nnorm-res-'.(empty($limit2)?'green':'red').'">-'.($limit1-$percent).'% ('.($l1gr-$substGr).' %%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%)</span>';
		} elseif($percent > $limit2) {
			$retVal =  '<span class="nnorm-res-red">+'.($percent-$limit2).'% ('.($substGr-$l2gr).' %%%tx_vvmaistoforas2_nNormRationForm_grams_label%%%)</span>';			
		}
		
		print $retVal;
	}
	
	
	function isValuePositive(&$arr, $subst='') {
		switch($subst) {
			default:
				if($arr[1] <= 0) {
					return true;
				}
		}
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_nNormResults.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_maistoforas2/views/class.tx_vvmaistoforas2_views_nNormResults.php']);
}
 
?>
