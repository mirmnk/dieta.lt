<?php
	 
	/***************************************************************
	*  Copyright notice
	*
	*  (c) 2004 Zach Davis (zach@crito.org)
	*  All rights reserved
	*
	*  This script is part of the TYPO3 project. The TYPO3 project is
	*  free software; you can redistribute it and/or modify
	*  it under the terms of the GNU General Public License as published by
	*  the Free Software Foundation; either version 2 of the License, or
	*  (at your option) any later version.
	*
	*  The GNU General Public License can be found at
	*  http://www.gnu.org/copyleft/gpl.html.
	*
	*  This script is distributed in the hope that it will be useful,
	*  but WITHOUT ANY WARRANTY; without even the implied warranty of
	*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	*  GNU General Public License for more details.
	*
	*  This copyright notice MUST APPEAR in all copies of the script!
	***************************************************************/
	/**
	* The author class is instantiated when we need to get some information about
	* the author of a post.
	*
	* Note: Both author and user class constructors need to be cleaned up somewhat. 
	* We only need some of the author information -- and we probably don't want to get the info 
	* We don't need from the db.
	*
	* @author Zach Davis <zach@crito.org>
	*/
	class ux_tx_chcforum_author extends tx_chcforum_author {
		 
		 
		 
		 
		/**
		* Returns the HTML for the author image
		*
		* @param integer  $height: the maximum height for the image.
		* @return string  author image HTML.  
		*/
		function return_img_tag($height = 75) {
			$imgOk  = false;
			
			// check for custom image field
			if ($this->fconf['alt_img_field']) {
				$field = $this->fconf['alt_img_field'];
				$img_path = './'.$this->fconf['alt_img_path'];
				$img_path_rel = $this->fconf['alt_img_path'];
				if (!empty($this->$field) && t3lib_div::validPathStr($this->$field) == true) {
					$img = explode(',', $this->$field);
					if (file_exists($img_path.'/'.$img[0]) == true) {
						$imgOK  = true;
					}
				}			
			}
			
			if (!$imgOK){
				$field = 'image';
				// load the TCA.
				t3lib_div::loadTCA("fe_users");
		
				$img_path = './'.$GLOBALS['TCA']['fe_users']['columns']['image']['config']['uploadfolder'];
				$img_path_rel = $GLOBALS['TCA']['fe_users']['columns']['image']['config']['uploadfolder'];
				if (!empty($this->$field) && t3lib_div::validPathStr($this->$field) == true) {
					$img = explode(',', $this->$field);
					if (file_exists($img_path.'/'.$img[0]) == true) {
						$imgOK  = true;
					}
				}			
			}


			if ($imgOK) {
				$image_conf = $this->conf['userImg.'];		
				$image_conf['file'] = $img_path_rel.'/'.$img[0];
				$image_conf['altText'] = tx_chcforum_shared::lang('alt_userpic');
				$image_conf['titleText'] = 'userpic';
				$image_conf['params'] = 'class="userpic"';
				$imgArray = $this->cObj->getImgResource($image_conf['file'],$image_conf['file.']);
				$gen_img_path = $this->cObj->stdWrap($imgArray[3], $image_conf['stdWrap.']); 
				//$gen_img_path = $this->cObj->IMG_RESOURCE($image_conf);
				// if image processing isn't working, go ahead and just show the
				// file as is.
				if (!$gen_img_path) {
					$out = '<img title="userpic" alt="'.tx_chcforum_shared::lang('alt_userpic').'" class="userPic" src="'.$img_path.'/'.$img[0].'" height="'.$height.'" />';
				} else {
					$out = '<img title="userpic" alt="'.tx_chcforum_shared::lang('alt_userpic').'" class="userPic" src="'.$gen_img_path.'" height="'.$imgArray[1].'" />';					
				}
			}
			return $out;
		}
		
	}

	if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_dietaxforum/class.tx_ux_chcforum_author.php']) {
		include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_dietaxforum/class.tx_ux_chcforum_author.php']);
	}
	 
?>
