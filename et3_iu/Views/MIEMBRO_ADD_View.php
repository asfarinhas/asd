<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 1/1/17
 * Time: 13:28
 */

class MiembroAddView{

function __construct(){
    $this->showView();
}


function showView(){

    $strings = array();
    include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

?>
<head>
    <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>

</head>
<div>
    <h1><span class="form-title"><?=$strings['ModificarMiembro']?></h1>

    <form action="../Controllers/MIEMBRO_Controller.php" name="formAddMiembro" enctype="multipart/form-data" method="post" onsubmit=" ">


        <div>
            <?= $strings['Nombre']?> <br/>
            <input type="text" name="nombre" placeholder="<?= $strings['Nombre']?>"  id="nombre" required ><br/>
        </div>

        <div>
            <?= $strings['EMP_APELLIDO']?> <br/>
            <input type="text" name="apellidos" placeholder="<?= $strings['EMP_APELLIDO']?>"  id="apellidos" required ><br/>
        </div>

        <div>
            <?= $strings['EMP_USER']?> <br/>
            <input type="text" name="usuario" placeholder="<?= $strings['EMP_USER']?>"  id="usuario" required ><br/>
        </div>

        <div>
            <?= $strings['EMP_PASSWORD']?> <br/>
            <input type="password" name="password"  placeholder="<?= $strings['EMP_PASSWORD']?>"  id="password" required ><br/>
        </div>

        <div>
            <?= $strings['EMP_EMAIL']?> <br/>
            <input type="email" name="correo" placeholder="ej: aaaa@aaaa.aa"  id="correo" required ><br/>
        </div>

        <input type="hidden"  name="accion" value="add">
        <input type='submit' onclick="DoSubmit()" value="<?=$strings['Insertar'] ?>"><br/><br/>
    </form>
    <a class="form-link" href='../Controllers/MIEMBRO_Controller.php'><?=$strings['Volver']?> </a>
</div>
<?php
}
}