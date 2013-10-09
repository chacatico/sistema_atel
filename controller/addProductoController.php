<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/almacenModel.php");
	$p = new almacen;

	if(isset($_POST["agregar"]))
	{
		$p->addProduct_factura();

	}else{
		if(isset($_GET["id"]) and $_GET["id"] != "0")
		{
			$id = $_GET["id"];
		}
		$producto = $p->get_productos();
		require_once("views/addProducto.phtml");
	}

}else{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/almacenModel.php");
	$p = new almacen;

	if(isset($_POST["agregar"]))
	{
		$p->addProduct_factura();

	}else{
		if(isset($_GET["id"]) and $_GET["id"] != "0")
		{
			$id = $_GET["id"];
		}
		$producto = $p->get_productos();
		require_once("views/addProducto.phtml");
	}

}else{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>