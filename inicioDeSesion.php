<?php
include 'includes/header.php';
?>
<div class="container-fluid" style="background-color: gray">
    <div class="jumbotron-fluid" style="text-align: center">
        <h1>Inicio de sesión</h1>
    </div>
    <form>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password">
  </div>
  <button type="submit" class="btn btn-success" name="btnIniciar">Iniciar Sesión</button>
</form>
</div>

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
}
if(isset($_GET["btnIniciar"]))
{
  $login = $_GET["email"];  
  $contra = $_GET["password"];
  
  $usuario = "SELECT * FROM USUARIOS WHERE login = '$login' AND pwd = '".sha1($contra)."'";
  $resultado = mysqli_query($db,$usuario);
  $filas = mysqli_num_rows($resultado);
  if($filas)
  {
     header("location:menu.php");
  }
  else
  {
  ?>
     <div class="alert alert-danger">
      <strong>Error en la autenticación</strong>
    </div>
  <?php
  }
}
  
?>
<?php
include 'includes/footer.php';
?>