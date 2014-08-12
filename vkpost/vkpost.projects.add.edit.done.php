<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=projects.add.add.done,projects.edit.update.done,projects.preview.save.done,projects.admin.validate.done
[END_COT_EXT]
==================== */

/**
 * vkpost
 *
 * @package vkpost
 * @version 0.2
 * @author CrazyFreeMan
 * @copyright Copyright (c) CrazyFreeMan 2014
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');


if (cot_plugin_active('vkpost'))
{ 
	global $cfg;
	require_once cot_incfile('vkpost', 'plug');
   
	if($cfg['plugin']['vkpost']["vk_enable_project_post"] && $ritem['item_state'] == 0)
	{		
			if (!cot_error_found())
			{	

				
				if($cfg['projects']['preview'] && !$cfg['projects']['prevalidate']){							
					$vk_send = cot_import('vk_send', 'G', 'INT');						
				}

				if(!$cfg['projects']['preview'] && !$cfg['projects']['prevalidate']){							
					$vk_send = cot_import('vk_send', 'P', 'INT');
				}

				if($cfg['projects']['prevalidate'] && $a == 'validate') 
				{
					$vk_send = cot_import('vk_send', 'G', 'INT');
				}

				
				if($vk_send == 1){	
					$urlparams = empty($ritem['item_alias']) ?
						array('c' => $ritem['item_cat'], 'id' => $id) :
						array('c' => $ritem['item_cat'], 'al' => $ritem['item_alias']);
					$urltpm = cot_url('projects', $urlparams, '', true);
					$url = (strpos($urltpm, '://') === false) ? COT_ABSOLUTE_URL . $urltpm : $urltpm;					
					$text = textProjectForPost($id);
					//cot_log("OK", "plg");									
					postToVk($text,$url);  
				}		
			}

	}
} 