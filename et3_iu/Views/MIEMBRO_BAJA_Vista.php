<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 01/01/2017
 * Time: 18:51
 */

    include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

    class MIEMBRO_BAJA_Vista{

    private $miembro;

    public function __construct(Miembro $miembro)
    {
        $this -> $miembro = $miembro;
    }

    public function render(){
        $strings = array();
 ?>
    <html>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
             <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
        </head>
        <body>

            <p>
                <h1>
                    <span class="form-title">
                        <?php /* echo $strings['Ver Usuario']; */?> <br>
                 </h1>
             </p>
                <h2>

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

                    </ul>


                        <input type="hidden" name="accion" value="delete">
                        <input type='submit' name='accion' onClick="return confirm('DESEA ELIMINAR EL MIEMBRO?')" value='<?php echo $strings['Borrar']; ?>' >
                        <a href="#"> <?php echo $strings['Volver']; ?> </a>
                    </form>

                </h2>
        </body>
    </html>
<?php
    }
 /*echo $idiom['DeleteAlumno'] . ": " . $consulta["DNI"] . "?"; */
}


?>