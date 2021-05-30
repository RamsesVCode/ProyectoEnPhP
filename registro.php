<?php
    require_once ('includes/conexion.php');
    session_start();
    if(isset($_POST['submit'])){
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,trim($_POST['nombre'])) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,trim($_POST['apellidos'])) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

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
        //VALIDACION DEL PASSWORD
        if(!empty($password)){
            $email_validado = true;
        }else{
            $email_validado = false;
            $errores['password'] = 'Password no valido';
        }
        //CREAMOS LA VARIABLE GLOBAL
        $_SESSION['errores']=$errores;//$errores es un array asociativo
        if(count($errores)==0){
            //ciframos el password
            $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
            //verificarmos que $password_segura es el cifrado de password
            password_verify($password,$password_segura);
            //INSERTAMOS EN LA BD
            $sql = "INSERT INTO usuarios VALUES (null,'$nombre','$apellidos','$email','$password_segura',CURDATE())";
            $guardar = mysqli_query($db,$sql);
            if($guardar){
                $_SESSION['correcta']='El registro se ha realizado con exito';
            }else{
                $_SESSION['errores']['general']='No se ha podido realizar el registro';
            }
            header('Location:index.php');
        }else{
            header('Location:index.php');
        }
    }

?>