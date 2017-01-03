<?php

class Correo_Default{
    //VISTA PARA LISTAR PROYECTOS

    private $datos;
    private $volver;

    function __construct($array, $volver){
    $this->datos = $array;
    $this->volver = $volver;
    $this->render();

}

    function render(){
        ?>

        <p>
            <h2>
                <div>
                    <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
                        <?php   include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
                    </head>
                    <div id="wrapper">
                        <nav>
                            <div class="menu">
                                <ul>
                                    <li><a href="../Functions/Desconectar.php"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
                                    <li><?php echo $strings['Usuario'].": ". $_SESSION['login']; ?></li>

                                </ul>


                                <a href='./CORREO_Controller.php?accion=<?php echo $strings['Insertar']?>'><?php echo $strings['Enviar correo']?></a>
                                




                            </div>
                        </nav>
                      <tr> <font color="white"> <?=$strings['CorreosEnviados'] ?> </font></tr>
                        <table id="btable" border = 1>
                            <tr>
                                <th>  <?=$strings['ID_CORREO'] ?> </th>
                                <th>  <?=$strings['RECEPTOR'] ?> </th>
                                <th>  <?=$strings['FECHAENVIO'] ?> </th>
                            </tr>
                            <?php
                            // PARA QUE??
                            if($this->datos != NULL){

                                foreach($this->datos as $correo){
                                  echo "<tr> <td> " . $notificacion['ID_CORREO']."</td>";
                                  echo "<td> " . $notificacion['RECEPTOR']."</td>";
                                  echo "<td> " . $notificacion['FECHAENVIO']."</td>";

        ?>



                            <td>
                                <a href='CORREO_Controller.php?ID_NOTIFICACION=<?php echo $correo['ID_CORREO'] . '&accion='.$strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
                            </td>
                            <td>
                                <a href='CORREO_Controller.php?ID_NOTIFICACION=<?php echo $correo['ID_CORREO'] . '&accion='.$strings['Ver']; ?>'><?php echo $strings['Ver'] ?></a>
                            </td>

                            </tr>
    <?php                        }

    } //fin metodo render
    ?>
</table>

</div>
<h3>
<p>
<?php
echo '<a class="form-link" href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
 ?>





</h3>
</p>

</div>

<?php
}
}
