/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 2/1/17
 * Time: 10:35
 */

function validarCampo(nombre){
    var respuesta = true;
    if (nombre.value == ""){

        swal(
        {
            title : "Error!",
            text : "Introduce " + nombre.name + ":",
            type : "error",
            confirmButtonText : "Ok"
        }
    );
    respuesta = false;

    }
    return respuesta;
}


function evitarProhibidos(campo){
    var respuesta = true;
    var expresion = /[·$&#^*]+/;

    if(expresion.test(campo.value)){
        swal(
            {
            title : "Error!",
            text : "El campo no puede contener los caracteres: \n · # $ ^ & *",
            type : "error",
            confirmButtonText : "Ok"
            }
        );

    respuesta = false;
    }
    return respuesta;
}


function soloTexto(campo){
    var respuesta = true;
    var expresion = /[0-9]/;

    if(expresion.test(campo.value)){
    swal(
    {
        title : "Error!",
        text : "Nombre inválido: ",
        type : "error",
        confirmButtonText : "Ok"
    }
    );

    respuesta = false;
    }
    return respuesta;
}


function validarPassword(password){
    var prohibidos = /([#$%\^&]+)/;
    var respuesta = true;

    if (prohibidos.test(password.value) == true || password.value.length < 3 || password.value.length > 15){
        if(prohibidos.test(password.value) == true){
            swal(
            {
                title : "Error!",
                text : "La contraseña no puede contener ninguno de los siguientes caracteres: \n # $ % ^ & ",
                type : "error",
                confirmButtonText : "Ok"
            }
            );

            respuesta = false;
        }else{
            if(password.value.length < 3 || password.value.length > 15){
                swal(
                {
                    title : "Error!",
                    text : "La contraseña debe tener entre 3 y 15 caracteres",
                    type : "error",
                    confirmButtonText : "Ok"
                }
                );

            respuesta = false;
            }
        }
    }else{
        encriptarPassword();
        repuesta =  true;
    }
    return respuesta;
}


function encriptarPassword(){

    var prueba = document.getElementById('pass').value;
    document.getElementById('pass').value = hex_md5(prueba);

}


function validarUsuario(usuario)
{
    var respuesta = true;
    var cadena = /^[a-zA-Z0-9\_\-\.]{3,15}/;

    if (cadena.test(usuario.value) == false || usuario.value.length > 15)
    {
        swal(
            {
                title : "Error!",
                text : "Introduza " + usuario.name + " válido: \n (letras, números, '-', '_', '.')",
                type : "error",
                confirmButtonText : "Ok"
            }
        );
        respuesta = false;
    }

    return respuesta;
}


//Devuelve la desviación de las fechas de inicio y entrega
function desviacionFechas(fechaReal, fechaPlan){

    var aFecha1 = f1.split('/');
    var aFecha2 = f2.split('/');
    var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]);
    var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]);
    var dif = fFecha2 - fFecha1;
    var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
    return dias;
}


function desviacionHoras(horasR, horasP){


}