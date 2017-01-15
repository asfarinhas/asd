<?php

class ProyectoMiembro_Add
{
    //VISTA PARA INSERTAR PAGINAS
    private $datos1;
    private $buscar;
    private $volver;

    function __construct($array1,$buscar,$volver)
    {
        $this->datos1 = $array1;
        $this->buscar=$buscar;
        $this->volver = $volver;
        $this->render();
    }

    function render()
    {
        ?>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>
        </head>
        <div>
            <p>
            <h2>
                <?php
                include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
                ?>
            </h2>
            </p>
            <p>
            <h1>
			<span class="form-title">
			<?php echo $strings['Insertar Miembro'] ?><br>
                                                        <title><?php echo $strings['Insertar Miembro Proyecto'];?></title>

    </h1>

               <?php  if($this->buscar!='BUSCAR'){ ?>
                  <h3>

                  <form action='PROYECTO_Controller.php' method='post'>
                    <ul class="form-style-1">
                        <!-- Campo Usuario -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['USUARIO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ID_MIEMBRO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Nombre -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="id" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="MIEMBRO_NOMBRE"   title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Apellido -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAI" class="control-label"><?php echo $strings['APELLIDOS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="MIEMBRO_APELLIDO"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Fecha Entrega -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAE" class="control-label"><?php echo $strings['EMAIL']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="MIEMBRO_EMAIL"  title="<?php echo $strings['error trabajador']; ?>" >
                            </div>
                        </div>


                        <input hidden type='text' name='BUSCAR' value='BUSCAR'>


                        <input type="button" value="volver atrás" name="volver atrás2" onclick="history.back()" />


                        <input type='submit' name='accion' value='<?php echo $strings['Insertar Miembro']; ?>'>

                </form>
                  </h3>
        <p>
        <h2>
            <table id="btable" border = 1>
                <tr>
                    <th>  <?=$strings['NOMBRE'] ?> </th>
                    <th>  <?=$strings['APELLIDOS'] ?> </th>
                    <th>  <?=$strings['EMAIL'] ?> </th>
                    <th>  <?=$strings['USUARIO'] ?> </th>

                </tr>
                <?php
                foreach($this->datos1 as $miembro) {

                        echo "<tr><td> " . $miembro->getNombre() . "</td>";
                        echo "<td>" . $miembro->getApellidos() . "</td>";
                        echo "<td> " . $miembro->getCorreo() . "</td>";
                        echo "<td> " . $miembro->getUsuario() . "</td>";
                        ?>

                        <td>
                            <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $_REQUEST['ID_PROYECTO'] . '&ID_MIEMBRO=' . $miembro->getUsuario() . '&accion=' . $strings['Insertar Miembro']; ?>'><?php echo $strings['Añadir Miembro'] ?></a>
                        </td>
                        <td>
                            <a href='PROYECTO_Controller.php?ID_MIEMBRO=<?php echo $miembro->getUsuario() . '&accion=' . $strings['Ver Miembro']; ?>'><?php echo $strings['Ver'] ?></a>
                        </td>

                        </tr>
                    <?php
                }?>
            </table>

        </h2>
        </p>

             <?php }else{ ?>

            <table id="btable" border = 1>
            <tr>
                <th>  <?=$strings['NOMBRE'] ?> </th>
                <th>  <?=$strings['APELLIDOS'] ?> </th>
                <th>  <?=$strings['EMAIL'] ?> </th>
                <th>  <?=$strings['USUARIO'] ?> </th>

            </tr>
            <?php
            foreach($this->datos1 as $miembro) {
                echo "<tr><td> " . $miembro->getNombre() . "</td>";
                echo "<td>" . $miembro->getApellidos() . "</td>";
                echo "<td> " . $miembro->getCorreo() . "</td>";
                echo "<td> " . $miembro->getUsuario() . "</td>";
                ?>

                <td>

                    <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $_REQUEST['ID_PROYECTO'] . '&ID_MIEMBRO=' . $miembro->getUsuario() . '&accion=' . $strings['Insertar Miembro']; ?>'><?php echo $strings['Añadir Miembro'] ?></a>
                </td>
                <td>
                    <a href='PROYECTO_Controller.php?ID_MIEMBRO=<?php echo $miembro->getUsuario() . '&accion='.$strings['Ver Miembro']; ?>'><?php echo $strings['Ver'] ?></a>
                </td>

                </tr>
                <?php } ?>
                </table>

                </p>

        <form>
            <input type="button" value="volver atrás" name="volver atrás2" onclick="history.back()" />

        </form>

                </div>

                <?php
            } ?>
                <h3>
        <p>
</h3>
</p>
<?php
    } //fin metodo render
}
?>