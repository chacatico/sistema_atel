<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once('views/facturacion.phtml');
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
?>