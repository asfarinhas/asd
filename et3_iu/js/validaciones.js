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
            text : "El " + campo.name + " no puede contener los caracteres: \n · # $ ^ & *",
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

function soloNumero(campo){
    var respuesta = true;
    var expresion = /[0-9]+/;

    if(expresion.test(campo.value)==false){
        swal(
            {
                title : "Error!",
                text : "En " + campo.name + " Introduzca solo numeros: ",
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

    var prueba = document.getElementById('password').value;
    document.getElementById('password').value = hex_md5(prueba);

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

function validarNombreTarea(tarea)
{
    var respuesta = true;
    var cadena = /^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}/;

    if (cadena.test(tarea.value) == false || tarea.value.length > 50 || tarea.value.length < 1)
    {
        swal(
            {
                title : "Error!",
                text : "Introduza " + tarea.name + " válido: \n (Longitud máxima 50 caracteres.)" ,
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
    var fecha1 = /(([1|2][0-9][0-9][0-9])(-)(0[0-9]|1[12])(-)(0[1-9]|[12][0-9]|3[01])){0,1}/;

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

//NO FUNCIONA
function validarFechaMayorInicioReal(){
    var respuesta = true;
    var m1 = document.getElementById("fecha_I_P").value;
    var m2 = document.getElementById("fecha_I_R").value;
    var m3 = document.getElementById("fecha_inicio_plan").value;
    var m4 = document.getElementById("fecha_inicio_real").value;
    var f1 =m1.split("/");
    var f2 =m2.split("/");
    var f3 =m3.split("/");
    var f4 =m4.split("/");

    //mm-dd-yyyy
    fecha1 = f1[2] + '/' + f1[1] + '-' + f1[0];
    fecha2 = f2[2] + '-' + f2[1] + '-' + f2[0];
    fecha3 = f3[2] + '/' + f3[1] + '-' + f3[0];
    fecha4 = f4[2] + '-' + f4[1] + '-' + f4[0];

    if (Date.parse(fecha1) > Date.parse(fecha2) || Date.parse(fecha1) > Date.parse(fecha2)){
        if(Date.parse(fecha1) > Date.parse(fecha2)){
            swal(
                {
                    title : "Error!",
                    text : "Fecha de inicio real es anterior a la planificada: ",
                    type : "error",
                    confirmButtonText : "Ok"
                }
            );
            respuesta = false;
        }
        if(Date.parse(fecha3) > Date.parse(fecha4)){
            swal(
                {
                    title : "Error!",
                    text : "Fecha de inicio real es anterior a la planificada: ",
                    type : "error",
                    confirmButtonText : "Ok"
                }
            );
            respuesta = false;
        }
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

function validarHoras(campo){
    var respuesta = true;

    if(campo.value < 1){
        swal(
            {
                title : "Error!",
                text : "Las horas deber ser más de 1 ",
                type : "error",
                confirmButtonText : "Ok"
            }
        );

        respuesta = false;
    }
    return respuesta;
}

function longitud200(campo){
    var respuesta = true;
    var longitud = campo.value.length;

    if(longitud > 200){
        swal(
            {
                title : "Error!",
                text : campo.name + " demasiado largo ",
                type : "error",
                confirmButtonText : "Ok"
            }
        );
        respuesta = false;
    }
    return respuesta;
}

function longitud100(campo){
    var respuesta = true;
    var longitud = campo.value.length;

    if(longitud > 100){
        swal(
            {
                title : "Error!",
                text : campo.name + " demasiado largo: ",
                //text : <?php idioma("Introduce ");?> + nombre.name + ":",
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
        respuesta = true;
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
                                text : "El campo Nombre no puede contener los caracteres: \n · # $ ^ & * ",
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
                                            text : "El campo Nombre no puede contener los caracteres: \n · # $ ^ & * ",
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
                                                        text : "El campo Usuario no puede contener los caracteres: \n · # $ ^ & * ",
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
                                                                        text : "El campo Correo no puede contener los caracteres: \n · # $ ^ & * ",
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

function validarFormAddTarea(){
    var respuesta = true;

    if(
        validarCampo(document.getElementById('nombre')) //nombre tarea
        && validarNombreTarea(document.getElementById('nombre'))
        && evitarProhibidos(document.getElementById('nombre'))
        && validarCampo(document.getElementById('fecha_I_P')) // fecha I P
        && validarFecha(document.getElementById('fecha_I_P'))
        && validarCampo(document.getElementById('fecha_E_P')) // fecha E P
        && validarFecha(document.getElementById('fecha_E_P'))
        && validarCampo(document.getElementById('horas_P')) // horas plan
        && soloNumero(document.getElementById('horas_P'))
        && validarHoras(document.getElementById('horas_P'))
        && validarCampo(document.getElementById('descripcion')) //descripcion
        && evitarProhibidos(document.getElementById('descripcion'))
        && longitud200(document.getElementById('descripcion'))
        && validarCampo(document.getElementById('comentarios'))
        && evitarProhibidos(document.getElementById('comentarios'))
        && longitud100(document.getElementById('comentarios'))
    ){
        //Dentro del if
        swal(
            {
                title : "Modificado con éxito!",
                type : "success",
                confirmButtonText : "Ok"
            }
        );
        respuesta = true;

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
                respuesta = false;
            }else{
                if(validarNombreTarea(document.getElementById('nombre')) == false){
                    swal(
                        {
                            title : "Error!",
                            text : "Nombre de tarea inválido: \n (Longitud máxima 50 caracteres.)" ,
                            type : "error",
                            confirmButtonText : "Ok"
                        }
                    );
                    respuesta = false;
                }else{
                    if(evitarProhibidos(document.getElementById('nombre')) == false){
                        swal(
                            {
                                title : "Error!",
                                text : "El Nombre no puede contener los caracteres: \n · # $ ^ & *",
                                type : "error",
                                confirmButtonText : "Ok"
                            }
                        );
                        respuesta = false;
                    }else{
                        if(validarCampo(document.getElementById('fecha_I_P')) == false){
                            swal(
                                {
                                    title : "Error!",
                                    text : "Fecha Inicial Planificada vacía: ",
                                    type : "error",
                                    confirmButtonText : "Ok"
                                }
                            );
                            respuesta = false;
                        }else{
                            if(validarFecha(document.getElementById('fecha_I_P')) == false){
                                swal(
                                    {
                                        title : "Error!",
                                        text : "Formato de Fecha Inicial Planificada incorrecto: \n aaaa-mm-dd",
                                        type : "error",
                                        confirmButtonText : "Ok"
                                    }
                                );
                                respuesta = false;
                            }else{
                                if(validarCampo(document.getElementById('fecha_E_P')) == false){
                                    swal(
                                        {
                                            title : "Error!",
                                            text : "Fecha Entrega Planificada vacía: ",
                                            type : "error",
                                            confirmButtonText : "Ok"
                                        }
                                    );
                                    respuesta = false;
                                }else{
                                    if(validarFecha(document.getElementById('fecha_E_P')) == false){
                                        swal(
                                            {
                                                title : "Error!",
                                                text : "Formato de Fecha Entrega Planificada incorrecto: \n aaaa-mm-dd",
                                                type : "error",
                                                confirmButtonText : "Ok"
                                            }
                                        );
                                        respuesta = false;
                                    }else{
                                        if(validarCampo(document.getElementById('horas_P')) == false){
                                            swal(
                                                {
                                                    title : "Error!",
                                                    text : "Horas Planificadas vacía: ",
                                                    type : "error",
                                                    confirmButtonText : "Ok"
                                                }
                                            );
                                            respuesta = false;
                                        }else{
                                            if(soloNumero(document.getElementById('horas_P')) == false){
                                                swal(
                                                    {
                                                        title : "Error!",
                                                        text : "Formato de Horas Planificada incorrecto: \n Introduce tan sólo números",
                                                        type : "error",
                                                        confirmButtonText : "Ok"
                                                    }
                                                );
                                                respuesta = false;
                                            }else{
                                                if(validarCampo(document.getElementById('descripcion')) == false){
                                                    swal(
                                                        {
                                                            title : "Error!",
                                                            text : "Descripción vacía: ",
                                                            type : "error",
                                                            confirmButtonText : "Ok"
                                                        }
                                                    );
                                                    respuesta = false;
                                                }else{
                                                    if(evitarProhibidos(document.getElementById('descripcion')) == false){
                                                        swal(
                                                            {
                                                                title : "Error!",
                                                                text : "La descripción no puede contener los caracteres: \n · # $ ^ & *",
                                                                type : "error",
                                                                confirmButtonText : "Ok"
                                                            }
                                                        );
                                                        respuesta = false;
                                                    }else{
                                                        if(longitud200(document.getElementById('descripcion')) == false){
                                                            swal(
                                                                {
                                                                    title : "Error!",
                                                                    text : "La descripción no puede pasar de 200 caracteres: ",
                                                                    type : "error",
                                                                    confirmButtonText : "Ok"
                                                                }
                                                            );
                                                            respuesta = false;
                                                        }else{
                                                            if(validarCampo(document.getElementById('comentarios')) == false){
                                                                swal(
                                                                    {
                                                                        title : "Error!",
                                                                        text : "Comentario vacío: ",
                                                                        type : "error",
                                                                        confirmButtonText : "Ok"
                                                                    }
                                                                );
                                                                respuesta = false;
                                                            }else{
                                                                if(evitarProhibidos(document.getElementById('comentarios')) == false){
                                                                    swal(
                                                                        {
                                                                            title : "Error!",
                                                                            text : "El comentario no puede contener los caracteres: \n · # $ ^ & *",
                                                                            type : "error",
                                                                            confirmButtonText : "Ok"
                                                                        }
                                                                    );
                                                                    respuesta = false;
                                                                }else{
                                                                    if(longitud100(document.getElementById('comentarios')) == false){
                                                                        swal(
                                                                            {
                                                                                title : "Error!",
                                                                                text : "El comentario no puede pasar de 100 caracteres: ",
                                                                                type : "error",
                                                                                confirmButtonText : "Ok"
                                                                            }
                                                                        );
                                                                        respuesta = false;
                                                                    }else{
                                                                        if(validarHoras(document.getElementById('horas_P')) == false){
                                                                            swal(
                                                                                {
                                                                                    title : "Error!",
                                                                                    text : "Las horas han de ser mayores que 0: ",
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
                }
            }
    }
    return respuesta;
}

function validarFormEditTarea() {
    var respuesta = true;

    if(
        validarCampo(document.getElementById('nombre')) //nombre tarea
        && validarNombreTarea(document.getElementById('nombre'))
        && evitarProhibidos(document.getElementById('nombre'))
        && validarCampo(document.getElementById('fecha_I_P')) // fecha I P
        && validarFecha(document.getElementById('fecha_I_P'))
        && validarCampo(document.getElementById('fecha_E_P')) // fecha E P
        && validarFecha(document.getElementById('fecha_E_P'))
        && validarCampo(document.getElementById('fecha_E_R')) // fecha E R
        && validarFecha(document.getElementById('fecha_E_R'))
        && validarCampo(document.getElementById('fecha_I_R')) // fecha I R
        && validarFecha(document.getElementById('fecha_I_R'))
        && validarCampo(document.getElementById('horas_P')) // horas plan
        && soloNumero(document.getElementById('horas_P'))
        && validarHoras(document.getElementById('horas_P'))
        && validarCampo(document.getElementById('horas_R')) // horas real
        && soloNumero(document.getElementById('horas_R'))
        && validarHoras(document.getElementById('horas_R'))
        && validarCampo(document.getElementById('descripcion')) //descripcion
        && evitarProhibidos(document.getElementById('descripcion'))
        && longitud200(document.getElementById('descripcion'))
        && validarCampo(document.getElementById('comentarios'))
        && evitarProhibidos(document.getElementById('comentarios'))
        && longitud100(document.getElementById('comentarios'))
    ){
        //Dentro del if
        swal(
            {
                title : "Modificado con éxito!",
                type : "success",
                confirmButtonText : "Ok"
            }
        );
        respuesta = true;
    }else {
        if (validarCampo(document.getElementById('nombre')) == false) {
            swal(
                {
                    title: "Error!",
                    text: "Nombre vacío: ",
                    type: "error",
                    confirmButtonText: "Ok"
                }
            );
            respuesta = false;
        } else {
            if (validarNombreTarea(document.getElementById('nombre')) == false) {
                swal(
                    {
                        title: "Error!",
                        text: "Nombre de tarea inválido: \n (Longitud máxima 50 caracteres.)",
                        type: "error",
                        confirmButtonText: "Ok"
                    }
                );
                respuesta = false;
            } else {
                if (evitarProhibidos(document.getElementById('nombre')) == false) {
                    swal(
                        {
                            title: "Error!",
                            text: "El Nombre no puede contener los caracteres: \n · # $ ^ & *",
                            type: "error",
                            confirmButtonText: "Ok"
                        }
                    );
                    respuesta = false;
                } else {
                    if (validarCampo(document.getElementById('fecha_I_P')) == false) {
                        swal(
                            {
                                title: "Error!",
                                text: "Fecha Inicial Planificada vacía: ",
                                type: "error",
                                confirmButtonText: "Ok"
                            }
                        );
                        respuesta = false;
                    } else {
                        if (validarFecha(document.getElementById('fecha_I_P')) == false) {
                            swal(
                                {
                                    title: "Error!",
                                    text: "Formato de Fecha Inicial Planificada incorrecto: \n aaaa-mm-dd ó aaaa/mm/dd",
                                    type: "error",
                                    confirmButtonText: "Ok"
                                }
                            );
                            respuesta = false;
                        } else {
                            if (validarCampo(document.getElementById('fecha_I_R')) == false) {
                                swal(
                                    {
                                        title: "Error!",
                                        text: "Fecha Inicial Real vacía: ",
                                        type: "error",
                                        confirmButtonText: "Ok"
                                    }
                                );
                                respuesta = false;
                            } else {
                                if (validarFecha(document.getElementById('fecha_I_R')) == false) {
                                    swal(
                                        {
                                            title: "Error!",
                                            text: "Formato de Fecha Inicial Real incorrecto: \n aaaa/mm/dd",
                                            type: "error",
                                            confirmButtonText: "Ok"
                                        }
                                    );
                                    respuesta = false;
                                } else {
                                    if (validarCampo(document.getElementById('horas_P')) == false) {
                                        swal(
                                            {
                                                title: "Error!",
                                                text: "Horas Planificadas vacío: ",
                                                type: "error",
                                                confirmButtonText: "Ok"
                                            }
                                        );
                                        respuesta = false;
                                    } else {
                                        if (soloNumero(document.getElementById('horas_P')) == false) {
                                            swal(
                                                {
                                                    title: "Error!",
                                                    text: "Formato de Horas Planificada incorrecto: \n Introduce tan sólo números",
                                                    type: "error",
                                                    confirmButtonText: "Ok"
                                                }
                                            );
                                            respuesta = false;
                                        } else {
                                            if (validarHoras(document.getElementById('horas_P')) == false) {
                                                swal(
                                                    {
                                                        title: "Error!",
                                                        text: "Las horas deber ser más de 1 ",
                                                        type: "error",
                                                        confirmButtonText: "Ok"
                                                    }
                                                );

                                                respuesta = false;
                                            } else {
                                                if (validarCampo(document.getElementById('horas_R')) == false) {
                                                    swal(
                                                        {
                                                            title: "Error!",
                                                            text: "Horas Planificadas vacío: ",
                                                            type: "error",
                                                            confirmButtonText: "Ok"
                                                        }
                                                    );
                                                    respuesta = false;
                                                } else {
                                                    if (soloNumero(document.getElementById('horas_R')) == false) {
                                                        swal(
                                                            {
                                                                title: "Error!",
                                                                text: "Formato de Horas Planificada incorrecto: \n Introduce tan sólo números",
                                                                type: "error",
                                                                confirmButtonText: "Ok"
                                                            }
                                                        );
                                                        respuesta = false;
                                                    } else {
                                                        if (validarHoras(document.getElementById('horas_R')) == false) {
                                                            swal(
                                                                {
                                                                    title: "Error!",
                                                                    text: "Las horas deber ser más de 1 ",
                                                                    type: "error",
                                                                    confirmButtonText: "Ok"
                                                                }
                                                            );

                                                            respuesta = false;
                                                        } else {
                                                            if (validarCampo(document.getElementById('descripcion')) == false) {
                                                                swal(
                                                                    {
                                                                        title: "Error!",
                                                                        text: "Nombre vacío: ",
                                                                        type: "error",
                                                                        confirmButtonText: "Ok"
                                                                    }
                                                                );
                                                                respuesta = false;
                                                            } else {
                                                                if (evitarProhibidos(document.getElementById('descripcion')) == false) {
                                                                    swal(
                                                                        {
                                                                            title: "Error!",
                                                                            text: "La descripción no puede contener los caracteres: \n · # $ ^ & *",
                                                                            type: "error",
                                                                            confirmButtonText: "Ok"
                                                                        }
                                                                    );
                                                                    respuesta = false;
                                                                } else {
                                                                    if (longitud200(document.getElementById('descripcion')) == false) {
                                                                        swal(
                                                                            {
                                                                                title: "Error!",
                                                                                text: "La descripción no puede pasar de 200 caracteres: ",
                                                                                type: "error",
                                                                                confirmButtonText: "Ok"
                                                                            }
                                                                        );
                                                                        respuesta = false;
                                                                    } else {
                                                                        if (validarCampo(document.getElementById('comentarios')) == false) {
                                                                            swal(
                                                                                {
                                                                                    title: "Error!",
                                                                                    text: "Nombre vacío: ",
                                                                                    type: "error",
                                                                                    confirmButtonText: "Ok"
                                                                                }
                                                                            );
                                                                            respuesta = false;
                                                                        } else {
                                                                            if (evitarProhibidos(document.getElementById('comentarios')) == false) {
                                                                                swal(
                                                                                    {
                                                                                        title: "Error!",
                                                                                        text: "El comentario no puede contener los caracteres: \n · # $ ^ & *",
                                                                                        type: "error",
                                                                                        confirmButtonText: "Ok"
                                                                                    }
                                                                                );
                                                                                respuesta = false;
                                                                            } else {
                                                                                if (longitud100(document.getElementById('comentarios')) == false) {
                                                                                    swal(
                                                                                        {
                                                                                            title: "Error!",
                                                                                            text: "El comentario no puede pasar de 100 caracteres: ",
                                                                                            type: "error",
                                                                                            confirmButtonText: "Ok"
                                                                                        }
                                                                                    );
                                                                                    respuesta = false;
                                                                                } else {
                                                                                    if (validarCampo(document.getElementById('fecha_E_P')) == false) {
                                                                                        swal(
                                                                                            {
                                                                                                title: "Error!",
                                                                                                text: "Fecha Entrega Planificada vacía: ",
                                                                                                type: "error",
                                                                                                confirmButtonText: "Ok"
                                                                                            }
                                                                                        );
                                                                                        respuesta = false;
                                                                                    } else {
                                                                                        if (validarFecha(document.getElementById('fecha_E_P')) == false) {
                                                                                            swal(
                                                                                                {
                                                                                                    title: "Error!",
                                                                                                    text: "Formato de Fecha Entrega Planificada incorrecto: \n aaaa-mm-dd ó aaaa/mm/dd",
                                                                                                    type: "error",
                                                                                                    confirmButtonText: "Ok"
                                                                                                }
                                                                                            );
                                                                                            respuesta = false;
                                                                                        } else {
                                                                                            if (validarCampo(document.getElementById('fecha_E_R')) == false) {
                                                                                                swal(
                                                                                                    {
                                                                                                        title: "Error!",
                                                                                                        text: "Fecha Entrega Real vacía: ",
                                                                                                        type: "error",
                                                                                                        confirmButtonText: "Ok"
                                                                                                    }
                                                                                                );
                                                                                                respuesta = false;
                                                                                            } else {
                                                                                                if (validarFecha(document.getElementById('fecha_E_R')) == false) {
                                                                                                    swal(
                                                                                                        {
                                                                                                            title: "Error!",
                                                                                                            text: "Formato de Fecha Entrega Real incorrecto: \n aaaa/mm/dd",
                                                                                                            type: "error",
                                                                                                            confirmButtonText: "Ok"
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

function validarFormEditSubTarea() {
    var respuesta = true;

    if(
        validarCampo(document.getElementById('nombre')) //nombre tarea
        && validarNombreTarea(document.getElementById('nombre'))
        && evitarProhibidos(document.getElementById('nombre'))
        && validarCampo(document.getElementById('fecha_inicio_plan')) // fecha I P
        && validarFecha(document.getElementById('fecha_inicio_plan'))
        && validarCampo(document.getElementById('fecha_entrega_plan')) // fecha E P
        && validarFecha(document.getElementById('fecha_entrega_plan'))
        && validarCampo(document.getElementById('fecha_entrega_real')) // fecha E R
        && validarFecha(document.getElementById('fecha_entrega_real'))
        && validarCampo(document.getElementById('fecha_inicio_real')) // fecha I R
        && validarFecha(document.getElementById('fecha_inicio_real'))
        && validarCampo(document.getElementById('horas_plan')) // horas plan
        && soloNumero(document.getElementById('horas_plan'))
        && validarHoras(document.getElementById('horas_plan'))
        && validarCampo(document.getElementById('horas_real')) // horas real
        && soloNumero(document.getElementById('horas_real'))
        && validarHoras(document.getElementById('horas_real'))
        && validarCampo(document.getElementById('descripcion')) //descripcion
        && evitarProhibidos(document.getElementById('descripcion'))
        && longitud200(document.getElementById('descripcion'))
        && validarCampo(document.getElementById('comentario'))
        && evitarProhibidos(document.getElementById('comentario'))
        && longitud100(document.getElementById('comentario'))
    ){
        //Dentro del if
        swal(
            {
                title : "Modificado con éxito!",
                type : "success",
                confirmButtonText : "Ok"
            }
        );
        respuesta = true;
    }else {
        if (validarCampo(document.getElementById('nombre')) == false) {
            swal(
                {
                    title: "Error!",
                    text: "Nombre vacío: ",
                    type: "error",
                    confirmButtonText: "Ok"
                }
            );
            respuesta = false;
        } else {
            if (validarNombreTarea(document.getElementById('nombre')) == false) {
                swal(
                    {
                        title: "Error!",
                        text: "Nombre de tarea inválido: \n (Longitud máxima 50 caracteres.)",
                        type: "error",
                        confirmButtonText: "Ok"
                    }
                );
                respuesta = false;
            } else {
                if (evitarProhibidos(document.getElementById('nombre')) == false) {
                    swal(
                        {
                            title: "Error!",
                            text: "El Nombre no puede contener los caracteres: \n · # $ ^ & *",
                            type: "error",
                            confirmButtonText: "Ok"
                        }
                    );
                    respuesta = false;
                } else {
                    if (validarCampo(document.getElementById('fecha_inicio_plan')) == false) {
                        swal(
                            {
                                title: "Error!",
                                text: "Fecha Inicial Planificada vacía: ",
                                type: "error",
                                confirmButtonText: "Ok"
                            }
                        );
                        respuesta = false;
                    } else {
                        if (validarFecha(document.getElementById('fecha_inicio_plan')) == false) {
                            swal(
                                {
                                    title: "Error!",
                                    text: "Formato de Fecha Inicial Planificada incorrecto: \n aaaa-mm-dd",
                                    type: "error",
                                    confirmButtonText: "Ok"
                                }
                            );
                            respuesta = false;
                        } else {
                            if (validarCampo(document.getElementById('fecha_inicio_real')) == false) {
                                swal(
                                    {
                                        title: "Error!",
                                        text: "Fecha Inicial Real vacía: ",
                                        type: "error",
                                        confirmButtonText: "Ok"
                                    }
                                );
                                respuesta = false;
                            } else {
                                if (validarFecha(document.getElementById('fecha_inicio_real')) == false) {
                                    swal(
                                        {
                                            title: "Error!",
                                            text: "Formato de Fecha Inicial Real incorrecto: \n aaaa-mm-dd",
                                            type: "error",
                                            confirmButtonText: "Ok"
                                        }
                                    );
                                    respuesta = false;
                                } else {
                                    if (validarCampo(document.getElementById('horas_plan')) == false) {
                                        swal(
                                            {
                                                title: "Error!",
                                                text: "Horas Planificadas vacío: ",
                                                type: "error",
                                                confirmButtonText: "Ok"
                                            }
                                        );
                                        respuesta = false;
                                    } else {
                                        if (soloNumero(document.getElementById('horas_plan')) == false) {
                                            swal(
                                                {
                                                    title: "Error!",
                                                    text: "Formato de Horas Planificada incorrecto: \n Introduce tan sólo números",
                                                    type: "error",
                                                    confirmButtonText: "Ok"
                                                }
                                            );
                                            respuesta = false;
                                        } else {
                                            if (validarHoras(document.getElementById('horas_plan')) == false) {
                                                swal(
                                                    {
                                                        title: "Error!",
                                                        text: "Las horas deber ser más de 1 ",
                                                        type: "error",
                                                        confirmButtonText: "Ok"
                                                    }
                                                );

                                                respuesta = false;
                                            } else {
                                                if (validarCampo(document.getElementById('horas_real')) == false) {
                                                    swal(
                                                        {
                                                            title: "Error!",
                                                            text: "Horas Planificadas vacío: ",
                                                            type: "error",
                                                            confirmButtonText: "Ok"
                                                        }
                                                    );
                                                    respuesta = false;
                                                } else {
                                                    if (soloNumero(document.getElementById('horas_real')) == false) {
                                                        swal(
                                                            {
                                                                title: "Error!",
                                                                text: "Formato de Horas Planificada incorrecto: \n Introduce tan sólo números",
                                                                type: "error",
                                                                confirmButtonText: "Ok"
                                                            }
                                                        );
                                                        respuesta = false;
                                                    } else {
                                                        if (validarHoras(document.getElementById('horas_real')) == false) {
                                                            swal(
                                                                {
                                                                    title: "Error!",
                                                                    text: "Las horas deber ser más de 1 ",
                                                                    type: "error",
                                                                    confirmButtonText: "Ok"
                                                                }
                                                            );

                                                            respuesta = false;
                                                        } else {
                                                            if (validarCampo(document.getElementById('descripcion')) == false) {
                                                                swal(
                                                                    {
                                                                        title: "Error!",
                                                                        text: "Descripcion vacío: ",
                                                                        type: "error",
                                                                        confirmButtonText: "Ok"
                                                                    }
                                                                );
                                                                respuesta = false;
                                                            } else {
                                                                if (evitarProhibidos(document.getElementById('descripcion')) == false) {
                                                                    swal(
                                                                        {
                                                                            title: "Error!",
                                                                            text: "La descripción no puede contener los caracteres: \n · # $ ^ & *",
                                                                            type: "error",
                                                                            confirmButtonText: "Ok"
                                                                        }
                                                                    );
                                                                    respuesta = false;
                                                                } else {
                                                                    if (longitud200(document.getElementById('descripcion')) == false) {
                                                                        swal(
                                                                            {
                                                                                title: "Error!",
                                                                                text: "La descripción no puede pasar de 200 caracteres: ",
                                                                                type: "error",
                                                                                confirmButtonText: "Ok"
                                                                            }
                                                                        );
                                                                        respuesta = false;
                                                                    } else {
                                                                        if (validarCampo(document.getElementById('comentario')) == false) {
                                                                            swal(
                                                                                {
                                                                                    title: "Error!",
                                                                                    text: "Comentario vacío: ",
                                                                                    type: "error",
                                                                                    confirmButtonText: "Ok"
                                                                                }
                                                                            );
                                                                            respuesta = false;
                                                                        } else {
                                                                            if (evitarProhibidos(document.getElementById('comentario')) == false) {
                                                                                swal(
                                                                                    {
                                                                                        title: "Error!",
                                                                                        text: "El comentario no puede contener los caracteres: \n · # $ ^ & *",
                                                                                        type: "error",
                                                                                        confirmButtonText: "Ok"
                                                                                    }
                                                                                );
                                                                                respuesta = false;
                                                                            } else {
                                                                                if (longitud100(document.getElementById('comentario')) == false) {
                                                                                    swal(
                                                                                        {
                                                                                            title: "Error!",
                                                                                            text: "El comentario no puede pasar de 100 caracteres: ",
                                                                                            type: "error",
                                                                                            confirmButtonText: "Ok"
                                                                                        }
                                                                                    );
                                                                                    respuesta = false;
                                                                                } else {
                                                                                    if (validarCampo(document.getElementById('fecha_entrega_plan')) == false) {
                                                                                        swal(
                                                                                            {
                                                                                                title: "Error!",
                                                                                                text: "Fecha Entrega Planificada vacía: ",
                                                                                                type: "error",
                                                                                                confirmButtonText: "Ok"
                                                                                            }
                                                                                        );
                                                                                        respuesta = false;
                                                                                    } else {
                                                                                        if (validarFecha(document.getElementById('fecha_entrega_plan')) == false) {
                                                                                            swal(
                                                                                                {
                                                                                                    title: "Error!",
                                                                                                    text: "Formato de Fecha Entrega Planificada incorrecto: \n aaaa-mm-dd",
                                                                                                    type: "error",
                                                                                                    confirmButtonText: "Ok"
                                                                                                }
                                                                                            );
                                                                                            respuesta = false;
                                                                                        } else {
                                                                                            if (validarCampo(document.getElementById('fecha_entrega_real')) == false) {
                                                                                                swal(
                                                                                                    {
                                                                                                        title: "Error!",
                                                                                                        text: "Fecha Entrega Real vacía: ",
                                                                                                        type: "error",
                                                                                                        confirmButtonText: "Ok"
                                                                                                    }
                                                                                                );
                                                                                                respuesta = false;
                                                                                            } else {
                                                                                                if (validarFecha(document.getElementById('fecha_entrega_real')) == false) {
                                                                                                    swal(
                                                                                                        {
                                                                                                            title: "Error!",
                                                                                                            text: "Formato de Fecha Entrega Real incorrecto: \n aaaa-mm-dd",
                                                                                                            type: "error",
                                                                                                            confirmButtonText: "Ok"
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

function validarFormAddSubtarea(){
    var respuesta = true;

    if(
        validarCampo(document.getElementById('nombre'))
        && validarNombreTarea(document.getElementById('nombre'))
        && evitarProhibidos(document.getElementById('nombre'))
        && validarCampo(document.getElementById('descripcion'))
        && evitarProhibidos(document.getElementById('descripcion'))
        && longitud200(document.getElementById('descripcion'))
        && validarCampo(document.getElementById('fecha_inicio_plan'))
        && validarFecha(document.getElementById('fecha_inicio_plan'))
        && validarCampo(document.getElementById('fecha_entrega_plan'))
        && validarFecha(document.getElementById('fecha_entrega_plan'))
        && validarCampo(document.getElementById('horas_plan'))
        && soloNumero(document.getElementById('horas_plan'))
        && validarHoras(document.getElementById('horas_plan'))
        && validarCampo(document.getElementById('comentario'))
        && evitarProhibidos(document.getElementById('comentario'))
        &&longitud100(document.getElementById('comentario'))
    ){
        //Dentro del if
        swal(
            {
                title : "Subtarea registrada con éxito!",
                type : "success",
                confirmButtonText : "Ok"
            }
        );
        respuesta = true;
    }else{
            if(validarCampo(document.getElementById('nombre')) == false){ //nombre
                swal(
                    {
                        title: "Error!",
                        text: "Nombre vacío: ",
                        type: "error",
                        confirmButtonText: "Ok"
                    }
                );
                respuesta = false;
            }else{
                if(validarNombreTarea(document.getElementById('nombre')) == false){
                    swal(
                        {
                            title: "Error!",
                            text: "Nombre de subtarea inválido: \n (Longitud máxima 50 caracteres.)",
                            type: "error",
                            confirmButtonText: "Ok"
                        }
                    );
                    respuesta = false;
                }else{
                    if(evitarProhibidos(document.getElementById('nombre')) == false){
                        swal(
                            {
                                title: "Error!",
                                text: "El Nombre no puede contener los caracteres: \n · # $ ^ & *",
                                type: "error",
                                confirmButtonText: "Ok"
                            }
                        );
                        respuesta = false;
                    }else{
                        if(validarCampo(document.getElementById('descripcion')) == false){ // descripcion
                            swal(
                                {
                                    title: "Error!",
                                    text: "Descripción vacía: ",
                                    type: "error",
                                    confirmButtonText: "Ok"
                                }
                            );
                            respuesta = false;
                        }else{
                            if(evitarProhibidos(document.getElementById('descripcion')) == false){
                                swal(
                                    {
                                        title: "Error!",
                                        text: "La descripción no puede contener los caracteres: \n · # $ ^ & *",
                                        type: "error",
                                        confirmButtonText: "Ok"
                                    }
                                );
                                respuesta = false;
                            }else{
                                if(longitud200(document.getElementById('descripcion')) == false){
                                    swal(
                                        {
                                            title: "Error!",
                                            text: "La descripción no puede pasar de 200 caracteres: ",
                                            type: "error",
                                            confirmButtonText: "Ok"
                                        }
                                    );
                                    respuesta = false;
                                }else{
                                    if(validarCampo(document.getElementById('fecha_inicio_plan')) == false){ // FIP
                                        swal(
                                            {
                                                title: "Error!",
                                                text: "Fecha Inicial Planificada vacía: ",
                                                type: "error",
                                                confirmButtonText: "Ok"
                                            }
                                        );
                                        respuesta = false;
                                    }else{
                                        if(validarFecha(document.getElementById('fecha_inicio_plan')) == false){
                                            swal(
                                                {
                                                    title : "Error!",
                                                    text : "Formato de Fecha Inicial Planificada incorrecto: \n aaaa/mm/dd",
                                                    type : "error",
                                                    confirmButtonText : "Ok"
                                                }
                                            );
                                            respuesta = false;
                                        }else{
                                            if(validarCampo(document.getElementById('fecha_entrega_plan')) == false){ // FEP
                                                swal(
                                                    {
                                                        title: "Error!",
                                                        text: "Fecha Entrega Planificada vacía: ",
                                                        type: "error",
                                                        confirmButtonText: "Ok"
                                                    }
                                                );
                                                respuesta = false;
                                            }else{
                                                if(validarFecha(document.getElementById('fecha_entrega_plan')) == false){
                                                    swal(
                                                        {
                                                            title : "Error!",
                                                            text : "Formato de Fecha Entrega Planificada incorrecto: \n aaaa/mm/dd",
                                                            type : "error",
                                                            confirmButtonText : "Ok"
                                                        }
                                                    );
                                                    respuesta = false;
                                                }else{
                                                    if(validarCampo(document.getElementById('horas_plan')) == false){
                                                        swal(
                                                            {
                                                                title: "Error!",
                                                                text: "Horas Planificadas vacío: ",
                                                                type: "error",
                                                                confirmButtonText: "Ok"
                                                            }
                                                        );
                                                        respuesta = false;
                                                    }else{
                                                        if(soloNumero(document.getElementById('horas_plan')) == false){
                                                            swal(
                                                                {
                                                                    title: "Error!",
                                                                    text: "Formato de Horas Planificada incorrecto: \n Introduce tan sólo números",
                                                                    type: "error",
                                                                    confirmButtonText: "Ok"
                                                                }
                                                            );
                                                            respuesta = false;
                                                        }else{
                                                            if(validarHoras(document.getElementById('horas_plan')) == false){
                                                                swal(
                                                                    {
                                                                        title: "Error!",
                                                                        text: "Las horas deber ser más de 1 ",
                                                                        type: "error",
                                                                        confirmButtonText: "Ok"
                                                                    }
                                                                );

                                                                respuesta = false;
                                                            }else{
                                                                if(validarCampo(document.getElementById('comentario')) == false){
                                                                    swal(
                                                                        {
                                                                            title: "Error!",
                                                                            text: "Comentario vacío: ",
                                                                            type: "error",
                                                                            confirmButtonText: "Ok"
                                                                        }
                                                                    );
                                                                    respuesta = false;
                                                                }else{
                                                                    if(evitarProhibidos(document.getElementById('comentario')) == false){
                                                                        swal(
                                                                            {
                                                                                title: "Error!",
                                                                                text: "El comentario no puede contener los caracteres: \n · # $ ^ & *",
                                                                                type: "error",
                                                                                confirmButtonText: "Ok"
                                                                            }
                                                                        );
                                                                        respuesta = false;
                                                                    }else{
                                                                        if(longitud100(document.getElementById('comentario')) == false){
                                                                        swal(
                                                                            {
                                                                                title: "Error!",
                                                                                text: "El comentario no puede pasar de 100 caracteres: ",
                                                                                type: "error",
                                                                                confirmButtonText: "Ok"
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
            }
    }
}
}





