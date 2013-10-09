<<<<<<< HEAD
<?php
{  
    require_once("model/PersonasModel.php");
    $pers = new personas();

    if (isset($_GET["id"])) 
    {
        $pers->eliminar_profesor();
    }else
	{
    header("location: ".Conectar::ruta()."?accion=error");
    exit();
	}
}
=======
<?php
{  
    require_once("model/PersonasModel.php");
    $pers = new personas();

    if (isset($_GET["id"])) 
    {
        $pers->eliminar_profesor();
    }else
	{
    header("location: ".Conectar::ruta()."?accion=error");
    exit();
	}
}
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>