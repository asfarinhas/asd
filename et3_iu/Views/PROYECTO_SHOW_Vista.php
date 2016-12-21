<?php

class Proyecto_Show{
//VISTA PARA MOSTRAR CONSULTA DE PROYECTO

    function __construct(){
        $this->render();
    }

    function render(){
        ?>

        <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" /></head>
        <p>


            <?php
            include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';


            ?>
        <h1><span class="form-title">
			<?php echo $strings['Consultar proyecto']; ?><br>
        </h1>
        </p>
        <p>
        <h3>

            <br><br>
            <form action='PROYECTO_Controller.php' method='post'>
                <ul class="form-style-1">

                    <li><label><?php echo $string['Nombre proyecto'];?> </label></li>

                    <input type='submit' name='accion' value='<?php echo $strings['Consultar']; ?>'><br>

            </form>
            <br>
            <?php
            echo '<a class="form-link" href=\'PROYECTO_Controller.php\'>' . $strings['Volver'] . '</a>';
            ?>

        </h3>
        </p>

        </div>

        <?php
    }

}