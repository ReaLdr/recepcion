<?php

# POR SI NOS PIDEN QUE SE CIERRE CIERTO DÍA
$fecha1="2020-01-27 23:59:59";
$fecha2="2020-02-17";

if(date("Y-m-d H:i:s")>=date($fecha1)&&date("Y-m-d")<date($fecha2)){

    $sistema_activo=true;
}else{
    $sistema_activo=false;
}

# POR SI NOS PIDEN QUE SE CIERRE CIERTO DÍA

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  include 'libs.php';
   ?>
</head>

<body class="">

    <?php
        include("header.php");
        //error_reporting(0);
    ?>

    <div class="container" id="main_container">

        <br>
        <div class="row justify-content-md-center">
            <div class="col-md-5" style="padding-bottom:2em;">
                <div class="card">
                    <div class="card-header">Ingresar</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="form-login-censo">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="usuariotp" placeholder="Usuario" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="contrasenatp" placeholder="Contraseña" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Ingresar</button>
                                    <div id="errormsg"></div>
                                </div>
                            </div>
                        </form>
                    </div><!--card-body-->
                </div><!--card-->
            </div><!--col-md-5-->
        </div> <!-- row -->
        <!--<hr>-->
        <br>

    </div><!-- main container-->

    <script src="js/funcionescuestionario.js"></script>


    <?php
      include("footer.php");
    ?>
</body>

</html>
