<?php
  date_default_timezone_set('America/Mexico_City');
  //include_once("sqlconnector.php"); //Tu conector

  echo json_encode($_POST);// NOS MUESTRA EL VALOR DE $_POST

  //https://jsoneditoronline.org/


  exit;

  $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
  $contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);

  $usuario_correcto=false;

  $query="SELECT * FROM table_name WHERE usuario = '".$usuario."' AND contrasena = '".$contrasena."';";

  $res = sqlsrv_query($conn,$query);

  if($row = sqlsrv_fetch_array($res)){
    if ($usuario == $row["usuario"]){
      if($contrasena == $row["contrasena"]){

        # USUARIO Y CONTRASEÑA CORRECTA

        $usuario_correcto=true;
        $idusuario=$row["idusuario"];
        $idformulas=$row["idformulas"];
        $nombre=utf8_encode($row["nombre"]);
        $paterno=utf8_encode($row["paterno"]);
        $materno=utf8_encode($row["materno"]);

        $perfil=$row["perfil"];
        $id_distrito=$row["id_distrito"];
        $estatus_cuentausuario = $row["estatus_cuentausuario"];
        $protesta= $row["protesta1"];
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
      $_SESSION["usuario"]=$usuario;
      $_SESSION["idusuario"]=$idusuario;
      $_SESSION["idformulas"]=$idformulas;
      $_SESSION["nombre"]=$nombre;
      $_SESSION["paterno"]=$paterno;
      $_SESSION["materno"]=$materno;
      $_SESSION["perfil"]=$perfil;
      $_SESSION["id_distrito"]=$id_distrito;
      $_SESSION["estatus_cuentausuario"]=$estatus_cuentausuario;

      if (is_null ($protesta)){
        $protesta=0;
        session_destroy();
      } else{
        $protesta=1;
      }

      echo json_encode(array("success" => true,"id"=>"3","mensaje1"=>$query,"mensaje2"=>"capctcha_3:", "funciona"=>$usuario_correcto,"perfil"=>$perfil));

  }
?>
