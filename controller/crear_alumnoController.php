<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/PersonasModel.php");
	$pers=new personas;

	if (isset($_POST["grabar"]) and $_POST["grabar"] == "registro_alumno")	{
		$pers->crear_alumno();
	}else{
		$estado = $pers->get_estados();
		// print_r($estado);
		// print_r($profesion);
		$profesion = $pers->get_profesion();
		require_once('views/crear_alumno.phtml');
	}
}else{
	header("location: ".Conectar::ruta()."?accion=home");
	exit();
}

?>