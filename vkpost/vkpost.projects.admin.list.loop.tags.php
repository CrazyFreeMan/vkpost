<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=projects.admin.list.loop
Tags=projects.admin.default.tpl:{PRJ_ROW_VALIDATE_VKPOST_URL}
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
global $cfg;
if (cot_plugin_active('vkpost') && $cfg['projects']['prevalidate'])
{
	require_once cot_langfile('vkpost', 'plug');
	$t->assign('PRJ_ROW_VALIDATE_VKPOST_URL', cot_url('admin', 'm=projects&p=default&a=validate&vk_send=1&id='.$item['item_id']));
} 