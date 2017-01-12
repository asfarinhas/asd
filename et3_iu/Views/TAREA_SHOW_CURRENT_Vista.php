<?php

class TAREA_SHOW_CURRENT_Vista{

    private $tarea;

    public function __construct($tarea)
    {
        $this -> tarea = $tarea;
        $this -> render();
    }

    public function render(){
        $strings = array();
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
                            <input type="text" readonly value="<?php echo $this-> tarea -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Tarea Padre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="tareaPadre" class="control-label"> <?php echo $strings['Tarea padre']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> tarea -> getTareaPadre() -> getNombre() ;?>" name="apellidos" >
                        </div>
                    </div>

                    <!-- Campo FECHAIP -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['FECHAIP']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> tarea -> getFechaInicioPlan() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo FECHAIR -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['FECHAIR']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> tarea -> getFechaInicioReal() ;?>" name="correo" >
                        </div>
                    </div>


                    <!-- Campo FECHAEP -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['FECHAEP']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> tarea -> getFechaEntregaPlan() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo FECHAER -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['FECHAER']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> tarea -> getFechaEntregaReal() ;?>" name="correo" >
                        </div>
                    </div>

                    <!-- Campo HORASP-->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['HORASP']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> tarea -> getHorasPlan() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo HORASR -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['HORASR']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> tarea -> getHorasReal() ;?>" name="correo" >
                        </div>
                    </div>

                    <!-- Campo Miembro -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['MIEMBRO']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> tarea -> getMiembro() -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Proyecto -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['PROYECTO']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> tarea -> getProyecto() -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Descripcion -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['DESCRIPCION']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> tarea -> getDescripcion(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Estado -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['ESTADO']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> tarea -> getEstadoTarea(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Comentario -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['COMENTARIO']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> tarea -> getComentario(); ?>" name="nombre" >
                        </div>
                    </div>


                    <a href="../Controllers/MIEMBRO_Controller.php?accion=showcurrent"> <?php echo $strings['Volver']; ?> </a>
                </ul>



            </form>

        </h2>
        </body>
        </html>
        <?php
    }
}


?>