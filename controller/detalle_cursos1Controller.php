<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
	if(isset($_SESSION["usuario_id"]))	
	{
		$limite=10;
		require_once("model/Cursos1Model.php");
		//require_once("model/AsistenciasModel.php");
		$cur = new cursos1;
		//$asi = new asistencias;
		$id = $_GET["id"];

		$alumnos=$cur->get_alumno_curso($id);

		$cursos1=$cur->get_curso_por_id($id);
		
		$total_paginas = ceil($total_registros / $limite);
		
		require_once("views/detalle_cursos1.phtml");
	}
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
    
?>