<?php
echo json_encode($_POST);

$query_update = "UPDATE ....";

//$exe_query = sqlsrv_query ($conn, $query_update);// Se descomenta cuando se tenga el update

if($exe_query){
  $respuesta = array("respuesta" => "correcto");
} else{
  $respuesta = array("respuesta" => "error");
}

 ?>
