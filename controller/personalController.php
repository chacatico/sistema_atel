<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	$limite=10;
    require_once('model/PersonasModel.php');
    $pers = new personas;

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
    $total_registros = $pers->get_contar_personal();
    //echo $total;
    //exit();
    $personal = $pers->get_paginacion_personal($inicio, $limite);
    $total_paginas = ceil($total_registros / $limite);

    require_once("views/personal.phtml");
}else{
    header("Location: ".Conectar::ruta()."?accion=home");
    exit();
}
?>