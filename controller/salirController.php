<?php
session_start();
if(isset($_SESSION["usuario_id"]))
{
	session_destroy();
	header("Location: ".Conectar::ruta()."?accion=index");
	exit();
}
?>