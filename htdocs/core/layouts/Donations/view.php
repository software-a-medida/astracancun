<?php
defined('_EXEC') or die;

// Page
$this->dependencies->add(['js', 'https://js.stripe.com/v3/']);
$this->dependencies->add(['other', '<script>
      // Replace with your own publishable key: https://dashboard.stripe.com/test/apikeys
      var PUBLISHABLE_KEY = \'pk_live_51L5b3gACXXubOFDmokCo5msEEbHYeyvs4s7NQlOLcbAV0vshj0EKcOHa4kID1hLehbGzruUYGBBptAEtHdGnKN7P00lzFMblht\';
      // Replace with the domain you want your users to be redirected back to after payment
      var DOMAIN = "{$_base}";

      var stripe = Stripe(PUBLISHABLE_KEY);

      // Handle any errors from Checkout
      var handleResult = function (result) {
        if (result.error) {
          var displayError = document.getElementById(\'error-message\');
          displayError.textContent = result.error.message;
        }
      };

      document.querySelectorAll(\'button\').forEach(function (button) {
        button.addEventListener(\'click\', function (e) {
          var mode = e.target.dataset.checkoutMode;
          var priceId = e.target.dataset.priceId;
          var items = [{ price: priceId, quantity: 1 }];

          // Make the call to Stripe.js to redirect to the checkout page
          // with the sku or plan ID.
          stripe
            .redirectToCheckout({
              mode: mode,
              lineItems: items,
              successUrl:
                DOMAIN + \'success.html?session_id={CHECKOUT_SESSION_ID}\',
              cancelUrl:
                DOMAIN + \'canceled.html?session_id={CHECKOUT_SESSION_ID}\',
            })
            .then(handleResult);
        });
      });
    </script>']);
?>

<div id="page">
    %{header}%

    <main id="main-content">
        <section class="page-cover text-center" style="height: 300px;">
            <div class="background">
                <figure class="elm-stretched m-0">
                    <?php if ($url == 'beca-alumno') : ?>
                    <img src="{$path.images}beca-alumno.jpeg" class="img-cover">
                    <?php elseif ($url == 'patrocina-atleta') : ?>
                    <img src="{$path.images}patrocina-atleta.jpeg" class="img-cover">
                    <?php elseif ($url == 'apadrina-artista') : ?>
                    <img src="{$path.images}apadrina-artista.jpeg" class="img-cover">
                    <?php elseif ($url == 'dona-especie') : ?>
                    <img src="{$path.images}dona-especie.jpeg" class="img-cover">
                    <?php elseif ($url == 'dona-dinero') : ?>
                    <img src="{$path.images}dona-dinero.jpeg" class="img-cover">
                    <?php elseif ($url == 'dona-tiempo') : ?>
                    <img src="{$path.images}dona-tiempo.jpeg" class="img-cover">
                    <?php endif; ?>
                </figure>
            </div>
        </section>

        <section class="bg-light p-tb-50">
            <div class="container">
                <?php if ($url == 'beca-alumno') : ?>
                <div class="box">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box m-t-50">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif ($url == 'patrocina-atleta') : ?>
                <div class="box">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box m-t-50">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif ($url == 'apadrina-artista') : ?>
                <div class="box">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box m-t-50">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif ($url == 'dona-especie') : ?>
                <div class="box">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box m-t-50">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif ($url == 'dona-dinero') : ?>
                <div class="box">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box m-t-50">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif ($url == 'dona-tiempo') : ?>
                <div class="box">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box m-t-50">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <figure class="elm-stretched m-0">
                                <img src="{$path.images}history.jpeg" class="img-cover">
                            </figure>
                        </div>
                        <div class="col-lg-12 p-lr-lg-50">
                            <span class="d-block p-t-50"></span>
                            <p class="h2 m-b-20">Nombre</p>
                            <p class="text-muted font-16">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            <p class="text-muted font-16">Integer tincidunt. Cras dapibus. Vivamus elementum
                                semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                                vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales
                                sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>

                            <div class="button-items text-center m-t-50">
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDm6I2Dz7RN">
                                    Donate $50.00
                                </button>
                                <button class="btn" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmHCTEMqNc">
                                    Donate $150.00
                                </button>
                                <button class="btn btn-secondary" data-checkout-mode="payment"
                                    data-price-id="price_1L6cyCACXXubOFDmt277OcKz">
                                    Donate $500.00
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    %{footer}%
</div>