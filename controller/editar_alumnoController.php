<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{    
    require_once("model/PersonasModel.php");
    $per = new personas();

    if (isset($_POST["grabar"])) {
    	//print_r($_POST);
    	//exit();
    	$per->editar_alumno();
    }else
    {
        $id= $_GET["id"];
        $alumnos=$per->get_alumno_por_id($id);
    	require_once("views/editar_alumno.phtml");
    }
    
}else
{
 header("location: ".Conectar::ruta()."?accion=home");
 exit();
}
?>