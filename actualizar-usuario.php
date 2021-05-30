<?php
    require_once ('includes/conexion.php');
    session_start();
    if(isset($_POST['submit'])){
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,trim($_POST['nombre'])) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,trim($_POST['apellidos'])) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;

        $errores = array();

        //VALIDACION DEL NOMBRE
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/',$nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] = 'Nombre no valido';
        }
        //VALIDACION DE LOS APELLIDOS
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/',$apellidos)){
            $apellidos_validado = true;
        }else{
            $apellidos_validado = false;
            $errores['apellidos'] = 'Apellidos no validos';
        }
        //VALIDACION DEL EMAIL
        if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_validado = true;
        }else{
            $email_validado = false;
            $errores['email'] = 'Email no valido';
        }

        if(count($errores)==0){
            $usuario = $_SESSION['usuario'];
            $sql = "UPDATE usuarios SET ".
                   "NOMBRE = '$nombre', APELLIDOS='$apellidos',EMAIL='$email' ".
                   "WHERE ID=".$usuario['ID'];
            $guardar = mysqli_query($db,$sql);
            if($guardar){
                $_SESSION['usuario']['NOMBRE']=$nombre;
                $_SESSION['usuario']['APELLIDOS']=$apellidos;
                $_SESSION['usuario']['EMAIL']=$email;
                $_SESSION['correcta']='Tus datos se han actualizado con exito';
            }else{
                $_SESSION['errores']['general']='Fallo al actualizar tus datos';
            }
            header('Location:mis-datos.php');
        }else{
            header('Location:mis-datos.php');
            //CREAMOS LA VARIABLE GLOBAL
            $_SESSION['errores']=$errores;//$errores es un array asociativo
        }
    }

?>