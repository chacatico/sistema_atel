<?php
class noticias extends Conectar
{
    
    private $news;
    private $categoria;
    private $noticia;    
    public function __construct()
    {
        $this->news=array();
        $this->categoria=array();
        $this->noticia=array();
    }
    
    public function get_news()
    {
        $sql=
        "
        SELECT
        n.id_new,
        n.titulo_new,
        n.detalle_new,
        n.imagen_new,
        n.id_categoria,
        n.fecha_creacion,
        n.fecha_mod,
        n.estado_new,
        n.id_usuario,
        n.meta_new,
        c.id_cat,
        c.categoria,
        u.login_usr,
        u.id_grupo,
        u.id_usr  
        FROM 
        usuarios AS u, noticias AS n, categorias_post AS c
        WHERE 
        n.id_usuario = u.id_usr
        AND n.id_categoria = c.id_cat 
        AND u.id_grupo >= 2
        order by n.id_new DESC";
        //echo $sql;
        //exit;
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->news[]=$reg;
        }
            return $this->news;        
    }

    public function get_news_pendientes()
    {
        $sql=
        "
        SELECT
        n.id_new,
        n.titulo_new,
        n.detalle_new,
        n.imagen_new,
        n.id_categoria,
        n.fecha_creacion,
        n.fecha_mod,
        n.estado_new,
        n.id_usuario,
        n.meta_new,
        c.id_cat,
        c.categoria,
        u.login_usr,
        u.id_grupo,
        u.id_usr  
        FROM 
        usuarios AS u, noticias AS n, categorias_post AS c
        WHERE 
        n.id_usuario = u.id_usr
        AND n.id_categoria = c.id_cat 
        AND u.id_grupo != 1
        AND n.estado_new = 'en espera'
        order by n.id_new DESC";
        //echo $sql;
        //exit();
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->news[]=$reg;
        }
            return $this->news;        
    }



    
    public function get_categorias()
    {
        $sql="select id_cat, categoria from categorias_post";
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->categoria[]=$reg;
        }
            return $this->categoria;
        
    }
    
    
    public function get_noticias_por_id()
    {
        
        parent::con();
        $sql=sprintf
        (
            "
        SELECT
        n.id_new,
        n.titulo_new,
        n.intro_new,
        n.detalle_new,
        n.imagen_new,
        n.id_categoria,
        n.fecha_creacion,
        n.fecha_mod,
        n.estado_new,
        n.id_usuario,
        n.meta_new,
        c.id_cat,
        c.categoria,
        u.login_usr,
        u.id_usr
        from
        noticias AS n, categorias_post AS c, usuarios AS u
        where
        n.id_categoria = c.id_cat
        and n.id_usuario = u.id_usr
        and
        n.id_new=%s order by n.id_new DESC
        ",
        parent::comillas_inteligentes($_GET["id"])
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
    
    
    public function get_noticias_por_usuario($id)
    {
        $sql=
        "
        SELECT
        n.id_new,
        n.titulo_new,
        n.detalle_new,
        n.imagen_new,
        n.id_categoria,
        n.fecha_creacion,
        n.fecha_mod,
        n.estado_new,
        n.id_usuario,
        n.meta_new,
        c.id_cat,
        c.categoria,
        u.login_usr,
        u.id_usr 
        FROM 
        usuarios AS u, noticias AS n, categorias_post AS c
        WHERE 
        n.id_usuario = u.id_usr
        AND n.id_categoria = c.id_cat and n.id_usuario =".$id." 
        order by n.id_new DESC
        ";
        
        //echo $sql;exit;
        
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->noticia[]=$reg;
        }
            return $this->noticia;
    }
    
    public function agregar_noticia()
    {
       //print_r($_POST);
       //echo"<br>";
       //print_r($_FILES);
       //exit; 
        //echo "hola";
        if($_POST["cat"]== 0 or empty($_POST["titulo"]) or empty($_POST["texto_post"]))
        {
         
            header("Location: ".Conectar::ruta()."?accion=addnoticia&e=1");
            exit();
        }
       
        parent::con();
            $query=sprintf
            (
                "insert into noticias
                 values
                (null, %s, %s, %s, '', %s, NOW( ),NOW( ), %s, 'publicado', 'no', %s);
                ",
                parent::comillas_inteligentes($_POST["titulo"]),
                parent::comillas_inteligentes($_POST["intro"]),
                parent::comillas_inteligentes($_POST["texto_post"]),
                parent::comillas_inteligentes($_POST["cat"]),
                parent::comillas_inteligentes($_POST["id_usr"]),
                parent::comillas_inteligentes($_POST["meta"])

            );
            //echo $query;
            //exit;            
            mysql_query($query);
            
            $img="img_noticia_".mysql_insert_id().".jpg";
            copy($_FILES["img"]["tmp_name"],"../sitio/public/img/noticias/$img");
            $sql2="update noticias set imagen_new='$img' where id_new=".mysql_insert_id();
            mysql_query($sql2);
            header("Location: ".Conectar::ruta()."?accion=noticias&e=2");exit();
    }    
    
    
    public function editar_noticia()
    {   
       //print_r($_POST);
       //echo"<br><br>";
       //print_r($_FILES);
        
        if($_POST["cat"] == 0 or empty($_POST["titulo"]) or empty($_POST["intro"]) or empty($_POST["texto_post"]))
        {
            header("Location: ".Conectar::ruta()."/?accion=noticias&var=editar&e=1&id=".$_POST["id"]);exit();
        }
        
        //indentifico la imgque debo asignar
        if(empty($_FILES["img"]["name"]))
        {
            $img=$_POST["img2"];
        }else
        {
            $img="img_noticia_".$_POST["id"].".jpg";
            copy($_FILES["img"]["tmp_name"],"../sitio/public/img/noticias/$img");
        }
        parent::con();
          
        $sql=sprintf
        (
            "update noticias
            set
            titulo_new=%s,
            intro_new=%s,
            detalle_new=%s,
            imagen_new='$img',
            id_categoria=%s,
            fecha_mod=NOW(),
            meta_new=%s
            where
            id_new=%s
            ",
            parent::comillas_inteligentes($_POST["titulo"]),
            parent::comillas_inteligentes($_POST["intro"]),
            parent::comillas_inteligentes($_POST["texto_post"]),
            parent::comillas_inteligentes($_POST["cat"]),
            parent::comillas_inteligentes($_POST["meta"]),
            parent::comillas_inteligentes($_POST["id"])
        );
        //echo $sql;exit;
        mysql_query($sql);
        header("Location: ".Conectar::ruta()."?accion=noticias&var=detalle&e=2&id=".$_POST["id"]);exit();         
    }
    
    public function eliminarnew($new)
    {
        unlink("../sitio/public/img/noticias/img_noticia_".$new.".jpg");
        parent::con();
    
        $sql=sprintf(
        "delete from noticias where id_new=%s",
        parent::comillas_inteligentes($new)
        );
        //echo $sql;
        //exit;
        
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
              alert('La Noticia ha sido Publicada correctamente');
              window.location='?accion=noticias';
              </script>";
    }

    public function aprobar_noticia($id)
    {
        parent::con();
        $sql=sprintf
        (
            "update noticias
            set
            fecha_mod = NOW(),
            estado_new='publicado'
            where
            id_new=%s
            ",
            parent::comillas_inteligentes($id)
                    );
        //echo $sql;exit;
        mysql_query($sql);

        $usr = $this->get_noticias_por_id($id);
        #print_r($usr);
        #echo $usr[0]["id_usuario"];
        #echo $usr[0]["login_usr"];
        #echo $usr[0]["titulo_new"];
        #echo $usr[0]["id_new"];
        #exit();

        $notificacion = "Felicidades!! Su noticia <a href='?accion=noticias&var=detalle&id=".$id."'".$usr[0]["titulo_new"]."</a> ha sido Públicada";

        $query=sprintf
            (
                "insert into notificaciones 
                values
                (null,%s,%s,'usuario','activo');
                ",
                parent::comillas_inteligentes($notificacion),
                parent::comillas_inteligentes($usr[0]["id_usr"])
            );
            
        mysql_query($query);

        echo "<script type='text/javascript'>
              alert('La Noticia ha sido Publicada correctamente');
              window.location='?accion=noticias';
              </script>";
    }

    public function rechazar_noticia($id)
    {
        parent::con();
        $sql=sprintf
        (
            "update noticias
            set
            fecha_mod = NOW(),
            estado_new='rechazado'
            where
            id_new=%s
            ",
            parent::comillas_inteligentes($id)
                    );
        //echo $sql;exit;
        mysql_query($sql);

        $usr = $this->get_noticias_por_id($id);
        #print_r($usr);
        #echo $usr[0]["id_usuario"];
        #echo $usr[0]["login_usr"];
        #echo $usr[0]["titulo_new"];
        #echo $usr[0]["id_new"];
        #exit();

        $notificacion = "Lo Sentimos!! Su noticia <a href='?accion=noticias&var=detalle&id=".$id."'".$usr[0]["titulo_new"]."</a> ha sido Rechazada";

        $query=sprintf
            (
                "insert into notificaciones 
                values
                (null,%s,%s,'usuario','activo');
                ",
                parent::comillas_inteligentes($notificacion),
                parent::comillas_inteligentes($usr[0]["id_usr"])
            );
            
        mysql_query($query);

        echo "<script type='text/javascript'>
              alert('La Noticia ha sido Rechazada correctamente');
              window.location='?accion=noticias';
              </script>";
        exit();
    }
}
?>