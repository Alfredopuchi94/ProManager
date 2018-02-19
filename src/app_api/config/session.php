<?php 

    session_start();
    $u = $_REQUEST['LOGIN'];
    $p = $_REQUEST['CONTRASENA'];

    //$_SESSION['pinejesi'] = $u;
    //$_SESSION['Jp19795390'] = $p;

    include('conexion.php');

    $sql = "SELECT TOP 1 SC_SEGURIDAD.T_USUARIOS.ID_EMPLEADO, SC_SEGURIDAD.T_USUARIOS.LOGIN, SC_COMUN.T_HISTORIAL_EMPLEADO.ID_DEPENDENCIA, SC_COMUN.T_EMPLEADOS.P_NOMBRE
        FROM SC_SEGURIDAD.T_USUARIOS 
        INNER JOIN SC_COMUN.T_HISTORIAL_EMPLEADO 
        ON SC_SEGURIDAD.T_USUARIOS.ID_EMPLEADO = SC_COMUN.T_HISTORIAL_EMPLEADO.ID_EMPLEADO
        INNER JOIN SC_COMUN.T_EMPLEADOS
        ON SC_COMUN.T_EMPLEADOS.ID_EMPLEADO = SC_SEGURIDAD.T_USUARIOS.ID_EMPLEADO
        WHERE SC_SEGURIDAD.T_USUARIOS.LOGIN='$u'";

    $query=sqlsrv_query($conn,$sql);
    
<<<<<<< HEAD
    //echo "$sql";
    
=======
>>>>>>> master
    if ($reg=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        
        $_SESSION['usuario'] = $reg["LOGIN"];
        $_SESSION["nombre"] = $reg["P_NOMBRE"];
        $_SESSION['idUsuario'] = $reg["ID_EMPLEADO"];
        $_SESSION['idDependencia'] = $reg["ID_DEPENDENCIA"];

        //print_r($_SESSION);

        header('Location: ../modules/home.php');
    } else {
        session_destroy();
        header('Location: ../../../index.php');
    }


 ?>