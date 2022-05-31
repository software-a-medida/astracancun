<?php defined('_EXEC') or die; ?>
<header class="main-header">
    <div class="top-header">
        <div class="container">
            <figure id="logotype" class="m-0">
                <img src="{$path.images}logotype-large-light.svg" class="elm-stretched light">
                <img src="{$path.images}logotype-large-color.svg" class="elm-stretched color">
            </figure>

            <nav class="visible-desktop visible-desktop-large">
                <ul class="list-inline m-0">
                    <li class="list-inline-item m-0">
                        <a href="/" class="btn btn-link text-uppercase btn-donar">
                            <i class="fa fa-heart"></i>
                            Donar
                        </a>
                    </li>
                    <li class="list-inline-item m-0">
                        <div class="dropmenu menu-right">
                            <button class="btn btn-link text-uppercase">
                                Idioma
                                <i class="fa fa-caret-down m-l-5"></i>
                            </button>
                            <div class="dropdown">
                                <a href="javascript:void(0);">Español</a>
                                <a href="javascript:void(0);">Ingles</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <nav class="visible-phone visible-desktop-tablet">
                <ul class="list-inline m-0">
                    <li class="list-inline-item m-0">
                        <button id="trigger-nav-mobile" type="button"
                            class="btn btn-b-none btn-link button-hamburger-menu waves-effect waves-light menu-wrapper">
                            <div class="hamburger-menu"></div>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="main-menu visible-desktop visible-desktop-large text-right">
        <div class="container">
            <nav>
                <ul class="list-inline m-0">
                    <li class="list-inline-item m-0">
                        <a href="/" class="btn btn-link text-uppercase">Inicio</a>
                    </li>
                    <li class="list-inline-item m-0">
                        <a href="/programs" class="btn btn-link text-uppercase">Nuestros programas</a>
                    </li>
                    <li class="list-inline-item m-0">
                        <a href="/donations" class="btn btn-link text-uppercase">Sé un aliado</a>
                    </li>
                    <li class="list-inline-item m-0">
                        <a href="/about" class="btn btn-link text-uppercase">Acerca de nosotros</a>
                    </li>
                    <li class="list-inline-item m-0">
                        <a href="/blog" class="btn btn-link text-uppercase">Informate</a>
                    </li>
                    <li class="list-inline-item m-0">
                        <a href="/contact" class="btn btn-link text-uppercase">Contactanos</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>