<?php 
    $servidor = "localhost";
    $usuarioBD = "root";
    $pwdBD = "";
    $nomBD = "prograweb";

    $db = mysqli_connect($servidor,$usuarioBD,$pwdBD,$nomBD);
    if(!$db)
    {
        die("La conexión fallo: ".mysql_connect_error());
    }
    else
    {
        mysqli_query($db, "SET NAMES 'UTF8'");
        echo "Conexion exitosa";
    }

    $sql = "INSERT INTO usuarios VALUES ('chris@mail.com','".sha1("chris")."','empleado')";
    if(mysqli_query($db,$sql))
    {
        echo " Nuevo registro creado exitosamente";
    }
    else
    {
        echo "Error: ".$sql. ":". mysqli_error($conn);
    }
?>

