<?php
    session_start();
    include('../php/conexion.php');
    if(  isset($_POST['email'])  && isset($_POST['password'])   ){
        
        $resultado = $conexion->query("select * from usuarios where 
            email='".$_POST['email']."' and 
            password='".sha1($_POST['password'])."' limit 1")or die($conexion->error);
        if(mysqli_num_rows($resultado)>0){
            $datos_usuario = mysqli_fetch_row($resultado); 
            $nombre = $datos_usuario[1];
            $id_usuario = $datos_usuario[0];
            $email = $datos_usuario[3];

            $_SESSION['datos_login']= array(
                'id_usuario'=>$id_usuario,
                'nombre'=>$nombre,
                'email'=>$email,
            );
            header("Location: ../components/index.php");
        }else{
            header("Location: ../components/login.php?error=Credenciales incorrectas");
        }



    }else{
        header("../components/login.php");
    }
?>