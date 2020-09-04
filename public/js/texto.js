
var ip = '192.168.1.22:8000';

function texto(id_texto){
    console.log(id_texto);
    document.getElementById('preguntas').innerHTML = " ";                
                   
    i = 1;
    j = " ";
    $.ajax({
        url:`http://${ip}/api/home1/texto/${id_texto}`,
        success:function(data){
            console.log(data);
            $('#error').text("")
            $('#nombre_personal').val("")
            $('#id_personal').val("")
            $('#cedula').val("")

            document.getElementById('titulo').innerHTML= `${data[0].titulo}`;
            document.getElementById('texto').innerHTML= `${data[0].texto} 
                <input style="display: none;" name="texto" value="${data[0].id_texto}" type="text">
                `;
            data[0].pregunta.forEach(pregunta => {
                if(pregunta.pregunta != j){
                    document.getElementById('preguntas').innerHTML += `
                    <div class=" row justify-content-between my-3 mx-2">
                        <div class="w-preguntas">
                            <h6>${i++}. ${pregunta.pregunta}</h6>
                            <input style="display: none;" name="pregunta${i}" value="${pregunta.pregunta}" type="text">
                        </div> 
                        <div id="respuestas${pregunta.id_pregunta}" class="row justify-content-between mx-2 w-respuestas">                                   
                        </div>                        
                    </div>                                           
                    `;
                    j = pregunta.pregunta;
                }
                if(pregunta.opciones != 0 && pregunta.res != null ){                    
                    document.getElementById(`respuestas${pregunta.id_pregunta}`).innerHTML += `
                        <div class="mx-2">
                            <label><input required type="radio" name="respuesta${i}" value="${pregunta.res}"> ${pregunta.res}</label>
                        </div>
                        <input style="display: none;" name="variable" value="${i}" type="text">
                    `;                    
                }
                if(pregunta.opciones == 0){
                    document.getElementById(`respuestas${pregunta.id_pregunta}`).innerHTML += `
                    <div  class="mx-2 pb-3" style="width: 100%;" >
                        <input required class="form-control " style="height: 50px; width:100%; margin-top: -13px; border-radius: 10px;" name="respuesta${i}" type="text" placeholder="responda la pregunta aqui">                     
                    </div>
                    <input style="display: none;" name="variable" value="${i}" type="text">
                    `; 
                }
                if(pregunta.opciones == 1 && pregunta.res == null){
                    document.getElementById(`respuestas${pregunta.id_pregunta}`).innerHTML += `
                    <div  class="mx-2 pb-3">
                        <label class="text-danger"> No se han establecidos opciones aún</label>
                    </div>
                    <input style="display: none;" name="variable" value="${i}" type="text">
                    `; 
                }                   
            });
        },
        error:function(error){
            console.log(error)
        }
    });
    console.log(i)
}
let i = 1;
function editar_texto(id_texto){
    console.log(id_texto);
    document.getElementById('preguntas').innerHTML = " "; 
    document.getElementById('anadir_pregunta').innerHTML= " ";
                  
    i = 1;
    j = " ";
    $.ajax({
        url:`http://${ip}/api/home1/texto-editar/${id_texto}`,
        success:function(data){
            console.log(data);
            document.getElementById('titulo').innerHTML= `  <div><h5>Titulo</h5></div><input class="form-control"  name="titulo" type="text" value="${data[0].titulo}">`;
            document.getElementById('texto').innerHTML= `
                <div><h5>Texto</h5></div>
                <textarea class="form-control border-bottom"  name="texto" type="text"  required name="" id="" cols="30" rows="12"> ${data[0].texto}</textarea>
                <input style="display: none;" name="id_texto" value="${data[0].id_texto}" type="text">
                `;
            data[0].pregunta.forEach(pregunta => {
                if(pregunta.pregunta != j){
                    document.getElementById('preguntas').innerHTML += `
                        <div class=" row justify-content-between my-3 mx-2">
                            <div class="mx-3 my-4"><h5>${i}</h5></div>
                            <div  class="py-3">
                                <input class="form-control" style="width: 500px; height: 50px; border-radius: 10px;" name="pregunta${i}" value=" ${pregunta.pregunta}" type="text">                     
                                <input style="display: none;" name="id_pregunta${i}" value="${pregunta.id_pregunta}" type="text">
                                <input style="display: none;" name="variable" value="${i}" type="text">
                            </div>
                            ${pregunta.opciones == 1 ?  ` 
                                <div class="mx-3 my-4"><h6>con opciones</h6></div>

                        </div>`: `
                                <div class="mx-3 my-4"><h6>sin opcion</h6></div>
                            
                        </div>`}`
                            
                    j = pregunta.pregunta;
                    i++;
                }                        
            });
        },
        error:function(error){
            console.log(error)
        }
    });
}

