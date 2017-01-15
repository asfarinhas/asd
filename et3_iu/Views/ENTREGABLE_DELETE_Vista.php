<?php
/**
 * Created by PhpStorm.
 * User: Ismael
 * Date: 30/12/2016
 * Time: 18:40
 */
class ENTREGABLE_DELETE_Vista{
    public function __construct(Entregable $entregable,$volver){
        $this->entregable = $entregable;
        $this->volver = $volver;
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
            <h1><span class="form-title"><?=$strings['Eliminar Entregable']?></h1>
            <h3>
                <form  id="form" name="form" action='ENTREGABLE_Controller.php' method='post' >
                    <ul class="form-style-1">
                        <li><?=$strings['Nombre']?>:        <input type="text" readonly value="<?=$this->entregable->getNombre() ?>" ></li>
                        <li><?=$strings['Estado']?>:        <input type="text" readonly value="<?=$this->entregable->getEstado() ?>" ></li>
                        <li><?=$strings['url']?>:           <input type="text" readonly value="<?=$this->entregable->getURL()    ?>" ></li>
                        <li><?=$strings['Realizado Por']?>: <input type="text" readonly value="<?=$this->entregable->getMiembro()->getUsuario()?>" ></li>
                        <li><?=$strings['Fecha']?>:         <input type="text" readonly value="<?=$this->entregable->getFecha()->format("d/m/Y")?>" ></li>
                        <input type="hidden" name="entregable_ID" value = "<?=$this->entregable->getID()?>">
                        <input type="hidden" name="accion" value = "delete_entregable">
                        <input type='submit' onClick="return confirm('<?php echo $strings['Desea eliminar el entregable'] . "?";?>')" value=<?=$strings['Borrar'] ?>>
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