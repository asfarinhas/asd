/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 1/1/17
 * Time: 13:28
 */

class MiembroAddView{

    <form action="MIEMBRO_Controller.php" name ="formAddMiembro" enctype="multipart/form-data" method="post" onsubmit=" " >

        <div>
            <?//= $strings['Nombre']?> <br/>
            <input type="text" name="NOMBRE" value="<?= $miembro->getNombre()?>" placeholder="<?//= $strings['Nombre']?>"  id="nombre" required ><br/>
        </div>

        <div>
            <?//= $strings['Apellidos']?> <br/>
            <input type="text" name="APELLIDOS" value="<?= $miembro->getApellidos()?>" placeholder="<?//= $strings['Apellidos']?>"  id="apellidos" required ><br/>
        </div>

        <div>
            <?//= $strings['Usuario']?> <br/>
            <input type="date" name="USUARIO" value="<?= $miembro->getUsuario()?>" placeholder="<?//= $strings['Usuario']?>"  id="usuario" required ><br/>
        </div>

        <div>
            <?//= $strings['Contraseña']?> <br/>
            <input type="date" name="CONTRASEÑA" value="<?= $miembro->getContraseña()?>" placeholder="<?//= $strings['Contraseña']?>"  id="contraseña" required ><br/>
        </div>

        <div>
            <?//= $strings['Correo']?> <br/>
            <input type="date" name="CORREO" value="<?= $miembro->getCorreo()?>" placeholder="<?//= $strings['Correo']?>"  id="correo" required ><br/>
        </div>

        <input type="submit" name="accion" value="ADD"><?//= $strings['Add'] ?>
}