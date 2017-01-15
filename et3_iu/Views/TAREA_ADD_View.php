<?php
/**
 * Created by PhpStorm.
 * User: Ismael
 * Date: 30/12/2016
 * Time: 18:40
 */
 class TAREA_ADD_Vista{


     public function __construct( array $miembros, $volver){
         $this->volver = $volver;
         $this->miembros = $miembros;
         $this->render();

     }

    public function render(){
        $idioma = $_SESSION['IDIOMA'];
        switch ($idioma){
            case "Castellano":
                include '../Locates/Strings_Castellano.php';
                break;
            case "English":
                include '../Locates/Strings_English.php';
                break;
            case "Galego":
                include '../Locates/Strings_Galego.php';
            default:
                include '../Locates/Strings_Castellano.php';
        }
        ?>
            <head>
                <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>
                <link href="../Styles/sweetalert.css" rel="stylesheet">
                <script src="../js/sweetalert.min.js"></script>
                <script src="../js/validaciones.js"></script>
                <script src="../js/md5.js"></script>
                <link href="../Styles/tcal.css" rel="stylesheet">
                <script src="../js/tcal.js"></script>
            </head>
            <div>
                <p>
                    <h1><span class="form-title"><?=$strings['Insertar Tarea']?></h1>
                    <h3>
                        <form  id="form" name="formAddTarea" action='TAREA_Controller.php' method='post' onsubmit=" return validarFormAddTarea()">
                            <ul class="form-style-1">
                                <li><?=$strings['Nombre']?>:    <input type="text" name="nombre" id="nombre" onblur="validarCampo(document.formAddTarea.nombre);validarNombreTarea(document.formAddTarea.nombre);evitarProhibidos(document.formAddTarea.nombre)" ></li>
                                <li><?=$strings['fecha_I_P']?>: <input type="date" class = "tcal" name="fecha_I_P" id="fecha_I_P" value="<?php echo date("Y/m/d",mktime()) ?>" onblur="validarCampo(document.formAddTarea.fecha_I_P);validarFecha(document.formAddTarea.fecha_I_P)" ></li>
                                <li><?=$strings['fecha_E_P']?>: <input type="date" class = "tcal" name="fecha_E_P" id="fecha_E_P" value="<?php echo date("Y/m/d",mktime()) ?>" onblur="validarCampo(document.formAddTarea.fecha_I_P);validarFecha(document.formAddTarea.fecha_I_P)"></li>
                                <li><?=$strings['horas_P']?>:   <input type="number" name="horas_P" id="horas_P"  onblur="validarCampo(document.formAddTarea.horas_P);soloNumero(document.formAddTarea.horas_P);validarHoras(document.formAddTarea.horas_P)"></li>
                                <li><?=$strings['asignado']?>:  <select name="miembro">
                                        <?php foreach ($this->miembros as $miembro){
                                            echo "<option value='{$miembro->getUsuario()}'>{$miembro->getUsuario()}</option>";
                                        }?>
                                    </select></li>
                                <li><?=$strings['descripcion']?>:<br> <textarea name = "descripcion" id="descripcion" onblur="validarCampo(document.formAddTarea.descripcion);evitarProhibidos(document.formAddTarea.descripcion);longitud200(document.formAddTarea.descripcion)"></textarea></li>
                                <li><?=$strings['comentarios']?>:<br> <textarea name = "comentarios" id="comentarios" onblur="validarCampo(document.formAddTarea.comentarios);evitarProhibidos(document.formAddTarea.comentarios);longitud100(document.formAddTarea.comentarios)"></textarea></li>
                                <input type="hidden" name="accion" value = "add_tarea">
                                <input type="hidden" name="proyecto_id" value = "<?=$_REQUEST["proyecto_id"]?>">
                                <input type='submit' onclick="return validarFormAddTarea()" value=<?=$strings['Insertar'] ?>>
                            </ul>
                        </form>
                        <a class="form-link" href='<?=$this->volver?>'><?=$strings['Volver']?> </a>
                    </h3>
                </p>
            </div>
        <?php
    }
 }
?>