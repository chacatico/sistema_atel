<?php
if (isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1) 
{
	require_once("model/almacenModel.php");
	require_once("model/personasModel.php");
	$fac = new almacen;
	$ven = new personas;
	// print_r($_POST);
	if(isset($_POST["grabar"])){

		$fac->registrar_factura();

	}else{

		$vendedor= $ven->get_personal();
	}
		require_once("views/nuevaFactura.phtml");
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
?>