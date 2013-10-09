<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	$limite=10;
    require_once('model/Cursos1Model.php');
    $cur = new cursos1;

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
    $total_registros = $cur->get_contar_cursos1();
    //echo $total;
    //exit();
    $cursos1 = $cur->get_paginacion_cursos1($inicio, $limite);
    $total_paginas = ceil($total_registros / $limite);

    require_once("views/cursos1.phtml");
}else{
    header("Location: ".Conectar::ruta()."?accion=home");
    exit();
}
=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	$limite=10;
    require_once('model/Cursos1Model.php');
    $cur = new cursos1;

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
    $total_registros = $cur->get_contar_cursos1();
    //echo $total;
    //exit();
    $cursos1 = $cur->get_paginacion_cursos1($inicio, $limite);
    $total_paginas = ceil($total_registros / $limite);

    require_once("views/cursos1.phtml");
}else{
    header("Location: ".Conectar::ruta()."?accion=home");
    exit();
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>