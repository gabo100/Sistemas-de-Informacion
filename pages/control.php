<?php
    session_start();
    include("../config/conf.php");

    $login=$_POST["email"];
    $pass=md5($_POST["password"]);
    
    $link=Conectarse();

    $ssql="SELECT tblusuarios.codigo, tblusuarios.nombre,tblusuarios.apellido,
        tblusuarios.login, tblusuarios.password, tblrol.Codigo, tblrol.Nombre, tblprogramas.codigo,
        tblprogramas.Nombre, tblpermisos.Altas, tblpermisos.Bajas, tblpermisos.Modif, tblpermisos.Selec 
        FROM tblpermisos 
        INNER JOIN tblprogramas ON tblpermisos.CodPro = tblprogramas.codigo 
        INNER JOIN tblrol ON tblpermisos.CodRol = tblrol.Codigo 
        INNER JOIN tblusuarios ON tblrol.Codigo = tblusuarios.CodRol 
        WHERE tblusuarios.login = '$login' and tblusuarios.password='$pass'";
      
    $resultado = mysql_query($ssql, $link) or die ("No se pudo ejecutar la consulta.<br> MySQL dijo -> ". mysql_errno()." - ".mysql_error());
    
    $userfound = mysql_num_rows($resultado);
    $row = mysql_fetch_array($resultado);
    $_SESSION['cod']=$row[0];
    $_SESSION['rol']=$row[5];
    
    if ($userfound == 0){
            header("Location: login.php?error=si"); 
            exit;
    }else{
        $_SESSION["login"]=$login;
        $i=0;
        while($row=mysql_fetch_array($resultado))
        {
            if(isset($_SESSION['prgOpt']))
            {
                $prgOpt=$_SESSION['prgOpt'];
            }
            $Programas[$i] = trim(strtolower($row[8]));
           // echo $Programas[$i]."\n";
            $prgOpt [$i]= array ( 'altas' => $row['iAltas'],'bajas' => $row['iBajas'],'modificaciones' => $row['iModif'],'consultas' => $row['iSelec']);

            $_SESSION['prgOpt']=$prgOpt; // Cargo las opciones de cada programa;
            $i=$i+1;
        }
        $_SESSION['prg']=$Programas; // Cargo todos los programas del rol del usuario;
        $_SESSION['nprg']=userfound+1; // Cargo la cantidad de programas;
            
        header("Location: index.php");
    }
    
    mysql_close($link);
    
?> 
