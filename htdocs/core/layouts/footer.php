<?php defined('_EXEC') or die; ?>
<footer class="main-footer">
    <section class="bg-primary p-tb-50">
        <div class="container text-center">
            <figure id="logotype_footer" class="m-lr-auto m-b-30" style="width: 300px;">
                <img src="{$path.images}logotype-large-light.svg" class="elm-stretched">
            </figure>

            <ul class="list-inline m-0">
                <li class="list-inline-item m-r-20">
                    <a href="javascript:void(0);" class="btn btn-light btn-lg">¡DONAR AHORA!</a>
                </li>
                <li class="list-inline-item m-r-20">
                    <a href="javascript:void(0);" class="btn btn-light btn-link btn-lg p-0" style="font-size: 35px;">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                <li class="list-inline-item m-r-20">
                    <a href="javascript:void(0);" class="btn btn-light btn-link btn-lg p-0" style="font-size: 35px;">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="btn btn-light btn-link btn-lg p-0" style="font-size: 35px;">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="copyright">
        <div class="container">
            © <?= date('Y') ?> <b>{$_webpage}</b> <i class="mdi mdi-heart text-danger"></i>
            by <a href="https://codemonkey.com.mx" target="_blank">codemonkey.com.mx</a>
            - <a href="javascript:void(0);" class="text-light">Avisos de privacidad</a>
            - <a href="javascript:void(0);" class="text-light">Transparencia</a>
        </div>
    </section>
</footer>