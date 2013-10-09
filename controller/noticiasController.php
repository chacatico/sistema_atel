<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	require_once("model/noticiasModel.php");
	$not = new noticias;

	$pagina = $_GET["pagina"];

    if (!$pagina) 
    {
    	$inicio = 0;
    	$pagina = 1;
    }
    else
    {
    	$inicio = ($pagina - 1) * $limite;
    }
    
	$noticias = $not->get_noticias();

	require_once("views/noticias.phtml");
}
?>