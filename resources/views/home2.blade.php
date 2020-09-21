<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SST Perfect Body</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" class="p-5" href="assets/img/logo.png"/>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container"> 
                                               

                <a class="navbar-brand js-scroll-trigger" href="#page-top"> <img class="mx-2 margin-t" style="width: 150px; border-radius:20px;" src="assets/img/favicon.png" alt=""> P.B.M.C</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Encuestas</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a  href="#" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-toggle="modal" data-target="#Modal_registrar_personal">Registrate</a></li>
                        <div class="dropdown">
                            <a class="mx-0 mx-lg-1 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownAdministrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recursos</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownAdministrar">
                                <a class="dropdown-item js-scroll-trigger"  href="#quejas">enviar quejas y sugerencia</a>
                                <a class="dropdown-item js-scroll-trigger"  href="#gestion">Objetivos</a>
                                <a class="dropdown-item js-scroll-trigger"  href="#footer">sobre la app</a>
                            </div>
                        </div>
                        @if (Auth::User())
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"  href="{{route('administracion')}}">Administración</a></li>
                        @else
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-toggle="modal" data-target="#Modal_login_administracion">Administración</a></li>
                        @endif                   
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Comunicación Participación y consulta</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Perfect Body Medical Center L.T.D.A</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Responde Las Preguntas</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row">
                    <!-- Portfolio Item 1-->
                    @foreach ($textos as $texto)
                        <div class="col-md-6 col-lg-4 mb-5">
                        <h5 class="single-line text-center">{{$texto->titulo}}</h5> 
                        <div class="portfolio-item mx-auto d-block" data-toggle="modal" data-target="#portfolioModal1" onclick="texto('{{$texto->id_texto}}')">                                                   
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <br>
                                <img style="width: 150px; height: 150px;" class="img-fluid mx-auto d-block " src="assets/img/pregunta.svg" alt="" />
                            </div>
                        </div>                        
                    @endforeach                 
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="gestion">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Comunicación Participación y consulta</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">Objetivos</div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ml-auto text-justify">
                        <p class="lead">El principal objetivo de PERFECT BODY MEDICAL CENTER LTDA.  en el ámbito formativo de su personal es facilitar los medios adecuados para el desarrollo de las competencias profesionales y las actitudes necesarias, con el fin de gestionar eficazmente los retos que cada puesto de trabajo conlleva y proporcionar a cada trabajador una mayor satisfacción en la realización de sus funciones. 
                            Promoviendo el desarrollo integral de los trabajadores por medio del fortalecimiento de conocimientos, habilidades de formación y capacitación contribuyendo así al mejoramiento institucional
                        </p>
                    </div>
                    <div class="col-lg-4 ml-auto text-justify">
                        <p class="lead">Consideramos que la generación, transmisión y aplicación del conocimiento es un elemento fundamental frente a la gestión integral. El conocimiento individual y colectivo se unen para tomar un sistema integrado que permite la generación de competencias en el Ser, Saber y Hacer hasta lograr cambios transformacionales del comportamiento que generen resultados personales y empresariales impactando la cultura en prevención.
                            Cada trabajador, sea cual sea su nivel profesional, ha de entender que la formación es parte integrante de nuestra cultura empresarial y ser consciente de la necesidad de mejorar permanentemente sus conocimientos y aptitudes.
                        </p>
                    </div>            </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" TARGET="_BLANK" href="https://drive.google.com/drive/folders/15VjXdXO1VjGVTE-TJrNMcfFSWxHn741r">
                        <i class="fas fa-download mr-2"></i>
                        Fichas INS!
                    </a>
                </div>
            </div>
        </section>
        <!-- Segurencias-->
        <section class="page-section" id="quejas">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Enviar sugerencias</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form id="contactForm" name="sentMessage" novalidate="novalidate">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Su nombre</label>
                                    <input class="form-control" id="name" type="text" placeholder="Su nombre" required="required" data-validation-required-message="Su nombre" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Su correo electronico</label>
                                    <input class="form-control" id="email" type="email" placeholder="Su correo electronico" required="required" data-validation-required-message="Su correo electronico" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Mensaje de sugerencia </label>
                                    <textarea class="form-control" id="message" rows="5" placeholder="Mensaje de sugerencia" required="required" data-validation-required-message="Mensaje de sugerencia"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Enviar</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @include('footer')
       
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>-->
    
        <script src="{!! asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') !!}"></script>
        
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/texto.js"></script>
        @include('modals/modal')  
        @include('sweet::alert')              
    </body>
</html>
