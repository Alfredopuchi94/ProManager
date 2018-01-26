<?php 

	session_start();
	$e = $_REQUEST['email'];
	$c = $_REQUEST['clave'];

	$_SESSION['email'] = $e;
    $_SESSION['clave'] = $c;

    include('conexion.php');

    $query=mysqli_query($conexion,"SELECT tipo FROM usuarios WHERE email= '$e' and clave = '$c'");

    if ($reg=mysqli_fetch_array($query)) {
    	$_SESSION['tipo'] = $reg['tipo'];
    	header('Location: ../../../home.php');
    } else {
    	session_destroy();
    	header('Location: ../index.php');
    }


 ?>