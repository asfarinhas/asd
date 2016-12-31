<?php
/**
 * Created by PhpStorm.
 * User: Ismael
 * Date: 30/12/2016
 * Time: 18:40
 */
class TAREA_EDIT_Vista{


    public function __construct(Tarea $tarea,Array $miembros){
        $this->tarea = $tarea;
        $this->miembros = $miembros;
        $this->render();

    }

    public function render(){
        include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
        ?>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
        </head>
        <div>
            <p>
            <h1><span class="form-title"><?=$strings['Modificar Tarea']?></h1>
            <h3>
                <form  id="form" name="form" action='TAREA_Controller.php' method='post' >
                    <ul class="form-style-1">
                        <li><?=$strings['Nombre']?>:    <input type="text" name="nombre" required pattern="[A-z 0-9]*" value="<?=$this->tarea->getNombre()?>" ></li>
                        <li><?=$strings['fecha_I_P']?>: <input type="date" name="fecha_I_P" required min="<?=date('Y-m-d')?>" value="<?=$this->tarea->getFechaInicioPlan()?>" ></li>
                        <li><?=$strings['fecha_I_R']?>: <input type="date" name="fecha_I_R"          min="<?=date('Y-m-d')?>" value="<?=$this->tarea->getFechaInicioReal()?>" ></li>
                        <li><?=$strings['fecha_E_P']?>: <input type="date" name="fecha_E_P" required min="<?=date('Y-m-d')?>" value="<?=$this->tarea->getFechaEntregaPlan()?>" ></li>
                        <li><?=$strings['fecha_E_R']?>: <input type="date" name="fecha_E_R"          min="<?=date('Y-m-d')?>" value="<?=$this->tarea->getFechaEntregaReal()?>" ></li>
                        <li><?=$strings['horas_P']?>:   <input type="number" name="horas_P" required min="0" value="<?=$this->tarea->getHorasPlan()?>"></li>
                        <li><?=$strings['horas_R']?>:   <input type="number" name="horas_R"          min="0" value="<?=$this->tarea->getHorasReal()?>"></li>
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
                        <li><?=$strings['descripcion']?>:<br> <textarea name = "descripcion"><?=$this->tarea->getDescripcion()?></textarea></li>
                        <li><?=$strings['comentarios']?>:<br> <textarea name = "comentarios"><?=$this->tarea->getComentario()?></textarea></li>
                        <input type="hidden" name="tarea_id" value = "<?=$this->tarea->getIdTarea()?>">
                        <input type="hidden" name="accion" value = "edit_tarea">
                        <input type="hidden" name="proyecto_id" value = "<?=$_REQUEST["proyecto_id"]?>">
                        <input type='submit' onclick="DoSubmit()" value=<?=$strings['Modificar'] ?>>
                    </ul>
                </form>
                <a class="form-link" href='TAREA_Controller.php'><?=$strings['Volver']?> </a>
            </h3>
            </p>
        </div>
        <?php
    }
}
?>