<?php defined('_EXEC') or die; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{$vkye_lang}">
	<head>
		<!-- Meta -->
        <meta charset="UTF-8" />
        <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="theme-color" content="#2196F3" />

		<base href="{$vkye_base}">
		<title>{$vkye_title}</title>

		<!-- Stylesheets -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,700" rel="stylesheet" />
        <link rel="stylesheet" href="<?= PAYMENTS_TERMINAL_URI ?>assets/css/valkyrie.css" />
        <link rel="stylesheet" href="<?= PAYMENTS_TERMINAL_URI ?>assets/css/styles.css" />
        <link rel="stylesheet" href="<?= PAYMENTS_TERMINAL_URI ?>assets/css/color.css" />

		{$dependencies.css}
	</head>
	<body>
