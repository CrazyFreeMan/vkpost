<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=page.add.add.done,page.edit.update.done
[END_COT_EXT]
==================== */

/**
 * vkpost
 *
 * @package vkpost
 * @version 0.1
 * @author CrazyFreeMan
 * @copyright Copyright (c) CrazyFreeMan 2014
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

if (cot_plugin_active('vkpost'))
{
	require_once cot_incfile('vkpost', 'plug');
	if (!cot_error_found())
	{
		$vk_send = cot_import('vk_send', 'P', 'INT');
		if($vk_send == 1){	
			$urltpm = (empty($rpage['page_alias'])) ? cot_url('page', 'c='.$rpage['page_cat'].'&id='.$rpage['page_id'], '', true) : cot_url('page', 'c='.$rpage['page_cat'].'&al='.$rpage['page_alias'], '', true);
			$url = (strpos($urltpm, '://') === false) ? COT_ABSOLUTE_URL . $urltpm : $urltpm;
			$text = $rpage['page_desc'];			
			postToVk($text,$url);  
			
		}		
	}
} 