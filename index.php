<<<<<<< HEAD
<?php
date_default_timezone_set("America/Caracas");
require_once("includes/config.php");

    if(!empty($_GET["accion"]))
    {
        $accion=$_GET["accion"];
    }else
    {
        $accion="index";
    }
    if(is_file("controller/".$accion."Controller.php"))
    {
        require_once("controller/".$accion."Controller.php");
    }else 
    {
        require_once("controller/errorController.php");
    }    
=======
<?php
date_default_timezone_set("America/Caracas");
require_once("includes/config.php");

    if(!empty($_GET["accion"]))
    {
        $accion=$_GET["accion"];
    }else
    {
        $accion="index";
    }
    if(is_file("controller/".$accion."Controller.php"))
    {
        require_once("controller/".$accion."Controller.php");
    }else 
    {
        require_once("controller/errorController.php");
    }    
>>>>>>> 8b3fee72c8f53d8856300fe3ce99058a40d12624
?>