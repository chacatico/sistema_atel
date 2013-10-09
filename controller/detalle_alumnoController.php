<<<<<<< HEAD
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	if(isset($_SESSION["usuario_id"]))	
	{
		$limite=10;
		require_once("model/PersonasModel.php");
		//require_once("model/AsistenciasModel.php");
		$alu = new personas;
		//$asi = new asistencias;

		$alumnos=$alu->get_alumno_por_id($id);
		
		$total_paginas = ceil($total_registros / $limite);
		
		require_once("views/detalle_alumno.phtml");
	}
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
    
=======
<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	if(isset($_SESSION["usuario_id"]))	
	{
		$limite=10;
		require_once("model/PersonasModel.php");
		//require_once("model/AsistenciasModel.php");
		$alu = new personas;
		//$asi = new asistencias;

		$alumnos=$alu->get_alumno_por_id($id);
		
		$total_paginas = ceil($total_registros / $limite);
		
		require_once("views/detalle_alumno.phtml");
	}
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
    
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>