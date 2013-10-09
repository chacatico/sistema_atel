<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "")
{
	require_once('views/usuario.phtml');
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "")
{
	require_once('views/usuario.phtml');
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>