<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1){
	require_once("model/userModel.php");
	$u = new Usuarios;

	if(isset($_POST["agregar_usuario"]) and $_POST["agregar_usuario"] == "grabar"){
		$u -> new_usuario();
	}

	require_once("views/new_user.phtml");
}else{
	header("Location: ".Conectar::ruta()."?accion=home");
	exit();
}
?>