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
	* Conference class contains the attributes and methods for conferences in the
	* chc_forum extension.
	*
	* @author Zach Davis <zach@crito.org>
	*/
	class ux_tx_chcforum_conference extends tx_chcforum_conference {
		 
	 
	 /**
	  * Conference object constructor. Constructs the object from a DB record.
		*
		* @param integer  $conf_id: the conference uid.
		* @param object  $cObj: cObj that gets passed to every constructor in the forum.
		* @return boolean  true if the DB query returned anything. 
		*/
		function tx_chcforum_conference ($conf_id, $cObj) {
			$this->cObj = $cObj; $this->conf = $this->cObj->conf;

			// bring in the fconf.
			$this->fconf = $this->cObj->fconf;

			// bring in the user object.
			$this->user = $this->fconf['user'];

			$this->rowCount=0;
			
			// check if user can see hidden
			if (is_object($this->user) && $this->user->can_mod_conf($conf_id)) {
				$this->user->show_hidden = 1;	
			}


			 
			$this->internal['results_at_a_time'] = 1000;
			if (!$conf_id) {
				return;
			}

			$table = 'tx_chcforum_conference';
            $addWhere = 'uid='.$GLOBALS['TYPO3_DB']->fullQuoteStr($conf_id,$table);
			$fields = '*';
			$limit = '1';
			$where = tx_chcforum_shared::buildWhere($table,$addWhere,1);
			$results = $GLOBALS['TYPO3_DB']->exec_SELECTquery($fields,$table,$where,$group_by,$order_by,$limit);
			$row_array = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($results);
			$GLOBALS['TYPO3_DB']->sql_free_result($results);

			if ($row_array) {
				foreach ($row_array as $attr => $value) {
					$this->$attr = $value;
				}
				return true;
			}
		}
		 

	 /**
	  * Returns an array with info needed to create a conference row in cat view.
		* If this function is called with $null_conf set to true, it means that we're just
		* asking for an empty conf row to be returned (which is done when there aren't any
		* conferences in a categroy -- in this case, it gets called as a static method
		*
		* @param boolean $null_conf: set this to true if you want an empty conference row returned.
		* @return array array containing keys conf_desc, conf_new, conf_thread_count, conf_post_count, conf_last_post_data.
		*/
		function return_conf_row_data ($null_conf = false) {
			global $rowCount;				 
			$rowCount++;
			if ($null_conf == false) {
				if ($this->new_cnt > 0) {
					if ($this->new_cnt > 1) {
						$label = tx_chcforum_shared::lang('return_thread_data_new_plrl');
					} else {
						$label = tx_chcforum_shared::lang('return_thread_data_new_sing');
					}
					$new_posts = '['.$this->new_cnt.' '.$label.']';
				}
				$output_array = array ('conf_name' => $this->conference_link(),
					'conf_desc' => $this->conference_desc,
					'conf_new' => $new_posts,
					'conf_thread_count' => $this->return_thread_count(),
					'conf_post_count' => $this->return_post_count(),
					'conf_last_post_data' => $this->return_last_post_data()
				);
			} else {
				$output_array = array ('conf_name' => tx_chcforum_shared::lang('single_conf_null'),
					'conf_thread_count' => '-',
					'conf_post_count' => '-',
					'conf_last_post_data' => '<div style="text-align: center">'.tx_chcforum_shared::lang('na').'</div>');
			}
			$output_array['row_params'] = ($rowCount % 2)?' class="odd"':' class="even"';
			return $output_array;
		}
		 
	}
	 
	if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_dietaxforum/class.tx_ux_chcforum_conference.php']) {
		include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vv_dietaxforum/class.tx_ux_chcforum_conference.php']);
	}
	 
?>
