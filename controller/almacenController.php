<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once('views/almacen.phtml');
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once('views/almacen.phtml');
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>