<?php defined('_EXEC') or die; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{$_lang}">

<head>
    <meta charset="UTF-8" />
    <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
    {$dependencies.meta}

    <base href="{$_base}">

    <title>{$_title}</title>

    <!--Adaptive Responsive-->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="author" content="codemonkey.com.mx" />
    <meta name="description" content="" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{$path.css}valkyrie.css?v=1.0" type="text/css" media="all" />
    <link rel="stylesheet" href="{$path.css}icons.css?v=1.0" type="text/css" media="all" />
    <link rel="stylesheet" href="{$path.css}styles.css?v=1.0" type="text/css" media="all" />
    {$dependencies.css}
</head>

<body>
    {{renderView}}

    <script src="{$path.js}jquery-3.4.1.min.js"></script>
    <script src="{$path.js}valkyrie.js?v=1.0"></script>
    <script src="{$path.js}codemonkey-1.3.0.js?v=1.0"></script>
    <script src="{$path.js}scripts.js?v=1.0"></script>
    {$dependencies.js}

    {$dependencies.other}
</body>

</html>