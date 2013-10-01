<?php
if (isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1) 
{
	require_once("model/personasModel.php");
	$clie = new personas;

	if (isset($_POST["nuevo"])) {
		$clie->nuevo_cliente();
	}

	require_once("views/nuevo_cliente.phtml");
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
?>