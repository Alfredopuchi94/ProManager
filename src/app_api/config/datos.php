<?php 
	include('conexion.php');

if ($_REQUEST['id'] =="Usuarios") { //datos de formulario de usuarios
 	$user =$_REQUEST['user'];
 	$email =$_REQUEST['email'];
 	$contra =$_REQUEST['contra'];
 	$rango =$_REQUEST['rango'];

 	$insertar = mysqli_query($conexion, "INSERT INTO usuario (user, email, pass, rango) VALUES ('$user', '$email','$contra','$rango')");

 		if ($insertar) {

		    echo "El usuario ".$user." ah sido registrado con exito  ";
			mysqli_close($conexion);
		}else{
			echo "error";
		}
}

 ?>