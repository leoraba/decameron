<?php
    include("includes/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal de administracion Hotel Decameron</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- datepicker CSS -->
    <link href="css/datepicker.css" rel="stylesheet">

    <!-- select2 CSS -->
    <link href="css/select2.css" rel="stylesheet">
    <link href="css/select2-bootstrap.css" rel="stylesheet">

    <!-- Plugins -->
    <link href="css/messi/messi.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/jquery-ui.js"></script>

    <!-- dataTables -->
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Datepicker JavaScript -->
    <script src="js/bootstrap-datepicker.js"></script>

    <!-- select2 -->
    <script src="js/select2.min.js"></script>    
    <script src="js/select2_locale_es.js"></script>

    <!-- Plugins -->
    <script src="js/validation/jquery.validate.js"></script>
    <script src="js/validation/messages_es.js"></script>
    <script src="js/messi/messi.min.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?m=home"><img src="images/logo.png" class="mainLogo"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$_SESSION['nombre']." ".$_SESSION['apellido']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="?m=logout"><i class="fa fa-fw fa-power-off"></i> Cerrar sesion</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                	<li <?=($modulo=="home")?"class='active'":""?>>
                        <a href="?m=home"><i class="fa fa-fw fa-home"></i> Inicio</a>
                    </li>
                    <li <?=($modulo=="hab")?"class='active'":""?>>
                        <a href="?m=hab"><i class="fa fa-fw fa-calendar"></i> Reservar habitaci&oacute;n</a>
                    </li>
                    <li <?=($modulo=="chinout")?"class='active'":""?>>
                        <a href="?m=chinout"><i class="fa fa-fw fa-key"></i> Habitaciones</a>
                    </li>
                    <li <?=($modulo=="esthab")?"class='active'":""?>>
                        <a href="?m=esthab"><i class="fa fa-fw fa-building-o"></i> Estado Habitaci&oacute;n</a>
                    </li>
                    <li <?=($modulo=="emp" || $modulo=="cli")?"class='active'":""?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#usuarios"><i class="fa fa-fw fa-user"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="usuarios" class="collapse">
                            <li>
                                <a href="?m=emp">Empleados</a>
                            </li>
                            <li>
                                <a href="?m=cli">Clientes</a>
                            </li>
                        </ul>
                    </li>
                    <li <?=($modulo=="mainprod")?"class='active'":""?>>
                        <a href="?m=mainprod"><i class="fa fa-fw fa-edit"></i> Productos</a>
                    </li>
                    <li <?=($modulo=="cat")?"class='active'":""?>>
                        <a href="?m=cat"><i class="fa fa-fw fa-wrench"></i> Cat&aacute;logos</a>
                    </li>
                    <li <?=($modulo=="fact")?"class='active'":""?>>
                        <a href="?m=fact"><i class="fa fa-fw fa-dollar"></i> Factura</a>
                    </li>
                    <li <?=($modulo=="est")?"class='active'":""?>>
                        <a href="?m=est"><i class="fa fa-fw fa-bar-chart-o"></i> Estad&iacute;sticas</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php
                	if (file_exists( $path_modulo )) include( $path_modulo );
					else die('Error al cargar el módulo <b>'.$modulo.'</b>. No existe el archivo <b>'.$conf[$modulo]['archivo'].'</b>');
				?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>
</html>
