<?php

class TAREA_SHOW_CURRENT_Vista{

    private $aux;

    public function __construct($aux)
    {
        $this -> aux = $aux;
        $this -> render();
    }

    /**
     * @return mixed
     */
    public function getTarea()
    {
        return $this->aux;
    }

    public function render(){
        //$strings = array();
        $tarea= $this->getTarea();
        var_dump($tarea);
        $proyecto = $tarea->getProyecto();
        var_dump($proyecto);
        $auxMiembro = $tarea->getMiembro();
        ?>
        <html>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
            <?php $idioma = $_SESSION['IDIOMA'];
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
            } ?>
        </head>
        <body>
        <p>
        <h1><span class="form-title">
                    CONSULTAR TAREA
        </h1>
        </p>

        <h2>

            <form action="TAREA_Controller.php" method="post">
                <br><br>
                <ul class="form-style-1">

                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['Nombre']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo FECHAIP -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="fecha_inicio_plan"> <?php echo $strings['Fechainicioplan']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getFechaInicioPlan() ;?>" name="fecha_inicio_plan" >
                        </div>
                    </div>

                    <!-- Campo FECHAIR -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="fecha_inicio_real"> <?php echo $strings['fecha_I_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getFechaInicioReal() ;?>" name="fecha_inicio_real" >
                        </div>
                    </div>


                    <!-- Campo FECHAEP -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="fecha_entrega_plan"> <?php echo $strings['Fechaentregaplan']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getFechaEntregaPlan() ;?>" name="fecha_entrega_plan" >
                        </div>
                    </div>

                    <!-- Campo FECHAER -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="fecha_entrega_real"> <?php echo $strings['fecha_E_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getFechaEntregaReal() ;?>" name="fecha_entrega_real" >
                        </div>
                    </div>

                    <!-- Campo HORASP-->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="horas_plan"> <?php echo $strings['horas_P']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getHorasPlan() ;?>" name="horas_plan" >
                        </div>
                    </div>

                    <!-- Campo HORASR -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="horas_real"> <?php echo $strings['horas_R']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getHorasReal() ;?>" name="horas_real" >
                        </div>
                    </div>

                    <!-- Campo Miembro -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="miembro" class="control-label"> <?php echo $strings['asignado']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getMiembro() -> getNombre(); ?>" name="miembro" >
                        </div>
                    </div>

                    <!-- Campo Proyecto -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombreProyecto" class="control-label"> <?php echo $strings['Nombre proyecto']; ?>: </label>
                            <input type="text" readonly value="<?php echo $proyecto->getNOMBRE(); ?>" name="nombreProyecto" >
                        </div>
                    </div>

                    <!-- Campo Descripcion -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="descripcion" class="control-label"> <?php echo $strings['Descripcion']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getDescripcion(); ?>" name="descripcion" >
                        </div>
                    </div>

                    <!-- Campo Estado -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="estado_tarea" class="control-label"> <?php echo $strings['estado']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getEstadoTarea(); ?>" name="estado_tarea" >
                        </div>
                    </div>

                    <!-- Campo Comentario -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="comentario" class="control-label"> <?php echo $strings['comentarios']; ?>: </label>
                            <input type="text" readonly value="<?php echo $tarea -> getComentario(); ?>" name="comentario" >
                        </div>
                    </div>

                    <div> <!-- ID de proyecto-->
                        <input type="number" hidden name="id_proyecto" value="<?= $_GET['id_proyecto'] ?>">
                    </div>


                    <a href="../Controllers/TAREA_Controller.php?accion=showall_tarea"> <?php echo $strings['Volver']; ?> </a>
                </ul>



            </form>

        </h2>
        </body>
        </html>
        <?php
    }


}


?>