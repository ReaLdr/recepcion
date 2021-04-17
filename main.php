<?php
//error_reporting(0); //No suelo utilizarlo mucho pero es de ayuda
//include_once("sqlconnector.php");//Tu conector a BD
//include_once("cat_alcaldia.php");
//session_start();
date_default_timezone_set('America/Mexico_City');// ZONA HORARIA DE LA CDMX //ESTO PORQUE ALGUNAS VECES EL SERVER TIENE MAL LA HORA Y FECHA
// $usuario=$_SESSION['usuario'];
// $idusuario=$_SESSION['idusuario'];
// $idformulas=$_SESSION['idformulas'];

/*
if(isset($_SESSION['idusuario'])){

    $query_user="SELECT count(id) as existe FROM table_name WHERE id = '".$idformulas."'";

    $user_count = sqlsrv_query($conn,$query_user);
    while($row = sqlsrv_fetch_array($user_count)){
        $existe=intval($row['existe']);
    }

    if($existe==0){

      # NO EXISTE EN LA TABLA
      # TRONAMOS SESIÓN Y REDIRIGIMOS (PA ASEGURAR)
    }

} else{
    //echo "<b>No ha iniciado sesión</b>";
    session_destroy();
    header("Location: login.php");
}
*/

$bienvenido = 0;

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  include 'libs.php';
   ?>
    <style>

        body{
            font-size: 1.1rem
        }

        .received{
          color: #65b50c;
        }

        .td_center{
          text-align: center;
        }

        .cursor-pointer:hover{
          cursor: pointer;
        }

    </style>
</head>

<body class="">

    <?php
      include("header.php");
    ?>

    <div class="container justify-content-md-center" id="main_container">
        <div class="row menu" id="top-area">
            <div class="col-md-6">
                <div class="row" id="top-area-datos">
                    <div class="col-md-6" id="nombre_usuario">
                        <p id="top-area-nombre">
                            NOMBRE DEL USUARIO
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <a href="logout.php" class="btn btn-light menu-item btn-block"> <i class="fas fa-undo-alt"></i> Cerrar sesión</a>
                <hr style="margin: 0px 0; color:black; border-bottom: 1px solid #DDD;">
                Texto <span class="badge badge-light" id="span_respondido"><span class="badge badge-light">texto</span> texto
            </div>

        </div>

        <hr>

        <div class="row justify-content-md-center" id="mid-area" style="/*background-color: #FBB;*/">

          <div class="tab-content myTabContent" id="myTabContent" name="myTabContent" style="min-width: 90%;">
            <!-- ALGUNOS EJEMPLOS DE VALIDACIÓN DE CAMPO -->
            <!-- Letras y números -->
            <!-- <input type="text" name="cual_p5" id="n1" maxlength="250" class="form-control" onkeypress="return letras_y_numeros(event)" pattern="[A-Za-z0-9]{1,15}" onpaste="return true"> -->
            <!-- Solo números -->
            <!-- <input type="number" class="form-control" id="n2" maxlength="3" min="0" max="999" onkeypress="return numeros(event)" placeholder=""> -->

            <table id="table_data" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                    <th scope="row">Distrito</th>
                    <th scope="row">Casilla</th>
                    <th scope="row">Regitrar</th>
                    <th scope="row">Acuse</th>
                </tr>
            </thead>
            <tbody id="table_result">
              <?php
              # CONSULTA A LA BD

              #   LO SIGUIENTE ES EL CÓDIGO PHP RESULTANTE DE LA CONSULTA

              /*
              $get_info_table="SELECT * FROM table_name WHERE column = $var";
              //echo $get_info_table;

              $res = sqlsrv_query($conn,$get_info_table);
              $valida = sqlsrv_fetch_array($res);

              if($valida > 0){
                $res = sqlsrv_query($conn,$get_info_table);
                while($row = sqlsrv_fetch_array($res)){
                  echo '<tr>
                          <td scope="row">'.$row['id_ditrito'].'</td>
                          <td>'$row['casilla']'</td>
                          <td scope="row"><i class="fas fa-check-circle cursor-pointer received" title="Ya se registró como recibido"></i></td>
                          <!-- <td scope="row"><i class="far fa-check-circle cursor-pointer received"></i></td> -->
                          <td class="td_center"><i class="fas fa-qrcode cursor-pointer received" title="Clic para visualizar el acuse"></i></td>
                        </tr>';
                }
              } else{
                echo '<tr><td colspan="4">Sin resultados</td></tr>';
              }
              */
               ?>
               <!-- SE COMENTA O ELIMINA (PUES ES EL RESULTADO DEL QUERY) -->
              <tr>
                <td scope="row">1</td>
                <td>10B</td>
                <td scope="row"><i class="fas fa-check-circle cursor-pointer received" title="Ya se registró como recibido"></i></td>
                <!-- <td scope="row"><i class="far fa-check-circle cursor-pointer received"></i></td> -->
                <td class="td_center"><i class="fas fa-qrcode cursor-pointer received" title="Clic para visualizar el acuse"></i></td>
              </tr>
              <tr>
                <td scope="row">1</td>
                <td>12B</td>
                <td scope="row"><i class="fas fa-check-circle cursor-pointer" title="Clic para indicar que fue recibido"></i></td>
                <td class="td_center"><i class="fas fa-ban cursor-pointer" title="Para ver el acuse debe indicar que fue recibido"></i></i></td>
              </tr>
              <tr>
                <td scope="row">2</td>
                <td>13B</td>
                <td scope="row"><i class="fas fa-check-circle cursor-pointer received" title="Ya se registró como recibido"></i></td>
                <!-- <td scope="row"><i class="far fa-check-circle cursor-pointer received"></i></td> -->
                <td class="td_center"><i class="fas fa-qrcode cursor-pointer received" title="Clic para visualizar el acuse"></i></td>
              </tr>
              <tr>
                <td scope="row">3</td>
                <td>13C</td>
                <td scope="row"><i class="fas fa-check-circle cursor-pointer" title="Clic para indicar que fue recibido"></i></td>
                <td class="td_center"><i class="fas fa-ban cursor-pointer" title="Para ver el acuse debe indicar que fue recibido"></i></i></td>
              </tr>
              <!-- SE SUSTITUYE POR EL RESULTADO DEL QUERY -->
            </tbody>
          </table>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#table_data').DataTable();
        } );


        </script>
        <script>
          function letras_y_numeros(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }
            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[A-Za-z0-9-óÓáÁñÑíÍéÉúÚüÜäÄëËïÏöÖ., ]/;
            //ä,ë,ï,ö,ü
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
          }

          function numeros(e) {
              tecla = (document.all) ? e.keyCode : e.which;

              //Tecla de retroceso para borrar, siempre la permite
              if (tecla == 8) {
                  return true;
              }

              // Patron de entrada, en este caso solo acepta numeros y letras
              patron = /[0-9]/;
              tecla_final = String.fromCharCode(tecla);
              return patron.test(tecla_final);
          }

            </script>

        </div>
        <hr>

    </div><!-- main container-->
    <script src="js/funcionescuestionario.js"></script>
    <?php
      include("footer.php");
    ?>
</body>

</html>
