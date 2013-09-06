<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	$limite=10;
    require_once('model/PersonasModel.php');
    $alu = new personas;

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
    $total_registros = $alu->get_contar_alumnos();
    //echo $total;
    //exit();
    $alumnos = $alu->get_paginacion_alumnos($inicio, $limite);
    $total_paginas = ceil($total_registros / $limite);

    require_once("views/alumnos.phtml");
}else{
    header("Location: ".Conectar::con()."?accion=home");
    exit();
}
?>