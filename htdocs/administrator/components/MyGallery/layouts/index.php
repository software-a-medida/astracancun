<?php
defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Format};

// Pages
$this->dependencies->add(['js', '{$path.components}MyGallery/assets/js/delete.js?v=1.0.0']);

// Buttons
$this->dependencies->add(['other', '<script>$.app.addButtonsAction({
    "button": {
        "text": "Nueva galería",
        "class": "btn btn-success waves-effect waves-light",
        "href": "index.php/gallery/create"
    }
})</script>']);
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
                        <li class="breadcrumb-item active">Galería</li>
                    </ol>

                    <h4 class="page-title">Mis galerías</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-sm-12">
                <?php if ( empty($galleries) ): ?>
                    <div class="col-12 p-tb-50 m-b-20">
                        <p class="text-muted text-center">Aún no tienes ninguna galería.</p>
                    </div>
                <?php endif; ?>

                <?php $root = str_replace('administrator/', '', (new Format)->baseurl()) . basename(PATH_UPLOADS) .'/'; ?>

                <style>
                    .figures {
                        position: relative;
                        display: grid;
                        grid-template-columns: 50% 50%;
                        height: 300px;
                        background-color: #F1F1F1;
                    }

                    .figures > figure {
                        height: 150px;
                    }

                    .figures > span.count {
                        position: absolute;
                        top: 150px;
                        left: 50%;
                        right: 0;
                        bottom: 0;
                        z-index: 1;
                        background-color: rgb(0 0 0 / 80%);
                        color: #FFF;
                        display: -webkit-box;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        font-size: 3rem;
                        font-weight: bold;
                    }
                </style>

                <div class="row">
                    <?php foreach ($galleries as $key => $value): ?>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-4 m-b-20" data-gallery>
                            <div class="figures">
                                <figure class="m-b-0">
                                    <img src="<?= $root.pathinfo(PATH_UPLOADS . $value['media'][0]['image'], PATHINFO_FILENAME) .'_thumb.'. pathinfo(PATH_UPLOADS . $value['media'][0]['image'], PATHINFO_EXTENSION) ?>" alt="" class="img-cover">
                                </figure>
                                <figure class="m-b-0">
                                    <?php if ( isset($value['media'][1]) ): ?>
                                        <img src="<?= $root.pathinfo(PATH_UPLOADS . $value['media'][1]['image'], PATHINFO_FILENAME) .'_thumb.'. pathinfo(PATH_UPLOADS . $value['media'][1]['image'], PATHINFO_EXTENSION) ?>" alt="" class="img-cover">
                                    <?php endif; ?>
                                </figure>
                                <figure class="m-b-0">
                                    <?php if ( isset($value['media'][2]) ): ?>
                                        <img src="<?= $root.pathinfo(PATH_UPLOADS . $value['media'][2]['image'], PATHINFO_FILENAME) .'_thumb.'. pathinfo(PATH_UPLOADS . $value['media'][2]['image'], PATHINFO_EXTENSION) ?>" alt="" class="img-cover">
                                    <?php endif; ?>
                                </figure>
                                <figure class="m-b-0">
                                    <?php if ( isset($value['media'][3]) ): ?>
                                        <img src="<?= $root.pathinfo(PATH_UPLOADS . $value['media'][3]['image'], PATHINFO_FILENAME) .'_thumb.'. pathinfo(PATH_UPLOADS . $value['media'][3]['image'], PATHINFO_EXTENSION) ?>" alt="" class="img-cover">
                                    <?php endif; ?>
                                </figure>
                                <?php if ( (count($value['media']) - 3) > 0 ): ?>
                                    <span class="count">+<?= count($value['media']) - 3 ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="content p-20" style="background-color: #FFF;">
                                <h5 class="m-t-0"><?= $value['name'] ?> - ID: <?= $value['id'] ?></h5>
                                <div class="button-items text-right">
                                    <a href="index.php/gallery/update?id=<?= $value['id'] ?>" class="btn btn-secondary">Actualizar</a>
                                    <a href="javascript:void(0);" data-delete="<?= $value['id'] ?>" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</main>
