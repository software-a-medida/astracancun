<?php defined('_EXEC') or die;

/**
* @package valkyrie.cms.layouts
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 01 - 15, 2018 <@update>
* @version 1.1.0
* @summary cm-valkyrie-platform-website-template
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{$vkye_lang}">
	<head>
		<base href="{$vkye_base}">
		<title>{$vkye_title}</title>
		<meta charset="UTF-8" />
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<meta name="author" content="Code Monkey" />
		<meta name="description" content="{$seo_description}" />
		<meta name="keywords" content="{$seo_keywords}" />
		{$dependencies.meta}
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="{$path.css}valkyrie.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="{$path.css}cm-styles.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="{$path.css}styles.css?ver=1.0.0" type="text/css" media="all" />
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> <!-- Roboto font -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> <!-- Material design icons -->
		{$dependencies.css}
	</head>
	<body>
