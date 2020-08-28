
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
                                <form id="contactForm" method="POST" action="{{route('crear_texto')}}">
                                    @csrf
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <label>Titulo del texto</label>
                                            <input class="form-control" id="name" type="text" name="titulo" placeholder="Ingrese titulo de texto" required />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group">
                                            <label>Contenido del texto</label>
                                            <textarea class="form-control border-bottom"  name="texto" type="text" placeholder="Ingrese el contenido del texto" required name="" id="" cols="30" rows="7"></textarea>
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
                <form id="contactForm" method="POST" action="{{route('editar_texto')}}">
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
                                <!-- Texto -->
                                <div>                                    
                                    <p id="texto" class="lead"> </p>
                                </div>
                                <!-- Prguntas-->
                                <section class="d-flex flex-column">
                                    <div id="preguntas"  class="row">                                       
                                    </div>
                                    <div id="anadir_pregunta" class="row">
                                    </div>                                                                  
                                </section>                            
                                <br><br> 
                                <div class="row">
                                    <button type="submit" class="btn btn-primary mx-3">                                
                                        Editar 
                                    </button>
                                    <a  onclick="anadir_pregunta()" class="btn btn-primary">                                
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
          <div class="modal-body">Si eliminas  el texto con titulo <strong id="titulo_modal_eliminar"></strong>, se eliminará todo lo que esté asociado a el. <br>
            Selecciona "Eliminar" para continuar
            o "Cancelar" para abortar.
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
                                                @foreach ($preguntas as $pregunta)
                                                    <option value="{{$pregunta->id_pregunta}}" >{{$pregunta->pregunta}}</option> 
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