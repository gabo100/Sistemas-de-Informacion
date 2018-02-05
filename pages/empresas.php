<?php
session_start();
include '../config/conf.php';
$link = Conectarse();

$sqlP = "SELECT COUNT( Codigo ) Cantidad
  FROM tblProgramas
  WHERE Url = UCASE('empresas.php')
  AND UCASE( URL )
  IN (
  SELECT DISTINCT UCASE( pro.Url )
  FROM tblPermisos per, tblUsuarios er, tblProgramas pro
  WHERE per.CodRol = er.CodRol
  AND per.CodPro = pro.Codigo
  AND er.CodRol = 1
  )";

  $resultV =  mysql_query($sqlP, $link);
  $rowV=  mysql_fetch_array($resultV);
  //echo $rowV[0];

  if($rowV[0]==0){
  echo 'Usted no esta autorizado para ver este contenido';
  exit();
  //header('Location: index+7.php?error=si');
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SB Admin 2 - Bootstrap Admin Theme</title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand nav-justified" href="index.php">UConnect</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> 
                            <?php echo $_SESSION['login'];?>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="perfil.php"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a>
                            </li>
                            <li>
                                <a href="empresas.php"><i class="fa fa-briefcase fa-fw"></i> Empresas </a>
                            </li>
                            <li>
                                <a href="usuarios.php"><i class="fa fa-users fa-fw"></i> Usuarios </a>
                            </li>
                            <li>
                                <a href="articulos.php"><i class="fa fa-newspaper-o fa-fw"></i> Anuncios </a>
                            </li>
                            <li>
                                <a href="publicidad.php"><i class="fa fa-bitcoin fa-fw"></i> Publicidad </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Empresas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                        $codigo = $_GET['cod'];
                        $nom = $_GET['nom'];
                        $dir = $_GET['dir'];
                        $tel = $_GET['tel'];
                        $des = $_GET['des'];
                        $ema = $_GET['ema'];
                        ?>
                        <form role="form" name="form1" action="" method="post">
                            <fieldset>
                                <input class="form-control" placeholder="codigo" name="codigo" type="hidden" value="<?php echo $codigo; ?>">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombre" name="nombre" type="text" value="<?php echo $nom; ?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Direccion" name="direccion" type="text" value="<?php echo $dir; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Telefono" name="telefono" type="text" value="<?php echo $tel; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Descripcion" name="descripcion" type="text" value="<?php echo $des; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email" value="<?php echo $ema; ?>">
                                </div>
                                <br>
                                <div class="btn-group">
                                    <button name="Guardar" class="btn btn-sm btn-default" type="submit">Guardar</button>
                                    <button name="Modificar" class="btn btn-sm btn-default" type="submit">Modificar</button>
                                    <button name="Eliminar" class="btn btn-sm btn-default" type="submit">Eliminar</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                if (isset($_POST['Guardar'])) {
                    $Nombre = $_POST['nombre'];
                    $Direccion = $_POST['direccion'];
                    $Telefono = $_POST['telefono'];
                    $Descripcion = $_POST['descripcion'];
                    $Correo = $_POST['email'];

                    if ($Nombre == "" && $Direccion == "" && $Telefono == "" && $Descripcion == "") {
                        echo '<script type="text/javascript">
                        alert("Debe rellenar todos los campos!. ");
                        document.form1.Nombre.focus();
                        </script>';
                    } else {
                        $SqlI = mysql_query("Insert into tblempresas(nombre, direccion, telefono, descripcion,correo) values('" . $Nombre . "','" . $Direccion . "','" . $Telefono . "','" . $Descripcion . "','" . $Correo . "')", $link) or die("Error MySQL -> " . mysql_errno() . " - " . mysql_error());
                    }
                }

                if (isset($_POST['Modificar'])) {
                    
                }

                if (isset($_POST['Eliminar'])) {
                    $CodigoD = $_POST['codigo'];
                    $sqlD = mysql_query("Delete from tblempresas where codigo=" . $CodigoD);
                }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Empresas Registradas
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>C&oacute;digo</th>
                                            <th>Nombre</th>
                                            <th>Direcci&oacute;n</th>
                                            <th>Tel&eacute;fono</th>
                                            <th>Detalle</th>
                                            <th>Correo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SqlE = mysql_query("Select * from tblempresas", $link) or die("Error MySql -> " . mysql_errno() . " - " . mysql_error());
                                        while ($row1 = mysql_fetch_array($SqlE)) {
                                            ?>
                                            <tr class="gradeU">
                                                <td><a href="empresas.php?cod=<?php echo trim($row1[0]); ?>&nom=<?php echo trim($row1[1]); ?>&dir=<?php echo trim($row1[2]); ?>&tel=<?php echo trim($row1[3]); ?>&des=<?php echo trim($row1[4]); ?>&ema=<?php echo trim($row1[5]); ?>"><strong><?php echo $row1[0]; ?></strong></a></td>
                                                <td><?php echo $row1[1]; ?></td>
                                                <td><?php echo $row1[2]; ?></td>
                                                <td><?php echo $row1[3]; ?></td>
                                                <td><?php echo $row1[4]; ?></td>
                                                <td><?php echo $row1[5]; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /#page-wrapper -->
                </div>
                <!-- /#wrapper -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>
        <!-- Morris Charts JavaScript -->
        <script src="../vendor/raphael/raphael.min.js"></script>
        <script src="../vendor/morrisjs/morris.min.js"></script>
        <script src="../data/morris-data.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>
    </body>
</html>
