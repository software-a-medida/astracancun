<?php
defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Session, Security};
use \Libraries\{Dates};
use \BuriPHP\Administrator\Components\Blog\Component;

// Pages
$this->dependencies->add(['js', '{$path.components}Blog/assets/js/delete.js?v=1.0.0']);

// Buttons
$this->dependencies->add(['other', '<script>$.app.addButtonsAction({
    "dropdown": {
        "label": "Administrar",
        "dropdown": [
            {
                "text": "Categorías",
                "href": "javascript:void(0);",
                "data-button-modal": "categories"
            }
        ]
    }
})</script>']);

$this->dependencies->add(['other', '<script>$.app.addButtonsAction({
    "button": {
        "text": "Nueva entrada",
        "class": "btn btn-success waves-effect waves-light",
        "href": "index.php/blog/create"
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
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>

                    <h4 class="page-title">Lista de entradas al blog</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="blog" class="table mb-0" style="font-size: 14px; min-width: 1000px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Servicio</th>
                                        <th>Categoría</th>
                                        <th class="text-center">Fecha de creación</th>
                                        <th>Autor</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($data)) : ?>
                                        <tr>
                                            <td class="table-empty" colspan="7">
                                                <p class="m-0 text-muted">Sin entradas al blog.</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php foreach ($data as $value) : ?>
                                        <tr>
                                            <td>#<?= $value['id'] ?></td>
                                            <td><?= $value['title'] ?></td>
                                            <td><?= (is_null($value['category'])) ? 'Sin categoría' : $value['category']['es'] ?></td>
                                            <td class="text-center"><?= Dates::formatted_date($value['publication_date']) ?></td>
                                            <td><?= $value['username'] ?></td>
                                            <td>
                                                <div class="content-cell">
                                                    <div class="button-items text-right">
                                                        <a href="<?= (new Component())->url_public_component(true) ?><?= $value['url'] ?>" target="_blank" class="btn waves-effect waves-light"><i class="fa fa-link"></i></a>
                                                        <a href="index.php/blog/update?id=<?= $value['id'] ?>" class="btn waves-effect waves-light">Modificar</a>
                                                        <a href="javascript:void(0);" class="btn btn-danger waves-effect waves-light" data-ajax-delete="<?= $value['id'] ?>"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->format->get_file(Security::DS(Component::LAYOUTS . 'modals/categories.php'), null) ?>