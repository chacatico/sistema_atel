<?php
{
	if (isset($_POST["grabar"]))
	{
		// print_r($_POST);
		// exit();
		require_once("model/PersonasModel.php");
		$pers=new personas();

		$pers->pre_inscripcion();
	}else
	{
		require_once('views/pre_inscrpcion.phtml');
	}
}
	
?>