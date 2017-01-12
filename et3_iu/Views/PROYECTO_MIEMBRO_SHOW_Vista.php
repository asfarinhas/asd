<?php

class ProyectoMiembro_Show
{
//VISTA PARA MOSTRAR CONSULTA DE PROYECTO

    function __construct($buscar, $miembro, $volver)
    {
        $this->buscar = $buscar;
        $this->miembro = $miembro;
        $this->volver = $volver;
        $this->render();
    }

    function render()
    {
        ?>
        <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" /></head>
        <?php include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
        <p>
        <h1><span class="form-title">

 <?php  if($this->buscar!='buscar'){


                         echo $strings['Consultar miembro proyecto']; ?><br>
            <title><?php echo $strings['Consultar miembro proyecto'];?></title>
        </h1>
        </p>
        <h2>

            </p>
            <br><br>
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


                    <input type='submit' name='accion' value='<?php echo $strings['Consultar Miembro']; ?>'>

            </form>

        </h2>

        <?php }else{



  echo $strings['Ver proyecto']; ?><br>

     <title><?php echo $strings['Ver proyecto'];?></title>
                 </h1>
             </p>
                <h2>

                </p>
                     <br><br>
                   <form action="PROYECTO_Controller.php" method="post">
                <br><br>
                <ul class="form-style-1">

                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="nombre" class="control-label"> <?php echo $strings['NOMBRE']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this-> miembro -> getNombre(); ?>" name="nombre" >
                        </div>
                    </div>

                    <!-- Campo Apellidos -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="apellidos" class="control-label"> <?php echo $strings['APELLIDOS']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> miembro -> getApellidos() ;?>" name="apellidos" >
                        </div>
                    </div>

                    <!-- Campo Usuario -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['USUARIO']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> miembro -> getUsuario() ;?>" name="usuario" >
                        </div>
                    </div>

                    <!-- Campo Email -->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="usuario"> <?php echo $strings['EMAIL']; ?>: </label>
                            <input type="text" readonly value="<?php echo $this -> miembro -> getCorreo() ;?>" name="correo" >
                        </div>
                    </div>
                                    <input type="button" value="volver atrás" name="volver atrás2" onclick="history.back()" />


                </ul>

            </form>

                </h2>



        <?php
}

    }
}
?>


