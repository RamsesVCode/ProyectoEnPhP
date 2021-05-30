<?php 
    if(isset($_POST)){
        require_once('includes/conexion.php');
        require_once('includes/helpers.php');
        if(!isset($_SESSION))
            session_start();
        //generamos las variables
        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']) : false;
        $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;

        //array de errores
        $errores = array();
        //validamos las variables
        if(empty($titulo)){
            $errores['titulo'] = 'El titulo no es valido';
        }
        if(empty($descripcion)){
            $errores['descripcion'] = 'La descripcion no es valida';
        }
        if(empty($categoria) || !is_numeric($categoria)){
            $errores['categoria'] = 'La categoria no es valida';
        }
        $usuario = $_SESSION['usuario']['ID'];
        //validamos que no hayan errores
        if(count($errores)==0){
            if(isset($_GET['cambiar'])){
                $sql = "UPDATE entradas SET TITULO='$titulo',DESCRIPCION='$descripcion',CATEGORIA_ID=$categoria ".
                "WHERE ID=".$_GET['cambiar'];
            }else{
                $sql = "INSERT INTO entradas VALUES(null,$usuario,$categoria,'$titulo','$descripcion',CURDATE())";
            }
            $guardar = mysqli_query($db,$sql);
        }else{
            $_SESSION['errores'] = $errores;
        }
    }
    header('Location:index.php');
?>