<<<<<<< HEAD
<?php
session_start();
if(isset($_SESSION["usuario_id"]))
{
	session_destroy();
	header("Location: ".Conectar::ruta()."?accion=index");
	exit();
}
=======
<?php
session_start();
if(isset($_SESSION["usuario_id"]))
{
	session_destroy();
	header("Location: ".Conectar::ruta()."?accion=index");
	exit();
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>