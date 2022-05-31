<?php
defined('_EXEC') or die;

// OWL-Carousel
$this->dependencies->add(['js', '{$path.plugins}OwlCarousel2-2.3.4/owl.carousel.min.js']);
$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.carousel.min.css']);

// Page
$this->dependencies->add(['js', '{$path.js}Pages/Index.js']);
?>

<div id="page">
    %{header}%

    <main id="main-content">
        <section class="home-cover">
            <div class="owl-carousel">
                <div class="item text-center">
                    <div class="background">
                        <figure class="elm-stretched m-0">
                            <img src="{$path.uploads}zoom_1920x1080_C.jpeg" class="img-cover">
                        </figure>
                    </div>
                    <div class="container pos-relative text-light">
                        <h2 class="text-uppercase display-4 font-weight-bold">Bienvenidos a Astra, A.C.</h2>
                        <p class="h2 font-weight-normal m-0">Por el Bienestar de las Personas con Autismo.</p>
                    </div>
                </div>
                <div class="item text-center">
                    <div class="background"></div>
                    <div class="container pos-relative text-light">
                        <h2 class="text-uppercase display-4 font-weight-bold">Bienvenidos a Astra, A.C.</h2>
                        <p class="h2 font-weight-normal m-0">Por el Bienestar de las Personas con Autismo.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-primary p-tb-50">
            <div class="p-tb-50"></div>
            <div class="container text-secondary font-20">
                <h1 class="h2 m-b-20" style="font-weight: 700">¿Qué es el Autismo?</h1>
                <p class="text-justify m-b-50">Es un Trastorno del Neurodesarrollo que afecta la interacción social, la
                    comunicación y el comportamiento de la persona con ésta condición de vida.</p>
                <h2 class="h2 m-b-20" style="font-weight: 700">¿Qué es Astra?</h2>
                <p class="text-justify m-b-0">Una institución especializada que brinda atención integral a personas con Autismo y otros Trastornos del Neurodesarrollo, desde los 18 meses a la vida adulta a través de distintos programas terapéuticos y educativos. Con más de 20 años de experiencia hemos logrado conformar un equipo de profesionales y un modelo educativo basado en buenas prácticas de intervención centrado en la persona, con enfoque sistémico familiar y de derechos de las personas con discapacidad.</p>
                <div class="button-items text-center m-t-50"> <a href="javascript:void(0);" class="btn btn-outline btn-light btn-lg m-0">Nuestros programas</a> </div>
            </div>
            <div class="p-tb-50"></div>
        </section>

        <section class="bg-primary-light p-b-50">
            <div class="container">
                <?php
                $video_url = "https://www.youtube.com/watch?v=MtgnjgIpy48";
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
                    <figure class="elm-stretched m-0" style="opacity: 0.3;">
                        <img src="<?= $video_thumb['thumbnail_url'] ?>" class="img-cover">
                    </figure>
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

        <section class="p-tb-50">
            <div class="container">
                <h1 class="text-uppercase font-weight-bold m-b-30 text-secondary">Siguenos en Facebook y Twitter</h1>

                <div class="row">
                    <div class="col-lg-4">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v14.0" nonce="rYwv4Os8">
                        </script>

                        <div class="fb-page" data-href="https://www.facebook.com/astracancun/" data-tabs="timeline" data-width="" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" style="width: 100%;">
                            <blockquote cite="https://www.facebook.com/astracancun/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/astracancun/">ASTRA-CANCUN</a></blockquote>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <a class="twitter-timeline" data-height="400" href="https://twitter.com/AstraCancun?ref_src=twsrc%5Etfw">Tweets by AstraCancun</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </section>
    </main>

    %{footer}%
</div>