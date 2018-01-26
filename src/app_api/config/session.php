<?php 

	session_start();
	$u = $_REQUEST['nom_usuario'];
	$c = $_REQUEST['clave'];

	$_SESSION['nom_usuario'] = $u;
    $_SESSION['clave'] = $c;

    include('conexion.php');

    $query=mysqli_query($conexion,"SELECT tipo FROM usuario WHERE nom_usuario= '$u' and clave = '$c'");

    if ($reg=mysqli_fetch_array($query)) {
    	$_SESSION['tipo'] = $reg['tipo'];
    	header('Location: ../home.php');
    } else {
    	session_destroy();
    	header('Location: ../index.php');
    }


 ?>