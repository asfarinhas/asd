<?php

class Proyecto_Show{
//VISTA PARA MOSTRAR CONSULTA DE PROYECTO

    function __construct(){
        $this->render();
    }

    function render(){
        ?>
        <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" /></head>
        <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
            <p>
                <h1><span class="form-title">
			        <?php echo $strings['Consultar proyecto']; ?><br>

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
                                <label for="nombre" class="control-label"><?php echo $strings['nombre']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>



                    <input type='submit' name='accion' value='<?php echo $strings['Consultar']; ?>'>
                                <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                    </form>

                </h2>


                </div>

        <?php
    }

}