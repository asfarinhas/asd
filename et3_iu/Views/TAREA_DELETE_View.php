<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 1/1/17
 * Time: 13:47
 *
 */
class TAREA_DELETE_View{

    private $datos;

    function __construct($valores){
        $this->datos = $valores;
        $this->render(); //Es lo mismo que showView()
    }

    function render(){
        include  '../Locates/Strings_'.$_SESSION['IDIOMA'].'php';
        ?>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
        </head>

<div>
    <p>
    <h1><span class="form-title"><?=$strings['Eliminar Tarea']?></h1>
    <h3>
        <form  id="form" name="form" action='TAREA_Controller.php' method='post' >
            <ul class="form-style-1">
                <li><?=$strings['Nombre']?>:    <input type="text" name="nombre" value="<?=$this->tarea->getNombre()?>" ></li>
                <li><?=$strings['fecha_I_P']?>: <input type="date" name="fecha_I_P" value="<?=$this->tarea->getFechaInicioReal()?>" ></li>
                <li><?=$strings['fecha_E_P']?>: <input type="date" name="fecha_E_P" value="<?=$this->tarea->getFechaEntregaPlan()?>" ></li>
                <li><?=$strings['fecha_E_R']?>: <input type="date" name="fecha_E_R" value="<?=$this->tarea->getFechaEntregaReal()?>" ></li>
                <li><?=$strings['horas_P']?>:   <input type="number" name="horas_P" value="<?=$this->tarea->getHorasPlan()?>"></li>
                <li><?=$strings['horas_R']?>:   <input type="number" name="horas_R" value="<?=$this->tarea->getHorasReal()?>"></li>
                <li><?=$strings['asignado']?>:  <input name="asignado" value="<?=$this->tarea->getMiembro()->getUsuario()?>">
                <li><?=$strings['estado']?>:  <input name="estado" value="<?=$this->tarea->getEstado()?>">
                <li><?=$strings['descripcion']?>:<br> <textarea name = "descripcion"><?=$this->tarea->getDescripcion()?></textarea></li>
                <li><?=$strings['comentarios']?>:<br> <textarea name = "comentarios"><?=$this->tarea->getComentario()?></textarea></li>
                <input type="hidden" name="tarea_id" value = "<?=$_REQUEST["tareaIdDeShow"]?>">
                <input type="hidden" name="accion" value = "delete_tarea">
                <input type='submit' onclick="DoSubmit()" value=<?=$strings['Eliminar'] ?>>
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