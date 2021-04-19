<?php

session_start();
date_default_timezone_set('America/Mexico_City');// ZONA HORARIA DE LA CDMX //ESTO PORQUE ALGUNAS VECES EL SERVER TIENE MAL LA HORA Y FECHA


if(isset($_SESSION['id_usuario'])){

    $query_user="SELECT count(id_usuario) as existe FROM scd_usuarios_imagen WHERE id_usuario = '".$_SESSION['id_usuario']."'";

    $user_count = sqlsrv_query($conn,$query_user);
    while($row = sqlsrv_fetch_array($user_count)){
        $existe=intval($row['existe']);
    }

    if($existe==0){
        session_destroy();
        header("Location: login.php");
        //echo "Entra 1";
    }

} else{
    session_destroy();
    header("Location: login.php");
    //echo "Entra 2";
}

$usuario_correcto=true;
$idusuario=$_SESSION["id_usuario"];
$nombre=utf8_encode($_SESSION["nombre"]);
$id_distrito=$_SESSION["id_distrito"];
$estatus=$_SESSION["estatus"];

 ?>
