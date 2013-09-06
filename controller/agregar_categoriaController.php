<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/almacenModel.php");
	$cat = new almacen;

	if(isset($_POST["grabar"]))
	{
		$cat->agregar_categoria();
	}

	require_once("views/agregar_categoria.phtml");
}else{
	header("Location: ".Conectar::con()."?accio=home");
	exit();
}
?>