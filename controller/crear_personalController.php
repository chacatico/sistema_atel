<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/PersonasModel.php");
	$pers=new personas();

	if (isset($_POST["grabar"]))
	{
		//print_r($_POST);
		//exit();

		$pers->crear_personal();
	}else{
		$estados = $pers->get_estados();
		$profesion = $pers->get_profesion();
	}
		require_once('views/crear_personal.phtml');
	
}else{
	header("location: ".Conectar::ruta()."?accion=home");
	exit();
}

?>