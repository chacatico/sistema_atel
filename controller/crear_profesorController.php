<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	if (isset($_POST["grabar"]))
	{
		//print_r($_POST);
		//exit();
		require_once("model/PersonasModel.php");
		$pers=new personas();

		$pers->crear_profesor();
		// $pers->select_dinamico();
	}else
	{
		require_once('views/crear_profesor.phtml');
	}
}else{
	header("location: ".Conectar::ruta()."?accion=home");
	exit();
}

?>