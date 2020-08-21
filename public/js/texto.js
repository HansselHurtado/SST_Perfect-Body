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
                    document.getElementById('preguntas').innerHTML += `${i++}. ${pregunta.pregunta}
                        <input style="display: none;" name="pregunta${i}" value="${pregunta.id_pregunta}" type="text">
                        <div id="respuestas${pregunta.id_pregunta}" class="col-md-2 col-6 radio">                                   
                        </div> 
                    `;
                    j = pregunta.pregunta;
                }
                document.getElementById(`respuestas${pregunta.id_pregunta}`).innerHTML += `
                    <div class="radio">
                        <label><input required type="radio" name="respuesta${i}" value="${pregunta.id_respuesta}"> ${pregunta.res}</label>
                    </div>
                    <input style="display: none;" name="variable" value="${i}" type="text">
                `; 
                              
            });
        },
        error:function(error){
            console.log(error)
        }
    });
}
i = 1;
function editar_texto(id_texto){
    console.log(id_texto);
    document.getElementById('preguntas').innerHTML = " "; 
    document.getElementById('anadir_pregunta').innerHTML= " ";
                  
    i = 1;
    j = " ";
    $.ajax({
        url:`http://${ip}/api/home1/texto/${id_texto}`,
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
                    <div><h5>${i}</h5></div>
                    <div>
                        <input class="form-control" style="width: 500px; height: 50px; border-radius: 10px;" name="pregunta${i}" value=" ${pregunta.pregunta}" type="text">                     
                        <input style="display: none;" name="id_pregunta${i}" value="${pregunta.id_pregunta}" type="text">
                        <input style="display: none;" name="variable" value="${i}" type="text">
                    </div>
                        
                    `;
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
    console.log(i);   

    document.getElementById('anadir_pregunta').innerHTML+= ` 
        <div class="my-3"> 
            <label for="nueva_pregunta">Nueva Pregunta ${i}</label>
                        <input style="display: none;" name="id_pregunta${i}" value="" type="text">
                        <input class="form-control" style="width: 500px; height: 50px; border-radius: 10px;" name="pregunta${i}"  value="" type="text" required> 
        </div>
        <input style="display: none;" name="variable" value="${i}" type="text">
    `;
    document.getElementById('anadir_pregunta').focus();
    i++;
}

function Eliminar_texto(id_texto,titulo){
    console.log(titulo);
    document.getElementById('titulo_modal_eliminar').innerHTML= titulo;
    var formulario = document.getElementById('formulario');
    formulario.setAttribute('action', 'http://'+ip+'/administracion/eliminar-texto/'+id_texto);
}