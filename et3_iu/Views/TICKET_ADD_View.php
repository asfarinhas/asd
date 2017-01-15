<?php

class Ticket_Add{

    public function __construct(){

        $this->render();

    }

   public function render(){
       include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
       ?>
           <head>
               <link rel="stylesheet" href="../../../../../Users/Ismael/Downloads/ET3_Grupo4-master/et3_iu/Styles/styles.css" type="text/css" media="screen" />
                <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>
           </head>
           <div>
               <p>
                   <h1><span class="form-title"><?=$strings['Insertar Ticket']?></h1>
                   <h3>
                     <form action='TICKET_Controller.php' method='post'>
                     <ul class="form-style-1">
                         <!-- Campo Nombre -->
                         <div class="form-group">
                             <div class="col-sm-4">
                                 <label for="nombre" class="control-label"><?php echo $strings['NOMBRE']; ?>:</label>
                             </div>
                             <div class="col-sm-4">
                                 <input type="text" class="form-control"  name="NOMBRE"  title="<?php echo $strings['error trabajador']; ?>" >
                             </div>
                         </div>

                         <!-- Campo Fecha Inicio -->
                         <div class="form-group">
                             <div class="col-sm-4">
                                 <label for="nombre" class="control-label"><?php echo $strings['FECHAI']; ?>:</label>
                             </div>
                             <div class="col-sm-4">
                                 <input type="text"  name="FECHAI"  title="<?php echo $strings['error trabajador']; ?>" >
                             </div>
                         </div>

                         <!-- Campo Fecha Entrega -->
                         <div class="form-group">
                             <div class="col-sm-4">
                                 <label for="nombre" class="control-label"><?php echo $strings['FECHAE']; ?>:</label>
                             </div>
                             <div class="col-sm-4">
                                 <input type="text"  class="form-control"  name="FECHAE"  title="<?php echo $strings['error trabajador']; ?>" >
                             </div>
                         </div>

                         <!-- Campo Descripcion -->
                         <div class="form-group">
                             <div class="col-sm-4">
                                 <label for="nombre" class="control-label"><?php echo $strings['DESCRIPCION']; ?>:</label>
                             </div>
                             <div class="col-sm-4">
                                 <input type="text" class="form-control"  name="DESCRIPCION"  title="<?php echo $strings['error trabajador']; ?>" >
                             </div>
                         </div>

                         <!-- Campo Comentario -->
                         <div class="form-group">
                             <div class="col-sm-4">
                                 <label for="nombre" class="control-label"><?php echo $strings['COMENTARIO']; ?>:</label>
                             </div>
                             <div class="col-sm-4">
                                 <input type="text"  class="form-control"  name="COMENTARIO"  title="<?php echo $strings['error trabajador']; ?>" >
                             </div>
                         </div>

                         <!-- Campo Numero Horas -->
                         <div class="form-group">
                             <div class="col-sm-4">
                                 <label for="nombre" class="control-label"><?php echo $strings['NUMEROHORAS']; ?>:</label>
                             </div>
                             <div class="col-sm-4">
                                 <input type="text"  class="form-control"  name="NUMEROHORAS"  title="<?php echo $strings['error trabajador']; ?>" >
                             </div>
                         </div>

                         

                         <!-- Campo Estado -->
                         <div class="form-group">
                             <div class="col-sm-4">
                                 <label for="nombre" class="control-label"><?php echo $strings['ESTADO']; ?>:</label>
                             </div>
                             <div class="col-sm-4">
                                 <input type="text"  class="form-control"  name="ESTADO"  title="<?php echo $strings['error trabajador']; ?>" >
                             </div>
                         </div>





                                 <input type='submit' onclick="return valida_envia()" value=<?php echo $strings['Insertar'] ?>>

                     </form>



                       <a class="form-link" href='TICKET_Controller.php'><?=$strings['Volver']?> </a>
                   </h3>
               </p>
           </div>
       <?php
   }
}
?>
