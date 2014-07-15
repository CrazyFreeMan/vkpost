<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=page.add.tags,page.edit.tags
Tags=page.add.tpl:{PAGEADD_FORM_VKPOSTTITLE}, {PAGEADD_FORM_VKPOST};page.edit.tpl:{PAGEEDIT_FORM_VKPOSTTITLE}, {PAGEEDIT_FORM_VKPOST}
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

require_once cot_incfile('vkpost', 'plug');
global $L;
if ((int) $id > 0)
{	
	$vkpost = 'EDIT';
}
else
{	
	$vkpost = 'ADD';
}
$t->assign('PAGE'.$vkpost.'_FORM_VKPOSTTITLE', $L["vkpost_send"]);
$t->assign('PAGE'.$vkpost.'_FORM_VKPOST', generate_vkpost_form());
