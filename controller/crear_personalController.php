<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	if (isset($_POST["grabar"]))
	{
		//print_r($_POST);
		//exit();
		require_once("model/PersonasModel.php");
		$pers=new personas();

		$pers->crear_personal();
	}else
	{
		require_once('views/crear_personal.phtml');
	}
}else{
	header("location: ".Conectar::ruta()."?accion=home");
	exit();
}

=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	if (isset($_POST["grabar"]))
	{
		//print_r($_POST);
		//exit();
		require_once("model/PersonasModel.php");
		$pers=new personas();

		$pers->crear_personal();
	}else
	{
		require_once('views/crear_personal.phtml');
	}
}else{
	header("location: ".Conectar::ruta()."?accion=home");
	exit();
}

>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>