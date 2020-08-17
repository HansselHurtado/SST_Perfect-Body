var ip = '127.0.0.1:8000';

function texto(id_texto){
    console.log(id_texto);
    $.ajax({
        url:`http://${ip}/api/home1/texto/${id_texto}`,
        success:function(data){
            console.log(data);
        },
        error:function(error){
            console.log(error)
        }
    });
}