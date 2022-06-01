<?php
defined('_EXEC') or die;

// OWL-Carousel
$this->dependencies->add(['js', '{$path.plugins}OwlCarousel2-2.3.4/owl.carousel.min.js']);
$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.carousel.min.css']);
?>

<div id="page">
    %{header}%

    <main id="main-content">
        <section class="page-cover text-center">
            <div class="background">
            </div>
            <div class="container pos-relative text-light">
                <h2 class="text-uppercase display-4 font-weight-bold">Blog</h2>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <div class="row">
                    <?php foreach ($blog as $key => $value) : ?>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="{$path.uploads}<?= $value['image'] ?>">
                            </figure>
                            <div class="card-body">
                                <h4 class="card-title font-20 m-t-0"><?= $value['title'] ?></h4>
                                <p class="card-text">
                                    <?= substr(html_entity_decode(preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], str_replace('&nbsp;', ' ', strip_tags(json_decode($value['content']))))), 0, 100) ?>
                                    ...
                                </p>

                                <div class="button-items text-right m-t-10">
                                    <a href="/blog/<?= $value['url'] ?>"
                                        class="btn btn-primary waves-effect waves-light">Leer más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    %{footer}%
</div>