<<<<<<< HEAD
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
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
=======
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
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>