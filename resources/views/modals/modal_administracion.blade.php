
<!-- Modal cerrar sesion -->
<div class="portfolio-modal modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-mb" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">               
                <div class="container">
                    <!-- Contact Section Heading-->
                    <h6 class="text-center text-uppercase text-secondary mb-0">
                        Seleccione Cerrar sesión a continuación si está listo para finalizar su sesión actual
                    </h6>
                    <br><br>
                    <!-- Contact Section Form-->
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <form action="{{ route('logout')}}" method="POST">
                                @csrf
                                <button class=" btn btn-primary" type="submit">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>

<!-- Modal crear texto -->
<div class="portfolio-modal modal fade" id="Modal_crear_texto" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <section class="page-section" id="contact">
                    <div class="container">
                        <!-- Contact Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Crear un nuevo Texto</h2>
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
                                <form id="contactForm" method="POST" action="{{route('crear_texto')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <label>Titulo del texto</label>
                                            <input class="form-control titulo_texto" id="name" type="text" name="titulo" placeholder="Ingrese titulo de texto" required />
                                            <p class="help-block text-danger"></p>
                                            <p class="text-danger" id="requerido_titulo"></p>

                                        </div>
                                    </div>                                   
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group">
                                            <label>Contenido del texto</label>
                                            <textarea class="form-control border-bottom titulo_texto"  name="texto" type="text" placeholder="Ingrese el contenido del texto" required name="" id="" cols="30" rows="7"></textarea>
                                            <p class="text-danger" id="requerido_texto"></p>
                                        
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <label>enlace</label>
                                            <input class="form-control _texto enlace" type="url" name="enlace" id="" placeholder="Ingrese si tiene algun Enlace"/>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <label>Titulo del enlace</label>
                                            <input class="form-control" id="name" type="text" name="nombre_enlace" placeholder="Titulo del enlace"/>
                                            <p class="help-block text-danger"></p>
                                            <p class="text-danger" id="requerido_titulo_enlace"></p>
                                        </div>
                                    </div> 
                                    <div class="control-group">
                                        <label for="exampleFormControlFile1">Adjunte alguna imagen ilustrativa</label>
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>                                    
                                    <br>                              
                                    <div class="form-group"><button class="btn btn-primary btn-xl" type="submit">Guardar</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Modal para los editar texto-->
<div class="portfolio-modal modal fade" id="editar_texto" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <form id="contactForm" method="POST" action="{{route('editar_texto')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h4 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="titulo"></h4>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>   
                                
                                <!-- foto -->
                                <div id="foto_texto_editar" class="mx-auto"></div> 

                                <!-- Texto -->
                                <div>                                    
                                    <p id="texto" class="lead"> </p>
                                </div>

                                <!-- añadir foto -->
                                <div>                                    
                                    <p id="anadir_foto" class="lead"> </p>
                                </div>

                                <!-- Prguntas-->
                                <section class="d-flex flex-column">
                                    <div id="preguntas"  class="row">                                       
                                    </div>
                                    <div id="anadir_pregunta" class="row">
                                    </div>                                                                  
                                </section>

                                <!-- enlace -->
                                <div id="enlace_texto" class="text-left"></div>                           
                                <div id="anadir_enlace_texto" class="text-left"></div>                           
                                <br><br> 
                                <div class="row">
                                    <button type="submit" class="btn btn-primary mx-3" id="button_editar">                                
                                        Editar 
                                    </button>
                                    <a  onclick="anadir_pregunta()" class="btn btn-primary button_anadir">                                
                                        Añadir preguntas 
                                    </a>                                    
                                </div>                                                   
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal eliminar un texto-->
    <div class="portfolio-modal modal fade" id="eliminar_texto" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seguro que deseas eliminar?</h5>
          </div>
          <div class="modal-body" id="titulo_modal_eliminar">
          </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>             
                <form id="formulario" method="POST" action="">
                  @method('DELETE')
                  @csrf        		
                  <td style="text-align: center;"> 
                    <button type="submit" class="btn btn-danger btn-icon-split">
                      <span  aria-hidden="true">                        
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Eliminar</span>
                    </button>
                  </td>
                </form>           
            </div>
          </div>
      </div>
    </div>


    <!-- Modal crear respuestas -->
