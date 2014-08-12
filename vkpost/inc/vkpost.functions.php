<?php
/**
 * VK post API
 *
 * @package VK post
 * @author CrazyFreeMan
 * @copyright Copyright (c) CrazyFreeMan 2014
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_langfile('vkpost', 'plug');

function postToVk($text,$link)
{
	global $cfg, $L;
	$urlVK = "https://api.vkontakte.ru/method/wall.post?";
	$group_id = str_replace(' ', '', $cfg['plugin']['vkpost']['vk_id']);

	if($cfg['plugin']['vkpost']['vk_isgroup'] == "1") {
		$group_id = "-".$group_id;
		$from_group = $cfg['plugin']['vkpost']['vk_from_group'];
	}else{
		$from_group = 0;
		if(!empty($cfg['plugin']['vkpost']['vk_services'])) {
			$srvc = "&services=".str_replace(' ', '', $cfg['plugin']['vkpost']['vk_services']);
		}else{
			$srvc = "";
		}
	}
	$urlVK .= "owner_id=".$group_id;
	$urlVK .= "&access_token=".str_replace(' ', '', $cfg['plugin']['vkpost']['vk_access_token']);
	$urlVK .= "&from_group=".$from_group;	
	$urlVK .= $srvc;
	$urlVK .= "&message=".urlencode($text);
	$urlVK .= "&attachment=".urlencode($link);	
	
	
	// ответ от Вконтакте
	$oResponce = json_decode(file_get_contents($urlVK));
	 	if($cfg['plugin']['vkpost']['vk_enable_log'] == "1") {
	 		if(isset($oResponce->error->error_code)){
	 			$logtext = "VKpost Error #".$oResponce->error->error_code." (".$oResponce->error->error_msg.")";
	 		}else{
	 			$logtext = "VKpost OK postID=".$oResponce->response->post_id;
	 		}
		cot_log($logtext, "plg");
	}
}

function textProjectForPost($id){
	global $db, $db_projects, $structure;
	$sql = $db->query("SELECT * FROM $db_projects WHERE item_id=".$id." LIMIT 1");

	if ($sql->rowCount() == 0)
	{
		cot_log("Prj not found", "plg");
	}
	$item = $sql->fetch();	
	$text = '['.$structure['projects'][$item['item_cat']]['title'].'] - '.$item["item_title"].' '.$item["item_cost"];
	if(cot_module_active('payments')){
		global $cfg;
		$text .= " ".$cfg['payments']["valuta"];
	}
	return $text;
}