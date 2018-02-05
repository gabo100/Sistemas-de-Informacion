<?php
session_start();
include '../config/conf.php';
$link = Conectarse();

$sqlP = "SELECT COUNT( Codigo ) Cantidad
  FROM tblProgramas
  WHERE Url = UCASE('publicidad.php')
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
        <link href="../dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
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
                        <h1 class="page-header">Art&iacute;culos</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                            $codigo = $_GET['cod'];
                            $tit = $_GET['tit'];
                            $des = $_GET['des'];
                            $are = $_GET['are'];
                            $emp = $_GET['emp'];
                            $fec = $_GET['fec'];
                            $est = $_GET['est'];
                        ?>
                        <form role="form" name="form1" action="" method="post">
                            <fieldset>
                                <input class="form-control" placeholder="codigo" name="codigo" type="hidden" value="<?php echo $codigo; ?>">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Titulo" name="titulo" type="text" value="<?php echo $tit; ?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Descripcion" name="descripcion"><?php echo $des; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <select name="Area" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <?php
                                            $sqlA=mysql_query("Select * from tblArea",$link);
                                            while($rowU=mysql_fetch_array($sqlA)){
                                        ?>
                                        <option value="<?php echo $rowU[0]?>"><?php echo $rowU[1]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="Empresa" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <?php
                                            $sqlE=mysql_query("Select * from tblEmpresas",$link);
                                            while($rowE=mysql_fetch_array($sqlE)){
                                        ?>
                                        <option value="<?php echo $rowE[0]?>"><?php echo $rowE[1]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" name="Fecha" placeholder="Fecha ej: AAAA-MM-DD" value="<?php echo $fec; ?>"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="Estado" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
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
                    $Titulo = $_POST['titulo'];
                    $Descripcion = $_POST['descripcion'];
                    $Area = $_POST['Area'];
                    $Empresa = $_POST['Empresa'];
                    $Fecha = $_POST['Fecha'];
                    $Estado = $_POST['Estado'];
                    

                    if ($Titulo == "" && $Descripcion == "" && $Fecha == "") {
                        echo '<script type="text/javascript">
                        alert("Debe rellenar todos los campos!. ");
                        document.form1.titulo.focus();
                        </script>';
                    } else {
                        $SqlI = mysql_query("Insert into tblarticulos(titulo, descripcion, codarea, codempresa, fecha, estado) values('" . $Titulo . "','" . $Descripcion . "','" . $Area . "','" . $Empresa . "','" . $Fecha . "','" . $Estado . "')", $link) or die("Error MySQL -> " . mysql_errno() . " - " . mysql_error());
                    }
                }

                if (isset($_POST['Modificar'])) {
                    
                }

                if (isset($_POST['Eliminar'])) {
                    $CodigoD = $_POST['codigo'];
                    $sqlD = mysql_query("Delete from tblarticulos where codigo=" . $CodigoD);
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
                                Articulos Registrados por la empresa
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>C&oacute;digo</th>
                                            <th>T&iacute;tulo</th>
                                            <th>Descripci&oacute;n</th>
                                            <th>Area</th>
                                            <th>Empresa</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SqlE = mysql_query("Select * from tblarticulos", $link) or die("Error MySql -> " . mysql_errno() . " - " . mysql_error());
                                        while ($row1 = mysql_fetch_array($SqlE)) {
                                            ?>
                                            <tr class="gradeU">
                                                <td><a href="articulos.php?cod=<?php echo trim($row1[0]); ?>&tit=<?php echo trim($row1[1]); ?>&des=<?php echo trim($row1[2]); ?>&are=<?php echo trim($row1[3]); ?>&emp=<?php echo trim($row1[4]); ?>&fec=<?php echo trim($row1[5]); ?>&est=<?php echo trim($row1[6]); ?>"><strong><?php echo $row1[0]; ?></strong></a></td>
                                                <td><?php echo $row1[1]; ?></td>
                                                <td><?php echo $row1[2]; ?></td>
                                                <td><?php echo $row1[3]; ?></td>
                                                <td><?php echo $row1[4]; ?></td>
                                                <td><?php echo $row1[5]; ?></td>
                                                <td>
                                                    <?php
                                                        if($row1[6]==1){
                                                            echo "Activo";
                                                        }else{
                                                            echo "Inactivo";
                                                        }
                                                    ?>
                                                </td>
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
