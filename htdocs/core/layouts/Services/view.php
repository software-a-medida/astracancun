<?php
defined('_EXEC') or die;

// OWL-Carousel
$this->dependencies->add(['js', '{$path.plugins}OwlCarousel2-2.3.4/owl.carousel.min.js']);
$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.carousel.min.css']);
?>

<div id="page">
    %{header}%

    <main id="main-content">
        <section class="page-cover text-center" style="height: 300px;">
            <div class="background">
                <figure class="elm-stretched m-0">
                    <img src="{$path.uploads}<?= $data['image'] ?>" class="img-cover">
                </figure>
            </div>
        </section>

        <section class="bg-light p-tb-50">
            <div class="container">
                <div class="box">
                    <h1 class="m-b-20"><?= $data['title'] ?></h1>

                    <?= json_decode($data['content']) ?>
                </div>
            </div>
        </section>
    </main>

    %{footer}%
</div>