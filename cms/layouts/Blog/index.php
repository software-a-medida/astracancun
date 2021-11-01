<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.layouts.blog
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

$this->dependencies->add(['css','{$path.plugins}datatables/css/jquery.dataTables.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/dataTables.material.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/responsive.dataTables.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/buttons.dataTables.min.css']);
$this->dependencies->add(['js','{$path.js}pages/blog.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/jquery.dataTables.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.material.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.responsive.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.buttons.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/vfs_fonts.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/buttons.html5.min.js']);
$this->dependencies->add(['js', 'https://cloud.tinymce.com/5/tinymce.min.js?apiKey=i79gehzno9orw359aeznpzz3jr34riknglfyf3hkrpz3gzw2']);

?>

%{header}%
<section class="main-container">
    <div class="title">
        <h1>Blog</h1>
    </div>
    <div class="buttons">
        <a class="btn btn-colored" data-button-modal="datas">Nuevo</a>
    </div>
    <div class="content">
        {$lst_datas}
    </div>
</section>
<section class="modal" data-modal="datas">
    <div class="content">
        <header>
            <h4>Nuevo</h4>
        </header>
        <main>
            <form name="datas" data-submit-action="new">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>Campos obligatorios</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Nombre (ES)</h6>
                        <input type="text" name="name_es" autofocus>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Nombre (EN)</h6>
                        <input type="text" name="name_en">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Descripción (ES)</h6>
                        <textarea name="description_es" class="tinymce"></textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Descripción (EN)</h6>
                        <textarea name="description_en" class="tinymce"></textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="uploader" data-low-uploader>
                        <h6><span class="required-field">*</span>Imágen de portada</h6>
                        <figure data-preview>
                            <img src="{$path.images}empty.png">
                        </figure>
                        <a class="btn" data-select>Seleccionar imagen</a>
                        <input type="file" id="cover" name="cover" accept="image/*" data-select>
                    </div>
                </fieldset>
                {$lst_authors}
                {$lst_priority}
                <fieldset class="fields-group">
                    <h4 class="title">Optimización SEO</h4>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Palabras clave (ES)</h6>
                        <input type="text" name="seo_keywords_es">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Palabras clave (EN)</h6>
                        <input type="text" name="seo_keywords_en">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Descripción (ES)</h6>
                        <input type="text" name="seo_description_es">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Descripción (EN)</h6>
                        <input type="text" name="seo_description_en">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-cancel>Cerrar</a>
        </footer>
    </div>
</section>
{$mdl_delete}
