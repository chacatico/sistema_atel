<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/noticiasModel.php");
	$not = new noticias;

	if (isset($_POST["grabar"])) 
	{
		$not->agregar_noticia();
	}else{
		
		require_once("views/agregar_noticia.phtml");
	}
}else{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/noticiasModel.php");
	$not = new noticias;

	if (isset($_POST["grabar"])) 
	{
		$not->agregar_noticia();
	}else{
		
		require_once("views/agregar_noticia.phtml");
	}
}else{
	header("Location: ".Conectar::con()."?accion=home");
	exit();
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>