<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "")
{
	require_once('views/usuario.phtml');
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
?>