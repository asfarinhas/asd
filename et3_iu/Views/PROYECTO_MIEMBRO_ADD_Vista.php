<?php

class ProyectoMiembro_Add
{
    //VISTA PARA INSERTAR PAGINAS
    private $datos1;
    private $volver;

    function __construct($array1,$volver)
    {
        $this->datos1 = $array1;
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
            </h1>
            <table id="btable" border = 1>
                <tr>
                    <th>  <?=$strings['NOMBRE'] ?> </th>
                    <th>  <?=$strings['APELLIDOS'] ?> </th>
                    <th>  <?=$strings['EMAIL'] ?> </th>
                    <th>  <?=$strings['USUARIO'] ?> </th>

                </tr>
                <?php
                foreach($this->datos1 as $miembro){
                    echo "<tr><td> " . $miembro->getNombre() ."</td>";
                    echo "<td>" . $miembro->getApellidos() ."</td>";
                    echo "<td> " . $miembro->getCorreo() ."</td>";
                    echo "<td> " . $miembro->getUsuario() ."</td>";
                    ?>

                    <td>
                        <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $proyecto['ID_PROYECTO'] . '&ID_MIEMBRO='. $miembro->getUsuario().'&accion='.$strings['Añadir Miembro']; ?>'><?php echo $strings['Añadir Miembro'] ?></a>
                    </td>
                    <td>
                        <a href='MIEMBRO_Controller.php?PROYECTO_NOMBRE=<?php echo $proyecto['NOMBRE'] . '&accion='.$strings['Ver']; ?>'><?php echo $strings['Ver'] ?></a>
                    </td>

                    </tr>
                <?php                        }
                ?>
            </table>
            <h3>

                <form action='PROYECTO_Controller.php' method='post'>
                    <ul class="form-style-1">
                        <!-- Campo Nombre -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NOMBRE"  title="<?php echo $strings['error nombre proyecto']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Descripcion -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="descripcion" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea name="PROYECTO_DESCRIPCION" rows="10" cols="40"></textarea>
                            </div>
                        </div>
                        <!-- Campo Fecha Inicio -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAI" class="control-label"><?php echo $strings['FECHAI']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_FECHAI"  title="<?php echo $strings['error nombre proyecto']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Fecha Entrega -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAE" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_FECHAE"  title="<?php echo $strings['error nombre proyecto']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Fecha Inicio Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAIP" class="control-label"><?php echo $strings['FECHAIP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_FECHAIP"  title="<?php echo $strings['error nombre proyecto']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Fecha Final Planificada -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="FECHAFP" class="control-label"><?php echo $strings['FECHAFP']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_FECHAFP"  title="<?php echo $strings['error nombre proyecto']; ?>" >
                            </div>
                        </div>

                        <!-- Campo Numero miembros -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numeromiembros" class="control-label"><?php echo $strings['NUMEROMIEMBROS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NUMEROMIEMBROS"  title="<?php echo $strings['error nombre proyecto']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Numero horas -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="numerohoras" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="PROYECTO_NUMEROHORAS"  title="<?php echo $strings['error nombre proyecto']; ?>" >
                            </div>
                        </div>




                        <input type='submit' name='accion' value='<?php echo $strings['Volver']; ?>'>
                        <input type='submit' onclick="return valida_envia()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                        <ul>

                        <br>

            </h3>
            </p>

        </div>

        <?php
    } //fin metodo render
}
