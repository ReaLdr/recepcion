<?php
if(isset($_POST) && !empty($_POST)) {
    include('library/phpqrcode/qrlib.php');
    $codesDir = "codes/";
    $codeFile = $_POST['formData'].'.png';
    QRcode::png($_POST['id_link'], $codesDir.$codeFile, $_POST['ecc'], $_POST['size']);
    echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';
    echo '<input type="hidden" id="qr_clave_mdc" value="'.$codeFile.'">';
} else {
    header('location:./');
}
?>
