<?php
/**
 * Created by PhpStorm.
 * User: Claudia
 * Date: 26/12/2016
 * Time: 19:55
 */
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
class Subtarea_edit{

private $array_datos;
private $array_miembros;


public function __construct($array_datos, $array_miembros)
{
    $this->array_datos = $array_datos;
    $this->array_miembros = $array_miembros;


}

public function getArrayDatos()
{
    return $this->array_datos;
}

public function getMiembros()
{
    return $this->array_miembros;
}


//CONSTRUYE LA VISTA
public function showView()
{
$datos = $this->getArrayDatos();    //datos de la subtarea
$miembros = $this->getMiembros();
//$entregables = $datos->getEntregable();

?>

<form action="TAREA_Controller.php" name="formAddSubtarea" enctype="multipart/form-data" method="post" onsubmit=" ">

    <div> <!-- ID de la tarea padre-->
        <input type="number" hidden name="tarea_padre" value="<?=$datos->getTareaPadre()->getIdTadrea()?>" >
    </div>

    <div>
        <?//= $strings['nombre']?> <br/>
        <input type="text" name="nombre" value="<?= $datos->getNombre()?>" placeholder="<?//= $strings['nombre']?>"  id="nombre" required ><br/>
    </div>

    <div>
        <?//= $strings['Descripcion']?> <br/>
        <input type="text" name="descripcion" value="<?= $datos->getDescripcion()?>" placeholder="<?//= $strings['Descripcion']?>"  id="descripcion" required ><br/>
    </div>

    <div>
        <?//= $strings['Fechainicioplan']?> <br/>
        <input type="date" name="fecha_inicio_plan" value="<?= $datos->getFechaInicioPlan()?>" placeholder="dd/mm/aaaa"  id="fecha_inicio_plan" required ><br/>
    </div>

    <div>
        <? //= $strings['Fechaentregaplan']?> <br/>
        <input type="date" name="fecha_entrega_plan" value="<?= $datos->getFechaEntregaPlan()?>" placeholder="dd/mm/aaaa"  id="fecha_entrega_plan" required ><br/>
    </div>

    <div>
        <?//= $strings['Fechainicioreal']?><br/> <!-- AÑADIR A DICCIONARIOS A PARTIR DE AQUI -->
        <input type="date" name="fecha_inicio_real" value="<?= $datos->getFechaInicioReal()?>"  placeholder="dd/mm/aaaa"  id="fecha_inicio_real"><br/>
    </div>

    <div>
        <?//=$strings['Fechaentregareal']?><br/>
        <input type="date" name="fecha_entrega_real" value="<?= $datos->getFechaEntregaReal()?>" placeholder="dd/mm/aaaa"  id="fecha_entrega_real"><br/>
    </div>

    <div>
        <?//=$strings['Horasplan']?><br/>
        <input type="number" name="horas_plan" value="<?= $datos->getHorasPlan()?>" placeholder="ej: 8"  id="horas_plan" required ><br/>
    </div>

    <div>
        <?//=$strings['Horasreal']?><br/>
        <input type="number" name="horas_real" value="<?= $datos->getHorasReal()?>" placeholder="ej: 8"  id="horas_real"><br/>
    </div>

    <div>
        <?//=$strings['Miembro']?>

        <select name="miembro"> <!-- Muestra listado de miembros del proyecto, guarda el nombre usuario-->
            <?php foreach ($miembros as $miembro): ?>
                <option <?php if($miembro->getUsuario()==$datos->getMiembro()){echo "selected";}?> value="<?= $miembro["USUARIO"] ?>"><?= $miembro["NOMBRE"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <?//=$strings['Estado']?>

        <select name="estado_tarea">
            <option <?php if($datos->getEstadoTarea()=="Pendiente"){echo "selected";}?> value="Pendiente"><?//=$strings['Pendiente']?></option>
            <option <?php if($datos->getEstadoTarea()=="Finalizado"){echo "selected";}?> value="Finalizado"><?//=$strings['Finalizado']?></option>
        </select>
    </div>

    <div>
        <?//=$strings['comentario']?><br/>
        <textarea type="textarea" name="comentario" value="<?= $datos->getComentario()?>" rows="4" cols="50"></textarea>
    </div>

    <div>
        <!-- AÑADIR ENLACE A LA VISTA QUE MODIFICA LOS ENTREGABLES -->
        <a href="" ><?//=$strings['ModifEntregables']?></a><br/>

    </div>

    <input type="submit" name="accion" value="edit"><?//= $strings['Edit'] ?>
    <?php
    }
    }
    ?>
