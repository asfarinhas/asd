<?php


class Subtarea_add
{

    private $array_datos;

    public function __construct($array_datos, $volver)
    {
        $this->array_datos = $array_datos;
        $this->volver = $volver;

    }

    public function getArrayDatos()
    {
        return $this->array_datos;
    }

    public function showView()
    {

        $miembros = $this->getArrayDatos();

        $strings = array();
        $idioma = $_SESSION['IDIOMA'];
        switch ($idioma) {
            case "Castellano":
                include '../Locates/Strings_Castellano.php';
                break;
            case "English":
                include '../Locates/Strings_English.php';
                break;
            case "Galego":
                include '../Locates/Strings_Galego.php';
            default:
                include '../Locates/Strings_Castellano.php';
        }
                //*************************************************************************
                //*************************************************************************************************************
                ?>
                <head>
                    <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>
                    <link href="../Styles/sweetalert.css" rel="stylesheet">
                    <script src="../js/sweetalert.min.js"></script>
                    <script src="../js/validaciones.js"></script>
                    <script src="../js/md5.js"></script>
                    <link href="../Styles/tcal.css" rel="stylesheet">
                    <script src="../js/tcal.js"></script>
                </head>
                <div>

                    <h1><span class="form-title"><?= $strings['InsertarSubtarea'] ?></h1>


                    <form action="../Controllers/TAREA_Controller.php" name="formAddSubtarea" enctype="multipart/form-data" method="post" onsubmit=" ">
                        <ul class="form-style-1">
                        <div> <!-- ID de la tarea padre-->
                            <input type="number" hidden name="tarea_padre" value="<?=$_REQUEST['tarea_padre']?>">
                        </div>

                        <div> <!-- ID de proyecto-->
                            <input type="number" hidden name="proyecto_id" value="<?=$_REQUEST['proyecto_id'] ?>">
                        </div>

                        <div>
                            <?= $strings['Nombre'] ?> <br/>
                            <input type="text" name="nombre" placeholder="<?= $strings['Nombre'] ?>" id="nombre" onblur="validarCampo(document.formAddSubtarea.nombre);validarNombreTarea(document.formAddSubtarea.nombre);evitarProhibidos(document.formAddSubtarea.nombre)" ><br/>
                        </div>

                        <div>
                            <?= $strings['Descripcion'] ?> <br/>
                            <input type="text" name="descripcion" placeholder="<?= $strings['Descripcion'] ?>" id="descripcion" onblur="validarCampo(document.formAddSubtarea.descripcion);evitarProhibidos(document.formAddSubtarea.descripcion);longitud200(document.formAddSubtarea.descripcion)"><br/>
                        </div>

                        <div>
                            <?= $strings['Fechainicioplan'] ?> <br/>
                            <input type="date" class = "tcal" name="fecha_inicio_plan" placeholder="dd/mm/aaaa" id="fecha_inicio_plan" value="<?php echo date("Y-m-d",mktime()) ?>" onblur="validarCampo(document.formAddSubtarea.fecha_inicio_plan);validarFecha(document.formAddSubtarea.fecha_inicio_plan)" ><br/>
                        </div>

                        <div>
                            <?= $strings['Fechaentregaplan'] ?> <br/>
                            <input type="date" class = "tcal" name="fecha_entrega_plan" placeholder="dd/mm/aaaa" id="fecha_entrega_plan" value="<?php echo date("Y-m-d",mktime()) ?>" onblur="validarCampo(document.formAddSubtarea.fecha_entrega_plan);validarFecha(document.formAddSubtarea.fecha_entrega_plan)" ><br/>
                        </div>


                        <div>
                            <?= $strings['horas_P'] ?><br/>
                            <input type="number" name="horas_plan" placeholder="8" id="horas_plan" onblur="validarCampo(document.formAddSubtarea.horas_plan);soloNumero(document.formAddSubtarea.horas_plan);validarHoras(document.formAddSubtarea.horas_plan)"><br/>
                        </div>


                        <div>
                            <?= $strings['asignado'] ?>

                            <select name="miembro">
                                <?php foreach ($miembros as $miembro): ?>
                                    <option value="<?= $miembro->getUsuario() ?>"><?= $miembro->getUsuario() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div>
                            <?= $strings['comentarios'] ?><br/>
                            <textarea type="textarea" name="comentario" id="comentario" onblur="validarCampo(document.formAddSubtarea.comentario);evitarProhibidos(document.formAddSubtarea.comentario);longitud100(document.formAddSubtarea.comentario)"></textarea>
                        </div>

                        <input type="hidden" name="accion" value="add_subtarea">
                        <input type='submit' onclick="DoSubmit()" value="<?= $strings['Insertar'] ?>"><br/><br/>
                        </ul>
                    </form>
                    <a class="form-link" href='<?=$this->volver?>'><?= $strings['Volver'] ?> </a>
                </div>
                <?php
        }

}
?>


