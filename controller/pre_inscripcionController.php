<<<<<<< HEAD
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
	
=======
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
	
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>