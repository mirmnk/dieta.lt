<?php
/*
 * Created on 2006.2.3
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
// Updated by TYPO3 Extension Manager 07-06-2005 08:28:58


$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tstemplate.php']['linkData-PostProc'][] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->encodeSpURL';
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['checkAlternativeIdMethods-PostProc'][] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->decodeSpURL';

$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_urldecodecache'] = 'tx_realurl_urldecodecache';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_urlencodecache'] = 'tx_realurl_urlencodecache';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_chashcache'] = 'tx_realurl_chashcache';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_pathcache'] = 'tx_realurl_pathcache';
#$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_uniqalias'] = 'tx_realurl_uniqalias';

$TYPO3_CONF_VARS['FE']['addRootLineFields'].= ',tx_realurl_pathsegment,alias,nav_title,title';


$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array(
    'init' => array(
        'enableCHashCache' => 1,
        'appendMissingSlash' => 'ifNotFile',
        'enableUrlDecodeCache' => 1,
        'enableUrlEncodeCache' => 1,
#       'respectSimulateStaticURLs' => 1,
#        'postVarSet_failureMode' => 'redirect_goodUpperDir',
    ),
    'redirects' => array(
#      'awstats' => 'awstats/awstats.pl',
    ),
/*    'preVars' => array(
        array(
            'GETvar' => 'no_cache',
            'valueMap' => array(
                'nc' => 1,
            ),
            'noMatch' => 'bypass',
        )
    ), *///preVars
    'pagePath' => array(
        'type' => 'user',
        'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
        'spaceCharacter' => '-',
        'languageGetVar' => 'L',
        'expireDays' => 3
    ),
    'fixedPostVars' => array(
       '42' => array(
	       array(
	            'GETvar' => 'tx_srfeuserregister_pi1[cmd]',
	            'valueMap' => array(
	                'sukurti-vartotoja' => 'create',
	            ),
           'noMatch' => 'bypass',	            
	        )       
       ),
       '41' => array(
	       array(
	            'GETvar' => 'tx_srfeuserregister_pi1[cmd]',
	            'valueMap' => array(
	                'keisti-aprasa' => 'edit',
	                'pasalinti-vartotoja' => 'delete',                    
	            ),
           'noMatch' => 'bypass',	            
	        )       
       ),

       '36' => array (
        array(
          'GETvar' => 'view',
          'valueMap' => array(
		  	'visos-kategorijos' =>  'all_cats',
		  	'rodyti-kategorija' =>  'single_cat',
		  	'rodyti-konferencija' =>  'single_conf',
		  	'rodyti-tema' =>  'single_thread',
		  	'rodyti-atsakyma' =>  'single_post',
		  	'nauji-atsakymai' =>  'new',
		  	'vartotojo-aprasas' =>  'profile',
		  	'redagavimo-rezimas' =>  'edit_post',
		  	'paieska' =>  'search',
		  	'dalyviu-sarasas' =>  'ulist',
		  	'asmenines-zinutes' =>  'cwt_user_pm',
		  	'skaityti-pranesima' =>  'cwt_message',
		  	'draugu-sarasas' =>  'cwt_buddylist',
          ),         
                    'noMatch' => 'bypass',
        ),
          array(
          'GETvar' => 'flag',
          'valueMap' => array(
		  	'redaguoti' =>  'edit',
		  	'paslepti' =>  'hide',
		  	'rodyti' =>  'unhide',
		  	'trinti' =>  'delete',
		  	'cituoti' =>  'quote',
		  	'sekti-tema' =>  'watch_thread',
			'sekti-konferencija' => 'watch_conf',
		  	'uzdaryti-tema' =>  'close_thread',
		  	'atidaryti-tema' =>  'open_thread',
			'nustoti-sekti-tema' => 'ignore_thread',
			'nustoti-sekti-konferencija' => 'ignore_conf',
		  	'paslepti-tema' =>  'hide_thread',
		  	'pazymeti-kaip-skaityta' =>  'mark_read',
        	  ),         
    	    'noMatch' => 'bypass',
	     ),        
       ),
       '_DEFAULT' => array(

	       array(
	            'GETvar' => 'tx_newloginbox_pi1[forgot]',
	            'valueMap' => array(
	                'priminti-slaptazodi' => 1,
	            ),
           'noMatch' => 'bypass',	            
	        ),   
              array(
				'GETvar' => 'cat_uid',
				  'lookUpTable' => array(
					'table' => 'tx_chcforum_category',
					'id_field' => 'uid',
					'alias_field' => 'cat_title',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						  'strtolower' => 1,
						 'spaceCharacter' => '-',
					),
				 ),
'cond' => array(
'prevValueInList' => 'single_cat',
)
            ),
           array(
			'GETvar' => 'conf_uid',
			'lookUpTable' => array(
					'table' => 'tx_chcforum_conference',
					'id_field' => 'uid',
					'alias_field' => 'conference_name',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						'strtolower' => 1,
						'spaceCharacter' => '-',
					),
				),
'cond' =>array(
'prevValueInList' => 'single_conf',
),
            ),
                array(
				'GETvar' => 'thread_uid',
				'lookUpTable' => array(
							'table' => 'tx_chcforum_thread',
							'id_field' => 'uid',
							'alias_field' => 'thread_subject',
							'addWhereClause' => ' AND NOT deleted',
							'useUniqueCache' => 1,
							'useUniqueCache_conf' => array(
								'strtolower' => 1,
								'spaceCharacter' => '-',
							),
					 ),
'cond' => array(
'prevValueInList' =>'single_thread',
),
                 ),
                 array(
	    'GETvar' => 'post_uid',
	     'lookUpTable' => array(
				'table' => 'tx_chcforum_post',
				'id_field' => 'uid',
				'alias_field' => 'post_subject',
				'addWhereClause' => ' AND NOT deleted',
				'useUniqueCache' => 1,
				'useUniqueCache_conf' => array(
	                'strtolower' => 1,
                    'spaceCharacter' => '-',
				),
          ),
'cond' =>array(
'prevValueInList' => 'single_post',
),
       ),
       
      ),// _DEFAULT     
    ), // fixedPostVars
    'postVarSets' => array(
        '_DEFAULT' => array (
 // PARDUOTUVE begin          

			      'shoparticle' => array (
			          array (
			            'GETvar' => 'tx_fbmagento[shop][s]',
			          ),                                
			        ),			
			      'shop' => array (
			          array (
			            'GETvar' => 'tx_fbmagento[shop][route]',
/*                          'valueMap' => array(
                              'katalogas' =>  'catalog'
                           ),         
                          'noMatch' => 'bypass'
*/                          
			          ),          
			          array (
			            'GETvar' => 'tx_fbmagento[shop][controller]',
/*                          'valueMap' => array(
                              'kategorija' =>  'category'
                           ),         
                          'noMatch' => 'bypass'
*/	          
			          ),
			          array (
			            'GETvar' => 'tx_fbmagento[shop][action]',
/*                          'valueMap' => array(
                              'rodoma' =>  'view'
                           ),         
                          'noMatch' => 'bypass'
*/                          
			          ),
			          array (
			            'GETvar' => 'tx_fbmagento[shop][id]',
			            'userFunc' => 'EXT:fbmagento/lib/class.tx_fbmagento_realurl.php:&tx_fbmagento_realurl->idRewrite',

			          ),          
			          array (
			            'GETvar' => 'tx_fbmagento[shop][category]',
			            'userFunc' => 'EXT:fbmagento/lib/class.tx_fbmagento_realurl.php:&tx_fbmagento_realurl->categoryRewrite',

			          ),
			          array (
			            'GETvar' => 'tx_fbmagento[shop][product]',

			          ),                                                              
			        ),
			      'shoppage' => array (
			          array (
			            'GETvar' => 'tx_fbmagento[shop][p]',

			          ),          
			          array (
			            'GETvar' => 'tx_fbmagento[shop][order]',

			          ),         
			          array (
			            'GETvar' => 'tx_fbmagento[shop][dir]',

			          )                             
			    	)   ,                      
// PARDUOTUVE end            
            
# Maistoforas2 BEGIN
		'paieska' => array(
    		'type' => 'single',
    		'keyValues' => array(
    			'vv_maistoforas2_pvalue[action]' => 'search'
    		)
    	),
		'grupe' => array(
			array (
				'GETvar' => 'vv_maistoforas2_pvalue[group]',
				'lookUpTable' => array (
					'table' => 'tx_vvmaistoforas2_pgroups',
					'id_field' => 'uid',
					'alias_field' => 'title',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array (
						'strtolower' => 1,
						'spaceCharacter' => '-',
						
					),
					
				),
			),
	        array(
	          'GETvar' => 'vv_maistoforas2_pvalue[action]',
	          'valueMap' => array(
			  	'produktas' =>  'show',
			  	'visa' =>  'filter',
	          ),         
	                    'noMatch' => 'bypass',
	        ),
			
			array (
				'GETvar' => 'vv_maistoforas2_pvalue[pid]',
				'lookUpTable' => array (
					'table' => 'tx_vvmaistoforas2_basicproduct',
					'id_field' => 'uid',
					'alias_field' => 'title',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array (
						'strtolower' => 1,
						'spaceCharacter' => '-',
						
					),
					
				),
			),	
		),
# Maistoforas2 END
           'apklausa' => array(
                 array(
                     'GETvar' => 'tx_jkpoll_pi1[uid]',
                     'lookUpTable' => array(
						 'table' => 'tx_jkpoll_poll',
						 'id_field' => 'uid',
						 'alias_field' => 'title',
						 'addWhereClause' => ' AND NOT deleted AND NOT hidden',
						 'useUniqueCache' => 1,
						 'useUniqueCache_conf' => array(
							 'strtolower' => 1,
							 'spaceCharacter' => '-',
						  ),
                       ),
                )
            ),
               'user' => array(
                    array(
                        'GETvar' => 'tx_srfeuserregister_pi1[regHash]'
                    )
                ), 
            'produktas' => array(
                 array(
                     'GETvar' => 'tx_vvmaistoforas_pi1[product]',
                     'lookUpTable' => array(
						 'table' => 'tx_vvmaistoforas_product',
						 'id_field' => 'uid',
						 'alias_field' => 'title',
						 'addWhereClause' => ' AND NOT deleted AND NOT hidden',
						 'useUniqueCache' => 1,
						 'useUniqueCache_conf' => array(
							 'strtolower' => 1,
							 'spaceCharacter' => '-',
						  ),
                       ),
                )
            ),
            'vitaminas' => array(
            	array(
                'GETvar' => 'tx_vvmaistoforas_pi1[vitamin]',
                ),
            ),
            'mineraline-medziaga' => array(
            	array(
                'GETvar' => 'tx_vvmaistoforas_pi1[mineral]',
                ),
            ),
            'maistine-medziaga' => array(
            	array(
                'GETvar' => 'tx_vvmaistoforas_pi1[nutrient]',
                ),
            ),
            'straipsnis' => array(
                array(
                    'GETvar' => 'tx_ttnews[tt_news]',
                        'lookUpTable' => array(
                             'table' => 'tt_news',
                             'id_field' => 'uid',
                             'alias_field' => 'title',
                             'addWhereClause' => ' AND NOT deleted',
                             'useUniqueCache' => 1,
                             'useUniqueCache_conf' => array(
                                 'strtolower' => 1,
                                 'spaceCharacter' => '-',
                              ),
                       ),
                       
              ),
           ),
            'straipnis' => array(
                array(
                    'GETvar' => 'tx_ttnews[tt_news]',
                        'lookUpTable' => array(
                             'table' => 'tt_news',
                             'id_field' => 'uid',
                             'alias_field' => 'title',
                             'addWhereClause' => ' AND NOT deleted',
                             'useUniqueCache' => 1,
                             'useUniqueCache_conf' => array(
                                 'strtolower' => 1,
                                 'spaceCharacter' => '-',
                              ),
                       ),
                       
              ),
           ),

			'grizti_i' => array( 
                  array(
                       'GETvar' => 'tx_ttnews[backPid]',
              ),
           ),
	      'kategorija' => array (
	         array(
	             'GETvar' => 'tx_ttnews[cat]',
	             'lookUpTable' => array(
	                 'table' => 'tt_news_cat',
	                 'id_field' => 'uid',
	                 'alias_field' => 'title',
	                 'addWhereClause' => ' AND NOT deleted',
	                 'useUniqueCache' => 1,
	                 'useUniqueCache_conf' => array(
	                     'strtolower' => 1,
						 'spaceCharacter' => '-', 
	                     ),
	                 ),
	             ),
	         ),
            'periodas' => array(
                array( 
                    'GETvar' => 'tx_ttnews[year]' ,
                ),
               array(
                    'GETvar' => 'tx_ttnews[month]' ,
                          'valueMap' => array(
                               'sausis' => '01',
                               'vasaris' => '02',
                               'kovas' => '03',
                               'balandis' => '04',
                               'geguze' => '05',
                               'birzelis' => '06',
                               'liepa' => '07',
                               'rugpjutis' => '08',
                               'rugsejis' => '09',
                               'spalis' => '10',
                               'lapkritis' => '11',
                               'gruodis' => '12',
                            ),
                       'noMatch' => 'bypass',
                ),
                array( 
                    'GETvar' => 'tx_ttnews[day]' ,
                       'noMatch' => 'bypass',
                ),
                 array(
                     'condPrevValue' => -1,
                     'GETvar' => 'tx_ttnews[pS]' , 
                     'valueMap' => array(
                         )
                     ),
                 array(
                     'GETvar' => 'tx_ttnews[pL]' , 
                     'valueMap' => array(
                         )
                     ),
                 array(
                     'GETvar' => 'tx_ttnews[arc]' ,
                     'valueMap' => array(
                         'archyvas' => 1,
                         'non-archived' => -1,
                         )
                     ),
           ),
            'straipsnis-nr' => array(
                array(
                    'GETvar' => 'tx_ttnews[pointer]',
                ),
            ),
            'baneris' => array(
            	array(
                    'GETvar' => 'tx_macinabanners_pi1[banneruid]',
            	),
            ),
/*           'rodyti' =>array(
				array(
	              'GETvar' => 'view',												
				),

	   ), // rodyti*/
    ), // _DEFAULT
    '65' => array(
            'ugis' => array(
                array(
                    'GETvar' => 'tx_vvbmicalculator_pi1[height]',
                ),
            ),
            'svoris' => array(
                array(
                    'GETvar' => 'tx_vvbmicalculator_pi1[weight]',
                ),
            ),
    ),
    '36' => array (
           'konferenciju-grupe' => array(
              array(
				'GETvar' => 'cat_uid',
				  'lookUpTable' => array(
					'table' => 'tx_chcforum_category',
					'id_field' => 'uid',
					'alias_field' => 'cat_title',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						  'strtolower' => 1,
						 'spaceCharacter' => '-', 
					),
				 ),
            ),
           ),
           'konferencija' => array(
           array(
			'GETvar' => 'conf_uid',
			'lookUpTable' => array(
					'table' => 'tx_chcforum_conference',
					'id_field' => 'uid',
					'alias_field' => 'conference_name',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						'strtolower' => 1,
						'spaceCharacter' => '-',
					),
				),
            ),
           ),
           'tema' => array(
                array(
				'GETvar' => 'thread_uid',
				'lookUpTable' => array(
							'table' => 'tx_chcforum_thread',
							'id_field' => 'uid',
							'alias_field' => 'thread_subject',
							'addWhereClause' => ' AND NOT deleted',
							'useUniqueCache' => 1,
							'useUniqueCache_conf' => array(
								'strtolower' => 1,
								'spaceCharacter' => '-',
							),
					 ),
                 ),
            ),
           'atsakymas' => array(
                 array(
	    'GETvar' => 'post_uid',
	     'lookUpTable' => array(
				'table' => 'tx_chcforum_post',
				'id_field' => 'uid',
				'alias_field' => 'post_subject',
				'addWhereClause' => ' AND NOT deleted',
				'useUniqueCache' => 1,
				'useUniqueCache_conf' => array(
	                'strtolower' => 1,
                    'spaceCharacter' => '-',
				),
          ),
       ),
      ),
      'puslapis' => array(
        array(
		    'GETvar' => 'page',
    	),
      ),
           'straipsnis' => array(
                array(
                    'GETvar' => 'tx_ttnews[tt_news]',
                        'lookUpTable' => array(
                             'table' => 'tt_news',
                             'id_field' => 'uid',
                             'alias_field' => 'title',
                             'addWhereClause' => ' AND NOT deleted',
                             'useUniqueCache' => 1,
                             'useUniqueCache_conf' => array(
                                 'strtolower' => 1,
                                 'spaceCharacter' => '-',
                              ),
                       ),
                       
              ),
           ),
           'straipnis' => array(
                array(
                    'GETvar' => 'tx_ttnews[tt_news]',
                        'lookUpTable' => array(
                             'table' => 'tt_news',
                             'id_field' => 'uid',
                             'alias_field' => 'title',
                             'addWhereClause' => ' AND NOT deleted',
                             'useUniqueCache' => 1,
                             'useUniqueCache_conf' => array(
                                 'strtolower' => 1,
                                 'spaceCharacter' => '-',
                              ),
                       ),
                       
              ),
           ),

			'grizti-i' => array( 
                  array(
                       'GETvar' => 'tx_ttnews[backPid]',
              ),
           ),
	      'kategorija' => array (
	         array(
	             'GETvar' => 'tx_ttnews[cat]',
	             'lookUpTable' => array(
	                 'table' => 'tt_news_cat',
	                 'id_field' => 'uid',
	                 'alias_field' => 'title',
	                 'addWhereClause' => ' AND NOT deleted',
	                 'useUniqueCache' => 1,
	                 'useUniqueCache_conf' => array(
	                     'strtolower' => 1,
						 'spaceCharacter' => '-', 
	                     ),
	                 ),
	             ),
	         ),
      'mano-dieta' => array(
      	array(
      		'GETvar' => 'action',
           'valueMap' => array(
               'nauja-zinute' => 'getviewmessagesnew',
               'rodyti-viena' => 'getviewmessagessingle',
               'trinti-zinute' => 'getviewmessagesdelete',
               'zinuciu-sarasas' => 'getviewmessages',
               'vartotojo-aprasas' => 'getviewprofile',
               'draugai' => 'getviewbuddylist',
               'vartotoju-sarasas' => 'getviewuserlist',
               'ideti-nauja-drauga' => 'getviewbuddylistadd',
            ), 		
           'noMatch' => 'bypass',
      	),
      	array(
      		'GETvar' => 'uid',
			'lookUpTable' => array(
					'table' => 'fe_users',
					'id_field' => 'uid',
					'alias_field' => 'username',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						'strtolower' => 1,
						'spaceCharacter' => '-',
					),
			 ),
      		'cond' => array(
				'prevValueInList' =>'getviewprofile',
			),
      	),
      	array(
      		'GETvar' => 'recipient_uid',
			'lookUpTable' => array(
					'table' => 'fe_users',
					'id_field' => 'uid',
					'alias_field' => 'username',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						'strtolower' => 1,
						'spaceCharacter' => '-',
					),
			 ),
      		'cond' => array(
				'prevValueInList' =>'getviewmessagesnew',
			),
      	),
      	array(
      		'GETvar' => 'letter',
      		'cond' => array(
				'prevValueInList' =>'getviewuserlist',
			),
      	),      
     ),  	   
    ), // page UID 36 
    ), // postVarsSets
    'fileName' => array (
//    	'defaultToHTMLsuffixOnPrev' => 1,
        'index' => array(
            'backend.php' => array(
                'keyValues' => array (
                    'type' => 100,
                )
            ),
            'print.html' => array(                         
                'keyValues' => array(
                    'type' => 98,
                )
            ),
             '_DEFAULT' => array(
                 'keyValues' => array(
                 )
            ),
        ),
    ),
);

