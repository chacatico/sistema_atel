<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{    
    require_once("model/Cursos1Model.php");
    $cur = new cursos1();

    if (isset($_POST["grabar"])) {
    	//print_r($_POST);
    	//exit();
    	$cur->editar_curso();
    }else
    {
        $id= $_GET["id"];
        $curso=$cur->get_curso_por_id($id);
    	require_once("views/editar_curso.phtml");
    }
    
}else
{
 header("location: ".Conectar::ruta()."?accion=home");
 exit();
}
?>