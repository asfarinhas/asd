<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 01/01/2017
 * Time: 18:51
 */

    //include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

    class MIEMBRO_DELETE_Vista{

    private $miembro;

    public function __construct(Miembro $miembro)
    {
        $this -> miembro = $miembro;
        $this -> render();
    }

    public function render(){
        $strings = array();
 ?>
    <html>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
             <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>
            <link href="../Styles/sweetalert.css" rel="stylesheet">
            <script src="../js/sweetalert.min.js"></script>
            <script src="../js/validaciones.js"></script>
            <script src="../js/md5.js"></script>
            <link href="../Styles/tcal.css" rel="stylesheet">
            <script src="../js/tcal.js"></script>
        </head>
        <body>
            <p>
                <h1><span class="form-title">
                    ELIMINAR PERFIL
                 </h1>
            </p>

                <h2>

                    <form action="MIEMBRO_Controller.php" method="post" id="formDelete">
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

                        <!-- necesario para el switch del controlador -->
                        <input type="hidden" name="accion" value='<?php echo $strings['Borrar']; ?>'>

                        <!-- type button value solo para mostrar en pantalla, no se pasa por request -->
                        <input type='button' id="deleteButton" name='accion' onClick="return confirmarBorrado();" value='<?php echo $strings['Borrar']; ?>' >
                        <a href="../Controllers/MIEMBRO_Controller.php?accion=showcurrent"> <?php echo $strings['Volver']; ?> </a>
                    </ul>



                    </form>

                </h2>
        </body>
    </html>
<?php
    }
 /*echo $idiom['DeleteAlumno'] . ": " . $consulta["DNI"] . "?"; */
}


?>