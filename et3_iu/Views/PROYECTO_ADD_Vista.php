<?php


class Proyecto_Add
{
    //VISTA PARA INSERTAR PAGINAS

    function __construct()
    {
        $this->render();
    }

    function render()
    {
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
                <h3>
			<span class="form-title">
			<?php echo $strings['Insertar Proyecto'] ?>
                <br>
                   <title><?php echo $strings['Insertar Proyecto'];?></title>

            </h1>


                <form action='PROYECTO_Controller.php' id="form" name="formAddProyecto" method='post' onsubmit="return validarFormAddProyecto()">
                    <ul class="form-style-1">
                        <!-- Campo Nombre -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NOMBRE" id="PROYECTO_NOMBRE" onblur="validarCampo(document.formAddProyecto.PROYECTO_NOMBRE);validarNombreTarea(document.formAddProyecto.PROYECTO_NOMBRE);evitarProhibidos(document.formAddProyecto.PROYECTO_NOMBRE)" >
                            </div>
                        </div>
                        <!-- Campo Descripcion -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="descripcion" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea name="PROYECTO_DESCRIPCION" id="PROYECTO_DESCRIPCION" onblur="validarCampo(document.formAddProyecto.PROYECTO_DESCRIPCION);evitarProhibidos(document.formAddProyecto.PROYECTO_DESCRIPCION);longitud200(document.formAddProyecto.PROYECTO_DESCRIPCION)"></textarea>
                            </div>
                        </div>
                        <!-- Campo Fecha Inicio -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAI" class="control-label"><?php echo $strings['FECHAI']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input class="tcal"  placeholder="<?php $strings['FECHAI'];?>" type="date" name="PROYECTO_FECHAI" value="<?php echo date("Y-m-d",mktime()) ?>" id="PROYECTO_FECHAI" onblur="validarCampo(document.formAddProyecto.PROYECTO_FECHAI);validarFecha(document.formAddProyecto.PROYECTO_FECHAI)">
                            </div>
                        </div>
                        <!-- Campo Fecha Entrega -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAE" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="tcal" name="PROYECTO_FECHAE" value="<?php echo date("Y-m-d",mktime()) ?>"  id="PROYECTO_FECHAE" onblur="validarCampo(document.formAddProyecto.PROYECTO_FECHAE);validarFecha(document.formAddProyecto.PROYECTO_FECHAE)">
                            </div>
                        </div>

                        <!-- Campo Fecha Inicio Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAIP" class="control-label"><?php echo $strings['FECHAIP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="tcal" name="PROYECTO_FECHAIP" id="PROYECTO_FECHAIP" value="<?php echo date("Y-m-d",mktime()) ?>"  onblur="validarCampo(document.formAddProyecto.PROYECTO_FECHAIP);validarFecha(document.formAddProyecto.PROYECTO_FECHAIP)">
                            </div>
                        </div>

                        <!-- Campo Fecha Final Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAFP" class="control-label"><?php echo $strings['FECHAFP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="tcal" name="PROYECTO_FECHAFP" id="PROYECTO_FECHAFP" value="<?php echo date("Y-m-d",mktime()) ?>" onblur="validarCampo(document.formAddProyecto.PROYECTO_FECHAFP);validarFecha(document.formAddProyecto.PROYECTO_FECHAFP)">
                            </div>
                        </div>

                        <!-- Campo Numero miembros -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numeromiembros" class="control-label"><?php echo $strings['NUMEROMIEMBROS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NUMEROMIEMBROS" id="PROYECTO_NUMEROMIEMBROS" onblur="validarCampo(document.formAddProyecto.PROYECTO_NUMEROMIEMBROS);validarNumMiembros(document.formAddProyecto.PROYECTO_NUMEROMIEMBROS)">
                            </div>
                        </div>
                        <!-- Campo Numero horas -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numerohoras" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NUMEROHORAS" id="PROYECTO_NUMEROHORAS" onblur="validarCampo(document.formAddProyecto.PROYECTO_NUMEROHORAS);validarNumHoras(document.formAddProyecto.PROYECTO_NUMEROHORAS)"></li>
                            </div>
                        </div><!-- Campo Director -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="director" class="control-label"><?php echo $strings['DIRECTOR']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_DIRECTOR"  readonly value="<?php echo $_SESSION['login'];?>"  >
                            </div>
                        </div>




                        <input type="button" value="volver atrás" name="volver atrás2" onclick="history.back()" />
                        <input type='submit' onclick="return valida_envia()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                        <ul>

                        <br>

            </h3>
            </p>

        </div>

        <?php
    } //fin metodo render
}
?>