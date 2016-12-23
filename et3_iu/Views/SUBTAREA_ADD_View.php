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

        <!-- <form action="" name="formAddSubtarea" enctype="multipart/form-data" method="post" onsubmit=" ">

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
            <input type="text" name="fecha_inicio_plan" placeholder="<?//= $strings['Fechainicioplan']?>"  id="fecha_inicio_plan" required ><br/>
        </div>

        <div>
            <? //= $strings['Fechaentregaplan']?> <br/>
            <input type="text" name="fecha_entrega_plan" placeholder="<?//= $strings['Fechaentregaplan']?>"  id="fecha_entrega_plan" required ><br/>
        </div>-->

        <?php
    }
}
?>


