<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	if (isset($_POST["grabar"]))
	{
		//print_r($_POST);
		//exit();
		require_once("model/Cursos1Model.php");
		$cur=new cursos1;

		$cur->crear_curso1();
	}else
	{
		require_once('views/crear_curso1.phtml');
	}
}else{
	header("location: ".Conectar::ruta()."?accion=home");
	exit();
}

?>