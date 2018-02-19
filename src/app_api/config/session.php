<?php 

    session_start();
    $u = $_REQUEST['LOGIN'];
    $p = $_REQUEST['CONTRASENA'];

    $_SESSION['pinejesi'] = $u;
    $_SESSION['Jp19795390'] = $p;

    include('conexion.php');

    $sql = "SELECT * FROM SC_SEGURIDAD.T_USUARIOS WHERE LOGIN = '$u'";

    $query=sqlsrv_query($conn,$sql);
    
    if ($reg=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        header('Location: ../modules/home.php');
    } else {
        session_destroy();
         // header('Location: ../../../index.php');
    }


 ?>