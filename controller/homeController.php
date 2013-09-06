<?php
if (isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"]!="")
{
	require_once('views/home.phtml');
	
}else{
	header("location: ".Conectar::ruta()."?accion=index");
	exit();
}
?>