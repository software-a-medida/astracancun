<?php
defined('_EXEC') or die;

use \BuriPHP\Administrator\Components\MyServices\Component;

// Pages
$this->dependencies->add(['js', '{$path.components}MyServices/assets/js/modals/categories.js?v=1.0.0']);
?>

<section id="categories" class="modal" data-modal="categories">
    <div class="content">
        <header>Categorías</header>
        <main>
            <form name="create" class="p-20 m-b-20" style="border: 2px solid #F1F1F1;">
                <div class="row">
                    <div class="col-12">
                        <div class="label">
                            <label>
                                <h6 class="m-0">Título de la categoría.</h6>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 m-b-10">
                        <div class="label">
                            <label>
                                <input name="title_es" type="text"/>
                                <p class="description">Español</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 m-b-10">
                        <div class="label">
                            <label>
                                <input name="title_en" type="text"/>
                                <p class="description">Inglés</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="label">
                            <label>
                                <h6 class="m-0">Descripción de la categoría.</h6>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 m-b-10">
                        <div class="label">
                            <label>
                                <input name="description_es" type="text"/>
                                <p class="description">Español</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 m-b-10">
                        <div class="label">
                            <label>
                                <input name="description_en" type="text"/>
                                <p class="description">Inglés</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 m-b-20">
                        <div class="label">
                            <label>
                                <div class="upload_image_preview" data-image-default="{$path.images}upload-file.svg">
                                    <figure class="m-0"><img class="img-fluid" src="{$path.images}upload-file.svg"></figure>
                                    <span class="d-block">Elegir imágen</span>
                                    <input type="file" id="image_upload_categories" name="image" accept="image/*" />
                                </div>
                            </label>
                        </div>

                        <p class="text-muted font-14 m-b-0 p-lr-5"><small>El peso máximo permitido por imágen es de <?= min((int)(ini_get('upload_max_filesize')), (int)(ini_get('post_max_size')), (int)(ini_get('memory_limit'))) ?>MB.</small></p>
                        <p class="text-muted font-14 m-b-0 p-lr-5"><small>Solo se aceptan imágenes con formato jpg, jpeg y png.</small></p>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-block waves-effect waves-light">Agregar</button>
                    </div>
                </div>
            </form>

            <table id="table_categories" class="table m-b-0" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </main>
        <footer>
            <div class="action-buttons text-right">
                <button class="btn btn-link" button-close><small>Cerrar</small></button>
            </div>
        </footer>
    </div>
</section>