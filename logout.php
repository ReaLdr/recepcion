<?php
# CÓDIGO QUE TRUENA LA SESIÓN EXISTENTE Y TE REDIRIGE AL LOGIN
	session_start();
	session_destroy();
	header("Location: login.php");
?>
