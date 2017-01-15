<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 1/1/17
 * Time: 13:47
 *
 */
class TAREA_DELETE_View{

    private $datos;

    function __construct($valores){
        $this->datos = $valores;
        $this->render(); //Es lo mismo que showView()
    }

    function render(){

        $idioma = $_SESSION['IDIOMA'];
        switch ($idioma){
            case "Castellano":
                include '../Locates/Strings_Castellano.php';
                break;
            case "English":
                include '../Locates/Strings_English.php';
                break;
            case "Galego":
                include '../Locates/Strings_Galego.php';
            default:
                include '../Locates/Strings_Castellano.php';
        }
        ?>

        <html>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
        </head>
        <body>
        <p>
        <h1><span class="form-title">
                    ELIMINAR TAREA
        </h1>
        </p>

        <h2>

            <form action="TAREA_Controller.php" name="formDeleteTarea" method="post">
                <br><br>
                <ul class="form-style-1">

                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['NOMBRE']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> datos -> getNombre(); ?>" name="nombre">
                        </div>
                    </div>



                    <!-- Campo FECHAIP -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="fecha_I_P"> <?php echo $strings['fecha_I_P']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> datos -> getFechaInicioPlan() ;?>" name="fecha_I_P" >
                        </div>
                    </div>

                    <!-- Campo FECHAIR -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="fecha_I_R"> <?php echo $strings['fecha_I_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> datos -> getFechaInicioReal() ;?>" name="fecha_I_R">
                        </div>
                    </div>


                    <!-- Campo FECHAEP -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['fecha_E_P']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> datos -> getFechaEntregaPlan() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo FECHAER -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['fecha_E_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> datos -> getFechaEntregaReal() ;?>" name="correo" >
                        </div>
                    </div>

                    <!-- Campo HORASP-->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['horas_P']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> datos -> getHorasPlan() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo HORASR -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['horas_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> datos -> getHorasReal() ;?>" name="correo" >
                        </div>
                    </div>

                    <!-- Campo Miembro -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['asignado']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> datos -> getMiembro() -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Proyecto -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['Nombre proyecto']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> datos -> getProyecto() -> getNOMBRE(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Descripcion -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['descripcion']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> datos -> getDescripcion(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Estado -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['estado']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> datos -> getEstadoTarea(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Comentario -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['comentarios']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> datos -> getComentario(); ?>" name="nombre" >
                        </div>
                    </div>


                    <input type="hidden" name="ID_TAREA" value="<?php echo $this -> datos -> getIdTarea();?>"  >
                    <input type="hidden" name="accion" value="borrar_tarea">
                    <input type="hidden" name="id_tarea" value="<?php echo $_REQUEST['ID_TAREA'];?>">
                    <input type='submit'  onClick="return confirm('DESEA ELIMINAR LA TAREA?')" value='<?php echo $strings['Borrar']; ?>' >
                    <a href="../Controllers/TAREA_Controller.php?accion=showall_tarea&ID_TAREA=<?php echo $this->datos->getIdTarea();?>&proyecto_id=<?php echo $this->datos->getProyecto()->getIDPROYECTO();?>" >
                        <input type="button" value="<?php echo $strings['Volver']; ?>" />
                    </a>
                </ul>
            </form>

        </h2>
        </body>
        </html>
        <?php
    }
}
?>
