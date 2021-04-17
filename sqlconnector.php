<?php
$serverName = "145.0.40.72"; 
$connectionInfo = array( "Database"=>"siresca", "UID"=>"user1", "PWD"=>"u53r1", "ReturnDatesAsStrings" =>"true");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
     //echo "Conexión establecida en DESARROLLO.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
