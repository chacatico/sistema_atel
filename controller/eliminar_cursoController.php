<?php
{  
    require_once("model/Cursos1Model.php");
    $curso = new cursos1();

    if (isset($_GET["id"])) 
    {
        $curso->eliminar_curso();
    }else
	{
    header("location: ".Conectar::ruta()."?accion=error");
    exit();
	}
}
?>