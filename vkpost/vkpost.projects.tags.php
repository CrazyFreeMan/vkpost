<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=projects.add.tags,projects.edit.tags
Tags=projects.add.tpl:{PRJADD_FORM_VKPOST},{PRJADD_FORM_VKPOSTTITLE};projects.edit.tpl:{PRJEDIT_FORM_VKPOST},{PRJEDIT_FORM_VKPOSTTITLE}
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

if(!$cfg['projects']['preview'] && (!$cfg['projects']['prevalidate'] || $auth['isadmin'])) {
require_once cot_langfile('vkpost', 'plug');
global $cfg, $usr;

	if ((int) $id > 0)
	{	
		$vkposttgs = 'EDIT';
	}
	else
	{	
		$vkposttgs = 'ADD';
	}

	$vktags = array(
	    'PRJ'.$vkposttgs.'_FORM_VKPOSTTITLE' => $L["vkpost_send"], 
	    'PRJ'.$vkposttgs.'_FORM_VKPOST' => cot_radiobox('0', "vk_send", "1,0", $L["vkpost_yes"].",".$L["vkpost_no"])
	);
	
	if($cfg['plugin']['vkpost']["vk_enable_project_post"] && !$cfg['plugin']['vkpost']["vk_enable_project_post_pro"]){
			$t->assign($vktags);
		}
	if($cfg['plugin']['vkpost']["vk_enable_project_post"] && $cfg['plugin']['vkpost']["vk_enable_project_post_pro"]){

			require_once cot_incfile('paypro', 'plug');

			if (cot_getuserpro() || $usr['isadmin'])
			{
				$t->assign($vktags);				
			} else {
				$vktags['PRJ'.$vkposttgs.'_FORM_VKPOST'] = $L["vkpost_only_forpro"];				
				$t->assign($vktags);
			}
			
		}

	}