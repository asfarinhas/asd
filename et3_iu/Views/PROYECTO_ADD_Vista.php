<?php

class Proyecto_Add
{
    //VISTA PARA INSERTAR PAGINAS

    function __construct()
    {
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
			<?php echo $strings['Insertar Proyecto'] ?><br>
            </h1>
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





                        <input type='submit' onclick="return valida_envia()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                        <ul>




                        <br>
                <?php
                echo '<a class="form-link" href=\'PROYECTO_Controller.php\'>' . $strings['Volver'] . " </a>";
                ?>
            </h3>
            </p>

        </div>

        <?php
    } //fin metodo render
}
?>