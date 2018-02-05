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
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body background="../dist/img/09.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <a href="login.php"><img src="../dist/img/logo.png" /></a>
                        <hr/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="control.php" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nombre de usuario" name="email" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!--div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div-->
                                    <!-- Change this to a button or input when using this as a form -->
                                    <!--a href="index.html" class="btn btn-lg btn-success btn-block">Login</a-->
                                    <input name="login" class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                    $error=isset($_GET["error"]);
                    if($error =="si"){
                ?>
                <div class="col-md-4 col-md-offset-4 alert alert-danger">
                    <strong>Error!</strong> Datos no v&aacute;lidos.
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>
    </body>
</html>