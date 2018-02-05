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
                        <h1 class="page-header">Postular a este anuncio</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <?php
                            $codigo = $_GET['codart'];
                            $sqlArticulo=mysql_query("Select * from tblarticulos where codigo=".$codigo, $link) or die("Error MySQL -> ".mysql_errno()." - ".mysql_error() );
                            while ($rowArt = mysql_fetch_array($sqlArticulo)) {
                        ?>
                    
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <strong>
                                <?php
                                    echo strtoupper($rowArt[1]);
                                ?>
                                </strong>
                            </div>
                            <div class="panel-body">
                                <pre><?php echo $rowArt[2]; ?></pre>
                            </div>
                            <!--div class="panel-footer">
                                Panel Footer
                            </div-->
                        </div>
                    
                    <!-- /.col-lg-12 -->
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                        $sqlD=mysql_query("Select tblempresas.nombre,tblempresas.direccion,tblempresas.telefono,tblempresas.correo from tblempresas "
                                . "inner join tblarticulos on tblarticulos.codempresa = tblempresas.codigo"
                                . " where tblarticulos.codigo=".$codigo, $link) or die("Error MySQL -> ".mysql_errno()." - ".mysql_error() );
                        while ($rowD = mysql_fetch_array($sqlD)) {
                            $codEmpresa = $rowD[0];
                    ?>
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <strong>
                                <?php
                                    echo strtoupper($rowD[0]);
                                ?>
                                </strong>
                            </div>
                            <div class="panel-body">
                                <span class="info">
                                    <strong>Direcci&oacute;n : </strong><?php echo $rowD[1]; ?><br>
                                    <strong>Tel&eacute;fono : </strong><?php echo $rowD[2]; ?><br>
                                    <strong>E-mail :</strong><?php echo $rowD[3]; ?><br>
                                </span> 
                            </div>
                            <!--div class="panel-footer">
                                Panel Footer
                            </div-->
                        </div>
                    </div>
                        <?php 
                            }
                        ?>
                    </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" name="form1" action="" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <select name="Usuario" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <?php
                                            $codu=$_SESSION['cod'];
                                            $sqlU=mysql_query("Select codigo, concat( nombre, ' ', apellido ) as nombre from tblusuarios where codigo=".$codu ,$link) or die("Error MySQL ->". mysql_error());
                                            while($rowU=mysql_fetch_array($sqlU)){
                                        ?>
                                        <option value="<?php echo $rowU[0]?>" selected="selected"><?php echo $rowU[1]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Adjuntar Archivo (PDF)</label>
                                    <input type="file" name="archivo">
                                </div>
                                <br>
                               <div class="btn-group">
                                    <button name="Guardar" class="btn btn-sm btn-default btn-success" type="submit">Postular</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <?php
                
                if (isset($_POST['Guardar'])) {
                    $Usuario = $_POST['Usuario'];
                                        
                    if ($_FILES['archivo']["error"] > 0){
                        echo "Error: " . $_FILES['archivo']['error'] . "<br>";
                    } else {
                     /*   echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
                        echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
                        echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
                        echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
                        /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
                        move_uploaded_file($_FILES['archivo']['tmp_name'],
                                '../dist/archivos/' . $_FILES['archivo']['name']);
                    }
                    $Archivo = $_FILES['archivo']['name'];
                    $fecha= Date('Y-m-d');
                    //echo $Archivo;
                    $SqlI = mysql_query("Insert into tblpostulaciones(codarticulo, codusuario, fecha, adjunto) values('" . $codigo . "','" . $codu . "','".$fecha."','" . $Archivo . "')", $link) or die("Error MySQL -> " . mysql_errno() . " - " . mysql_error());
                    
                    echo '<script type="text/javascript">'
                    . 'location.href = "index.php";'
                    . '</script>';
                }
                ?>
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
