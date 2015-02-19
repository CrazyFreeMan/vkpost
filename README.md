Розробка призупинена, працюю над новою версією.

VKpost
===========
Version 0.2

UA
==============
Автоматичний постинг статтей і проектів (Фриланс-Биржа) з сайту для Cotonti Siena

###Додано:

1. Можливість постити проекти з параметрами "Для PRO".

###Інструкція по установці 

1. Завантажити і розпакувати вміст архіву, скопіювати файли в папку plugins. 

2. Встановити через панель: (Управління сайтом / Розширення / vkpost).

3. В налаштунках вказати ID группи куди постити чи ID користувача, вказати Access Token (як отримати код описано в token.txt),, вибрати потрібні параметри.

4. Додати теги в шаблоні page.add.tpl 

```
<!-- IF {PHP.cot_plugins_active.vkpost} --> 
<tr>
	<td>{PAGEADD_FORM_VKPOSTTITLE}:</td>
	<td>
		{PAGEADD_FORM_VKPOST}
	</td>
</tr>   
<!-- ENDIF -->
```
та  в шаблоні page.edit.tpl

```
 <!-- IF {PHP.cot_plugins_active.vkpost} --> 
 <tr>
 	<td>{PAGEEDIT_FORM_VKPOSTTITLE}:</td>
 	<td>
 		{PAGEEDIT_FORM_VKPOST}
 	</td>
 </tr>  
   <!-- ENDIF -->
```
5. Додати теги в файлі projects.admin.default.tpl
Шукаємо

```
<!-- IF {PRJ_ROW_STATE} == 2 -->
<a href="{PRJ_ROW_VALIDATE_URL}" class="button">{PHP.L.Validate}</a>	
<!-- ENDIF -->
```
Додаємо

```
<!-- IF {PRJ_ROW_STATE} == 2 -->
<a href="{PRJ_ROW_VALIDATE_URL}" class="button">{PHP.L.Validate}</a>
	<!-- IF {PRJ_ROW_VALIDATE_VKPOST_URL} -->
	<a href="{PRJ_ROW_VALIDATE_VKPOST_URL}" class="button">{PHP.L.Validate} {PHP.L.vkpost_send_sh}</a>
	<!-- ENDIF -->
<!-- ENDIF -->
```

Далі в файлі projects.preview.tpl після
```
<a href="{PRJ_SAVE_URL}" class="btn btn-success"><span>{PHP.L.Publish}</span></a>
```
Додаємо
```
<!-- IF  {PRJ_SAVE_VKPOST_URL}-->
<a href="{PRJ_SAVE_VKPOST_URL}" class="btn btn-success"><span>{PHP.L.Publish} {PHP.L.vkpost_send_sh}</span></a> 
<!-- ENDIF -->
```

Далі в файлі projects.add.tpl додаємо
```
<!-- IF {PHP.cot_plugins_active.vkpost} AND {PHP.cfg.plugin.vkpost.vk_enable_project_post} AND {PRJADD_FORM_VKPOST} -->
<tr>
	<td>{PRJADD_FORM_VKPOSTTITLE}:</td>
	<td>
		{PRJADD_FORM_VKPOST}
	</td>
</tr>
<!-- ENDIF -->
```

І в projects.edit.tpl додаємо
```
<!-- IF {PHP.cot_plugins_active.vkpost} AND {PHP.cfg.plugin.vkpost.vk_enable_project_post} AND {PRJEDIT_FORM_VKPOST}-->
<tr>
	<td>{PRJEDIT_FORM_VKPOSTTITLE}</td>
	<td>{PRJEDIT_FORM_VKPOST}</td>
</tr>
	<!-- ENDIF -->
```

RU
==============

Автоматический постинг статьей и проектов (Фриланс-Биржа) с сайта для Cotonti Siena

###Возможности:

1. Добавленно постинг проектов с параметрами "Для PRO".

