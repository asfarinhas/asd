<?php

?>
<html>

<head>
    <?php
    $GLOBALS['host']="localhost";
    $GLOBALS['user']="root";
    $GLOBALS['password']="root";
    $GLOBALS['db']="scotchbox";
//VISTA PRINCIPAL

    include '../Mappers/NOTIFICACION_Mapper.php';
    include '../Functions/InterfaceFunctions.php';
    include '../Functions/LibraryFunctions.php';
    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
    ?>
    <meta charset="utf-8" />
    <title><?php echo $strings['Menu Principal'];?></title>
    <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../Styles/responstable.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../Styles/print.css" media="print" />
</head>
<body>
<div id="wrapper">

    <nav><!-- #Aqui la barra para cerrar sesión y más cosas si se quieren -->

        <div class="menu">

            <ul>
              <?php $noti=new NotificacionMapper(); ?>
                <li><a href='../Controllers/MIEMBRO_Controller.php'><?php echo $strings['Usuario'].": ". $_SESSION['login']; ?></a></li>
                <li><a href="../Functions/Desconectar.php"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
                <li><a href="../Controllers/NOTIFICACION_Controller.php"><?php echo  $strings['Notificacionespendientes']; echo count($noti->buscarNoLeidas()); ?></a></li>
            </ul>
        </div>
    </nav><!-- end of top nav -->

    <header><!-- header -->
    </header><!-- end of header -->

    <section id="main"><!-- #main content and sidebar area -->
        <section id="content"><!-- #content -->
            <img src="../images/fondo.jpg" height="400px">
        </section><!-- end of #content -->
        <aside id="sidebar"><!-- sidebar --><!--AQUI VAN A LAS GESTIONES-->
           <?php AñadirFuncionalidades($_SESSION); ?>
        </aside><!-- end of sidebar -->

    </section><!-- end of #main content and sidebar-->
    <footer>
        <section  id="footer-area">
            <section id="footer-outer-block">
                <aside class="footer-segment">
                </aside><!-- end of #first footer segment -->
            </section><!-- end of footer-outer-block -->
        </section><!-- end of footer-area -->
    </footer>
</div><!-- #wrapper -->
</body>
</html>
