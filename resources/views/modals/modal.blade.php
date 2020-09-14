<!-- Modal registrar personal -->
<div class="portfolio-modal modal fade" id="Modal_registrar_personal" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <section class="page-section" id="contact">
                    <div class="container">
                        <!-- Contact Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Registrate</h2>
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
                                <form id="contactForm" method="POST" action="{{route('registrar_personal')}}">
                                    @csrf
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <label>Nombre completo</label>
                                            <input class="form-control" id="name" type="text" name="nombre" placeholder="Ingrese su nombre completo por favor" required />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <label>No de Cedula</label>
                                            <input class="form-control" id="number" name="cedula" type="number" placeholder="Ingrese su numero de documento" required/>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <p class="help-block text-danger"></p>                                          
                                            <select style="border-radius: 10px; height: 50px; font-size: 20px;" id="email" class="browser-default custom-select mb-4" name="departamento"  required>
                                                <option value="" selected disabled>Seleccione su departamento</option>                                                                   
                                                @foreach ($departamentos as $departamento)
                                                    <option value="{{$departamento->id_departamento}}" >{{$departamento->departamento}}</option> 
                                                @endforeach                                                                                                                  
                                            </select>                                        
                                        </div>
                                    </div>                                    
                                    <div id="success"></div>
                                    <div class="form-group"><button class="btn btn-primary btn-xl" type="submit">Registrarse</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<!-- Modal encuesta-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <form id="contactForm" method="POST" action="{{route('guardar_encuenta')}}">
                    @csrf
                    <div class="container">
                        <br>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close cerrar" data-dismiss="alert">&times;</button>
                            <strong>¡Recuerde!</strong> para poder hacer la encuesta debe estár registrado, si ya lo hizo haga caso omiso. Gracias.
                        </div>
                        <div class="d-flex justify-content-center">
                            <div  class="my-3">
                                <input required class="form-control" style=" font-size: 20px;  height: 50px; width: 300px; border-radius: 10px;" name="cedula" id="cedula" type="number" placeholder="Ingrese su numero de cedula">                     
                            </div> 
                            <div class=" mx-2 my-4">
                                <a class="btn btn-primary" id="anadir_personal"> Añadir</a>
                            </div>
                            <div class="mx-2">
                                <p class="help-block text-danger"></p>
                                <input required readonly  class="form-control" style=" font-size: 20px;  height: 50px; width: 300px; border-radius: 10px;" name="nombre_personal" id="nombre_personal" type="text" placeholder="Añadir para traer su nombre">                                                          
                                <input required class="form-control" style=" display: none" name="id_personal" id="id_personal" type="text">
                                <strong><p class="text-danger" id="error"> </p> </strong>                                                     
                            </div>
                            
                        </div>
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <div class="row justify-content-center">
                            
                            <div class="col-lg-10">
                                <!-- Portfolio Modal - Title-->
                                <h4 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="titulo"></h4>
                                <!-- Icon Divider-->
                                <br>
                                <!-- Texto -->
                                <div class="d-flex flex-column">
                                    <div id="foto_texto" class="mx-auto w-80">
                                    </div>
                                    <p id="texto" class="lead my-3"> </p>                                
                                    <!-- Prguntas-->
                                    <section  id="preguntas" class="d-flex flex-column ">                                                       
                                    </section>
                                    <div id="enlace" class="text-left w-80">
                                    </div>                                     
                                </div>                                                         
                                <br><br>                 
                                <button type="submit" class="btn btn-primary" id="enviar_encuesta">                                
                                    Enviar Encuesta
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal login administracion -->
<div class="portfolio-modal modal fade" id="Modal_login_administracion" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <section class="page-section" id="contact">
                    <div class="container">
                        <!-- Contact Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Administración</h2>
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
                                <form id="contactForm" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <label>Correo o Nombre de usuario</label>
                                            <input type="login" class="form-control form-control-user @error('login') is-invalid @enderror" id="login"   name="login" value="{{ old('login') }}"  autofocus placeholder=" Nombre de usuario o Correo electronico">
        
                                                @error('login')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <label>Contraseña</label>
                                            <input class="form-control  @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Ingrese su contraseña" required autocomplete="current-password"/>
                                            <p class="help-block text-danger"></p>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror           
                                        </div>
                                    </div>
                                   <br>                                
                                    <div id="success"></div>
                                    <div class="form-group"><button class="btn btn-primary btn-xl" type="submit">Ingresar</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
