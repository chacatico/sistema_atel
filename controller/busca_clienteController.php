<?php
if (isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1) 
{
	require_once("model/PersonasModel.php");
	$c = new personas;
	$ven = new personas;

	if (isset($_POST["cedula"]) and $_POST["cedula"] != "") {
		
		$cedula = $_POST["cedula"];
		$cliente = $c->get_cliente_cedula($_POST["cedula"]);

		require_once("views/nuevaFactura.phtml");

	}else{
		$vendedor= $ven->get_personal();
		echo "<script>
				alert('Debe ingresar una cédula');
				window.location='?accion=nuevaFactura';
			  </script>;";
	}
}else{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
?>