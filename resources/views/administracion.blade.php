<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SST Perfect Body</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">SSt Calidad</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <div class="dropdown">
                            <a class="mx-0 mx-lg-1 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownAdministrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownAdministrar">
                                <a class="dropdown-item" data-toggle="modal" data-target="#Modal_crear_texto" href="#">crear nuevo texto</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#Modal_crear_respuesta" href="#">preguntas y respuestas</a>
                                <a class="dropdown-item js-scroll-trigger"  href="#textos">editar texto</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="mx-0 mx-lg-1 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones de usuario</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item  js-scroll-trigger" href="#usuarios_registrados">usuarios registrados</a>
                                <a class="dropdown-item  js-scroll-trigger" href="#historial_encuesta" id="id_historial_encuesta">Historial de encuesta</a>
                                <a class="dropdown-item js-scroll-trigger"  data-toggle="modal" data-target="#Modal_crear_departamento" href="#">Crear Departamento</a>
                                <a class="dropdown-item js-scroll-trigger "  data-toggle="modal" data-target="#Modal_crear_administrador" href="#">Crear administrador</a>
                            </div>
                        </div>
                    </ul>
                    <div class="dropdown">
                        <a class="mr-2 mx-3 d-none text-white d-lg-inline text-gray-600 small js-scroll-trigger dropdown-toggle" href="#" id="dropdownMenuCerrarSesion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <strong>{{ auth()->user()->name }}</strong></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuCerrarSesion">
                            <a class=" dropdown-item nav-link " href="{{route('home2')}}">Ir a encuestas</a>
                            <a class=" dropdown-item nav-link "  href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesion</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/persona.svg" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Administrador</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Clinica Perfect Body Medical Center</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="textos">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Textos</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="row">
                    <!-- Portfolio Item 1-->
                    @foreach ($textos as $texto)
                        <div class="col-md-6 col-lg-3 mb-5">
                        <h5 class="single-line">{{$texto->titulo}}</h5> 
                        <div class="portfolio-item mx-auto d-block" data-toggle="modal" data-target="#editar_texto" onclick="editar_texto('{{$texto->id_texto}}')">                                                   
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-check fa-3x"></i></div>
                                </div>
                                <br>
                                <img style="width: 150px; height: 150px;" class="img-fluid mx-auto d-block " src="assets/img/discusion.svg" alt="" />
                            </div>                                    
                            <a data-toggle="modal" title="Eliminar texto" data-target="#eliminar_texto" onclick="Eliminar_texto('{{$texto->id_texto}}','{{$texto->titulo}}')" class="close" type="button"  aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </a>                            
                        </div>                        
                    @endforeach                 
                </div>
            </div>
        </section>
        
        
        <!-- tabla de historial de encuesta -->
        <section class="page-section bg-primary text-white mb-0 my-3 " id="historial_encuesta">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Historial de encuesta</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="ml-25 py-3 w-respuestas">
                        <select style="border-radius: 10px; height: 50px; font-size: 20px;" id="pregunta_seleccionada_personal" class="browser-default custom-select mb-4" name=""  required>
                            <option value="" selected >Ningun titulo Seleccionado</option>                                                                   
                            @foreach ($textos as $texto)
                                <option value="{{$texto->id_texto}}" >{{$texto->titulo}}</option> 
                            @endforeach                                                                                         
                        </select>
                    </div>
                    <div class="w-60  row justify-content-end my-4">
                        <div class="">
                            <label class="" for=""> Buscar por fecha</label>
                        </div>
                        <div class="mx-3 d-flex flex-column">
                            <input name="fecha" class="form-control form-control-user mx-3" type="date" id="fecha_personal" required>
                            <div class="mx-3">
                                <strong id="error_busqueda" class="text-center text-danger animacion"></strong>
                            </div>
                        </div>
                        
                        <div class=" mx-5">
                            <a class="btn btn-dark" id="buscar_personal">buscar</a>
                        </div>
                    </div>            
                </div>
                <div class="text-left">
                    <span>Fecha de registro <strong id="fecha_registro">{{$date}}</strong></span>
                </div>
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;" class="text-light">
                            <th>Nombre completo</th>                                    
                            <th>Cedula</th>
                            <th>Departamento</th>                         
                        </tr>
                    </thead>
                    <tbody id="table_personal">
                        @php($i="")         
                        @foreach ($registros as $registro )
                            @if($registro->nombre != $i)
                                <tr style="text-align: center;">
                                    <th><a class="btn btn-outline-light" onclick="ver_registro_encuesta('{{$registro->nombre}}','{{$registro->fecha}}','{{$registro->id_personal}}')" data-toggle="modal" data-target="#modal_registro" href="">{{$registro->nombre}}</a></th>
                                    <th>{{$registro->cedula}}</th>
                                    <th>{{$registro->nombre_departamento}}</th>                                    
                                </tr> 
                                @php($i = $registro->nombre) 
                            @endif                                             
                        @endforeach   
                    </tbody>
                </table>                  
            </div>
        </section>

        <!-- tabla de usuarios registrador -->
        <section class="page-section bg-primary text-white mb-0" id="usuarios_registrados">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Personal Registrado</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;" class="bg-primary text-light">
                            <th>Nombre completo</th>                                    
                            <th>Cedula</th>
                            <th>Departamento</th>                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personals as $personal )
                            <tr style="text-align: center;">
                                <th> 
                                    <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#editar_usuario" onclick="editar_personal('{{$personal->id_personal}}')">
                                        <span  aria-hidden="true">                        
                                        <span class="icon text-white-50">
                                            <i class="fas fa-grin-beam"></i>
                                        </span>
                                        <span class="text">{{$personal->nombre}}</span>                                        
                                    </button>
                                </th>
                                <th>{{$personal->cedula}}</th>
                                <th>{{$personal->nombre_departamento}}</th>
                                <td style="text-align: center;"> 
                                    <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#eliminar_texto" onclick="Eliminar_personal('{{$personal->id_personal}}','{{$personal->nombre}}')">
                                      <span  aria-hidden="true">                        
                                      <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                      </span>
                                    </button>
                                </td>
                            </tr>                   
                        @endforeach   
                    </tbody>
                </table>
                {{$personals->links()}}          
                
            </div>
        </section>        
        
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Ubicacion</h4>
                        <p class="lead mb-0">
                            Hanssel Hurtado Buendia
                            Desarrollador web
                            <br />
                            3006408288
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Sitios Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Sobre esta Aplicacion web</h4>
                        <p class="lead mb-0">
                           Aplicacion hecha por tecnolgia perfect body, Desarrollada por Hanssel Hurtado Buendia
                            <a href="#">Desarrollador web</a>                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Perfect Body 2020 © Tecnogia e investigación</small></div>
        </div>
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
        
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/texto.js"></script>
        @include('modals/modal_administracion')        
    </body>
</html>
