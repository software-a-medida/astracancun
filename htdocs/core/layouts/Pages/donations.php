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
                <figure class="elm-stretched m-0">
                    <img src="{$path.uploads}donations.jpeg" class="img-cover">
                </figure>
            </div>
            <div class="container pos-relative text-light">
                <h2 class="text-uppercase display-4 font-weight-bold">Sé un aliado</h2>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <h1 class="text-uppercase font-weight-bold m-b-30 text-secondary">... y cambia una historia</h1>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Beca a un alumno</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="javascript:void(0);" class="btn btn-block btn-lg" style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Beca a un alumno</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="javascript:void(0);" class="btn btn-block btn-lg" style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Beca a un alumno</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="javascript:void(0);" class="btn btn-block btn-lg" style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Beca a un alumno</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="javascript:void(0);" class="btn btn-block btn-lg" style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Beca a un alumno</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="javascript:void(0);" class="btn btn-block btn-lg" style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Beca a un alumno</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="javascript:void(0);" class="btn btn-block btn-lg" style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <h1 class="text-uppercase font-weight-bold m-b-30 text-secondary">Nuestros aliados</h1>

                <?php
                $logotypes = [
                    "pngtree-beauty-spa-logotype-png-image_4154990.jpeg",
                    "pngtree-fox-logo-stock-illustration-line-art-concept-vector-logotype-png-image_5522234.jpeg",
                    "pngtree-letter-b-nature-leaf-logo-png-image_5008866.jpeg",
                    "pngtree-letter-r-logo-icon-design-template-elements-vector-graphic-elegant-logotype-png-image_5360932.jpeg",
                    "pngtree-wood-logotype-png-image_3600196.jpeg",
                    "pngtree-online-shop-digital-shopping-logo-concept-for-mouse-and-cart-bag-png-image_7265985.png",
                ];
                ?>

                <div class="our_allies">
                    <div class="owl-carousel">
                        <?php foreach ($logotypes as $value) : ?>
                            <div class="item">
                                <figure class="elm-stretched m-0">
                                    <img src="{$path.uploads}<?= $value ?>" class="img-cover">
                                </figure>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="button-items text-center m-t-50">
                    <a href="javascript:void(0);" class="btn btn-outline btn-primary btn-lg m-0">Sé un aliado</a>
                </div>
            </div>
        </section>

        <section class="bg-light p-tb-50">
            <div class="container">
                <?php
                $video_url = "https://www.youtube.com/watch?v=P8h2AAKB_68";
                $foo = curl_init("https://www.youtube.com/oembed?url=$video_url&format=json");
                curl_setopt($foo, CURLOPT_RETURNTRANSFER, 1);
                $video_thumb = curl_exec($foo);
                curl_close($foo);
                unset($foo);
                $video_thumb = json_decode($video_thumb, true);
                ?>
                <div class="video_thumb">
                    <a href="<?= $video_url ?>" target="_blank" class="play_button">
                        <i class="fa fa-play-circle"></i>
                    </a>
                    <figure class="elm-stretched m-0" style="opacity: 0.5;">
                        <img src="<?= $video_thumb['thumbnail_url'] ?>" class="img-cover">
                    </figure>
                </div>
            </div>
        </section>
    </main>

    %{footer}%
</div>