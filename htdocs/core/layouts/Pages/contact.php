<?php
defined('_EXEC') or die;

// Bootstrap-inputmask
$this->dependencies->add(['js', '{$path.plugins}bootstrap-inputmask/jquery.inputmask.min.js']);

// Page
$this->dependencies->add(['other', "<script type=\"text/javascript\"> $('form[name=\"contact\"] input[type=\"tel\"]').inputmask(\"(999) 999-9999\");</script>"]);
?>
<div id="page">
    %{header}%

    <main id="main-content">
        <section class="page-cover text-center">
            <div class="background">
            </div>
            <div class="container pos-relative text-light">
                <h2 class="text-uppercase display-4 font-weight-bold">Contáctanos</h2>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-b-50 m-b-lg-0">
                        <form name="contact" class="contact row">
                            <div class="col-12 col-md-6 m-b-20">
                                <div class="label">
                                    <label class="m-0">
                                        <div class="d-flex align-items-center">
                                            <h6 class="form-name">Nombre</h6>
                                            <input type="text" name="name" />
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 m-b-20">
                                <div class="label">
                                    <label class="m-0">
                                        <div class="d-flex align-items-center">
                                            <h6 class="form-name">Email</h6>
                                            <input type="text" name="email" />
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 m-b-10 m-b-20">
                                <div class="label">
                                    <label class="m-0">
                                        <div class="d-flex align-items-center">
                                            <h6 class="form-name">Teléfono</h6>
                                            <select name="prefix">
                                                <?php foreach ($this->format->import_file(PATH_INCLUDES, 'codes_countries_iso', 'json') as $value) : ?>
                                                <option value="<?= $value['phone_code'] ?>"
                                                    <?= ($value['phone_code'] === '52') ? 'selected' : '' ?>>
                                                    <?= $value['name'] ?> ( +<?= $value['phone_code'] ?> )</option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="tel" name="phone" />
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 m-b-10 m-b-20">
                                <div class="label">
                                    <label class="m-0">
                                        <div class="d-flex bg-light">
                                            <h6 class="form-name">Mensaje</h6>
                                            <textarea name="message" rows="8" cols="80"></textarea>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4">
                                <button type="submit" class="btn btn-block elm-stretched">Contactar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <ul class="list-unstyled contact-info">
                            <li class="m-b-10">
                                <span class="icon"><i class="fa fa-phone"></i></span>
                                <span class="text font-16">+(52) 998 892 0173</span>
                            </li>
                            <li class="m-b-10">
                                <span class="icon"><i class="fa fa-envelope"></i></span>
                                <span class="text font-16">contacto@astracancun.org</span>
                            </li>
                            <li class="m-b-20">
                                <span class="icon"><i class="fa fa-address-book"></i></span>
                                <span class="text font-16">Punta Tulbayab No. 6, M. 37, Sm. 24, CP 77509</span>
                            </li>
                            <li class="m-b-20 text-center">
                                <a class="d-inline-block font-40 m-lr-15" href="https://facebook.com/astracancun"
                                    target="_blank"><i class="fa fa-facebook"></i></a>
                                <a class="d-inline-block font-40 m-lr-15" href="https://instagram.com/astracancun"
                                    target="_blank"><i class="fa fa-instagram"></i></a>
                                <a class="d-inline-block font-40 m-lr-15" href="https://twitter.com/astracancun"
                                    target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="m-b-0">
                                <button type="button" class="btn btn-block elm-stretched btn-primary btn-outline">Ver en
                                    el mapa</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    %{footer}%
</div>