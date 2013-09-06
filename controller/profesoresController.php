<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	$limite=10;
    require_once('model/PersonasModel.php');
    $prof = new personas;

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
    $total_registros = $prof->get_contar_profesores();
    //echo $total;
    //exit();
    $profesores = $prof->get_paginacion_profesores($inicio, $limite);
    $total_paginas = ceil($total_registros / $limite);

    require_once("views/profesores.phtml");
}else{
    header("Location: ".Conectar::ruta()."?accion=home");
    exit();
}
?>