<?php
defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Security,Format};
?>
<div class="row">
    <div class="col-12 m-b-30">
        <div class="label">
            <label>
                <input name="title" type="text" value="<?= ( isset($data['name']) ) ? $data['name'] : '' ?>"/>
                <p class="description">Nombre de la galería.</p>
            </label>
        </div>
    </div>

    <div class="col-12 m-b-30">
        <div class="label">
            <label>
                <textarea name="description"><?= ( isset($data['description']) ) ? $data['description'] : '' ?></textarea>
                <p class="description">Descripción.</p>
            </label>
        </div>
    </div>

    <style>
        .image-checked {
            position: relative;
            width: 100%;
            height: 160px;
            border-radius: 2px;
            overflow: hidden;
        }

        .image-checked > .checker {
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 1;
            cursor: pointer;
        }

        .image-checked > input:checked + .checker {
            background-color: rgb(var(--success));
            opacity: 0.8;
        }

        .image-checked > figure {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: 0;
            z-index: 0;
            opacity: 0.1;
        }

        .image-checked > input:checked + .checker + figure {
            opacity: 1;
        }
    </style>

    <div class="col-12 m-b-30">
        <div class="row">
            <?php $security = new Security(); ?>
            <?php $root = str_replace('administrator/', '', (new Format)->baseurl()) . basename(PATH_UPLOADS) .'/'; ?>

            <div class="col-12">
                <p class="text-muted p-lr-5">Selecciona las imágenes que deseas incluir en la galería.</p>
            </div>

            <?php foreach( $images as $value ): ?>
                <div class="col-6 col-md-3 m-b-30">
                    <div class="image-checked">
                        <?php $id = $security->random_string(4); ?>
                        <input name="image_id[]" id="<?= $id ?>" type="checkbox" class="d-none" value="<?= $value['id'] ?>" <?= ( isset($data) && is_numeric(array_search($value['id'], array_column($data['media'], 'id'))) ) ? 'checked' : '' ?> >
                        <label for="<?= $id ?>" class="checker m-0"></label>
                        <figure>
                            <img src="<?= $root.pathinfo(PATH_UPLOADS . $value['media'], PATHINFO_FILENAME) .'_thumb.'. pathinfo(PATH_UPLOADS . $value['media'], PATHINFO_EXTENSION) ?>" alt="" class="img-cover">
                        </figure>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
