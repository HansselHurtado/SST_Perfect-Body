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
                            <input style="display: none;" name="pregunta${i}" value="${pregunta.id_pregunta}" type="text">
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
                    `;                    
                }
                if(pregunta.opciones == 0){
                    document.getElementById(`respuestas${pregunta.id_pregunta}`).innerHTML += `
                    <div  class="mx-2 pb-3">
                        <input required class="form-control " style="height: 50px; border-radius: 10px;" name="respuesta${i}" type="text" placeholder="responda la pregunta aqui">                     
                    </div>
                    <input style="display: none;" name="variable" value="${i}" type="text">
                    `; 
                }
                if(pregunta.opciones == 1 && pregunta.res == null){
                    document.getElementById(`respuestas${pregunta.id_pregunta}`).innerHTML += `
                    <div  class="mx-2 pb-3">
                        <label class="text-danger"> No se han establecidos opciones aún</label>
                    </div>
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
    document.getElementById('titulo_modal_eliminar').innerHTML= titulo;
    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', 'http://'+ip+'/administracion/eliminar-texto/'+id_texto);
}

var h = 1
function anadir_respuesta(){
    $('#boton_guardar_respuesta').removeAttr('disabled')
    $('#eliminar_pregunta').attr("disabled",true)
    console.log('hola');
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
    console.log(pregunta)
    var formulario = document.getElementById('form_preguntas');
    formulario.setAttribute('action', 'http://'+ip+'/administracion/eliminar-pregunta/'+pregunta)
}