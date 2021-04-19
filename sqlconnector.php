<?php
$serverName = "145.0.40.72";
//$serverName = "DESKTOP-HJ0EN7R"; // dani
//$connectionInfo = array( "Database"=>"Actas2021", "UID"=>"sa", "PWD"=>"12345", "ReturnDatesAsStrings" =>"true"); //dani

$connectionInfo = array( "Database"=>"sicodid_prep2018", "UID"=>"user1", "PWD"=>"u53r1", "ReturnDatesAsStrings" =>"true");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
     //echo "Conexión establecida en DESARROLLO.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