function editar_personal(id_personal){
                
    $.ajax({
        url:`http://${ip}/api/home1/personal/editar_personal/${id_personal}`,
        success:function(data){
            console.log(data)
            document.getElementById('personal').innerHTML= `  
                <div><h5>Nombre</h5></div>
                <input class="form-control"  name="nombre" type="text" value="${data.personal.nombre}">
                <input style="display: none;" name="id_personal" value="${data.personal.id_personal}" type="text">
                <div><h5>Cedula</h5></div>
                <input class="form-control"  name="cedula" type="text" value="${data.personal.cedula}">
                <div><h5>Departamento</h5></div>
                `;
            $('#departamentos_personal').val(data.personal.id_departamento)
            $('#departamentos_personal').html(data.personal.departamento)               
        },
        error:function(error){
            console.log(error)
        }
    })
}

function anadir_pregunta(){
    document.getElementById('anadir_pregunta').innerHTML+= ` 
        <div class="my-3 mx-5"> 
            <label for="nueva_pregunta">Nueva Pregunta ${i}</label>
            <input style="display: none;" name="id_pregunta${i}" value="" type="text">
            <input class="form-control" style="width: 500px; height: 50px; border-radius: 10px;" name="pregunta${i}" id="pregunta_1" type="text" required> 
        </div>
        <div class="mx-4">
            <label class="p-3"><input required type="radio" name="opciones${i}" value="1"> Con varias opciones</label>
            <label><input required type="radio" name="opciones${i}" value="0"> Sin opciones</label>
        </div>
        <input style="display: none;" name="variable" value="${i}" type="text">
    `;
    i++;
}

function Eliminar_texto(id_texto,titulo){
    console.log(titulo);
    document.getElementById('titulo_modal_eliminar').innerHTML= `
            Si eliminas el texto con titulo <strong>${titulo}</strong>, se eliminará todo lo que esté asociado a el. <br>
                    Selecciona "Eliminar" para continuar
                    o "Cancelar" para abortar.`
    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', 'http://'+ip+'/administracion/eliminar-texto/'+id_texto);
}

function Eliminar_personal(id_personal,nombre){
    console.log(nombre)
    document.getElementById('titulo_modal_eliminar').innerHTML= "";
    document.getElementById('titulo_modal_eliminar').innerHTML= `
    Si eliminas el usuario <strong>${nombre}</strong>, se eliminará todo los registros que estén asociado a él. <br>
            Selecciona "Eliminar" para continuar
            o "Cancelar" para abortar.`
    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', 'http://'+ip+'/administracion/eliminar-personal/'+id_personal);
}

var h = 1
function anadir_respuesta(){
    $('#boton_guardar_respuesta').removeAttr('disabled')
    $('#eliminar_pregunta').attr("disabled",true)
    document.getElementById('respuestas').innerHTML+= `
        <p class="help-block text-danger"></p>
        <div class="form-group floating-label-form-group controls mb-0 pb-2 my-3">
            <label>Respuesta ${h}</label>
            <input class="form-control" id="name" type="text" name="respuesta${h}" placeholder="Ingrese una opcion de respuesta" required />
            <p class="help-block text-danger"></p>
        </div>
        <input style="display: none;" name="variable" value="${h}" type="text">
    `;
    h++    
}

$(function(){
    $('#pregunta_seleccionada').on('change', function(){
        $('#eliminar_pregunta').removeAttr('disabled')
    })
})

function eliminar_preguntaa(){
    var pregunta = $('#pregunta_seleccionada option:selected').val()
    var formulario = document.getElementById('form_preguntas');
    formulario.setAttribute('action', 'http://'+ip+'/administracion/eliminar-pregunta/'+pregunta)
}
$(function(){
    $('#anadir_personal').click(function(){
        console.log('hola')
        var cedula = $('#cedula').val()
        console.log(cedula);
        $.ajax({
            url:`http://${ip}/api/home1/personal/validar/${cedula}`,
            success:function(data){
               if(data.length == 0){
                   console.log('estoy vacio')
                   $('#error').text("No existe usuario con este numero de celuda")
                   $('#nombre_personal').val("")
                   $('#id_personal').val("")
                }else{
                    console.log(data)
                    var nombre = data[0].nombre
                    console.log(nombre)
    
                    var id_prsonal = data[0].id_personal
                    $('#nombre_personal').val(nombre)
                    $('#id_personal').val(id_prsonal)
                    $('#error').text("")
                }               
            },
            error:function(error){
                console.log(error)
                console.log('se daño')
                $('#nombre_personal').val("introduzca un numero valido")
            }
            
        }).fail(function() {
            $('#error').text("Introduzca un numero de cedula")
        })
        
    })
})


