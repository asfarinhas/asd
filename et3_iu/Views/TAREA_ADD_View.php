<?php
/**
 * Created by PhpStorm.
 * User: Ismael
 * Date: 30/12/2016
 * Time: 18:40
 */
 class TAREA_ADD_Vista{


     public function __construct( array $miembros){

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
                    <h1><span class="form-title"><?=$strings['Insertar Tarea']?></h1>
                    <h3>
                        <form  id="form" name="form" action='TAREA_Controller.php' method='post' >
                            <ul class="form-style-1">
                                <li><?=$strings['Nombre']?>:    <input type="text" name="nombre" required pattern="[A-z 0-9]*" ></li>
                                <li><?=$strings['fecha_I_P']?>: <input type="date" name="fecha_I_P" min="<?=date('Y-m-d')?>" ></li>
                                <li><?=$strings['fecha_E_P']?>: <input type="date" name="fecha_E_P" min="<?=date('Y-m-d')?>" ></li>
                                <li><?=$strings['horas_P']?>:   <input type="number" name="horas_P" min="0"></li>
                                <li><?=$strings['asignado']?>:  <select name="miembro">
                                        <?php foreach ($this->miembros as $miembro){
                                            echo "<option value='{$miembro->getUsuario()}'>{$miembro->getUsuario()}</option>";
                                        }?>
                                    </select></li>
                                <li><?=$strings['descripcion']?>:<br> <textarea name = "descripcion"></textarea></li>
                                <li><?=$strings['comentarios']?>:<br> <textarea name = "comentarios"></textarea></li>
                                <input type="hidden" name="accion" value = "add_tarea">
                                <input type="hidden" name="proyecto_id" value = "<?=$_REQUEST["proyecto_id"]?>">
                                <input type='submit' onclick="DoSubmit()" value=<?=$strings['Insertar'] ?>>
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