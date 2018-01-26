<?php 

    session_start();
    $u = $_REQUEST['user'];
    $p = $_REQUEST['pass'];

    $_SESSION['user'] = $u;
    $_SESSION['pass'] = $p;

    include('conexion.php');

    $query=mysqli_query($conexion,"SELECT rango FROM usuario WHERE user = '$u' and pass = '$p'");

    if ($reg=mysqli_fetch_array($query)) {
        $_SESSION['rango'] = $reg['rango'];
        header('Location: ../modules/home.php');
    } else {
        session_destroy();
        header('Location: ../../../index.php');
    }


 ?>