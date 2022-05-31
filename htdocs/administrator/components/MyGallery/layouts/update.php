<?php
defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Security,Format};
use \BuriPHP\Administrator\Components\MyGallery\Component;

// Pages
$this->dependencies->add(['js', '{$path.components}MyGallery/assets/js/update.js?v=1.0.0']);

// Buttons
$this->dependencies->add(['other', '<script>$.app.addButtonsAction({
    "button": {
        "id": "save",
        "text": "Guardar",
        "class": "btn btn-success waves-effect waves-light",
        "href": "javascript:void(0);"
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
                        <li class="breadcrumb-item">
                            <a href="index.php/gallery">Galerías</a>
                        </li>
                        <li class="breadcrumb-item active">Actualizar</li>
                    </ol>

                    <h4 class="page-title">Actualizar galería - ID #<?= $data['id'] ?> (USE_GALLERY_<?= $data['id'] ?>)</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form name="update">
                            <?= $this->format->get_file( Security::DS(Component::LAYOUTS . 'templates/form_gallery.php'), ['images' => $images, 'data' => $data] ); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
