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
            </div>
            <div class="container pos-relative text-light">
                <h2 class="text-uppercase display-4 font-weight-bold">Conoce más sobre nosotros</h2>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <h1 class="text-uppercase font-weight-bold m-b-30 text-secondary">¿Quienes somos?</h1>

                <p class="h3">¿Qué es el Autismo?</p>
                <p class="text-muted font-20 m-b-30">Es un Trastorno del Neurodesarrollo que afecta la interacción
                    social, la comunicación y el comportamiento de la persona con ésta condición de vida.</p>

                <p class="h3">¿Qué es Astra?</p>
                <p class="text-muted font-20 m-b-50">Una institución especializada que brinda atención integral a
                    personas con Autismo y otros Trastornos del Neurodesarrollo, desde los 18 meses a la vida adulta a
                    través de distintos programas terapéuticos y educativos. Con más de 20 años de experiencia hemos
                    logrado conformar un equipo de profesionales y un modelo educativo basado en buenas prácticas de
                    intervención centrado en la persona, con enfoque sistémico familiar y de derechos de las personas
                    con discapacidad.</p>

                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <figure class="elm-stretched m-0">
                            <img src="{$path.images}history.jpeg" class="img-cover">
                        </figure>
                    </div>
                    <div class="col-lg-6 p-l-lg-50">
                        <span class="d-block p-t-50"></span>
                        <p class="h2 m-b-20">Historia</p>
                        <p class="text-muted font-16 m-b-0">Ante la falta de instituciones y recursos humanos
                            calificados para la atención de personas con autismo en Quintana Roo, se funda Astra el 24
                            de octubre de 1997 por iniciativa de un grupo de padres con hijos con autismo. Inicia
                            actividades en Cancún en un Centro de Atención Múltiple de la SEP, capacitando a
                            profesionales de la salud y educación a través de colaboraciones con la Clínica Mexicana del
                            Autismo e impartiendo terapias, conformando en poco tiempo los inicios del Programa
                            Psicopedagógico para el Desarrollo. En el año 2000 edifica sus propias instalaciones en un
                            terreno ofrecido en comodato por el Ayuntamiento de Benito Juárez, incrementando la oferta
                            de servicios con el programa Centro Escolar Astra para niños y niñas con autismo. En 2005
                            crea el Programa Casa Astra: Una Escuela Para la Vida, donde se imparte educación especial a
                            jóvenes y adultos con autismo y discapacidad intelectual para la vida independiente. En 2008
                            inicia el programa de desarrollo deportivo y artístico. En 2009 se funda el Programa de
                            Detección e Intervención Temprana para Infantes con Autismo. En 2012 se apertura el Programa
                            de Inclusión Educativa de niños y niñas con autismo en el aula ordinaria.</p>
                        <span class="d-block p-t-50"></span>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 p-r-lg-50 order-2 order-lg-1">
                        <span class="d-block p-t-50"></span>
                        <p class="h2 m-b-20">Órgano de gobierno</p>
                        <p class="text-muted font-16 m-b-0">El órgano máximo de la organización es la asamblea general
                            de socios, integrada por socios fundadores, adjuntos, consejeros, benefactores y adherentes,
                            quienes eligen para su administración a una Junta Directiva integrada por un presidente y
                            representante legal, secretario, tesorero y vocalías con comisiones específicas. Los
                            estatutos de Astra establecen que ninguno de los socios puede recibir remuneración
                            económica. Cualquier benefactor de Astra, si es de su interés, puede ser miembro de la
                            organización con derecho para ser informado, opinar sobre el programa de trabajo y votar por
                            los miembros que integrarán la Junta Directiva.</p>
                        <span class="d-block p-t-50"></span>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <figure class="elm-stretched m-0">
                            <img src="{$path.images}government.png" class="img-cover">
                        </figure>
                    </div>
                </div>

                <div class="p-t-50"></div>

                <div class="row no-gutters bx-shadow">
                    <div class="col-lg-4">
                        <div class="elm-stretched p-40">
                            <p class="h2 text-uppercase font-weight-bold m-b-30 text-secondary text-center">Misión</p>

                            <p class="text-muted font-16 text-justify">Promover el bienestar de las personas con
                                trastornos del espectro autista, persiguiendo la inclusión a su núcleo familiar a la
                                sociedad y a medios educativos y laborales regulares.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 bg-light">
                        <div class="elm-stretched p-40">
                            <p class="h2 text-uppercase font-weight-bold m-b-30 text-secondary text-center">Visión</p>

                            <p class="text-muted font-16 text-justify">Ser una institución con propuestas de vanguardia,
                                que brinde calidad y calidez en la atención de niños con autismo y contribuya al
                                fortalecimiento de otras instituciones públicas y privadas. Formar parte del proyecto de
                                vida de las familias con un miembro con autismo, ofreciendo apoyo oportuno de acuerdo a
                                las necesidades con relación a su edad.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="elm-stretched p-40">
                            <p class="h2 text-uppercase font-weight-bold m-b-30 text-secondary text-center">Valores</p>

                            <p class="text-muted font-16 text-justify">Respeto, Tolerancia, Amor al Ser Humano, Familia,
                                Honestidad y Verdad Científica.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <div class="timeline">
                    <div class="events">
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>1997</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">El 24 de octubre se funda Astra como una iniciativa de un
                                    grupo de padres con hijos con autismo.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>1998</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Iniciamos las operaciones en el CAM 2O y 11W con el
                                    servicio de evaluación, intervenciones psicoeducativas y capacitación interna para
                                    terapeutas.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>1999</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Comienza el programa “Centro Escolar Astra", una escuela
                                    de educación especial para niños y niñas con autismo.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2000</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Iniciamos la construcción de las instalaciones de Astra
                                    A.C.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2001</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Abrimos a la comunidad los servicios de formación a
                                    profesionales y padres de familia.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2005</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Iniciamos el programa Casa Astra, un espacio educativo
                                    para la vida independiente de jóvenes con autismo y discapacidad intelectual.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2006</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Acompañamos la integración educativa de niños y niñas con
                                    autismo en escuelas regulares con apoyo de Monitores Educativos.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2010</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Comenzamos el programa “Detección e Intervención Temprana
                                    en el Autismo” con financiamiento del Fideicomiso por los Niños de México Todos en
                                    Santander, Indesol, Gentera, Axa y SUD.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2012</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Recibimos el reconocimiento de institucionalidad y
                                    transparencia de CEMEFI A.C.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2013</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Logramos la certificación Internacional de la Universidad
                                    Davis de California para la aplicación del Modelo Denver de Intervención Temprana.
                                </p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2015</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Nace el Club Deportivo Tiburones de Astra y promovimos el
                                    nacimiento de organizaciones deportivas para personas con discapacidad intelectual y
                                    autismo de Quintana Roo.</p>
                            </div>
                        </div>
                        <div class="event">
                            <div class="knob"></div>
                            <div class="date">
                                <h2>2017</h2>
                            </div>
                            <div class="description">
                                <p class="text-muted font-16">Incidimos en las políticas públicas sobre personas con
                                    discapacidad a nivel municipal y estatal, como miembro de diversos consejos
                                    consultivos.</p>
                            </div>
                        </div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <h1 class="text-uppercase font-weight-bold m-b-30 text-secondary">Equipo</h1>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <figure class="img-fluid m-0">
                                <img class="card-img-top img-cover"
                                    src="https://via.placeholder.com/800x533/34404b/5c6872" alt="Card image cap">
                            </figure>
                            <div class="card-body text-center">
                                <h4 class="card-title font-16 m-t-0 m-b-5">Diana Angelica Dávalos Castilla</h4>
                                <p class="card-text m-b-10">Presidenta</p>
                                <p class="card-text">Presidente de la mesa directiva de Asociación de Ayuda a Niños con
                                    Trastornos en el Desarrollo A.C.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-tb-50">
            <div class="container">
                <h1 class="text-uppercase font-weight-bold m-b-30 text-secondary">Conoce más</h1>

                <div class="row">
                    <div class="col-lg-6 m-b-30">
                        <?php
                        $video_url = "https://www.youtube.com/watch?v=5nU2DHOsJ68";
                        $foo = curl_init("https://www.youtube.com/oembed?url=$video_url&format=json");
                        curl_setopt($foo, CURLOPT_RETURNTRANSFER, 1);
                        $video_thumb = curl_exec($foo);
                        curl_close($foo);
                        $video_thumb = json_decode($video_thumb, true);
                        ?>
                        <div class="video_thumb" style="height: 300px;">
                            <a href="<?= $video_url ?>" target="_blank" class="play_button">
                                <i class="fa fa-play-circle"></i>
                            </a>
                            <figure class="elm-stretched m-0" style="opacity: 0.5;">
                                <img src="<?= $video_thumb['thumbnail_url'] ?>" class="img-cover">
                            </figure>
                        </div>
                        <?php unset($foo, $video_thumb); ?>
                    </div>
                    <div class="col-lg-6 m-b-30">
                        <?php
                        $video_url = "https://www.youtube.com/watch?v=aD3yK3fEQl4";
                        $foo = curl_init("https://www.youtube.com/oembed?url=$video_url&format=json");
                        curl_setopt($foo, CURLOPT_RETURNTRANSFER, 1);
                        $video_thumb = curl_exec($foo);
                        curl_close($foo);
                        $video_thumb = json_decode($video_thumb, true);
                        ?>
                        <div class="video_thumb" style="height: 300px;">
                            <a href="<?= $video_url ?>" target="_blank" class="play_button">
                                <i class="fa fa-play-circle"></i>
                            </a>
                            <figure class="elm-stretched m-0" style="opacity: 0.5;">
                                <img src="<?= $video_thumb['thumbnail_url'] ?>" class="img-cover">
                            </figure>
                        </div>
                        <?php unset($foo, $video_thumb); ?>
                    </div>
                    <div class="col-lg-6 m-b-30">
                        <?php
                        $video_url = "https://www.youtube.com/watch?v=0E9qyUkYOIc";
                        $foo = curl_init("https://www.youtube.com/oembed?url=$video_url&format=json");
                        curl_setopt($foo, CURLOPT_RETURNTRANSFER, 1);
                        $video_thumb = curl_exec($foo);
                        curl_close($foo);
                        $video_thumb = json_decode($video_thumb, true);
                        ?>
                        <div class="video_thumb" style="height: 300px;">
                            <a href="<?= $video_url ?>" target="_blank" class="play_button">
                                <i class="fa fa-play-circle"></i>
                            </a>
                            <figure class="elm-stretched m-0" style="opacity: 0.5;">
                                <img src="<?= $video_thumb['thumbnail_url'] ?>" class="img-cover">
                            </figure>
                        </div>
                        <?php unset($foo, $video_thumb); ?>
                    </div>
                    <div class="col-lg-6 m-b-30">
                        <?php
                        $video_url = "https://www.youtube.com/watch?v=C9HdVla1gqg";
                        $foo = curl_init("https://www.youtube.com/oembed?url=$video_url&format=json");
                        curl_setopt($foo, CURLOPT_RETURNTRANSFER, 1);
                        $video_thumb = curl_exec($foo);
                        curl_close($foo);
                        $video_thumb = json_decode($video_thumb, true);
                        ?>
                        <div class="video_thumb" style="height: 300px;">
                            <a href="<?= $video_url ?>" target="_blank" class="play_button">
                                <i class="fa fa-play-circle"></i>
                            </a>
                            <figure class="elm-stretched m-0" style="opacity: 0.5;">
                                <img src="<?= $video_thumb['thumbnail_url'] ?>" class="img-cover">
                            </figure>
                        </div>
                        <?php unset($foo, $video_thumb); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    %{footer}%
</div>