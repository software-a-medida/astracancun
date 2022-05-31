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
                    <img src="{$path.uploads}zoom_1920x1080_C.jpeg" class="img-cover">
                </figure>
            </div>
        </section>

        <section class="bg-light p-tb-50">
            <div class="container">
                <div class="box">
                    <h1 class="m-b-20">Atención temprana del autismo.</h1>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                        mus.</p>

                    <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                        enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>

                    <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                        mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate
                        eleifend tellus.</p>

                    <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus
                        in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque
                        rutrum.</p>

                    <p>Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget
                        dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
                        sit amet adipiscing sem neque sed ipsum.</p>

                    <p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante
                        tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit
                        amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec
                        sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>
                </div>
            </div>
        </section>
    </main>

    %{footer}%
</div>