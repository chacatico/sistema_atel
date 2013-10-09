<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/PersonasModel.php");
	$pers=new personas;
	if (isset($_POST["grabar"]))
	{
		$pers->crear_alumno();
	}else
	{
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

=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/PersonasModel.php");
	$pers=new personas;
	if (isset($_POST["grabar"]))
	{
		$pers->crear_alumno();
	}else
	{
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

>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>