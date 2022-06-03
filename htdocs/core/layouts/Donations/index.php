<?php
defined('_EXEC') or die;

// OWL-Carousel
$this->dependencies->add(['js', '{$path.plugins}OwlCarousel2-2.3.4/owl.carousel.min.js']);
$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.carousel.min.css']);

// Page
$this->dependencies->add(['js', '{$path.js}Pages/donations.js']);
?>

<div id="page">
    %{header}%

    <main id="main-content">
        <section class="page-cover text-center">
            <div class="background">
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
                                <img class="card-img-top img-cover" src="{$path.images}beca-alumno.jpeg">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="/donations/beca-alumno" class="btn btn-block btn-lg"
                                    style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Patrocina un atleta</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="{$path.images}patrocina-atleta.jpeg">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="/donations/patrocina-atleta" class="btn btn-block btn-lg"
                                    style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Apadrina un artista</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="{$path.images}apadrina-artista.jpeg">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="/donations/apadrina-artista" class="btn btn-block btn-lg"
                                    style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Dona en especie</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="{$path.images}dona-especie.jpeg">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="/donations/dona-especie" class="btn btn-block btn-lg"
                                    style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Dona en dinero</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="{$path.images}dona-dinero.jpeg">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="/donations/dona-dinero" class="btn btn-block btn-lg"
                                    style="font-size: 1.8rem;">
                                    <i class="fa fa-heart m-r-10"></i> Donar ahora!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card m-b-30">
                            <div class="card-body bg-secondary">
                                <h4 class="card-title font-20 m-0 text-primary">Dona tu tiempo</h4>
                            </div>
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover" src="{$path.images}dona-tiempo.jpeg">
                            </figure>
                            <div class="card-body bg-primary p-0">
                                <a href="/donations/dona-tiempo" class="btn btn-block btn-lg"
                                    style="font-size: 1.8rem;">
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

                <div class="our_allies">
                    <div class="owl-carousel">
                        <?php foreach ($allies_logos as $value) : ?>
                        <div class="item">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.uploads}<?= $value['image'] ?>" class="img-cover">
                            </figure>
                        </div>
                        <?php endforeach; ?>
                    </div>
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