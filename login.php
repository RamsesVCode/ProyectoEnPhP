<?php
    require_once('includes/conexion.php');
    if(isset($_POST)){
        if(!isset($_SESSION))
            session_start();
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $sql = "SELECT * FROM USUARIOS WHERE email = '$email'";
        $login = mysqli_query($db,$sql);
        if($login && mysqli_num_rows($login)==1){
            $usuario = mysqli_fetch_assoc($login);
            $verify = password_verify($password,$usuario['CONTRASEÑA']);
            if($verify){
                $_SESSION['usuario'] = $usuario;
                if(isset($_SESSION['error_login'])){
                    session_unset();
                }
            }else{
                $_SESSION['error_login'] = "Login incorrecto";
            }
        }else{
            $_SESSION['error_login'] = "Login incorrecto";
        }
    }
    header('Location:index.php');
?>