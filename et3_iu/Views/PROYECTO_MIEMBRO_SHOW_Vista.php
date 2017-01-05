<?php

class ProyectoMiembro_Show
{
//VISTA PARA MOSTRAR CONSULTA DE PROYECTO

    function __construct($volver)
    {
        $this->volver = $volver;
        $this->render();
    }

    function render()
    {
        ?>
        <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" /></head>
        <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
        <p>
        <h1><span class="form-title">



                        <?php echo $strings['Consultar miembro proyecto']; ?><br>

        </h1>
        </p>
        <h2>

            </p>
            <br><br>
            <form action='PROYECTO_Controller.php' method='post'>
                <ul class="form-style-1">
                    <!-- Campo Usuario -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"><?php echo $strings['USUARIO']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="ID_MIEMBRO"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="id" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  name="MIEMBRO_NOMBRE"   title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <!-- Campo Apellido -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="FECHAI" class="control-label"><?php echo $strings['APELLIDOS']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="MIEMBRO_APELLIDO"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>
                    <!-- Campo Fecha Entrega -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="FECHAE" class="control-label"><?php echo $strings['EMAIL']; ?>:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="MIEMBRO_EMAIL"  title="<?php echo $strings['error trabajador']; ?>" >
                        </div>
                    </div>


                    <input hidden type='text' name='BUSCAR' value='BUSCAR'>


                    <input type="button" value="volver atrás" name="volver atrás2" onclick="history.back()" />


                    <input type='submit' name='accion' value='<?php echo $strings['Consultar Miembro']; ?>'>

            </form>

        </h2>


        <?php


    }
}
?>


