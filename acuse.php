<?php
include 'sqlconnector.php';

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
    <?php
    if(!isset($_GET['cod'])){
        header("Location: main.php");
    }
    $clave_mdc =  $_GET['cod'];
     $get_info_table="SELECT * FROM scd_casillas_imagen WHERE clave_mdc = '$clave_mdc'";
     //echo $get_info_table;

     $res = sqlsrv_query($conn,$get_info_table);
     $valida = sqlsrv_fetch_array($res);

     if($valida > 0){
       $res = sqlsrv_query($conn,$get_info_table);
       while($row = sqlsrv_fetch_array($res)){
        echo ' <div class="container acuse">
                <div class="card" style="width: 18rem;text-align:center;margin:5rem auto;">
                    <div class="card-body">
                        <h5 class="card-title">Acuse</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Distrito: '.$row['id_distrito'].'</li>
                        <li class="list-group-item">Delegacion: '.$row['id_delegacion'].'</li>
                        <li class="list-group-item">Casilla: '.$row['clave_mdc'].'</li>
                        <li class="list-group-item">Hora de llegada: <br> '.$row['fechaQRalc'].'</li>

                    </ul>
                </div>
            </div>';
       }
     } else{
       echo '<p>Sin resultados de la consulta</p>';
     }
    ?>
    <?php
      include("footer.php");
    ?>
</body>
</html>
