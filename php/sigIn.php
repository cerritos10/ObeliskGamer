<?php
    session_start();
    include('../php/conexion.php');
    if(  isset($_POST['email'])  && isset($_POST['pass'])   ){
        
        $resultado = $conexion->query("select * from empleados where 
            email='".$_POST['email']."' and 
            pass='".sha1($_POST['pass'])."' limit 1")or die($conexion->error);
        if(mysqli_num_rows($resultado)>0){
            $datos_empleado = mysqli_fetch_row($resultado); 
            //$nombre = $datos_empleado[1];
            $id_empleado = $datos_empleado[0];
            $email = $datos_empleado[1];

            $_SESSION['datos_log']= array(
                'id_empleado'=>$id_empleado,
                //'nombre'=>$nombre,
                'email'=>$email,
            );
            header("Location: ../admin/forms/index.php");
        }else{
            header("Location: ../admin/forms/log.php?error=Credenciales incorrectas");
        }



    }else{
        header("../admin/forms/log.php");
    }
    
?>