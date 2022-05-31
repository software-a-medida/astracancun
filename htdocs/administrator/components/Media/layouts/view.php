<?php
defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Format};
// use \Libraries\{Dates};
// use \BuriPHP\Administrator\Components\Blog\Component;

// Fancybox
$this->dependencies->add(['js', '{$path.plugins}Fancybox/fancybox.umd.js']);
$this->dependencies->add(['css', '{$path.plugins}Fancybox/fancybox.css']);

// Pages
$this->dependencies->add(['js', '{$path.components}Media/assets/js/upload.js?v=1.0.0']);
?>
<main class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <ol class="breadcrumb hide-phone">
                        <li class="breadcrumb-item">
                            <a href="index.php">{$_webpage}</a>
                        </li>
                        <li class="breadcrumb-item active">Media</li>
                    </ol>

                    <h4 class="page-title">Archivos multimedia almacenados.</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form name="upload_media">
                            <input type="hidden" name="action" value="images"/>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="label m-0">
                                        <label class="m-0">
                                            <input type="file" name="data[]" accept="image/*" multiple/>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="button-items" style="height: 100%;">
                                        <button id="save" class="btn btn-success btn-block" style="height: 100%;">Subir multimedia</button>
                                    </div>
                                </div>
                            </div>

                            <p class="text-muted m-b-0 p-lr-5"><small>El peso máximo permitido por archivo es de <?= min((int)(ini_get('upload_max_filesize')), (int)(ini_get('post_max_size')), (int)(ini_get('memory_limit'))) ?>MB.</small> <small>Solo se aceptan imágenes con formato jpg, jpeg y png.</small></p>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row" add-media >
                    <?php if ( empty($data) ): ?>
                        <div class="col-12 p-tb-50 m-b-20">
                            <p class="text-muted text-center">Aún no tienes archivos multimedia.</p>
                        </div>
                    <?php endif; ?>

                    <?php $root = (new Format)->baseurl() . basename(PATH_UPLOADS) .'/'; ?>
                    
                    <?php foreach ($data as $key => $value): ?>
                        <div class="col-6 col-md-4 col-lg-6 col-xl-4 m-b-20" data-multimedia>
                            <div class="card m-b-30">
                                <figure class="elm-stretched m-b-0" style="height: 160px">
                                    <a href="<?= $root.$value['media'] ?>" data-fancybox="media">
                                        <img class="card-img-top img-cover" src="<?= $root.pathinfo(PATH_UPLOADS . $value['media'], PATHINFO_FILENAME) .'_thumb.'. pathinfo(PATH_UPLOADS . $value['media'], PATHINFO_EXTENSION) ?>">
                                    </a>
                                </figure>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="<?= $root.$value['media'] ?>" class="card-link d-block" target="_blank"><small><i class="mdi mdi-link-variant"></i> Ver en otra ventana</small></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="javascript:copytoclipboard('<?= $root.$value['media'] ?>')" class="card-link d-block"><small><i class="mdi mdi-content-copy"></i> Copiar link de acceso</small></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="javascript:void(0);" class="btn btn-danger btn-block p-5" data-delete="<?= $value['id'] ?>"><i class="mdi mdi-delete"></i> Eliminar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>