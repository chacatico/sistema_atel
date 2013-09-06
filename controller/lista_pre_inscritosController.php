<?php
if (isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"]!="")
{
		// print_r($_POST);
		// exit();
		require_once("model/PersonasModel.php");
		$pers=new personas();

		$pre_inscritos = $pers->get_pre_inscritos();
		require_once('views/lista_pre_inscritos.phtml');
}else
{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
?>