<?php

class Ticket_Show{
//VISTA PARA MOSTRAR CONSULTA DE PROYECTO



    function __construct($buscar,$datos,$volver){
        $this->datos=$datos;
        $this->buscar= $buscar;
        $this->volver = $volver;
        $this->render();
    }

    function render(){
        ?>
        <head><link rel="stylesheet" href="../../../../../Users/Ismael/Downloads/ET3_Grupo4-master/et3_iu/Styles/styles.css" type="text/css" media="screen" /></head>
        <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
            <p>
                <h1><span class="form-title">



              <?php  if($this->buscar!='buscar'){

			         echo $strings['Consultar ticket'];?><br>



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
                                <input type="text" class="form-control"  name="NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo ID -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="id" class="control-label"><?php echo $strings['ID_TICKET']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="ID_TICKET"   title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>


                        <!-- Campo Fecha Inicio -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['FECHAI']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  name="FECHAI" value="<?php echo $this->datos['NOMBRE'] ;?>" title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Fecha Entrega -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" value="<?php echo $this->datos['NOMBRE'] ;?>" name="FECHAE"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Descripcion -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $this->datos['NOMBRE'] ;?>" name="DESCRIPCION"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Comentario -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['COMENTARIO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" value="<?php echo $this->datos['NOMBRE'] ;?>" name="COMENTARIO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Numero Horas -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" value="<?php echo $this->datos['NOMBRE'] ;?>" name="NUMEROHORAS"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Proyecto -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['PROYECTO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" value="<?php echo $this->datos['NOMBRE'] ;?>" name="ID_PROYECTO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Miembro -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['MIEMBRO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" value="<?php echo $this->datos['NOMBRE'] ;?>" name="ID_MIEMBRO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Estado -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['ESTADO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" value="<?php echo $this->datos['ID_TICKET'] ;?>" name="ESTADO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>





                                <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                    </form>

                </h2>



                <?php }else{

        echo $strings['Consultar ticket']; ?><br>

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
                                <input type="text" readonly value="<?php echo $this->datos['NOMBRE'];?>"class="form-control" name="PROYECTO_NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo ID -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="id" class="control-label"><?php echo $strings['ID_TICKET']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="ID_PROYECTO"  value="<?php echo $this->datos['ID_TICKET'];?>" title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Fecha Entrega -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control"  readonly value="<?php echo $this->datos['FECHAE'] ;?>" name="FECHAE"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Descripcion -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly value="<?php echo $this->datos['DESCRIPCION'] ;?>" name="DESCRIPCION"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Comentario -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['COMENTARIO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" readonly value="<?php echo $this->datos['COMENTARIO'] ;?>" name="COMENTARIO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Numero Horas -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" readonly value="<?php echo $this->datos['NUMEROHORAS'] ;?>" name="NUMEROHORAS"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Proyecto -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['PROYECTO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" readonly value="<?php echo $this->datos['ID_PROYECTO'] ;?>" name="ID_PROYECTO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Miembro -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['MIEMBRO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" readonly value="<?php echo $this->datos['ID_MIEMBRO'] ;?>" name="ID_MIEMBRO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Estado -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['ESTADO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" readonly value="<?php echo $this->datos['ESTADO'] ;?>" name="ESTADO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>







                                <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                    </form>

                </h2>



        <?php
        }
        }

        }
