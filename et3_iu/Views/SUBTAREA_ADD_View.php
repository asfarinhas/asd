<?php
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
class Subtarea_add
{

    private $array_datos;

    public function __construct($array_datos)
    {
        $this->array_datos = $array_datos;

    }

    public function getArrayDatos()
    {
        return $this->array_datos;
    }

    public function showView()
    {
        $miembros = $this->getArrayDatos();
        //**********************************************--------FALTA EL CAMPO TAREA PADRE--------***************************
        //*************************************************************************************************************
        ?>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>

        </head>

        <form action="TAREA_Controller.php" name="formAddSubtarea" enctype="multipart/form-data" method="post" onsubmit=" ">

         <div> <!-- ID de la tarea padre-->
             <input type="number" hidden name="tarea_padre" value="<?=$_GET['idpadre']?>" >
         </div>

         <div>
             <?//= $strings['nombre']?> <br/>
             <input type="text" name="nombre" placeholder="<?//= $strings['nombre']?>"  id="nombre" required ><br/>
         </div>

        <div>
            <?//= $strings['Descripcion']?> <br/>
            <input type="text" name="descripcion" placeholder="<?//= $strings['Descripcion']?>"  id="descripcion" required ><br/>
        </div>

        <div>
            <?//= $strings['Fechainicioplan']?> <br/>
            <input type="date" name="fecha_inicio_plan" placeholder="dd/mm/aaaa"  id="fecha_inicio_plan" required ><br/>
        </div>

        <div>
            <? //= $strings['Fechaentregaplan']?> <br/>
            <input type="date" name="fecha_entrega_plan" placeholder="dd/mm/aaaa"  id="fecha_entrega_plan" required ><br/>
        </div>

         <div>
             <?//= $strings['Fechainicioreal']?><br/> <!-- AÑADIR A DICCIONARIOS A PARTIR DE AQUI -->
             <input type="date" name="fecha_inicio_real" placeholder="dd/mm/aaaa"  id="fecha_inicio_real"><br/>
         </div>

         <div>
             <?//=$strings['Fechaentregareal']?><br/>
             <input type="date" name="fecha_entrega_real" placeholder="dd/mm/aaaa"  id="fecha_entrega_real"><br/>
         </div>

         <div>
             <?//=$strings['Horasplan']?><br/>
             <input type="number" name="horas_plan" placeholder="8"  id="horas_plan" required ><br/>
         </div>

        <div>
            <?//=$strings['Horasreal']?><br/>
            <input type="number" name="horas_real" placeholder="8"  id="horas_real"><br/>
        </div>

        <div>
            <?//=$strings['Miembro']?>

            <select name="miembro">
                <?php foreach ($miembros as $miembro): ?>
                    <option value="<?= $miembro["USUARIO"] ?>"><?= $miembro["NOMBRE"] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <?//=$strings['Estado']?>

            <select name="estado_tarea">
               <option value="Pendiente"><?//=$strings['Pendiente']?></option>
               <option value="Finalizado"><?//=$strings['Finalizado']?></option>
            </select>
        </div>

        <div>
            <?//=$strings['comentario']?><br/>
            <textarea type="textarea" name="comentario" rows="4" cols="50"></textarea>
        </div>

        <div>
         <!-- AÑADIR ENLACE A LA VISTA QUE CREA LOS ENTREGABLES -->
          <a href="" ><?//=$strings['AddEntregables']?></a><br/>
        </div>

         <input type="submit" name="accion" value="add"><?//= $strings['Add'] ?>
        <?php
    }
}
?>


