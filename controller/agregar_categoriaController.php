<<<<<<< HEAD
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
=======
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
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>