<?php
{
	require_once("model/userModel.php");
	require_once("model/noticiasModel.php");
	$not = new noticias;
    $usr=new Usuarios();
    if(isset($_POST['consultar']) and $_POST['consultar']== 'si' )
    {
        $usr->login();
        exit;    
    }
	$noticias = $not->get_noticias();
    require_once('views/contacto.phtml');
}
?>
