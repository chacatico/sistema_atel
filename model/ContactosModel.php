<?php

Class contactos extends Conectar
{
    //Primero Creo Mis Atributos
    private $contactos;
    
    //Crear mi Contructor de la clase

    public function __construct()
    {
        $this->contacto=array();
    }
        
    public function crear_contacto()
    {
        if
        (  
            isset($_POST["nombre"]) and $_POST["nombre"] == "" or
            isset($_POST["empresa"]) and $_POST["empresa"] == "" or
            isset($_POST["tipo_de_servicio"]) and $_POST["tipo_de_servicio"] == "0" or
            isset($_POST["descripcion"]) and $_POST["descripcion"] == "" or
            isset($_POST["correo"]) and $_POST["correo"] == "0"
        ){
            header("Location: ".Conectar::ruta()."?accion=contacto&e=1");
            exit();
        }else{

            parent::con();
            $query=sprintf
                (
                    "insert into contactos 
                    values
                    (NULL, %s, %s, %s, %s, %s, '2');
                    ",
                    parent::comillas_inteligentes($_POST["nombre"]),
                    parent::comillas_inteligentes($_POST["empresa"]),
                    parent::comillas_inteligentes($_POST["tipo_de_servicio"]),
                    parent::comillas_inteligentes($_POST["descripcion"]),
                    parent::comillas_inteligentes($_POST["correo"])
                    );
                //echo $query;            
                //exit();
                mysql_query($query);
                header("Location: ".Conectar::ruta()."?accion=contacto&e=2");
                exit();
            }

    }
} 
?>