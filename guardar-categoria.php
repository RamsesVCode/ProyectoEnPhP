<?php 
    if(isset($_POST)){
        require_once('includes/conexion.php');
        $errores = array();
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/',$nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] = 'No se validó el nombre';
        }
        if(count($errores)==0){
            $sql = "INSERT INTO categorias VALUES(null,'$nombre')";
            $guardar = mysqli_query($db,$sql);
        }
    }
    header('Location:index.php');
?>