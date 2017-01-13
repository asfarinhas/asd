<?php

class Proyecto_Show{
//VISTA PARA MOSTRAR CONSULTA DE PROYECTO

    function __construct($buscar,$array,$volver){
        $this->datos=$array;
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

              <?php  if($this->buscar!='buscar'){

			         echo $strings['Consultar proyecto']; ?><br>
			         <title><?php echo $strings['Consultar proyecto'];?></title>

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
                                <input type="text" class="form-control" name="PROYECTO_NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo ID -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="id" class="control-label"><?php echo $strings['ID_PROYECTO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="ID_PROYECTO"   title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Fecha Inicio -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAI" class="control-label"><?php echo $strings['FECHAI']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_FECHAI"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Fecha Entrega -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAE" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_FECHAE"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Fecha Inicio Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAIP" class="control-label"><?php echo $strings['FECHAIP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_FECHAIP"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Fecha Final Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAFP" class="control-label"><?php echo $strings['FECHAFP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_FECHAFP"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Numero miembros -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numeromiembros" class="control-label"><?php echo $strings['NUMEROMIEMBROS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NUMEROMIEMBROS"  title="<?php echo $strings['error trabajador']; ?>" >                            </div>
                        </div>
                        <!-- Campo Numero horas -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numerohoras" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NUMEROHORAS"  title="<?php echo $strings['error trabajador']; ?>" >                            </div>
                        </div>

                        <!-- Campo Director -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="director" class="control-label"><?php echo $strings['DIRECTOR']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_DIRECTOR"  title="<?php echo $strings['error trabajador']; ?>" >                            </div>
                        </div>

                            <input hidden type='text' name='BUSCAR' value='BUSCAR'>

                                <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                                <input type='submit' name='accion' value='<?php echo $strings['Consultar']; ?>'>

                    </form>

                </h2>

                <?php }else{

  echo $strings['Ver proyecto']; ?><br>
 <title><?php echo $strings['Ver proyecto'];?></title>
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
                                <input type="text" readonly value="<?php echo $this->datos['NOMBRE'];?>"class="form-control" name="PROYECTO_NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" >
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
                         <!-- Campo Descripción -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="descripcion" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                 <textarea name="PROYECTO_DESCRIPCION" readonly rows="10" cols="40"><?php echo $this->datos['DESCRIPCION'];?></textarea>                      </div>
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

                        <!-- Campo Fecha Inicio Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAIP" class="control-label"><?php echo $strings['FECHAIP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $this->datos['FECHAIP'];?>"class="form-control" name="FECHAIP"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Fecha Final Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAFP" class="control-label"><?php echo $strings['FECHAFP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $this->datos['FECHAFP'];?>"class="form-control" name="FECHAFP"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Numero miembros -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numeromiembros" class="control-label"><?php echo $strings['NUMEROMIEMBROS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $this->datos['NUMEROMIEMBROS'];?>"class="form-control" name="NUMEROMIEMBROS"  title="<?php echo $strings['error trabajador']; ?>" >                            </div>
                        </div>
                        <!-- Campo Numero horas -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numerohoras" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $this->datos['NUMEROHORAS'];?>"class="form-control" name="NUMEROHORAS"  title="<?php echo $strings['error trabajador']; ?>" >                            </div>
                        </div>


                    <!-- Campo Director -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="director" class="control-label"><?php echo $strings['DIRECTOR']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="PROYECTO_DIRECTOR" value="<?php echo $this->datos['DIRECTOR'];?>" title="<?php echo $strings['error trabajador']; ?>" >                            </div>
                        </div>




                                <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                    </form>

                </h2>



        <?php
        }
    }

}