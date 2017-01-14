<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 04/01/2017
 * Time: 20:57
 */

class SUBTAREA_SHOW_CURRENT_Vista{

    private $subtarea;

    public function __construct($subtarea)
    {
        $this -> subtarea = $subtarea;
        $this -> render();
    }

    public function render(){

        ?>
        <html>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
            <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
        </head>
        <body>
        <p>
        <h1><span class="form-title">
                    CONSULTAR SUBTAREA
        </h1>
        </p>

        <h2>

            <form action="TAREA_Controller.php" method="post">
                <br><br>
                <ul class="form-style-1">

                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['NOMBRE']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> subtarea -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Tarea Padre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="tarea_padre" class="control-label"> <?php echo $strings['Tarea padre']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> subtarea -> getTareaPadre() -> getNombre() ;?>" name="apellidos" >
                        </div>
                    </div>

                    <!-- Campo FECHAIP -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['fecha_I_P']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> subtarea -> getFechaInicioPlan() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo FECHAIR -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['fecha_I_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> subtarea -> getFechaInicioReal() ;?>" name="correo" >
                        </div>
                    </div>


                    <!-- Campo FECHAEP -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['fecha_E_P']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> subtarea -> getFechaEntregaPlan() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo FECHAER -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['fecha_E_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> subtarea -> getFechaEntregaReal() ;?>" name="correo" >
                        </div>
                    </div>

                    <!-- Campo HORASP-->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['horas_P']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> subtarea -> getHorasPlan() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo HORASR -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['horas_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> subtarea -> getHorasReal() ;?>" name="correo" >
                        </div>
                    </div>

                    <!-- Campo Miembro -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['asignado']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> subtarea -> getMiembro() -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Proyecto -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['Nombre proyecto']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> subtarea -> getProyecto() -> getNOMBRE(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Descripcion -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['descripcion']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> subtarea -> getDescripcion(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Estado -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['estado']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> subtarea -> getEstadoTarea(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Comentario -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['comentarios']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> subtarea -> getComentario(); ?>" name="nombre" >
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="delete_subtarea">
                    <a href="../Controllers/TAREA_Controller.php?accion=showall_subtarea&ID_TAREA=<?php echo $this->subtarea->getTareaPadre() ->getIdTarea();?>&proyecto_id=<?php echo $this->subtarea->getProyecto()->getIDPROYECTO();?>" >
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