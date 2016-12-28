<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 21/12/16
 * Time: 17:29
 */
class MIEMBRO_ADD_View{

    function __construct(){
        $this->render();
    }


function render(){
        ?>

        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"</script></head>


        <div>
            <?php
            //Vista para la añadir MIEMBRO
            include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
            //include 'Functions/EMPLEADOShowAllDefForm.php';


            ?>
    }//fin método render()


}