<?php 
//Obtenemos los valores del formulario
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

session_start();
$_SESSION['usuario']=$usuario;

include('db.php');

$consulta="SELECT*FROM user where usuario='$usuario' and contra='$contra'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
	header("location:pag/home.html");
}else{
	?>
	<?php
	
	include("index.html");
	
	?>
	
	<script type="text/javascript"> swal("Oops!", "¡Los datos de usuario o contraseña no son correctos!", "error");</script>
	
	
	<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

 ?>