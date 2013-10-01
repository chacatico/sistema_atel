<?php
class usuarios extends Conectar
{
    
    private $user;
    private $grupo;
    
    public function __construct()
    {
        $this->user=array();
    }


    public function get_grupos()
    {
        $sql=
        "
        SELECT
        id_grupo,
        nombre_grupo
        FROM 
        grupo";
        
       $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->grupo[]=$reg;
        }
            return $this->grupo;        
           
    }

    public function get_usuarios()
    {
        $sql=
        "
        SELECT
        u.Cedula,
        u.id_grupo,
        u.Usuario,
        u.Clave,
        g.id_grupo,
        g.nombre_grupo
        FROM 
        usuario AS u, grupo AS g
        WHERE 
        g.id_grupo = u.id_grupo
        ";
        
       $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->user[]=$reg;
        }
            return $this->user;        
        
        
    }


    public function new_usuario()
    {
        if(
            isset($_POST["login"]) and $_POST["login"] == "" or
            isset($_POST["pass"]) and $_POST["pass"] == "" or
            isset($_POST["nivel"]) and $_POST["nivel"] == "0")
        {
            header("Location: ".Conectar::ruta()."?accion=nuevo_usuario&e=1");exit();
        }else
        {
            
        $pass=md5(md5(md5($_POST["pass"])));
       
        parent::con();
        $sql=sprintf
        (
            "select login from usuarios where login=%s",
            parent::comillas_inteligentes($_POST["login"])
        );    
        $res=mysql_query($sql);
        $usr=mysql_num_rows($res);
        
        if($usr >=1)
        {
            echo "<script type='text/javascript'>
            alert('Ya existe un usuario con ese login');
            window.location='?accion=usuarios';
            </script>";
        }else
        {
            $query=sprintf
            (
                "insert into usuarios (id_usuario, login, pass, nivel_usr, fecha_creacion)
                values
                (NULL, %s, %s, %s, NOW());
                ",
                parent::comillas_inteligentes($_POST["login"]),
                parent::comillas_inteligentes($pass),
                parent::comillas_inteligentes($_POST["nivel"])
            );
            // echo $query;            
            // exit();
            mysql_query($query);
            $var = mysql_insert_id();
            echo "<script type='text/javascript'>
            alert('El registro se realizó correctamente');
            window.location='?accion=usuarios';
            </script>";

            exit();
        }

    }
    
    }
    
    public function get_contar_user()
    {
        $sql=
        "
        select  
        login,
        nivel_usr
        from 
        usuarios 
        ";

        //echo $sql;
        $res=mysql_query($sql, parent::con());
        $total_registros=mysql_num_rows($res);
          
        return $total_registros;    
    }
    
    public function get_paginacion_user_report($inicio, $limite)
    {
        $sql=
        "
        SELECT
        id_usuario,
        login,
        nivel_usr,
        fecha_creacion
        from 
        usuarios
        where
        id_usuario = id_usuario
        order by login asc
        limit " . $inicio . "," . $limite;
                 
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->user[]=$reg;
        }
            return $this->user;        
    }

    public function get_paginacion_user($inicio, $limite)
    {
        $sql=
        "
        SELECT
        id_usuario,
        login,
        nivel_usr,
        fecha_creacion
        from 
        usuarios
        where
        id_usuario = id_usuario
        order by id_usuario desc
        limit " . $inicio . "," . $limite;
                 
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->user[]=$reg;
        }
            return $this->user;        
    }
    
    public function edit_user()
    {
        if($_POST["grupo"]==0 or empty($_POST["nom_usr"]) or empty($_POST["ape_usr"]) or empty($_POST["cedula_usr"]) or empty($_POST["email_usr"]) or Conectar::valida_correo($_POST["email_usr"])==false or empty($_POST["tlf_usr"]) )
        {
            header("Location: ".Conectar::ruta()."/?accion=editusuario&e=1&usr=".$_POST["id"]);exit();
        }
        //indentifico la foto que debo asignar
        if(empty($_FILES["foto"]["name"]))
        {
            $foto=$_POST["archivo"];
        }else
        {
            $foto="foto_".$_POST["id"].".jpg";
            copy($_FILES["foto"]["tmp_name"],"public/images/avatar/$foto");
        }
        parent::con();
          
        $sql=sprintf
        (
            "update usuarios
            set
            nom_usr=%s,
            ape_usr=%s,
            cedula_usr=%s,
            dir_usr=%s,
            tlf_usr=%s,
            id_sexo=%s,
            correo=%s,
            avatar_usr='$foto',
            id_grupo=%s
            where
            id_usr=%s
            ",
            parent::comillas_inteligentes($_POST["nom_usr"]),
            parent::comillas_inteligentes($_POST["ape_usr"]),
            parent::comillas_inteligentes($_POST["cedula_usr"]),
            parent::comillas_inteligentes($_POST["dir_usr"]),
            parent::comillas_inteligentes($_POST["tlf_usr"]),
            parent::comillas_inteligentes($_POST["sexo"]),
            parent::comillas_inteligentes($_POST["email_usr"]),
            parent::comillas_inteligentes($_POST["grupo"]),
            parent::comillas_inteligentes($_POST["id"])
        );
        //echo $sql;exit;
        mysql_query($sql);
         header("Location: ".Conectar::ruta()."?accion=editusuario&e=3&usr=".$_POST["id"]);exit();
               
    }

    public function editar_user($id)
    {
        //print_r($_POST);
        //exit;
        if(empty($_POST["nom_usr"]) or empty($_POST["ape_usr"]) or empty($_POST["cedula_usr"]) or empty($_POST["email_usr"]) or Conectar::valida_correo($_POST["email_usr"])==false or empty($_POST["tlf_usr"]) )
        {
            header("Location: ".Conectar::ruta()."/?accion=edituser&e=1&usr=".$_SESSION["usuario_id"]);exit();
        }
        //indentifico la foto que debo asignar
        if(empty($_FILES["foto"]["name"]))
        {
            $foto=$_POST["archivo"];
        }else
        {
            $foto="foto_".$_POST["id"].".jpg";
            copy($_FILES["foto"]["tmp_name"],"public/images/avatar/$foto");
        }
        parent::con();
          
        $sql=sprintf
        (
            "update usuarios
            set
            nom_usr=%s,
            ape_usr=%s,
            cedula_usr=%s,
            dir_usr=%s,
            tlf_usr=%s,
            id_sexo=%s,
            correo=%s,
            avatar_usr='$foto'
            where
            id_usr=%s
            ",
            parent::comillas_inteligentes($_POST["nom_usr"]),
            parent::comillas_inteligentes($_POST["ape_usr"]),
            parent::comillas_inteligentes($_POST["cedula_usr"]),
            parent::comillas_inteligentes($_POST["dir_usr"]),
            parent::comillas_inteligentes($_POST["tlf_usr"]),
            parent::comillas_inteligentes($_POST["sexo"]),
            parent::comillas_inteligentes($_POST["email_usr"]),
            parent::comillas_inteligentes($id)
        );
        //echo $sql;exit;
        mysql_query($sql);
         header("Location: ".Conectar::ruta()."?accion=edituser&e=3&usr=".$_SESSION["usuario_id"]);exit();
               
    }
    
    public function eliminar_usr()
    {
        //print_r($usr);
        parent::con();
        
        $sql=sprintf(
        "delete from usuarios where id_usuario=%s",
        parent::comillas_inteligentes($_GET["id"])
        );
        //echo $sql;
        //exit;
        
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('El usuario ha sido eliminado correctamente');
		window.location='?accion=usuarios';
		</script>";
    }

    public function get_usuario_por_id($id)
    {
    parent::con();
        $sql=sprintf
        (
        "
        select 
        p.id_usuario, 
        p.login, 
        p.nivel_usr, 
        p.fecha_creacion
        from usuarios as p 
        where 
        p.id_usuario = %s",
        parent::comillas_inteligentes($id)
        );
        //echo $sql;
        //exit();
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->user[]=$reg;
        }
            return $this->user;
    }

    public function get_usuarios_por_login($login)
    {
        $sql=
        "
        SELECT
        u.id_usuario,
        u.login,
        u.pass,
        u.nivel_usr,
        u.status,
        u.fecha_creacion
        FROM 
        usuarios AS u
        WHERE 
        u.login = 
        '".$login."'";
        //echo $sql;
        //exit();
       $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->user[]=$reg;
        }
            return $this->user;        
        
        
    }

        public function login()
    {
        //print_r($_POST);
        //exit();

        //Si los datos están vacios devuelvo un error igual a 1
        if(empty($_POST["usuario"]) or empty($_POST["clave"]))
        {
            header("location: ".Conectar::ruta()."?accion=index&e=1");
            exit;
        }
        parent::con();
        $sql=sprintf(
            "select * from usuarios where login=%s and pass=%s",
            
            parent::comillas_inteligentes($_POST["usuario"]),
            parent::comillas_inteligentes(md5(md5(md5($_POST["clave"]))))                
        );
        //DESCOMENTAR AQUI PARA CREAR SU CONTRASEÑA ENCRIPTADA
        //echo $sql;
        //exit;
        $res=mysql_query($sql,parent::con());
        if(mysql_num_rows($res)==0)
        {
          //  echo "No hay registros";
            
            header("Location: ".Conectar::ruta()."?accion=index&e=2");
            exit;
        }else{
            if($reg=mysql_fetch_array($res))
            {   

                $_SESSION["usuario_id"]=$reg["id_usuario"];
                $_SESSION["usuario_nom"]=$reg["login"];
                $_SESSION["usuario_lvl"]=$reg["nivel_usr"];
                // $_SESSION["usuario_status"]=$reg["status"];
                //print_r($reg);
                //print_r($_SESSION);
                //exit;
                // $consulta = (" UPDATE usuarios set status = 1 where id_usuario = ".($_SESSION["usuario_id"]));
                // mysql_query($consulta);
                // echo $consulta;exit();
                header("Location:".Conectar::ruta()."?accion=home");
                exit;
            }
        }
    }
}
?>