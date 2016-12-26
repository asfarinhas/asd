<?php

class Proyecto_Show{
//VISTA PARA MOSTRAR CONSULTA DE NOTIFICACION

    function __construct($buscar,$datos,$volver){
        $this->datos=$datos;
        $this->buscar= $buscar;
        $this->volver = $volver;
        $this->render();
    }

    function render(){
        ?>
        <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" /></head>
        <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
            <p>
                <h1><span class="form-title">

              <?php echo $strings['Ver notificacion']; ?><br>

                 </h1>
                </p>
                <h2>
                </p>
                <br><br>
                <form action='NOTIFICACION_Controller.php' method='post'>
                    <ul class="form-style-1">
                        <!-- Campo ID  -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="id" class="control-label"><?php echo $strings['ID_NOTIFICACION']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $this->datos['ID_NOTIFICACION'];?>"class="form-control" name="ID_NOTIFICACION"  title="<?php echo $strings['error notificacion']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Emisor -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="emisor" class="control-label"><?php echo $strings['EMISOR']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="EMISOR"  value="<?php echo $this->datos['EMISOR'];?>" title="<?php echo $strings['error notificacion']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Receptor -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="receptor" class="control-label"><?php echo $strings['RECEPTOR']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="RECEPTOR"  value="<?php echo $this->datos['RECEPTOR'];?>" title="<?php echo $strings['error notificacion']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Fecha envio -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="fechaenvio" class="control-label"><?php echo $strings['FECHAENVIO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $this->datos['FECHAENVIO'];?>"class="form-control" name="FECHAENVIO"  title="<?php echo $strings['error notificacion']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Fecha Lectura -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHALECTURA" class="control-label"><?php echo $strings['FECHALECTURA']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $this->datos['FECHALECTURA'];?>"class="form-control" name="FECHALECTURA"  title="<?php echo $strings['error notificacion']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Contenido -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="contenido" class="control-label"><?php echo $strings['CONTENIDO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea name="CONTENIDO" readonly  rows="10" cols="40"><?php echo $this->datos['CONTENIDO'];?></textarea>
                            </div>
                        </div>


                        <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                    </form>

                </h2>



        <?php
        }
    }

}
