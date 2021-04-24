<?php
if(isset($_POST) && !empty($_POST)) {
    $host= $_SERVER["HTTP_HOST"];
    //echo $host . "<br>";
    if($host == "aplicaciones.iecm.mx"){
        define("URL_SISTEMA", "https://aplicaciones.iecm.mx/recepcion/");
    }

    if($host == "145.0.40.76"){
        define("URL_SISTEMA", "http://145.0.40.76/recepcion/");
    } else{
        define("URL_SISTEMA", "http://192.168.1.67/recepcion/");
    }
    include('library/phpqrcode/qrlib.php');
    $codesDir = "codes/";
    $codeFile = $_POST['formData'].'.png';
    $id_link = URL_SISTEMA."acuse.php?cod=".$_POST['formData'];
    QRcode::png($id_link, $codesDir.$codeFile, $_POST['ecc'], $_POST['size']);
    echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';
    echo '<input type="hidden" id="qr_clave_mdc" value="'.$codeFile.'">';
} else {
    header('location:./');
}
?>
