<?php
//error_reporting(0); //No suelo utilizarlo mucho pero es de ayuda
include_once("sqlconnector.php");//Tu conector a BD
//include_once("cat_alcaldia.php");
include 'sesiones.php';

$bienvenido = 0;

$id_distrito = $_SESSION['id_distrito'];

//echo json_encode($_SESSION);

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

        .fa-qrcode{
            color: #6cb11e;
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
                            Usuario: <?php echo $nombre; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <a href="logout.php" class="btn btn-light menu-item btn-block"> <i class="fas fa-undo-alt"></i> Cerrar sesión</a>
                <hr style="margin: 0px 0; color:black; border-bottom: 1px solid #DDD;">
                <span class="badge badge-light">Distrito: <?php echo $id_distrito; ?></span>
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

            <table id="table_data" class="table table-striped table-bordered" data-page-length='50' style="width:100%">
              <thead>
                <tr>
                    <th scope="row">Distrito</th>
                    <th scope="row">Casilla</th>
                    <th scope="row">Registrar</th>
                    <th scope="row">Acuse</th>
                </tr>
            </thead>
            <tbody id="table_result">
              <?php
              # CONSULTA A LA BD

              #   LO SIGUIENTE ES EL CÓDIGO PHP RESULTANTE DE LA CONSULTA


              $get_info_table="SELECT * FROM scd_casillas_imagen WHERE id_distrito = $id_distrito";
              //echo $get_info_table;

              $res = sqlsrv_query($conn,$get_info_table);
              $valida = sqlsrv_fetch_array($res);

              if($valida > 0){
                $res = sqlsrv_query($conn,$get_info_table);
                while($row = sqlsrv_fetch_array($res)){
                    $id_row = $row['clave_mdc'];//Con este id realizaremos el update. TAL VEZ CAMBIE
                  (!is_null($row['fechaQRalc']) && $row['fechaQRalc'] != "" ? $estado = "received" : $estado ="");
                  (!is_null($row['fechaQRalc']) && $row['fechaQRalc'] != "" ? $tipo_icono = '<i class="fas fa-qrcode cursor-pointer" title="Clic para visualizar el acuse"></i>' : $tipo_icono = '<i class="fas fa-ban cursor-pointer" title="Para ver el acuse debe indicar que fue recibido"></i>');

                  echo '<tr id="id:'.$id_row.'">
                          <td scope="row">'.$row['id_distrito'].'</td>
                          <td>'.$row['clave_mdc'].'</td>
                          <td scope="row"><i class="fas fa-check-circle cursor-pointer '.$estado.'" title="Ya se registró como recibido"></i></td>
                          <!-- <td scope="row"><i class="far fa-check-circle cursor-pointer received"></i></td> -->
                          <td class="td_center" id="qr_'.$id_row.'">'.$tipo_icono.'</td>
                        </tr>';
                }
              } else{
                echo '<tr><td colspan="4">Sin resultados</td></tr>';
              }

               ?>

            </tbody>
          </table>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#table_data').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">
            Escanear ..
        </div>

      <div class="modal-body" id="qr_response" style= "text-align: center;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_print">Imprimir <i class="fas fa-print"></i></button> </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">

  $('#btn_print').on('click', function (e) {

      e.preventDefault();

      let qr_src = document.getElementById('qr_clave_mdc').value;

      let title = qr_src.slice(0, -4);


      let popup;

      function closePrint () {
          if ( popup ) {
              popup.close();
          }
      }

    popup = window.open( 'print_qr.php?qr='+qr_src, title,  'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no');
    popup.onbeforeunload = closePrint;
    popup.onafterprint = closePrint;
    popup.focus(); // Required for IE
    popup.print();

  });
  </script>
</div>

</html>
