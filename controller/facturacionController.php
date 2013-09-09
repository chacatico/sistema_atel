<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	$limite=10;
	require_once('model/almacenModel.php');
	$f = new almacen;

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

    $total_registros = $f->get_contar_facturas();
    //echo $total;
    //exit();
    $facturas = $f->get_paginacion_facturas($inicio, $limite);
    $total_paginas = ceil($total_registros / $limite);

	require_once('views/facturacion.phtml');
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
?>