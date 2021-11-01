<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.layouts.programs
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
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['js', '{$path.js}pages/settings.min.js']);
$this->dependencies->add(['js', 'https://cloud.tinymce.com/5/tinymce.min.js?apiKey=i79gehzno9orw359aeznpzz3jr34riknglfyf3hkrpz3gzw2']);

?>

%{header}%
<section class="main-container">
    <div class="title">
        <h1>Logotipos</h1>
    </div>
    <div class="content">
        <div class="uploader" data-fast-uploader data-action="edit_logotype_color">
            <h6>A color</h6>
            <figure>
                <img src="{$logotype_color}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="logotype_color" accept="image/*" data-select>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_logotype_black">
            <h6>En negro</h6>
            <figure>
                <img src="{$logotype_black}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="logotype_black" accept="image/*" data-select>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_logotype_white">
            <h6>En blanco</h6>
            <figure>
                <img src="{$logotype_white}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="logotype_white" accept="image/*" data-select>
        </div>
    </div>
    <div class="title margin-top-20">
        <h1>Imagenes de portada</h1>
    </div>
    <div class="content">
        <div class="cm-gallery-style-1">
            <h6>Página de inicio</h6>
            {$cover_home}
            <div class="button">
                <a data-action="edit_cover_home"><i class="material-icons">add</i></a>
                <input type="file" data-action="edit_cover_home">
            </div>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_cover_programs">
            <h6>Página de programas</h6>
            <figure>
                <img src="{$cover_programs}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="cover_programs" accept="image/*" data-select>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_cover_donations">
            <h6>Página de donaciones</h6>
            <figure>
                <img src="{$cover_donations}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="cover_donations" accept="image/*" data-select>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_cover_blog">
            <h6>Página de blog</h6>
            <figure>
                <img src="{$cover_blog}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="cover_blog" accept="image/*" data-select>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_cover_about">
            <h6>Página de acerca</h6>
            <figure>
                <img src="{$cover_about}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="cover_about" accept="image/*" data-select>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_cover_contact">
            <h6>Página de contacto</h6>
            <figure>
                <img src="{$cover_contact}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="cover_contact" accept="image/*" data-select>
        </div>
    </div>
    <div class="title margin-top-20">
        <h1>Imágenes de fondo</h1>
    </div>
    <div class="content">
        <div class="uploader" data-fast-uploader data-action="edit_background_about_0">
            <h6>Página de acerca - Historia</h6>
            <figure>
                <img src="{$background_about_0}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="background_about_0" accept="image/*" data-select>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_background_about_1">
            <h6>Página de acerca - Órgano de gobierno</h6>
            <figure>
                <img src="{$background_about_1}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="background_about_1" accept="image/*" data-select>
        </div>
        <div class="uploader" data-fast-uploader data-action="edit_background_about_2">
            <h6>Página de acerca - Equipo</h6>
            <figure>
                <img src="{$background_about_2}">
            </figure>
            <a class="btn" data-select>Seleccionar imagen</a>
            <input type="file" id="background_about_2" accept="image/*" data-select>
        </div>
    </div>
    <div class="title margin-top-20">
        <h1>Videos</h1>
    </div>
    <div class="content">
        <fieldset class="fields-group row">
            <div class="text span3">
                <h6>Página de inicio</h6>
                <iframe
                    width="300px"
                    height="200px"
                    src="{$video_home}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="text span3">
                <h6>Página de programas</h6>
                <iframe
                    width="300px"
                    height="200px"
                    src="{$video_programs}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="text span3">
                <h6>Página de donaciones</h6>
                <iframe
                    width="300px"
                    height="200px"
                    src="{$video_donations}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="text span3">
                <h6>Página de acerca</h6>
                <iframe
                    width="300px"
                    height="200px"
                    src="{$video_about_1}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </fieldset>
        <fieldset class="fields-group row">
            <div class="text span3">
                <h6>Página de acerca</h6>
                <iframe
                    width="300px"
                    height="200px"
                    src="{$video_about_2}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="text span3">
                <h6>Página de acerca</h6>
                <iframe
                    width="300px"
                    height="200px"
                    src="{$video_about_3}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="text span3">
                <h6>Página de acerca</h6>
                <iframe
                    width="300px"
                    height="200px"
                    src="{$video_about_4}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </fieldset>
        <a class="btn btn-colored" data-button-modal="edit_videos">Editar</a>
    </div>
    <div class="title margin-top-20">
        <h1>Información de contacto</h1>
    </div>
    <div class="content">
        <fieldset class="fields-group">
            <div class="text">
                <h6>Correo electrónico</h6>
                <div class="display">
                    <p>{$contact_email}</p>
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Número telefónico</h6>
                <div class="display">
                    <p>{$contact_phone}</p>
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Dirección</h6>
                <div class="display">
                    <p>{$contact_address}</p>
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Facebook</h6>
                <div class="display">
                    <p>{$contact_social_media_facebook}</p>
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Instagram</h6>
                <div class="display">
                    <p>{$contact_social_media_instagram}</p>
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Twitter</h6>
                <div class="display">
                    <p>{$contact_social_media_twitter}</p>
                </div>
            </div>
        </fieldset>
        <a class="btn btn-colored" data-button-modal="edit_contact">Editar</a>
    </div>
    <div class="title margin-top-20">
        <h1>Información de acerca</h1>
    </div>
    <div class="content">
        <fieldset class="fields-group">
            <div class="text">
                <h6>Descripción</h6>
                <div class="display">
                    {$about_description_es}
                    <br>
                    {$about_description_en}
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Misión</h6>
                <div class="display">
                    {$about_mission_es}
                    <br>
                    {$about_mission_en}
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Visión</h6>
                <div class="display">
                    {$about_vission_es}
                    <br>
                    {$about_vission_en}
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Valores</h6>
                <div class="display">
                    {$about_values_es}
                    <br>
                    {$about_values_en}
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Historia</h6>
                <div class="display">
                    {$about_history_es}
                    <br>
                    {$about_history_en}
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Órgano de gobierno</h6>
                <div class="display">
                    {$about_organ_government_es}
                    <br>
                    {$about_organ_government_en}
                </div>
            </div>
        </fieldset>
        <a class="btn btn-colored" data-button-modal="edit_about">Editar</a>
    </div>
    <div class="title margin-top-20">
        <h1>Avisos</h1>
    </div>
    <div class="content">
        <fieldset class="fields-group">
            <div class="text">
                <h6>Aviso de privacidad</h6>
                <div class="display">
                    {$notice_privacy_es}
                    <br>
                    {$notice_privacy_en}
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Aviso de transparencia</h6>
                <div class="display">
                    {$notice_transparency_es}
                    <br>
                    {$notice_transparency_en}
                </div>
            </div>
        </fieldset>
        <a class="btn btn-colored" data-button-modal="edit_notices">Editar</a>
    </div>
    <div class="title margin-top-20">
        <h1>Optimizador SEO</h1>
    </div>
    <div class="content">
        <fieldset class="fields-group">
            <div class="text">
                <h6>Títulos</h6>
                <div class="display">
                    <p><strong>Página de inicio</strong>: {$seo_title_home_es} | {$seo_title_home_en}</p>
                    <p><strong>Página de programas</strong>: {$seo_title_programs_es} | {$seo_title_programs_en}</p>
                    <p><strong>Página de donaciones</strong>: {$seo_title_donations_es} | {$seo_title_donations_en}</p>
                    <p><strong>Página de blog</strong>: {$seo_title_blog_es} | {$seo_title_blog_en}</p>
                    <p><strong>Página de acerca</strong>: {$seo_title_about_es} | {$seo_title_about_en}</p>
                    <p><strong>Página de contacto</strong>: {$seo_title_contact_es} | {$seo_title_contact_en}</p>
                    <p><strong>Eslogan</strong>: {$seo_title_slogan_es} | {$seo_title_slogan_en}</p>
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Palabras clave</h6>
                <div class="display">
                    <p><strong>Página de inicio</strong>: {$seo_keywords_home_es} | {$seo_keywords_home_en}</p>
                    <p><strong>Página de programas</strong>: {$seo_keywords_programs_es} | {$seo_keywords_programs_en}</p>
                    <p><strong>Página de donaciones</strong>: {$seo_keywords_donations_es} | {$seo_keywords_donations_en}</p>
                    <p><strong>Página de blog</strong>: {$seo_keywords_blog_es} | {$seo_keywords_blog_en}</p>
                    <p><strong>Página de acerca</strong>: {$seo_keywords_about_es} | {$seo_keywords_about_en}</p>
                    <p><strong>Página de contacto</strong>: {$seo_keywords_contact_es} | {$seo_keywords_contact_en}</p>
                </div>
            </div>
        </fieldset>
        <fieldset class="fields-group">
            <div class="text">
                <h6>Descripciones</h6>
                <div class="display">
                    <p><strong>Página de inicio</strong>: {$seo_description_home_es} | {$seo_description_home_en}</p>
                    <p><strong>Página de programas</strong>: {$seo_description_programs_es} | {$seo_description_programs_en}</p>
                    <p><strong>Página de donaciones</strong>: {$seo_description_donations_es} | {$seo_description_donations_en}</p>
                    <p><strong>Página de blog</strong>: {$seo_description_blog_es} | {$seo_description_blog_en}</p>
                    <p><strong>Página de acerca</strong>: {$seo_description_about_es} | {$seo_description_about_en}</p>
                    <p><strong>Página de contacto</strong>: {$seo_description_contact_es} | {$seo_description_contact_en}</p>
                </div>
            </div>
        </fieldset>
        <a class="btn btn-colored" data-button-modal="edit_seo">Editar</a>
    </div>
</section>
<section class="modal" data-modal="edit_videos">
    <div class="content">
        <header>
            <h4>Videos</h4>
        </header>
        <main>
            <form name="edit_videos">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>Campos obligatorios</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de inicio</h6>
                        <input type="text" name="video_home" value="{$video_home}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de prográmas</h6>
                        <input type="text" name="video_programs" value="{$video_programs}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de donaciones</h6>
                        <input type="text" name="video_donations" value="{$video_donations}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de acerca</h6>
                        <input type="text" name="video_about_1" value="{$video_about_1}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de acerca</h6>
                        <input type="text" name="video_about_2" value="{$video_about_2}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de acerca</h6>
                        <input type="text" name="video_about_3" value="{$video_about_3}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de acerca</h6>
                        <input type="text" name="video_about_4" value="{$video_about_4}">
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-close>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="edit_contact">
    <div class="content">
        <header>
            <h4>Información de contacto</h4>
        </header>
        <main>
            <form name="edit_contact">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>Campos obligatorios</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Correo electrónico</h6>
                        <input type="text" name="contact_email" value="{$contact_email}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Número telefónico</h6>
                        <input type="text" name="contact_phone" value="{$contact_phone}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Dirección</h6>
                        <input type="text" name="contact_address" value="{$contact_address}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>Facebook</h6>
                        <input type="text" name="contact_social_media_facebook" value="{$contact_social_media_facebook}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>Instagram</h6>
                        <input type="text" name="contact_social_media_instagram" value="{$contact_social_media_instagram}">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>Twitter</h6>
                        <input type="text" name="contact_social_media_twitter" value="{$contact_social_media_twitter}">
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-close>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="edit_about">
    <div class="content">
        <header>
            <h4>Información de acerca</h4>
        </header>
        <main>
            <form name="edit_about">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>Campos obligatorios</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Descripción (ES)</h6>
                        <textarea name="about_description_es" class="tinymce">{$about_description_es}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Descripción (EN)</h6>
                        <textarea name="about_description_en" class="tinymce">{$about_description_en}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Misión (ES)</h6>
                        <textarea name="about_mission_es" class="tinymce">{$about_mission_es}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Misión (EN)</h6>
                        <textarea name="about_mission_en" class="tinymce">{$about_mission_en}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Visión (ES)</h6>
                        <textarea name="about_vission_es" class="tinymce">{$about_vission_es}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Visión (EN)</h6>
                        <textarea name="about_vission_en" class="tinymce">{$about_vission_en}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Valores (ES)</h6>
                        <textarea name="about_values_es" class="tinymce">{$about_values_es}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Valores (EN)</h6>
                        <textarea name="about_values_en" class="tinymce">{$about_values_en}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Historia (ES)</h6>
                        <textarea name="about_history_es" class="tinymce">{$about_history_es}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Historia (EN)</h6>
                        <textarea name="about_history_en" class="tinymce">{$about_history_en}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Órgano de gobierno (ES)</h6>
                        <textarea name="about_organ_government_es" class="tinymce">{$about_organ_government_es}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Órgano de gobierno (EN)</h6>
                        <textarea name="about_organ_government_en" class="tinymce">{$about_organ_government_en}</textarea>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-close>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="edit_notices">
    <div class="content">
        <header>
            <h4>Avisos</h4>
        </header>
        <main>
            <form name="edit_contact">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>Campos obligatorios</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Aviso de privacidad (ES)</h6>
                        <textarea name="notice_privacy_es" class="tinymce">{$notice_privacy_es}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Aviso de privacidad (EN)</h6>
                        <textarea name="notice_privacy_en" class="tinymce">{$notice_privacy_en}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Aviso de transparencia (ES)</h6>
                        <textarea name="notice_transparency_es" class="tinymce">{$notice_transparency_es}</textarea>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Aviso de transparencia (EN)</h6>
                        <textarea name="notice_transparency_en" class="tinymce">{$notice_transparency_en}</textarea>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-close>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="edit_seo">
    <div class="content">
        <header>
            <h4>Optimizador SEO</h4>
        </header>
        <main>
            <form name="edit_seo">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>Campos obligatorios</p>
                </fieldset>
                <h4 class="title">Titulos</h4>
                <fieldset class="fields-group row">
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de inicio (ES)</h6>
                        <input type="text" name="seo_title_home_es" value="{$seo_title_home_es}">
                    </div>
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de inicio (EN)</h6>
                        <input type="text" name="seo_title_home_en" value="{$seo_title_home_en}">
                    </div>
                </fieldset>
                <fieldset class="fields-group row">
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de programas (ES)</h6>
                        <input type="text" name="seo_title_programs_es" value="{$seo_title_programs_es}">
                    </div>
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de programas (EN)</h6>
                        <input type="text" name="seo_title_programs_en" value="{$seo_title_programs_en}">
                    </div>
                </fieldset>
                <fieldset class="fields-group row">
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de donaciones (ES)</h6>
                        <input type="text" name="seo_title_donations_es" value="{$seo_title_donations_es}">
                    </div>
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de donaciones (EN)</h6>
                        <input type="text" name="seo_title_donations_en" value="{$seo_title_donations_en}">
                    </div>
                </fieldset>
                <fieldset class="fields-group row">
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de blog (ES)</h6>
                        <input type="text" name="seo_title_blog_es" value="{$seo_title_blog_es}">
                    </div>
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de blog (EN)</h6>
                        <input type="text" name="seo_title_blog_en" value="{$seo_title_blog_en}">
                    </div>
                </fieldset>
                <fieldset class="fields-group row">
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de acerca (ES)</h6>
                        <input type="text" name="seo_title_about_es" value="{$seo_title_about_es}">
                    </div>
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de acerca (EN)</h6>
                        <input type="text" name="seo_title_about_en" value="{$seo_title_about_en}">
                    </div>
                </fieldset>
                <fieldset class="fields-group row">
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de contacto (ES)</h6>
                        <input type="text" name="seo_title_contact_es" value="{$seo_title_contact_es}">
                    </div>
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Página de contacto (EN)</h6>
                        <input type="text" name="seo_title_contact_en" value="{$seo_title_contact_en}">
                    </div>
                </fieldset>
                <fieldset class="fields-group row">
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Eslogan (ES)</h6>
                        <input type="text" name="seo_title_slogan_es" value="{$seo_title_slogan_es}">
                    </div>
                    <div class="text span6">
                        <h6><span class="required-field">*</span>Eslogan (EN)</h6>
                        <input type="text" name="seo_title_slogan_en" value="{$seo_title_slogan_en}">
                    </div>
                </fieldset>
                <h4 class="title">Palabras clave</h4>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de inicio (ES)</h6>
                        <input type="text" name="seo_keywords_home_es" value="{$seo_keywords_home_es}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de inicio (EN)</h6>
                        <input type="text" name="seo_keywords_home_en" value="{$seo_keywords_home_en}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de programas (ES)</h6>
                        <input type="text" name="seo_keywords_programs_es" value="{$seo_keywords_programs_es}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de programas (EN)</h6>
                        <input type="text" name="seo_keywords_programs_en" value="{$seo_keywords_programs_en}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de donaciones (ES)</h6>
                        <input type="text" name="seo_keywords_donations_es" value="{$seo_keywords_donations_es}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de donaciones (EN)</h6>
                        <input type="text" name="seo_keywords_donations_en" value="{$seo_keywords_donations_en}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de blog (ES)</h6>
                        <input type="text" name="seo_keywords_blog_es" value="{$seo_keywords_blog_es}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de blog (EN)</h6>
                        <input type="text" name="seo_keywords_blog_en" value="{$seo_keywords_blog_en}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de acerca (ES)</h6>
                        <input type="text" name="seo_keywords_about_es" value="{$seo_keywords_about_es}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de acerca (EN)</h6>
                        <input type="text" name="seo_keywords_about_en" value="{$seo_keywords_about_en}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de contacto (ES)</h6>
                        <input type="text" name="seo_keywords_contact_es" value="{$seo_keywords_contact_es}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de contacto (EN)</h6>
                        <input type="text" name="seo_keywords_contact_en" value="{$seo_keywords_contact_en}">
                        <p class="caption">Ingrese cada palabra separada por una coma (,). Ej. Palabra 1, Palabra 2, etc.</p>
                    </div>
                </fieldset>
                <h4 class="title">Descripciones</h4>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de inicio (ES)</h6>
                        <input type="text" name="seo_description_home_es" value="{$seo_description_home_es}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de inicio (EN)</h6>
                        <input type="text" name="seo_description_home_en" value="{$seo_description_home_en}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de programas (ES)</h6>
                        <input type="text" name="seo_description_programs_es" value="{$seo_description_programs_es}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de programas (EN)</h6>
                        <input type="text" name="seo_description_programs_en" value="{$seo_description_programs_en}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de donaciones (ES)</h6>
                        <input type="text" name="seo_description_donations_es" value="{$seo_description_donations_es}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de donaciones (EN)</h6>
                        <input type="text" name="seo_description_donations_en" value="{$seo_description_donations_en}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de blog (ES)</h6>
                        <input type="text" name="seo_description_blog_es" value="{$seo_description_blog_es}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de blog (EN)</h6>
                        <input type="text" name="seo_description_blog_en" value="{$seo_description_blog_en}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de acerca (ES)</h6>
                        <input type="text" name="seo_description_about_es" value="{$seo_description_about_es}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de acerca (EN)</h6>
                        <input type="text" name="seo_description_about_en" value="{$seo_description_about_en}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de contacto (ES)</h6>
                        <input type="text" name="seo_description_contact_es" value="{$seo_description_contact_es}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>Página de contacto (EN)</h6>
                        <input type="text" name="seo_description_contact_en" value="{$seo_description_contact_en}">
                        <p class="caption">Mínimo 70 carácteres y máximo 320 carácteres.</p>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-close>Cerrar</a>
        </footer>
    </div>
</section>