###Инструкция по утановке 

1. Загрузить и распаковать файли в папку plugins. 

2. Установить через панель: (Управленние сайтом / Расширения / vkpost).

3. В настройках указать ID группы в которой постить или ID пользователя, указать Access Token (как получить код описано в token.txt), другие настройки.

4. Добавить теги в шаблон page.add.tpl 

```
<!-- IF {PHP.cot_plugins_active.vkpost} --> 
<tr>
	<td>{PAGEADD_FORM_VKPOSTTITLE}:</td>
	<td>
		{PAGEADD_FORM_VKPOST}
	</td>
</tr>   
<!-- ENDIF -->
```
и в шаблоне page.edit.tpl

```
 <!-- IF {PHP.cot_plugins_active.vkpost} --> 
 <tr>
 	<td>{PAGEEDIT_FORM_VKPOSTTITLE}:</td>
 	<td>
 		{PAGEEDIT_FORM_VKPOST}
 	</td>
 </tr>  
   <!-- ENDIF -->
```
5. Добавить теги в шаблон projects.admin.default.tpl
Ищем

```
<!-- IF {PRJ_ROW_STATE} == 2 -->
<a href="{PRJ_ROW_VALIDATE_URL}" class="button">{PHP.L.Validate}</a>	
<!-- ENDIF -->
```
Добавляєм

```
<!-- IF {PRJ_ROW_STATE} == 2 -->
<a href="{PRJ_ROW_VALIDATE_URL}" class="button">{PHP.L.Validate}</a>
	<!-- IF {PRJ_ROW_VALIDATE_VKPOST_URL} -->
	<a href="{PRJ_ROW_VALIDATE_VKPOST_URL}" class="button">{PHP.L.Validate} {PHP.L.vkpost_send_sh}</a>
	<!-- ENDIF -->
<!-- ENDIF -->
```

Дальше в файле projects.preview.tpl после
```
<a href="{PRJ_SAVE_URL}" class="btn btn-success"><span>{PHP.L.Publish}</span></a>
```
Добавляем
```
<!-- IF  {PRJ_SAVE_VKPOST_URL}-->
<a href="{PRJ_SAVE_VKPOST_URL}" class="btn btn-success"><span>{PHP.L.Publish} {PHP.L.vkpost_send_sh}</span></a> 
<!-- ENDIF -->
```

Дальше в файле projects.add.tpl после
```
<!-- IF {PHP.cot_plugins_active.vkpost} AND {PHP.cfg.plugin.vkpost.vk_enable_project_post} AND {PRJADD_FORM_VKPOST} -->
<tr>
	<td>{PRJADD_FORM_VKPOSTTITLE}:</td>
	<td>
		{PRJADD_FORM_VKPOST}
	</td>
</tr>
<!-- ENDIF -->
```

И в projects.edit.tpl добавляем
```
<!-- IF {PHP.cot_plugins_active.vkpost} AND {PHP.cfg.plugin.vkpost.vk_enable_project_post} AND {PRJEDIT_FORM_VKPOST} -->
<tr>
	<td>{PRJEDIT_FORM_VKPOSTTITLE}</td>
	<td>{PRJEDIT_FORM_VKPOST}</td>
</tr>
	<!-- ENDIF -->
```


Version 0.1

UA
==============
###Можливості:

1. Можливість постити на стінці користувача і на стінці группи.

2. Постинг від імені групи чи користувача.

3. Експорт в інші соціальні мережі twitter, facebook якщо постинг на сторінку користувача.

4. Логування дій/помилок від VK

RU
==============
###Возможности:

1. Возможность постить на стенке пользователя и стенке групп.

2. Постинг от имени пользователя и группы.

3. Єкспорт в другие соц. сети twitter, facebook если настроено у пользователя

4. Логирование действий/ответов VK.



Розробник - Ярослав Романенко ( yaroslav.romanenko@gmail.com )