<?php 
return array(
	'resize/([0-9a-z_^\.]+)' => 'forum/resize/$1',
	'news/([0-9]+)' => 'news/view/$1',
	'news/create' => 'news/create',
	'news/edit/([0-9]+)' => 'news/edit/$1',
	'news/delete/([0-9]+)' => 'news/delete/$1',
	'news' => 'news/index',
	'forum/view/([0-9]+)/([0-9]+)' => 'forum/view/$1/$2',	
	'forum/updateAnswer/([0-9]+)/([0-9]+)' => 'forum/updateAnswer/$1/$2',
	'forum/deleteAnswer/([0-9]+)/([0-9]+)' => 'forum/deleteAnswer/$1/$2',
	'forum/updateArticle/([0-9]+)/([0-9]+)' => 'forum/updateArticle/$1/$2',
	'forum/deleteArticle/([0-9]+)/([0-9]+)' => 'forum/deleteArticle/$1/$2',
	'forum/createArticle/([0-9]+)' => 'forum/createArticle/$1',
	'forum/([0-9]+)' => 'forum/index/$1',
	'forum' => 'forum/index/1',
	'tasks/array' => 'task/array',		
	'tasks/triangle' => 'task/triangle',
	'tasks' => 'task/index',
	'account/create' => 'account/create',
	'account/login' => 'account/login',
	'account/logOut' => 'account/logOut',
	'account/update/([0-9a-z_^\.]+)' => 'account/update/$1',
	'account/delete/([0-9]+)' => 'account/delete/$1',
	'account/checkAccount/([0-9]+)' => 'account/checkAccount/$1',
	'account' => 'account/index',





	'' => 'forum/index/1'	
	);
?>