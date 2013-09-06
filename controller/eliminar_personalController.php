<?php
{  
    require_once("model/PersonasModel.php");
    $pers = new personas();

    if (isset($_GET["id"])) 
    {
        $pers->eliminar_personal();
    }else
	{
    header("location: ".Conectar::ruta()."?accion=error");
    exit();
	}
}
?>