$(function(){
    $('#buscar_personal').click(function(){
        console.log('hola')
        var titulo = $('#pregunta_seleccionada_personal option:selected').val()
        var fecha = $('#fecha_personal').val()
        console.log("soy titulo",titulo)
        console.log(fecha)
        var nombre = ""

        document.getElementById('table_personal').innerHTML = " " 
        if(titulo == 0 && fecha != 0){
            console.log('solo fecha')

            $.ajax({
                url:`http://${ip}/api/home1/personal/textos_personal/${fecha}`,
                success:function(dataa){
                    $('#error_busqueda').text("")
                    console.log(dataa)
                    if(dataa.length == 0){
                        console.log('estoy vacio')
                        $('#error_busqueda').text("No se encontraron registro en esta fecha")
                    }
                    $('#fecha_registro').text(fecha)
                    dataa.forEach(element => {
                        if(element.nombre != nombre){
                            document.getElementById('table_personal').innerHTML+= 
                            `<tr style="text-align: center;">
                                    <th><a class="btn btn-outline-light"   onclick="ver_registro_encuesta('${element.nombre}','${element.fecha}','${element.id_personal}')" data-toggle="modal" data-target="#modal_registro" href="">${element.nombre}</a></th>
                                    <th>${element.cedula}</th>
                                    <th>${element.nombre_departamento}</th>
                            </tr> 
                            `
                            nombre = element.nombre 
                        }
                        
                    });            
                },
                error:function(error){
                    console.log(error)
    
                }
            })
        }
        if(titulo != 0 && fecha != 0){
            console.log('fehca y titulo')
            $.ajax({
                url:`http://${ip}/api/home1/personal/textos_personal/${fecha}/${titulo}`,
                success:function(dataa){
                    $('#error_busqueda').text("")
                    console.log(dataa)
                    if(dataa.length == 0){
                        console.log('estoy vacio')
                        $('#error_busqueda').text("No se encontraron registro en esta fecha")
                    }
                    $('#fecha_registro').text(fecha)
                    dataa.forEach(element => {
                        document.getElementById('table_personal').innerHTML+= 
                        `<tr style="text-align: center;">
                                <th><a class="btn btn-outline-light"   onclick="ver_registro_encuesta('${element.nombre}','${element.fecha}','${element.id_personal}')" data-toggle="modal" data-target="#modal_registro" href="">${element.nombre}</a></th>
                                <th>${element.cedula}</th>
                                <th>${element.nombre_departamento}</th>
                        </tr> 
                        `
                    });            
                },
                error:function(error){
                    console.log(error)
    
                }
            })
        }
        if(titulo != 0 && fecha == 0){
            $('#error_busqueda').text("faltan campos por llenar")
        }
        if(titulo == 0 && fecha == 0){
            $('#error_busqueda').text("faltan campos por llenar")
        }
    })
})

function ver_registro_encuesta(nombre, fecha,id_personal){

    document.getElementById('nombre_usuario').innerHTML= nombre
    document.getElementById('titulo_encuesta').innerHTML = ""

    $.ajax({
        url:`http://${ip}/api/home1/texto/preguntas_respuestas/${fecha}/${id_personal}`,
        success:function(data){
            console.log(data);

            data.forEach(element => {
                document.getElementById('titulo_encuesta').innerHTML+= `
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        <h6 class="text-uppercase text-left">${element.titulo} </h6> 
                                    </th>
                                    <th scope="col">
                                    </th>
                                </tr>
                            </thead>
                            <thead >
                                <tr>
                                    <th scope="col">
                                        <h6 class="text-uppercase ">Pregunta </h6> 
                                    </th>
                                    <th scope="col">
                                        <h6 class="text-uppercase ">Respuesta</h6> 
                                    </th>
                                </tr>
                            </thead>
                           
                            <tbody id="preguntas_respuestas${element.id_registro}">
                                <tr>                   
                `;
                                element.registro_pregunta_respuesta.forEach(respuesta => {
                                    document.getElementById(`preguntas_respuestas${element.id_registro}`).innerHTML+= `
                                    <td>${respuesta.pregunta}:</td>   
                                    <td>${respuesta.respuesta}</td> 
                                             
                                    `;   
                                });
                                document.getElementById(`preguntas_respuestas${element.id_registro}`).innerHTML+= `
                                <tr> 
                            </tbody>
                                `;

                            document.getElementById('titulo_encuesta').innerHTML+= `
                        </table>
                `;
            });
        },
        error:function(error){
            console.log(error)
        }
    });
}