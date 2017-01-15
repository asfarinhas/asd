<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 01/01/2017
 * Time: 18:51
 */
//include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
//include '../Models/MIEMBRO_Model.php';

class MIEMBRO_SHOW_Vista{

    private $miembro;

    public function __construct($miembro)
    {
        //session_start();
        $this -> miembro = $miembro;
    }

    public function render(){

        ?>
        <html xmlns="http://www.w3.org/1999/html">
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
            <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
        </head>
        <body>
        </div>
            <h1><span class="form-title"><?=$strings['Perfil']?></h1>

            <form action="MIEMBRO_Controller.php" method="post">
                <br><br>
                <ul class="form-style-1">

                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['NOMBRE']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> miembro -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Apellidos -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="apellidos" class="control-label"> <?php echo $strings['APELLIDOS']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> miembro -> getApellidos() ;?>" name="apellidos" >
                        </div>
                    </div>

                    <!-- Campo Usuario -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['USUARIO']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> miembro -> getUsuario() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo Email -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['EMAIL']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> miembro -> getCorreo() ;?>" name="correo" >
                        </div>
                    </div>

                <a href="MIEMBRO_Controller.php?&amp;accion=edit">
                    <input type="button" value="<?php echo $strings['Modificar']; ?>" />
                </a>
                <a href="MIEMBRO_Controller.php?&amp;accion=confirmDelete">
                    <input type="button" value="<?php echo $strings['Borrar']; ?>" />
                </a>
                </br>
                <a href="MIEMBRO_Controller.php?&amp;accion=verTareas">
                    <input type="button" value="<?php echo $strings['Tareas']; ?>" />
                </a>
                <a href="../index.php">
                    <input type="button" value="<?php echo $strings['Volver']; ?>" />
                </a>
                <input type="hidden" name="accion" value="return">
                </ul>

            </form>

        </div>
        </body>
        </html>
        <?php
    }
}


?>