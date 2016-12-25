<?php

class Notificacion_Add
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
			<?php echo $strings['Crear Notificacion'] ?><br>
            </h1>
            <h3>

                <form action='NOTIFICACION_Controller.php' method='post'>
                    <ul class="form-style-1">

                        <!-- Campo Receptor -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre" class="control-label"><?php echo $strings['Receptor']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="RECEPTOR"  title="<?php echo $strings['error de receptor']; ?>" >
                            </div>
                        </div>
                        <!-- Campo Contenido -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="Contenido" class="control-label"><?php echo $strings['CONTENIDO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea name="CONTENIDO" rows="10" cols="60"></textarea>
                            </div>
                        </div>





                        <input type='submit' onclick="return valida_envia()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                        <ul>




                        <br>
                        <?php
                        echo '<a class="form-link" href=\'NOTIFICACION_Controller.php\'>' . $strings['Volver'] . " </a>";
                        ?>
            </h3>
            </p>

        </div>

        <?php
    } //fin metodo render
}
?>