<?php


class Login {
//VISTA REALIZAR EL LOGIN
function __construct(){
	$this->render();
}

function render(){

include './Locates/Strings_Castellano.php';
include './Functions/EMPLEADOShowAllDefForm.php';


$lista = array('EMP_USER', 'EMP_PASSWORD','IDIOMA');

?><head>
	<link rel="stylesheet" href="./Styles/loginstyles.css" type="text/css" media="screen" />
        <link href="../Styles/sweetalert.css" rel="stylesheet">
        <script src="../js/sweetalert.min.js"></script>
        <script src="../js/validaciones.js"></script>
        <script src="../js/md5.js"></script>
        <link href="../Styles/tcal.css" rel="stylesheet">
        <script src="../js/tcal.js"></script>
    </head>
	<div class="login">
		<div class="login-triangle"></div>

		<h2 class="login-header"><img src="./images/logo_moovett1.png"</h2>

		<form class="login-container" action='./Functions/Acceso.php' method='post' name="login" >
			<p><input type="text" name='EMP_USER' placeholder="User"></p>
			<p><input type="password"  name='EMP_PASSWORD' placeholder="Password" onblur="validarPassword(document.login.EMP_PASSWORD)"></p>
			<p><select name="IDIOMA"><option value="Castellano">Castellano</option>
					<option value="Galego">Galego</option>
					<option value="English">English</option></select></p>
			<p><input type="submit" name = 'accion' value='Login'></p>
            <p><input type="submit" name = 'accion' value='Registro'></p>
		</form>
	</div>

<?php
} //fin del metodo render

} // fin de la clase login
?>

