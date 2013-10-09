<<<<<<< HEAD
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
=======
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
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>