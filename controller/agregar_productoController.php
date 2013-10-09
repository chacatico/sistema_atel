<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/almacenModel.php");
	$producto = new almacen;

	if(isset($_POST["grabar"])){
		$producto->agregar_producto();
	}else
	{
		print_r($categoria);
		$categoria= $producto->get_categorias();
	}
	require_once("views/agregar_producto.phtml");

}else{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/almacenModel.php");
	$producto = new almacen;

	if(isset($_POST["grabar"])){
		$producto->agregar_producto();
	}else
	{
		print_r($categoria);
		$categoria= $producto->get_categorias();
	}
	require_once("views/agregar_producto.phtml");

}else{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>