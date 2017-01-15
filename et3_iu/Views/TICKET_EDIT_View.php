<?php

class Ticket_Modificar{

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
            <link rel="stylesheet" href="../../../../../Users/Ismael/Downloads/ET3_Grupo4-master/et3_iu/Styles/styles.css" type="text/css" media="screen"/>
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>
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
			<?php echo $strings['Modificar'] ?><br>
            </h1>
            <h3>

                <form action='TICKET_Controller.php' method='post' name="formEditTicket" onsubmit="return validarFormEditTicket()">
                    <ul class="form-style-1">
                        <!-- Campo Nombre -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['NOMBRE'];?>"class="form-control" name="NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" id="NOMBRE" onblur="validarNombreTarea(document.formEditTicket.NOMBRE)">
                            </div>
                        </div>

                        <!-- Campo Fecha Inicio -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['FECHAI']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['FECHAI'];?>"class="form-control" class="tcal"  name="FECHAI"  title="<?php echo $strings['error trabajador']; ?>" id="FECHAI" onblur="validarCampo(document.formEditTicket.FECHAI);validarFecha(document.formEditTicket.FECHAI)">
                            </div>
                        </div>

                        <!-- Campo Fecha Entrega -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['FECHAE'];?>"class="form-control" class="tcal" name="FECHAE"  title="<?php echo $strings['error trabajador']; ?>" id="FECHAE" onblur="validarCampo(document.formEditTicket.FECHAE);validarFecha(document.formEditTicket.FECHAE)">
                            </div>
                        </div>

                        <!-- Campo Descripcion -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['DESCRIPCION'];?>"class="form-control" name="DESCRIPCION"  title="<?php echo $strings['error trabajador']; ?>" id="DESCRIPCION" onblur="validarCampo(document.formEditTicket.DESCRIPCION);evitarProhibidos(document.formEditTicket.DESCRIPCION);longitud200(document.formEditTicket.DESCRIPCION)">
                            </div>
                        </div>

                        <!-- Campo Comentario -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['COMENTARIO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['COMENTARIO'];?>"class="form-control" name="COMENTARIO"  title="<?php echo $strings['error trabajador']; ?>" id="COMENTARIO" onblur="validarCampo(document.formEditTicket.COMENTARIO);evitarProhibidos(document.formEditTicket.COMENTARIO);longitud100(document.formEditTicket.COMENTARIO)">
                            </div>
                        </div>

                        <!-- Campo Numero Horas -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['NUMEROHORAS'];?>"class="form-control" name="NUMEROHORAS"  title="<?php echo $strings['error trabajador']; ?>" id="NUMEROHORAS" onblur="validarNumHoras(document.formEditTicket.NUMEROHORAS)">
                            </div>
                        </div>

                        <!-- Campo Proyecto -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['PROYECTO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['ID_PROYECTO'];?>"class="form-control" name="PROYECTO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Miembro -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['MIEMBRO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['ID_MIEMBRO'];?>"class="form-control" name="MIEMBRO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Estado -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['ESTADO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text"  value="<?php echo $this->datos['ESTADO'];?>"class="form-control" name="ESTADO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>





                        <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                        <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia()" >
                </form>
        </p>

</div>
        </body>
        </html>
        <?php
    } // fin del metodo render
} // fin de la clase
?>
