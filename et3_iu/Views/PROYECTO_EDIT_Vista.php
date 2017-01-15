<?php

class Proyecto_Modificar{

    private $valores;
    private $volver;
//VISTA PARA LA MODIFICACIÓN DE EMPLEADOS
    function __construct($valores,$volver){
        $this->datos = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render(){

        include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
        ?>

        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>
            <link href="../Styles/sweetalert.css" rel="stylesheet">
            <script src="../js/sweetalert.min.js"></script>
            <script src="../js/validaciones.js"></script>
            <script src="../js/md5.js"></script>
            <link href="../Styles/tcal.css" rel="stylesheet">
            <script src="../js/tcal.js"></script>
        </head>
        <div>
            <p>
            <h2>
                <?php
                include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
                ?>
            </h2>
            </p>
            <p>
            <h1>
			<span class="form-title">
			<?php echo $strings['Modificar Proyecto'] ?><br>
                                                                        <title><?php echo $strings['Editar Proyecto'];?></title>

            </h1>
            <h3>

                <form action='PROYECTO_Controller.php' method='post' name="formEditProyecto" onsubmit="return validarFormEditProyecto()">
                    <ul class="form-style-1">
                        <!-- Campo Nombre -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['NOMBRE'];?>"class="form-control" name="PROYECTO_NOMBRE" id="PROYECTO_NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" onblur="validarCampo(document.formEditProyecto.PROYECTO_NOMBRE);validarNombreTarea(document.formEditProyecto.PROYECTO_NOMBRE);evitarProhibidos(document.formEditProyecto.PROYECTO_NOMBRE)">
                            </div>
                        </div>
                        <!-- Campo ID -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="id" class="control-label"><?php echo $strings['ID_PROYECTO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control"  name="ID_PROYECTO" id="ID_PROYECTO" value="<?php echo $this->datos['ID_PROYECTO'];?>" title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Descripción -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="descripcion" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea name="PROYECTO_DESCRIPCION" id="PROYECTO_DESCRIPCION" onblur="validarCampo(document.formEditProyecto.PROYECTO_DESCRIPCION);evitarProhibidos(document.formEditProyecto.PROYECTO_DESCRIPCION);longitud200(document.formEditProyecto.PROYECTO_DESCRIPCION)"><?php echo $this->datos['DESCRIPCION'];?></textarea>                      </div>
                        </div>
                        <!-- Campo Fecha Inicio -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAI" class="control-label"><?php echo $strings['FECHAI']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" value="<?php echo $this->datos['FECHAI'];?>" class="tcal" name="PROYECTO_FECHAI" id="PROYECTO_FECHAI" title="<?php echo $strings['error trabajador']; ?>" onblur="validarCampo(document.formEditProyecto.PROYECTO_FECHAI);validarFecha(document.formEditProyecto.PROYECTO_FECHAI)">
                            </div>
                        </div>
                        <!-- Campo Fecha Entrega -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAE" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date"  value="<?php echo $this->datos['FECHAE'];?>"class="tcal" name="PROYECTO_FECHAE" id="PROYECTO_FECHAE" title="<?php echo $strings['error trabajador']; ?>" onblur="validarCampo(document.formEditProyecto.PROYECTO_FECHAE);validarFecha(document.formEditProyecto.PROYECTO_FECHAE)">
                            </div>
                        </div>

                        <!-- Campo Fecha Inicio Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAIP" class="control-label"><?php echo $strings['FECHAIP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date"  value="<?php echo $this->datos['FECHAIP'];?>"class="tcal" name="PROYECTO_FECHAIP" id="PROYECTO_FECHAIP" title="<?php echo $strings['error trabajador']; ?>" onblur="validarCampo(document.formEditProyecto.PROYECTO_FECHAIP);validarFecha(document.formEditProyecto.PROYECTO_FECHAIP)">
                            </div>
                        </div>

                        <!-- Campo Fecha Final Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAFP" class="control-label"><?php echo $strings['FECHAFP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date"  value="<?php echo $this->datos['FECHAFP'];?>"class="tcal" name="PROYECTO_FECHAFP" id="PROYECTO_FECHAFP" title="<?php echo $strings['error trabajador']; ?>" onblur="validarCampo(document.formEditProyecto.PROYECTO_FECHAFP);validarFecha(document.formEditProyecto.PROYECTO_FECHAFP)">
                            </div>
                        </div>

                        <!-- Campo Numero miembros -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numeromiembros" class="control-label"><?php echo $strings['NUMEROMIEMBROS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['NUMEROMIEMBROS'];?>"class="form-control" name="PROYECTO_NUMEROMIEMBROS" id="PROYECTO_NUMEROMIEMBROS" title="<?php echo $strings['error trabajador']; ?>" onblur="validarNumMiembros(document.formEditProyecto.PROYECTO_NUMEROMIEMBROS)">                            </div>
                        </div>
                        <!-- Campo Numero horas -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numerohoras" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['NUMEROHORAS'];?>"class="form-control" name="PROYECTO_NUMEROHORAS" id="PROYECTO_NUMEROHORAS" title="<?php echo $strings['error trabajador']; ?>" onblur="validarNumHoras(document.formEditProyecto.PROYECTO_NUMEROHORAS)">                            </div>
                        </div>

                        <!-- Campo Director -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="director" class="control-label"><?php echo $strings['DIRECTOR']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  readonly value="<?php echo $this->datos['DIRECTOR'];?>"class="form-control" name="PROYECTO_DIRECTOR" id="PROYECTO_DIRECTOR" title="<?php echo $strings['error trabajador']; ?>" >                            </div>
                        </div>
                        <!-- Campo Borrado -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="borrado" class="control-label"><?php echo $strings['BORRADO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <Select name="BORRADO">
                                    <?php if($this->datos['BORRADO'] == '0') { ?>
                                    <option selected value="Activo"><?php echo $strings['Activo'];?></option>
                                    <option value="Inactivo"><?php echo $strings['Inactivo'];?></option>
                                    <?php }else{ ?>
                                      <option  value="Activo"><?php echo $strings['Activo'];?></option>
                                    <option selected value="Inactivo"><?php echo $strings['Inactivo'];?></option>
                                    <?php } ?>
                                    </Select>
                        </div>


                            <input type="button" value="volver atrás" name="volver atrás2" onclick="history.back()" />
                        <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="valida_envia()" >
                </form>
        </p>

</div>
        </body>
        </html>
        <?php
    } // fin del metodo render
} // fin de la clase
?>
