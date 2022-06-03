<?php defined('_EXEC') or die; ?>

<div id="page">
    %{header}%

    <main id="main-content">
        <section class="page-cover text-center">
            <div class="background">
            </div>
            <div class="container pos-relative text-light">
                <h2 class="text-uppercase display-4 font-weight-bold">Nuestros programas</h2>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <div class="row">
                    <?php foreach ($services as $key => $value) : ?>
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
                                    <a href="/programs/<?= $value['url'] ?>"
                                        class="btn btn-primary waves-effect waves-light">Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="p-b-50">
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
    </main>

    %{footer}%
</div>