$TYPO3_CONF_VARS['EXTCONF']['realurl']['www.dieta.lt'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
$TYPO3_CONF_VARS['EXTCONF']['realurl']['www.dieta.lt']['pagePath']['rootpage_id'] = 1;
$TYPO3_CONF_VARS['EXTCONF']['realurl']['dieta.lt'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['www.dieta.lt']; 
$TYPO3_CONF_VARS['EXTCONF']['realurl']['www.dieticious.com'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
$TYPO3_CONF_VARS['EXTCONF']['realurl']['www.dieticious.com']['pagePath']['rootpage_id'] = 376;
$TYPO3_CONF_VARS['EXTCONF']['realurl']['dieticious.com'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['www.dieticious.com'];
$TYPO3_CONF_VARS['EXTCONF']['realurl']['beta.dieta.lt'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
$TYPO3_CONF_VARS['EXTCONF']['realurl']['beta.dieta.lt']['pagePath']['rootpage_id'] = 441;
$TYPO3_CONF_VARS['EXTCONF']['realurl']['www.diet365.ru'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
$TYPO3_CONF_VARS['EXTCONF']['realurl']['www.diet365.ru']['pagePath']['rootpage_id'] = 503;
$TYPO3_CONF_VARS['EXTCONF']['realurl']['diet365.ru'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['www.diet365.ru'];




?>
