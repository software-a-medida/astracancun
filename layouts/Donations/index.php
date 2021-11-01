<?php defined('_EXEC') or die;

/**
* @package valkyrie.layouts.index
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['css', '{$path.plugins}owlcarousel/assets/owl.carousel.min.css']);
$this->dependencies->add(['css', '{$path.plugins}owlcarousel/assets/owl.theme.default.min.css']);
$this->dependencies->add(['js', '{$path.js}pages/donations.min.js']);
$this->dependencies->add(['js', '{$path.plugins}owlcarousel/owl.carousel.min.js']);

?>

%{header}%
<section class="home cover min">
    <figure>
        <img src="{$path.uploads}{$cover}" alt="Cover">
    </figure>
    <div class="container">
        <div class="title">
            <h1>{$title}</h1>
        </div>
    </div>
</section>
<section class="ally">
    <div class="container">
        <div class="title">
            <h1>{$lang.to_ally}</h1>
        </div>
        <div class="item">
            <h4>{$lang.beca-alumno}</h4>
            <figure>
                <img src="{$path.uploads}beca-alumno.png" alt="Cover">
            </figure>
            <a data-button-modal="beca"><i class="material-icons">favorite</i>{$lang.donate-now}</a>
        </div>
        <div class="item">
            <h4>{$lang.patrocina-atleta}</h4>
            <figure>
                <img src="{$path.uploads}patrocina-atleta.png" alt="Cover">
            </figure>
            <a data-button-modal="patrocina"><i class="material-icons">favorite</i>{$lang.donate-now}</a>
        </div>
        <div class="item">
            <h4>{$lang.apadrina-artista}</h4>
            <figure>
                <img src="{$path.uploads}apadrina-artista.png" alt="Cover">
            </figure>
            <a data-button-modal="apadrina"><i class="material-icons">favorite</i>{$lang.donate-now}</a>
        </div>
        <div class="item">
            <h4>{$lang.dona-especie}</h4>
            <figure>
                <img src="{$path.uploads}dona-especie.png" alt="Cover">
            </figure>
            <a data-button-modal="especie"><i class="material-icons">favorite</i>{$lang.donate-now}</a>
        </div>
        <div class="item">
            <h4>{$lang.dona-dinero}</h4>
            <figure>
                <img src="{$path.uploads}dona-dinero.png" alt="Cover">
            </figure>
            <a data-button-modal="dinero"><i class="material-icons">favorite</i>{$lang.donate-now}<img src="{$path.images}paypal1.png" alt="PayPal"></a>
        </div>
        <div class="item">
            <h4>{$lang.dona-tiempo}</h4>
            <figure>
                <img src="{$path.uploads}dona-tiempo.png" alt="Cover">
            </figure>
            <a data-button-modal="tiempo"><i class="material-icons">favorite</i>{$lang.donate-now}</a>
        </div>
    </div>
</section>
<section class="our-allies">
    <div class="container">
        <div class="title">
            <h1>{$lang.our_allies}</h1>
        </div>
        {$lst_allies}
    </div>
</section>
<section class="stories">
    <div class="container">
        <div class="title">
            <h1>{$lang.telling_stories}</h1>
        </div>
        <div id="stories" class="owl-carousel owl-theme">
            {$lst_stories}
        </div>
    </div>
</section>
<section class="videos">
    <div class="container">
        <iframe
            width="100%"
            height="600px"
            src="{$video}"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>
</section>
<section class="modal" data-modal="beca">
    <div class="content">
        <header>
            <h4>{$lang.beca-alumno}</h4>
            <a class="btn" button-close>X</a>
        </header>
        <main>
            <form name="beca">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>{$lang.required_fields}</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.name}</h6>
                        <input type="text" name="name">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.email}</h6>
                        <input type="email" name="email">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.phone-movil} {$lang.optional}</h6>
                        <input type="text" name="phone">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.observations} {$lang.optional}</h6>
                        <textarea name="observations"></textarea>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-cancel>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="patrocina">
    <div class="content">
        <header>
            <h4>{$lang.patrocina-atleta}</h4>
            <a class="btn" button-close>X</a>
        </header>
        <main>
            <form name="patrocina">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>{$lang.required_fields}</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.name}</h6>
                        <input type="text" name="name">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.email}</h6>
                        <input type="email" name="email">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.phone-movil} {$lang.optional}</h6>
                        <input type="text" name="phone">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.observations} {$lang.optional}</h6>
                        <textarea name="observations"></textarea>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-cancel>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="apadrina">
    <div class="content">
        <header>
            <h4>{$lang.apadrina-artista}</h4>
            <a class="btn" button-close>X</a>
        </header>
        <main>
            <form name="apadrina">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>{$lang.required_fields}</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.name}</h6>
                        <input type="text" name="name">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.email}</h6>
                        <input type="email" name="email">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.phone-movil} {$lang.optional}</h6>
                        <input type="text" name="phone">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.observations} {$lang.optional}</h6>
                        <textarea name="observations"></textarea>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-cancel>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="especie">
    <div class="content">
        <header>
            <h4>{$lang.dona-especie}</h4>
            <a class="btn" button-close>X</a>
        </header>
        <main>
            <form name="especie">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>{$lang.required_fields}</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.name}</h6>
                        <input type="text" name="name">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.email}</h6>
                        <input type="email" name="email">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.phone-movil} {$lang.optional}</h6>
                        <input type="text" name="phone">
                    </div>
                </fieldset>
                <div class="checkboxes-a">
                    {$lst_especie}
                    <label><input type="radio" name="donation" value="others"><span>{$lang.others}</span></label>
                    <label><input type="radio" name="donation" value="hotel"><span>{$lang.hotel-especie}</span></label>
                    <fieldset class="fields-group hidden">
                        <div class="text">
                            <h6><span class="required-field">*</span>{$lang.especifica}</h6>
                            <input type="text" name="others">
                        </div>
                    </fieldset>
                </div>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.observations} {$lang.optional}</h6>
                        <textarea name="observations"></textarea>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-cancel>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="dinero">
    <div class="content">
        <header>
            <h4>{$lang.dona-dinero}</h4>
            <a class="btn" button-close>X</a>
        </header>
        <main>
            <form name="dinero">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>{$lang.required_fields}</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.name}</h6>
                        <input type="text" name="name">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.email}</h6>
                        <input type="email" name="email">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.phone-movil} {$lang.optional}</h6>
                        <input type="text" name="phone">
                    </div>
                </fieldset>
                <div class="checkboxes-a">
                    {$lst_dinero}
                    <label><input type="radio" name="donation" value="others"><span>{$lang.others}</span><img src="{$path.images}paypal1.png" alt="PayPal"></label>
                    <fieldset class="fields-group hidden">
                        <div class="text">
                            <h6><span class="required-field">*</span>{$lang.especifica}</h6>
                            <input type="text" name="others">
                        </div>
                    </fieldset>
                </div>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.observations} {$lang.optional}</h6>
                        <textarea name="observations"></textarea>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-cancel>Cerrar</a>
        </footer>
    </div>
</section>
<section class="modal" data-modal="tiempo">
    <div class="content">
        <header>
            <h4>{$lang.dona-tiempo}</h4>
            <a class="btn" button-close>X</a>
        </header>
        <main>
            <form name="tiempo">
                <fieldset class="fields-group">
                    <p class="warning"><span class="required-field">*</span>{$lang.required_fields}</p>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.name}</h6>
                        <input type="text" name="name">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.email}</h6>
                        <input type="email" name="email">
                    </div>
                </fieldset>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6>{$lang.phone-movil} {$lang.optional}</h6>
                        <input type="text" name="phone">
                    </div>
                </fieldset>
                <div class="checkboxes-a">
                    {$lst_tiempo}
                    <label><input type="radio" name="donation" value="others"><span>{$lang.others}</span></label>
                    <fieldset class="fields-group hidden">
                        <div class="text">
                            <h6><span class="required-field">*</span>{$lang.especifica}</h6>
                            <input type="text" name="others">
                        </div>
                    </fieldset>
                </div>
                <fieldset class="fields-group">
                    <div class="text">
                        <h6><span class="required-field">*</span>{$lang.cuentanos-ti}</h6>
                        <textarea name="observations"></textarea>
                    </div>
                </fieldset>
            </form>
        </main>
        <footer>
            <a class="btn btn-colored" button-success>Aceptar</a>
            <a class="btn" button-cancel>Cerrar</a>
        </footer>
    </div>
</section>
