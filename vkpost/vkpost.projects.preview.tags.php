<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=projects.preview.tags
Tags=projects.preview.tpl:{PRJ_SAVE_VKPOST_URL}
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

if (cot_plugin_active('vkpost') && (!$cfg['projects']['prevalidate'] || $auth['isadmin']))
{ 	
	global $cfg;
	if($cfg['plugin']['vkpost']["vk_enable_project_post"])
	{		
		if (!cot_error_found())
		{	
			require_once cot_langfile('vkpost', 'plug');
			$t->assign('PRJ_SAVE_VKPOST_URL',  cot_url('projects', 'm=preview&a=save&id=' . $item['item_id'] . '&vk_send=1&' . cot_xg()));								
		}
	}
} 