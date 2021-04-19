<?php
  date_default_timezone_set('America/Mexico_City');
  include_once("sqlconnector.php"); //Tu conector

  //echo json_encode($_POST);// NOS MUESTRA EL VALOR DE $_POST

  //https://jsoneditoronline.org/


  //exit;

  $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
  $contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);

  $usuario_correcto=false;

  $query="SELECT * FROM scd_usuarios_imagen WHERE usuario = '".$usuario."' AND contrasena = '".$contrasena."';";



  $res = sqlsrv_query($conn,$query);

  if($row = sqlsrv_fetch_array($res)){
    if ($usuario == $row["usuario"]){
      if($contrasena == $row["contrasena"]){

        # USUARIO Y CONTRASEÑA CORRECTA

        // nuevas variables de sesión
        //id_usuario, nombre, id_distrito, estatus

        $usuario_correcto=true;
        $idusuario=$row["id_usuario"];
        $nombre=utf8_encode($row["nombre"]);
        $id_distrito=$row["id_distrito"];
        $estatus=$row["estatus"];

      } else{
        $respuesta = array("success" => false, "mensaje1" => "Contraseña incorrecta");
        echo json_encode($respuesta);
        exit;
      }
    }
  } else{
    $respuesta = array("success" => false, "mensaje1" => "&bull; Verifique sus datos, usuario o contraseña incorrecta.");
    echo json_encode($respuesta);
    exit;
  }

  if($usuario_correcto){
      session_start();

      # NUESTRAS VARIABLES DE SESIÓN
      $usuario_correcto=true;
      $_SESSION['id_usuario']=$row["id_usuario"];
      $_SESSION['nombre']=utf8_encode($row["nombre"]);
      $_SESSION['id_distrito']=$row["id_distrito"];
      $_SESSION['estatus']=$row["estatus"];

      echo json_encode(array("success" => true,"id"=>"3","mensaje1"=>$query,"mensaje2"=>"capctcha_3:", "funciona"=>$usuario_correcto));

  }
?>
