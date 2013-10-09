<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] !="" and $_SESSION["usuario_lvl"] == 1){
	require_once("model/cursos1Model.php");
	$a = new cursos1;

	$id_curso=$_GET["id"];
	$cedula= $_POST["cedula"];

	if (isset($_POST["grabar"])){
		$a->agregar_alumno($cedula,$id_curso);
	}	
	require_once("views/asignar_alumno.phtml");
}else{
	header("Location: ".Conectar::url()."?accion=home");
	exit();
}
?>

<!--  -->