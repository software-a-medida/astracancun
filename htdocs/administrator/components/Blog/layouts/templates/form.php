<?php
defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Language,Format,Security};
use \BuriPHP\Administrator\Components\Blog\Component;

// Bootstrap-inputmask
$this->dependencies->add(['js', '{$path.plugins}tinymce/tinymce.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.components}Blog/assets/js/templates/form.js?v=1.0.0']);
?>

<div class="col-xl-8">
    <div class="card m-b-30">
        <div class="card-body">
            <!-- Title container -->
            <h4 class="header-title m-t-0">Titulo y categoría.</h4>
            <p class="text-muted m-b-20">Ingresa el titulo, la dirección de enlace se generará automaticamente.</p>
            <!-- End title container -->

            <div class="form-group row">
                <div class="col-md-3">
                    <h6 class="p-t-5">Título</h6>
                </div>
                <div class="col-md-9">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="title" data-base-url="span#url" value="<?= ( isset($data) ) ? $data['title'] : '' ?>">
                            <p class="description text-muted"><small><?= (new Component())->url_public_component() ?><span id="url"><?= ( isset($data) ) ? $data['url'] : '' ?></span></small></p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <h6 class="p-t-5">Categoría</h6>
                </div>
                <div class="col-md-9">
                    <div class="label">
                        <label>
                            <select name="category" <?= ( isset($data) ) ? "data-value='". $data['id_category'] ."'" : '' ?> >
                                <option value="">Sin categoría</option>
                            </select>
                            <p class="description text-muted">Elige una categoría.</p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <h6 class="p-t-5">Idioma</h6>
                </div>
                <div class="col-md-3">
                    <div class="label">
                        <label>
                            <select name="lang">
                                <?php foreach ( (new Language())->get_list_language() as $value ): ?>
                                    <option value="<?= $value['iso1'] ?>" <?= ( isset($data) && $value['iso1'] === $data['lang'] || !isset($data) && $value['iso1'] == \BuriPHP\Configuration::$lang_default ) ? 'selected' : '' ?> ><?= $value['name'] ?></option>
                                <?php endforeach; ?>

                                <?php if ( isset($data) && is_bool(array_search($data['lang'], array_column((new Language())->get_list_language(), 'iso1'))) ): ?>
                                    <option value="<?= $langs[array_search($data['lang'], array_column($langs, 'iso1'))]['iso1'] ?>" selected><?= $langs[array_search($data['lang'], array_column($langs, 'iso1'))]['name'] ?></option>
                                <?php endif; ?>
                            </select>
                            <p class="description text-muted">Elige el idioma.</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card m-b-30">
        <div class="card-body">
            <!-- Title container -->
            <h4 class="header-title m-t-0">Descripción.</h4>
            <p class="text-muted m-b-20">Redacta tu contenido.</p>
            <!-- End title container -->

            <div class="label">
                <label>
                    <textarea name="description" tinymce><?= ( isset($data) ) ? json_decode($data['content']) : '' ?></textarea>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4">
    <div class="card m-b-30">
        <div class="card-body">
            <!-- Title container -->
            <h4 class="header-title m-t-0">Imágen de portada.</h4>
            <!-- End title container -->

            <div class="label">
                <label>
                    <div class="upload_image_preview" data-image-default="{$path.images}upload-file.svg">
                        <?php if ( isset($data) ): ?>
                            <figure class="m-0"><img class="img-fluid" src="{$path.root_uploads}<?= $data['image'] ?>"></figure>
                        <?php else: ?>
                            <figure class="m-0"><img class="img-fluid" src="{$path.images}upload-file.svg"></figure>
                        <?php endif; ?>
                        <span class="d-block">Elegir imágen</span>
                        <input type="file" id="image_cover" name="image_cover" accept="image/*" />
                    </div>
                </label>
            </div>

            <p class="text-muted font-14 m-b-0 p-lr-5"><small>El peso máximo permitido por archivo es de <?= min((int)(ini_get('upload_max_filesize')), (int)(ini_get('post_max_size')), (int)(ini_get('memory_limit'))) ?>MB.</small></p>
            <p class="text-muted font-14 m-b-0 p-lr-5"><small>Solo se aceptan imágenes con formato jpg, jpeg y png.</small></p>
        </div>
    </div>

    <div class="card m-b-30">
        <div class="card-body">
            <!-- Title container -->
            <h4 class="header-title m-t-0">Metadata.</h4>
            <p class="text-muted m-b-20">Con esta información podremos ayudar al posicionamiento seo y sem.</p>
            <!-- End title container -->

            <div class="form-group row">
                <div class="col-md-12">
                    <h6 class="p-t-5">Título para redes sociales.</h6>
                </div>
                <div class="col-md-12">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="sm_title" value="<?= ( isset($data) ) ? $data['sm_title'] : '' ?>">
                            <p class="description text-muted">Al compartir el artículo, este título se usará en la publicación.</p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <h6 class="p-t-5">Imágen personalizada para redes sociales.</h6>
                </div>
                <div class="col-md-12">
                    <div class="label">
                        <label>
                            <div class="upload_image_preview" data-image-default="{$path.images}upload-file.svg">
                                <?php if ( isset($data) && !empty($data['sm_image']) ): ?>
                                    <figure class="m-0"><img class="img-fluid" src="{$path.root_uploads}<?= $data['sm_image'] ?>"></figure>
                                <?php else: ?>
                                    <figure class="m-0"><img class="img-fluid" src="{$path.images}upload-file.svg"></figure>
                                <?php endif; ?>
                                <span class="d-block">Elegir imágen</span>
                                <input type="file" id="sm_image_cover" name="sm_image_cover" accept="image/*" />
                            </div>
                        </label>
                    </div>

                    <p class="text-muted font-14 m-b-0 p-lr-5"><small>El peso máximo permitido por archivo es de <?= min((int)(ini_get('upload_max_filesize')), (int)(ini_get('post_max_size')), (int)(ini_get('memory_limit'))) ?>MB.</small></p>
                    <p class="text-muted font-14 m-b-0 p-lr-5"><small>Solo se aceptan imágenes con formato jpg, jpeg y png.</small></p>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <h6 class="p-t-5">Descripción.</h6>
                </div>
                <div class="col-md-12">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="sm_description" value="<?= ( isset($data) ) ? $data['sm_description'] : '' ?>">
                            <p class="description text-muted">Usa una breve descripción para las publicaciónes en redes sociales.</p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <h6 class="p-t-5">Tags (keywords).</h6>
                </div>
                <div class="col-md-12">
                    <div class="label">
                        <label>
                            <?php
                                if ( isset($data) && !is_null($data['tags']) )
                                {
                                    $tags = '';
                                    foreach ( $data['tags'] as $value ): $tags .= trim($value) .','; endforeach;
                                    $tags = trim($tags, ',');
                                }
                            ?>
                            <input class="form-control" type="text" name="tags" value="<?= ( isset($data) && isset($tags) ) ? $tags : '' ?>">
                            <p class="description text-muted">Usa palabras separadas por una cóma (,) para establecer los tags. Esto ayudará a los motores de búsqueda a ser más eficientes.</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
