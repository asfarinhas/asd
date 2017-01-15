<?php
/**
 * Created by PhpStorm.
 * User: Ismael
 * Date: 30/12/2016
 * Time: 18:40
 */
class TAREA_EDIT_Vista{


    public function __construct(Tarea $tarea,Array $miembros,$volver){
        $this->tarea = $tarea;
        $this->miembros = $miembros;
        $this->volver = $volver;
        $this->render();

    }

    public function render(){
        $idioma = $_SESSION['IDIOMA'];
        switch ($idioma){
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
            <p>
            <h1><span class="form-title"><?=$strings['Modificar Tarea']?></h1>
            <h3>
                <form  id="form" name="formEditTarea" action='TAREA_Controller.php' method='post' onsubmit="return validarFormEditTarea()">
                    <ul class="form-style-1">
                        <li><?=$strings['Nombre']?>:    <input type="text" name="nombre" id="nombre"  value="<?=$this->tarea->getNombre()?>" onblur="validarCampo(document.formEditTarea.nombre);validarNombreTarea(document.formEditTarea.nombre);evitarProhibidos(document.formEditTarea.nombre)" ></li>
                        <li><?=$strings['fecha_I_P']?>: <input type="date" class = "tcal" name="fecha_I_P" id="fecha_I_P" min="<?=date('Y-m-d')?>" value="<?=$this->tarea->getFechaInicioPlan()?>" onblur="validarCampo(document.formEditTarea.fecha_I_P);validarFecha(document.formEditTarea.fecha_I_P)" ></li>
                        <li><?=$strings['fecha_I_R']?>: <input type="date" class = "tcal" name="fecha_I_R" id="fecha_I_R" min="<?=date('Y-m-d')?>" value="<?=$this->tarea->getFechaInicioReal()?>" onblur="validarCampo(document.formEditTarea.fecha_I_R);validarFecha(document.formEditTarea.fecha_I_R)"></li>
                        <li><?=$strings['fecha_E_P']?>: <input type="date" class = "tcal" name="fecha_E_P" id="fecha_E_P" min="<?=date('Y-m-d')?>" value="<?=$this->tarea->getFechaEntregaPlan()?>" onblur="validarCampo(document.formEditTarea.fecha_E_P);validarFecha(document.formEditTarea.fecha_E_P)"></li>
                        <li><?=$strings['fecha_E_R']?>: <input type="date" class = "tcal" name="fecha_E_R" id="fecha_E_R" min="<?=date('Y-m-d')?>" value="<?=$this->tarea->getFechaEntregaReal()?>" onblur="validarCampo(document.formEditTarea.fecha_E_R);validarFecha(document.formEditTarea.fecha_E_R)"></li>
                        <li><?=$strings['horas_P']?>:   <input type="number" name="horas_P" id="horas_P" value="<?=$this->tarea->getHorasPlan()?>" onblur="validarCampo(document.formEditTarea.horas_P);soloNumero(document.formEditTarea.horas_P);validarHoras(document.formEditTarea.horas_P)"></li>
                        <li><?=$strings['horas_R']?>:   <input type="number" name="horas_R" id="horas_R" value="<?=$this->tarea->getHorasReal()?>" onblur="validarCampo(document.formEditTarea.horas_R);soloNumero(document.formEditTarea.horas_R);validarHoras(document.formEditTarea.horas_R)"></li>
                        <li><?=$strings['asignado']?>:  <select name="miembro">
                                <?php foreach ($this->miembros as $miembro){
                                    if($miembro == $this->tarea->getMiembro()->getUsuario())
                                        echo "<option selected value='{$miembro->getUsuario()}'>{$miembro->getUsuario()}</option>";
                                    else
                                        echo "<option value='{$miembro->getUsuario()}'>{$miembro->getUsuario()}</option>";
                                }?>
                            </select></li>
                        <?php $estados = array("pendiente","finalizado"); ?>
                        <li><?=$strings['estado']?>:  <select name="estado">
                                <?php foreach ($estados as $estado){
                                    if($estado == $this->tarea->getEstadoTarea())
                                        echo "<option selected value='{$estado}'>{$estado}</option>";
                                    else
                                        echo "<option value='{$estado}'>{$estado}</option>";
                                }?>
                            </select></li>
                        <li><?=$strings['descripcion']?>:<br> <textarea name = "descripcion" id="descripcion" onblur="validarCampo(document.formEditTarea.descripcion);evitarProhibidos(document.formEditTarea.descripcion);longitud200(document.formEditTarea.descripcion)"><?=$this->tarea->getDescripcion()?></textarea></li>
                        <li><?=$strings['comentarios']?>:<br> <textarea name = "comentarios" id="comentarios" onblur="validarCampo(document.formEditTarea.comentarios);evitarProhibidos(document.formEditTarea.comentarios);longitud100(document.formEditTarea.comentarios)"><?=$this->tarea->getComentario()?></textarea></li>
                        <input type="hidden" name="tarea_id" value = "<?=$this->tarea->getIdTarea()?>">
                        <input type="hidden" name="accion" value = "edit_tarea">
                        <input type="hidden" name="proyecto_id" value = "<?=$_REQUEST["proyecto_id"]?>">
                        <input type='submit' onclick="validarFormEditTarea()" value=<?=$strings['Modificar'] ?>>
                    </ul>
                </form>
                <a class="form-link" href='<?=$this->volver?>'><?=$strings['Volver']?> </a>
            </h3>
            </p>
        </div>
        <?php
    }
}
?>