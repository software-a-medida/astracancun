<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.layouts.programs
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['css','{$path.plugins}datatables/css/jquery.dataTables.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/dataTables.material.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/responsive.dataTables.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/buttons.dataTables.min.css']);
$this->dependencies->add(['js','{$path.js}pages/programs.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/jquery.dataTables.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.material.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.responsive.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.buttons.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/vfs_fonts.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/buttons.html5.min.js']);

?>

%{header}%
<section class="main-container">
    <div class="title">
        <h1>Programa {$name} | Galería</h1>
    </div>
    <div class="content">
        <div class="cm-gallery-style-1">
            <div class="button">
                <a data-action="new"><i class="material-icons">add</i></a>
                <input type="file" name="new" accept="image/*" />
            </div>
            {$lst_datas}
        </fodivrm>
    </div>
</section>
<section class="modal alert" data-modal="delete">
    <div class="content">
        <header>
            <h4>Eliminar</h4>
        </header>
        <main>
            <p>¿Esta seguro de realizar esta acción?</p>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-close>Cancelar</a>
        </footer>
    </div>
</section>
