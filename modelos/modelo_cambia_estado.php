<?php

    include '../sqlconnector.php';
    session_start();
    date_default_timezone_set('America/Mexico_City');
    //echo json_encode($_POST);
    //echo json_encode($_SESSION);

    $id_registro = $_POST['id_registro'];

    $id_usuario_session = $_SESSION['id_usuario'];

    $fecha_hora = date('Y-m-d H:i');

    //2021-05-17 24:00

    $query_update = "UPDATE scd_casillas_imagen SET fechaQRalc = '$fecha_hora', usrQR = $id_usuario_session WHERE clave_mdc = '$id_registro';";

    $exe_query = sqlsrv_query ($conn, $query_update);// Se descomenta cuando se tenga el update

    if($exe_query){
        
        $qr = "<i class='fas fa-qrcode cursor-pointer' title='Clic para visualizar el acuse'></i>";

        $respuesta = array("respuesta" => "correcto",
                         "qr" => $qr);
    } else{
      $respuesta = array("respuesta" => "error");
    }

    echo json_encode($respuesta);

 ?>
