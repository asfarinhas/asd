<?php

class Correo_Add
{
    //VISTA PARA INSERTAR UN NUEVO CORREO
      private $miembros ;
    function __construct($array)
    {
        $this->miembros = $array;
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
			<?php echo $strings['Enviar correo'] ?><br>
            </h1>
            <h3>

                <form action='CORREO_Controller.php' method='post'>
                    <ul class="form-style-1">
                        <!-- Campo Receptor -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="Receptor" class="control-label"><?php echo $strings['RECEPTOR']; ?>:</label>
                            </div>
                            <?php
                            foreach($this->miembros as $m){
                            echo '<input type="checkbox" name="correos[]" value="'.$m["EMP_USER"].'" />"'.$m["EMP_USER"].'"<br />';
                          }

                            ?>

                        </div>

                        <!-- Campo Asunto -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="Receptor" class="control-label"><?php echo $strings['Asunto']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ASUNTO"  title="<?php echo $strings['error asunto']; ?>" required>
                            </div>
                        </div>
                        <!-- Campo Descripcion -->
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="Contenido" class="control-label"><?php echo $strings['CONTENIDO']; ?>:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea name="CONTENIDO" rows="10"  required cols="40"></textarea >
                            </div>
                        </div>





                        <input type='submit' onclick="return valida_envia()" name='accion'  value=<?php echo $strings['Enviar'] ?>
                        <ul>





                <?php
                echo '<a class="form-link" href=\'CORREO_Controller.php\'>' . $strings['Volver'] . " </a>";
                ?>
            </h3>
            </p>

        </div>

        <?php
    } //fin metodo render
}
?>
