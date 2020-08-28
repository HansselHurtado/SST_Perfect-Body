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
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h4 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="titulo"></h4>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Texto -->
                                <div class="d-flex flex-column">
                                    <p id="texto" class="lead"> </p>                                
                                    <!-- Prguntas-->
                                    <section  id="preguntas" class="d-flex flex-column ">                                                       
                                    </section> 
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <p class="help-block text-danger"></p>                                          
                                            <select style="border-radius: 10px;  height: 50px; font-size: 20px;" id="email" class="browser-default custom-select mb-4" name="nombre"  required>
                                                <option value="" selected disabled>Seleccione su nombre</option>                                                                   
                                                @foreach ($personals as $personal)
                                                    <option value="{{$personal->id_personal}}" >{{$personal->nombre}}</option> 
                                                @endforeach                                                                                                                  
                                            </select>                                        
                                        </div>
                                    </div>
                                    <div >
                                        <input required class="form-control" style=" font-size: 20px;  height: 50px; border-radius: 10px;" name="cedula" type="number" placeholder="Ingrese su numero de cedula">                     
                                    </div> 
                                </div>                                                         
                                <br><br>                 
                                <button type="submit" class="btn btn-primary">                                
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
                                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}"  autofocus placeholder="nombre de usuario o correo electronico" required />
                                            <p class="help-block text-danger"></p>
                                            @error('email')
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
