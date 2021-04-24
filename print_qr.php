<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  include 'libs.php';
   ?>
    <style>

    @page {
       size: landscape;
       /* margin: 3% */
    }

    body {
       size: landscape;
       /* margin: 2% */
    }

    </style>
</head>

<body class="">

    <?php
      include("header.php");
      if(isset($_GET['qr'])){
          $titulo = substr($_GET['qr'], 0, -4);
          echo '<center><h1>Casilla: '.$titulo.'</h1>';
          echo '<img src="codes/'.$_GET['qr'].'" alt="QR - acuse"></center>';
      }
    ?>
</body>
</html>
