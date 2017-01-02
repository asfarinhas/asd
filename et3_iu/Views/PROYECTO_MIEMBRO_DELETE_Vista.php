<?php

class ProyectoMiembro_Borrar{

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
        <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" /></head>
        <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
        <p>
        <h1><span class="form-title">
			        <?php echo $strings['Borrar Miembro']; ?><br>

        </h1>
        </p>
        <h2>

            </p>
            <br><br>
            <form action='PROYECTO_Controller.php' method='post'>
                <ul class="form-style-1">
                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly value="<?php echo $this->datos['EMP_NOMBRE'];?>"class="form-control" name="MIEMBRO_APELLIDO"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <!-- Campo ID -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="id" class="control-label"><?php echo $strings['APELLIDOS']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" readonly name="MIEMBRO_APELLIDO"  value="<?php echo $this->datos['EMP_APELLIDO'];?>" title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <!-- Campo Fecha Entrega -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="USUARIO" class="control-label"><?php echo $strings['USUARIO']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly value="<?php echo $this->datos['EMP_USER'];?>"class="form-control" name="ID_MIEMBRO"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>

                    <!-- Campo Fecha Entrega -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="FECHAE" class="control-label"><?php echo $strings['EMAIL']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly value="<?php echo $this->datos['EMP_EMAIL'];?>"class="form-control" name="MIEMBRO_EMAIL"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <input hidden type='text' name='BORRAR' value='BORRAR'>

                    <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                    <input type='submit' name='accion' value='<?php echo $strings['Eliminar Miembros']; ?>'>

            </form>

        </h2>


        </div>

        <?php
    }
} // fin de la clase
?>
