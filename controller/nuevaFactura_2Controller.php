<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/almacenModel.php");
	$fact = new almacen;
	$id = $_GET["id"];

	if (isset($_POST["grabar"])) {
		$fact->registro_completo_factura();
	}
		$datos = $fact->get_datos_factura($id);
		$productos = $fact->detalle_factura($id);
		require_once("views/nuevaFactura_2.phtml");
}else{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
?>