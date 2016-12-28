<?php
/**
 * Created by PhpStorm.
 * User: Claudia
 * Date: 28/12/2016
 * Time: 17:12
 */
class MiembroEditView{

    private $datos;

    function __construct($datos)
    {
        $this->datos = $datos;
    }


    public function getDatos()
    {
        return $this->datos;
    }

    function showView(){

        $miembro = $this->getDatos();

?>

<form action="MIEMBRO_Controller.php" name="formEditMiembro" enctype="multipart/form-data" method="post" onsubmit=" ">


    <div>
        <?//= $strings['nombre']?> <br/>
        <input type="text" name="NOMBRE" value="<?= $miembro->getNombre()?>" placeholder="<?//= $strings['nombre']?>"  id="nombre" required ><br/>
    </div>

    <div>
        <?//= $strings['apellidos']?> <br/>
        <input type="text" name="APELLIDOS" value="<?= $miembro->getApellidos()?>" placeholder="<?//= $strings['Descripcion']?>"  id="apellidos" required ><br/>
    </div>

    <div>
        <?//= $strings['usuario']?> <br/>
        <input type="date" name="USUARIO" value="<?= $miembro->getUsuario()?>" placeholder="<?//= $strings['usuario']?>"  id="usuario" required ><br/>
    </div>

    <div>
        <?//= $strings['contraseña']?> <br/>
        <input type="date" name="CONTRASEÑA" value="<?= $miembro->getContraseña()?>" placeholder="<?//= $strings['usuario']?>"  id="contraseña" required ><br/>
    </div>

    <div>
        <?//= $strings['correo']?> <br/>
        <input type="date" name="CORREO" value="<?= $miembro->getCorreo()?>" placeholder="<?//= $strings['usuario']?>"  id="correo" required ><br/>
    </div>

    <input type="submit" name="accion" value="edit"><?//= $strings['Edit'] ?>
  <?php
    }
}

?>