<?php
{
	require_once("model/noticiasModel.php");
	$not = new noticias;
	$noticias = $not->get_noticias();
	
    require_once('views/redes.phtml');
}
?>
