<?php
//include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
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
             $strings['Nombre']<br/>

                 <input type="text" name="nombre" placeholder="Nombre" value="$array[0]->getNombre()" id="nombre" required ><br/>

             </div>-->
        <?php
    }
}
?>


