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
    var expresion = /[0-9·$&#^*]+/;

    if(expresion.test(campo.value)){
    swal(
    {
        title : "Error!",
        text : campo.name + " inválido: ",
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
    var cadena = /^[a-zA-Z0-9\_\-\.]{3,25}/;

    if (cadena.test(usuario.value) == false || usuario.value.length > 15 || usuario.value.length < 3)
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

function validarNombre(usuario)
{
    var respuesta = true;
    var cadena = /^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,20}/;

    if (cadena.test(usuario.value) == false || usuario.value.length > 20 || usuario.value.length < 1)
    {
        swal(
            {
                title : "Error!",
                text : "Introduza " + usuario.name + " válido: ",
                type : "error",
                confirmButtonText : "Ok"
            }
        );
        respuesta = false;
    }

    return respuesta;
}

function validarApellidos(usuario)
{
    var respuesta = true;
    var cadena = /^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,40}/;

    if (cadena.test(usuario.value) == false || usuario.value.length > 40 || usuario.value.length < 1)
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

function validarEmail(mail){
    var respuesta = true;
    var correo = /^(([^<>()[\]\\.,;:\s@”]+(\.[^<>()[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (correo.test(mail.value) == false || mail.value.length > 40)
    {
        if(correo.test(mail.value) == false){
            swal(
                {
                    title : "Error!",
                    text : "Introduza mail válido: ",
                    // text: <?php idioma("Password must be between 3 and 15 characters lenght")?>,
                    type : "error",
                    confirmButtonText : "Ok"
                }
            );
            respuesta = false;
        }else{
            swal(
                {
                    title : "Error!",
                    text : "Email demasiado largo: ",
                    // text: <?php idioma("Password must be between 3 and 15 characters lenght")?>,
                    type : "error",
                    confirmButtonText : "Ok"
                }
            );
            respuesta = false;
        }
    }
    return respuesta;

}

//Devuelve la desviación de las fechas de inicio y entrega
function desviacionFechas(){

    var fechaReal = document.getElementById("").value;
    var fechaPlan = document.getElementById("").value;

    var aFecha1 = fechaReal.split('/');
    var aFecha2 = fechaPlan.split('/');
    var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]);
    var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]);
    var dif = fFecha2 - fFecha1;
    var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
    return dias;
}


function desviacionHoras(){

    inicio = document.getElementById("HORASP").value;
    fin = document.getElementById("HORASR").value;

    inicioMinutos = parseInt(inicio.substr(3,2));
    inicioHoras = parseInt(inicio.substr(0,2));

    finMinutos = parseInt(fin.substr(3,2));
    finHoras = parseInt(fin.substr(0,2));

    transcurridoMinutos = finMinutos - inicioMinutos;
    transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
        transcurridoHoras--;
        transcurridoMinutos = 60 + transcurridoMinutos;
    }

    horas = transcurridoHoras.toString();
    minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
        horas = "0"+horas;
    }

    if (horas.length < 2) {
        horas = "0"+horas;
    }

}


function validarFecha(fecha)
{
    var respuesta = true;
    //aaaa/mm/ddd
    var fecha1 = /(([1|2][0-9][0-9][0-9])(\/|-)(0[0-9]|1[12])(\/|-)(0[1-9]|[12][0-9]|3[01])){0,1}/;

    if (fecha1.test(fecha.value) == false)
    {
        swal(
            {
                title : "Error!",
                text : "Introduza " + fecha.name + " válido: ",
                type : "error",
                confirmButtonText : "Ok"
            }
        );
        respuesta = false;
    }

    return respuesta;
}

//Ya sean horas o sólo números
function evitarNumerosNegativos(campo){
    var respuesta = true;

    var exp = / (^-\d*|-*\d*:-\d*)/;

    if(exp.test(campo.value) == true){
        swal(
            {
                title : "Error!",
                text : "Introduza " + campo.name + " válido: ",
                type : "error",
                confirmButtonText : "Ok"
            }
        );

        respuesta = false;
    }
    return respuesta;

}

function evitarHorasCero (campo) {
    var respuesta = true;

    var exp = / (00+:(00)+) /;

    if(exp.test(campo.value)){
        swal(
            {
                title : "Error!",
                text : "Introduza " + campo.name + " válido: ",
                type : "error",
                confirmButtonText : "Ok"
            }
        );

        respuesta = false;
    }

    return respuesta;
}

function validarFormEditMiembro(){
    var respuesta = true;

    if(
        validarCampo(document.getElementById('nombre')) //nombre
        && validarNombre(document.getElementById('nombre'))
        && evitarProhibidos(document.getElementById('nombre'))
        && validarCampo(document.getElementById('apellidos'))//apellidos
        && validarApellidos(document.getElementById('apellidos'))
        && evitarProhibidos(document.getElementById('apellidos'))
        && validarCampo(document.getElementById('usuario')) //usuario
        && validarUsuario(document.getElementById('usuario'))
        && evitarProhibidos(document.getElementById('usuario'))
        && validarCampo(document.getElementById('password')) //contraseña
        && validarPassword(document.getElementById('password'))
        && validarCampo(document.getElementById('correo')) //email
        && validarEmail(document.getElementById('correo'))
        && evitarProhibidos(document.getElementById('correo')) ){

        //Dentro del if
        swal(
            {
                title : "Modificado con éxito!",
                type : "success",
                confirmButtonText : "Ok"
            }
        );
    }else{
            if(validarCampo(document.getElementById('nombre')) == false){
                swal(
                    {
                        title : "Error!",
                        text : "Nombre vacío: ",
                        type : "error",
                        confirmButtonText : "Ok"
                    }
                );
                repuesta = false;
            }else{
                if(validarNombre(document.getElementById('nombre')) == false){
                    swal(
                        {
                            title : "Error!",
                            text : "El campo Nombre no puede contener los caracteres: \n · # $ ^ & * \n Y debe tener una logitud entre 3 y 20",
                            type : "error",
                            confirmButtonText : "Ok"
                        }
                    );

                    respuesta = false;
                }else{
                    if(evitarProhibidos(document.getElementById('nombre'))){
                        swal(
                            {
                                title : "Error!",
                                text : "El campo Nombre no puede contener los caracteres: \n · # $ ^ & *",
                                type : "error",
                                confirmButtonText : "Ok"
                            }
                        );

                        respuesta = false;
                    }else{
                        if(validarCampo(document.getElementById('apellidos')) == false){
                            swal(
                                {
                                    title : "Error!",
                                    text : "Apellidos vacío: ",
                                    type : "error",
                                    confirmButtonText : "Ok"
                                }
                            );
                            respuesta = false;
                        }else{
                            if(validarApellidos(document.getElementById('apellidos')) == false){
                                swal(
                                    {
                                        title : "Error!",
                                        text : "El campo Apellidos no puede contener los caracteres: \n · # $ ^ & * \n Y debe tener una logitud entre 1 y 40",
                                        type : "error",
                                        confirmButtonText : "Ok"
                                    }
                                );
                                respuesta = false;
                            }else{
                                if(evitarProhibidos(document.getElementById('apellidos')) == false){
                                    swal(
                                        {
                                            title : "Error!",
                                            text : "El campo Nombre no puede contener los caracteres: \n · # $ ^ & *",
                                            type : "error",
                                            confirmButtonText : "Ok"
                                        }
                                    );

                                    respuesta = false;
                                }else{
                                    if(validarCampo(document.getElementById('usuario')) == false){
                                        swal(
                                            {
                                                title : "Error!",
                                                text : "Usuario vacío: ",
                                                type : "error",
                                                confirmButtonText : "Ok"
                                            }
                                        );
                                        respuesta = false;
                                    }else{
                                        if(validarUsuario(document.getElementById('usuario')) == false){
                                            swal(
                                                {
                                                    title : "Error!",
                                                    text : "Usuario inválido: ",
                                                    type : "error",
                                                    confirmButtonText : "Ok"
                                                }
                                            );
                                            respuesta = false;
                                        }else{
                                            if(evitarProhibidos(document.getElementById('usuario')) == false){
                                                swal(
                                                    {
                                                        title : "Error!",
                                                        text : "El campo Usuario no puede contener los caracteres: \n · # $ ^ & *",
                                                        type : "error",
                                                        confirmButtonText : "Ok"
                                                    }
                                                );
                                                respuesta = false;
                                            }else{
                                                if(validarCampo(document.getElementById('password')) == false){
                                                    swal(
                                                        {
                                                            title : "Error!",
                                                            text : "Password vacío: ",
                                                            // text: <?php idioma("Password must be between 3 and 15 characters lenght")?>,
                                                            type : "error",
                                                            confirmButtonText : "Ok"
                                                        }
                                                    );
                                                    respuesta = false;
                                                }else{
                                                    if(validarCampo(document.getElementById('correo')) == false){
                                                        swal(
                                                            {
                                                                title : "Error!",
                                                                text : "Correo vacío: ",
                                                                type : "error",
                                                                confirmButtonText : "Ok"
                                                            }
                                                        );
                                                        respuesta = false;
                                                    }else{
                                                        if(validarEmail(document.getElementById('correo')) == false){
                                                            swal(
                                                                {
                                                                    title : "Error!",
                                                                    text : "Correo inválido: ",
                                                                    type : "error",
                                                                    confirmButtonText : "Ok"
                                                                }
                                                            );
                                                            respuesta = false;
                                                        }else{
                                                            if(evitarProhibidos(document.getElementById('correo')) == false){
                                                                swal(
                                                                    {
                                                                        title : "Error!",
                                                                        text : "El campo Correo no puede contener los caracteres: \n · # $ ^ & *",
                                                                        type : "error",
                                                                        confirmButtonText : "Ok"
                                                                    }
                                                                );

                                                                respuesta = false;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
    }
    return respuesta;
}