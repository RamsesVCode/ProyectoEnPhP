<?php
    function mostrarError($errores,$campo){
        $alerta = '';
        if(isset($errores[$campo]) && !empty($campo)){
            $alerta = '<div class="alerta alerta-error">'.$errores[$campo].'</div>';
        }
        return $alerta;
    }
    function borrarError(){
        if(isset($_SESSION['errores'])){
            unset($_SESSION['errores']);
        }
        if(isset($_SESSION['correcta'])){
            unset($_SESSION['correcta']);
        }
    }
    function getCategorias($db){
        $query = "SELECT * FROM categorias ORDER BY ID ASC";
        $categorias = mysqli_query($db,$query);
        $resultado = array();
        if($categorias && mysqli_num_rows($categorias)>0){
            $resultado = $categorias;
        }
        return $resultado;
    }
    function getCategoria($db,$id){
        $query = "SELECT * FROM categorias WHERE ID=$id";
        $categorias = mysqli_query($db,$query);
        $resultado = array();
        if($categorias && mysqli_num_rows($categorias)>0){
            $resultado = mysqli_fetch_assoc($categorias);
        }
        return $resultado;
    }
    function getEntradas($db,$limit=null,$id=null,$busqueda=null){
        $query = "SELECT e.*,c.NOMBRE FROM ENTRADAS e
        JOIN CATEGORIAS C ON e.CATEGORIA_ID = C.ID ";
        if($id != null){
            $query .= "WHERE e.CATEGORIA_ID = $id ";
        }
        if($busqueda!=null){
            $query .= "WHERE e.TITULO LIKE '%$busqueda%'";
        }
        $query .= "ORDER BY e.ID DESC ";
        if($limit != null){
            $query.="LIMIT $limit";
        }
        $resultado = array();
        $entradas = mysqli_query($db,$query);
        if($entradas && mysqli_num_rows($entradas)>0){
            $resultado = $entradas;
        }
        return $resultado;
    }
    function getEntrada($db,$id=null){
        $query = "SELECT e.*,c.NOMBRE, u.NOMBRE as nombre FROM ENTRADAS e
        JOIN CATEGORIAS C ON e.CATEGORIA_ID = C.ID 
        JOIN USUARIOS u ON e.USUARIO_ID=u.ID
        WHERE e.ID = $id";
        $resultado = array();
        $entradas = mysqli_query($db,$query);
        if($entradas && mysqli_num_rows($entradas)>0){
            $resultado = mysqli_fetch_assoc($entradas);
        }
        return $resultado;
    }
?>