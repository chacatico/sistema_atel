<<<<<<< HEAD
<?php
{
	require_once("model/noticiasModel.php");
	$not = new noticias;
	$noticias = $not->get_noticias();

	require_once('views/servicios.phtml');
}
=======
<?php
{
	require_once("model/noticiasModel.php");
	$not = new noticias;
	$noticias = $not->get_noticias();

	require_once('views/servicios.phtml');
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>