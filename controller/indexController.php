<<<<<<< HEAD
<?php
{
    require_once("model/userModel.php");
    require_once("model/noticiasModel.php");
    $usr=new Usuarios;
    $not = new noticias;
    if(isset($_POST['consultar']) and $_POST['consultar']== 'si' )
    {
    	//print_r($_POST);
    	//exit();
        $usr->login();
        exit();    
    }else
    {        
        $noticias = $not->get_noticias();
    	require_once('views/index.phtml');
    }
}
?>




    
    
=======
<?php
{
    require_once("model/userModel.php");
    require_once("model/noticiasModel.php");
    $usr=new Usuarios;
    $not = new noticias;
    if(isset($_POST['consultar']) and $_POST['consultar']== 'si' )
    {
    	//print_r($_POST);
    	//exit();
        $usr->login();
        exit();    
    }else
    {        
        $noticias = $not->get_noticias();
    	require_once('views/index.phtml');
    }
}
?>




    
    
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
    