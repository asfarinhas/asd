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
       // $array = $this->array_datos;

        ?>

        <form action="" name="formAddSubtarea" enctype="multipart/form-data" method="post" onsubmit=" ">

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
            <input type="text" name="miembro" placeholder="<?//= $strings['nombre']?>"  id="miembro"><br/>



            <?php
    }
}
?>


