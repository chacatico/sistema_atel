<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] !="" and $_SESSION["usuario_lvl"] == 2){
	require_once("model/Cursos1Model.php");
	$notas = new cursos1;

	require_once("views/notas.phtml");
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
?>