<div class="portfolio-modal modal fade" id="Modal_crear_respuesta" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <section class="page-section" id="contact">
                    <div class="container">
                        <!-- Contact Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Crear opciones respuestas</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <!-- Contact Section Form-->
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <form method="POST" action="{{route('anadir_respuesta')}}">
                                    @csrf
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <select style="border-radius: 10px; height: 50px; font-size: 20px;" id="pregunta_seleccionada" class="browser-default custom-select mb-4" name="pregunta"  required>
                                                <option value="" selected disabled>Seleccione su pregunta</option>                                                                   
                                                @foreach ($preguntas as $preguntaa)
                                                    <option value="{{$preguntaa->id_pregunta}}" >{{$preguntaa->pregunta}}</option> 
                                                @endforeach                                                                                         
                                            </select>
                                        </div>
                                    </div>
                                    <div id="respuestas">
                                    </div>                                    
                                    <br>                              
                                    <div class="form-group row justify-content-between">
                                        <button class="btn btn-primary btn-lg" type="submit" id="boton_guardar_respuesta" disabled>Guardar</button>
                                        <a class="btn btn-primary btn-lg" onclick="anadir_respuesta();" >Añadir Respuesta</a>    
                                </form>                                
                                        <form id="form_preguntas" method="POST" action="">
                                            @csrf        	
                                            <button class="btn btn-danger btn-lg" type="submit" id="eliminar_pregunta" onclick="eliminar_preguntaa();" disabled>Eliminar pregunta</button>
                                        </form> 
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<!-- Modal para editar un usuario-->
<div class="portfolio-modal modal fade" id="editar_usuario" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <form id="contactForm" method="POST" action="{{route('editar_personal')}}">
                    @csrf
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h4 class="portfolio-modal-title text-secondary text-uppercase " id="personal"></h4>                                                            
                                <select style="border-radius: 10px; height: 50px; font-size: 20px;"  class="browser-default custom-select mb-4" name="departamento"  required>
                                                                        
                                    <option id="departamentos_personal" selected></option>                                                                   
                                    <@foreach ($departamentos as $departamento)
                                         <option value="{{$departamento->id_departamento}}" >{{$departamento->departamento}}</option> 
                                    @endforeach                                  
                                                                                                                                                  
                                </select>                                                           
                                <br><br> 
                                <div class="row">
                                    <button type="submit" class="btn btn-primary mx-3">                                
                                        Editar 
                                    </button>                                    
                                </div>                                                   
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal para crear departamento-->
<div class="portfolio-modal modal fade" id="Modal_crear_departamento" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <section class="page-section" id="contact">
                    <div class="container">
                        <!-- Contact Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Crear departamento</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <!-- Contact Section Form-->
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <form method="POST" action="{{route('crear_departamento')}}">
                                    @csrf
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                                <label>Nombre del departamento</label>
                                                <input class="form-control" id="name" type="text" name="departamento" placeholder="Ingrese el nombre del departamento" required />
                                            </div> 
                                        </div>
                                    </div>
                                    <br>                                                                   
                                    <div class="form-group mx-auto">
                                        <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                                    </div>                                
                                </form>                                      
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Modal para crear administrador-->
<div class="portfolio-modal modal fade" id="Modal_crear_administrador" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <section class="page-section" id="contact">
                    <div class="container">
                        <!-- Contact Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Crear administrador</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <!-- Contact Section Form-->
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <form method="POST" action="{{route('registrar')}}">
                                    @csrf
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                                <label>Nombre Completo</label>
                                                <input class="form-control"  type="text" name="name" placeholder="Ingrese el nombre completo" required />
                                            </div> 
                                        </div>
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                                <label>Nombre de usuario--</label>
                                                <input class="form-control"  type="text" name="user_name" placeholder="Ingrese nombre de usuario" required />
                                            </div> 
                                        </div>
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                                <label>Correo electronico</label>
                                                <input class="form-control"  type="email" name="email" placeholder="Ingrese el correo electronico" required />
                                            </div> 
                                        </div>
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                                <label>Contraseña</label>
                                                <input class="form-control"  type="password" name="password" placeholder="Ingrese la contraseña" required />
                                            </div> 
                                        </div>
                                    </div>
                                    <br>                                                                   
                                    <div class="form-group mx-auto">
                                        <button class="btn btn-primary btn-lg" type="submit">Crear</button>
                                    </div>                                
                                </form>                                      
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>