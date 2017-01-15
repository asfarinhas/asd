<?php

class Ticket_Borrar{

  private $datos;
  private $volver;
//VISTA PARA EL BORRADO DE EMPLEADOS
    function __construct($valores,$volver){
        $this->datos = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render(){
        ?>
        <head><link rel="stylesheet" href="../../../../../Users/Ismael/Downloads/ET3_Grupo4-master/et3_iu/Styles/styles.css" type="text/css" media="screen" /></head>
        <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
        <p>
        <h1><span class="form-title">
			        <?php echo $strings['Borrar ticket']; ?><br>

        </h1>
        </p>
        <h2>

            </p>
            <br><br>
            <form action='TICKET_Controller.php' method='post'>
                <ul class="form-style-1">
                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly value="<?php echo $this->datos['NOMBRE'];?>"class="form-control" name="TICKET_NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <!-- Campo ID -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="id" class="control-label"><?php echo $strings['ID_PROYECTO']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" readonly name="ID_PROYECTO"  value="<?php echo $this->datos['ID_PROYECTO'];?>" title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <!-- Campo Descripcion -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="descripcion" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <textarea name="DESCRIPCION" readonly  rows="10" cols="40"><?php echo $this->datos['DESCRIPCION'];?></textarea>
                        </div>
                    </div>
                    <!-- Campo Fecha Inicio -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="FECHAI" class="control-label"><?php echo $strings['FECHAI']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly value="<?php echo $this->datos['FECHAI'];?>"class="form-control" name="FECHAI"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <!-- Campo Fecha Entrega -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="FECHAE" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly value="<?php echo $this->datos['FECHAE'];?>"class="form-control" name="FECHAE"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>


                    <!-- Campo Numero horas -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="numerohoras" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly value="<?php echo $this->datos['NUMEROHORAS'];?>"class="form-control" name="NUMEROHORAS"  title="<?php echo $strings['error trabajador']; ?>" >                            </div>
                    </div>


                    <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                    <input type='submit' name='accion' value='<?php echo $strings['Borrar']; ?>'>

            </form>

        </h2>


        </div>

        <?php
    }
} // fin de la clase
?>