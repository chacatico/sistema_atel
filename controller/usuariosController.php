<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/userModel.php");
	$u = new Usuarios;

	require_once("views/usuario.phtml");
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
?>