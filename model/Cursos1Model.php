<?php

Class cursos1 extends Conectar
{
    //Primero Creo Mis Atributos
    private $cursos1;
    
    //Crear mi Contructor de la clase

    public function __construct()
    {
        $this->curso1=array();
    }
        
     public function get_contar_cursos1()
    {
        $sql=
        "
        select 
        c.nombre,
        c.nivel,
        c.horario,
        c.fecha_inicio,
        c.fecha_final,
        c.capacidad,
        c.profesor
        from 
        cursos1 as c "; 
        

        //echo $sql;
        $res=mysql_query($sql, parent::con());
        $total_registros=mysql_num_rows($res);
          
        return $total_registros;    
    }

    public function get_paginacion_cursos1($inicio, $limite)
    {
        $sql=
        "
        select
        c.id_curso,
        c.nombre,
        c.nivel,
        c.horario,
        c.fecha_inicio,
        c.fecha_final,
        c.capacidad,
        c.profesor
        from 
        cursos1 as c 
        limit " . $inicio . "," . $limite;

        //echo $sql;
        //exit();

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->curso[]=$reg;
        }
            return $this->curso;
    }

    public function get_paginacion_cursos1_report($inicio, $limite)
    {
        $sql=
        "
        select
        c.id_curso,
        c.nombre,
        c.nivel,
        c.horario,
        c.fecha_inicio,
        c.fecha_final,
        c.capacidad,
        c.profesor
        from 
        cursos1 as c 
        limit " . $inicio . "," . $limite;

        //echo $sql;
        //exit();

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->curso[]=$reg;
        }
            return $this->curso;
    }    

    public function crear_curso1()
    {
        if(
            isset($_POST["nombre"]) and $_POST["nombre"] == "" or
            isset($_POST["nivel"]) and $_POST["nivel"] == "" or
            isset($_POST["horario"]) and $_POST["horario"] == "" or
            isset($_POST["fecha_inicio"]) and $_POST["fecha_inicio"] == "" or
            isset($_POST["fecha_final"]) and $_POST["fecha_final"] == "" or
            isset($_POST["capacidad"]) and $_POST["capacidad"] == "" or
            isset($_POST["profesor"]) and $_POST["profesor"] == "" 
            )
        {
            header("Location: ".Conectar::ruta()."?accion=crear_curso1&e=1");
        
        }else
            {
                
            parent::con();
            $query=sprintf
                (
                    "insert into cursos1 
                    values
                    (NULL, %s, %s, %s, %s, %s, %s, %s);
                    ",
                    parent::comillas_inteligentes($_POST["nombre"]),
                    parent::comillas_inteligentes($_POST["nivel"]),
                    parent::comillas_inteligentes($_POST["horario"]),
                    parent::comillas_inteligentes($_POST["fecha_inicio"]),
                    parent::comillas_inteligentes($_POST["fecha_final"]),
                    parent::comillas_inteligentes($_POST["capacidad"]),
                    parent::comillas_inteligentes($_POST["profesor"])
                    );
                //echo $query;            
                //exit();
                mysql_query($query);
                $var = mysql_insert_id();
                echo utf8_decode("<script type='text/javascript'>
                alert('El registro se realizó correctamente');
                window.location='?accion=cursos1&id=$var';
                </script>");
                
                // header("Location: ".Conectar::ruta()."?accion=detalle_abuelos&id=$var");
                exit();
            }

            
    }

    public function editar_curso()
    {
         //$fecha = $_POST["fecha_nac"];
           // $dia = $fecha[0]."".$fecha[1];
            //$mes = $fecha[3]."".$fecha[4];
            //$anio = $fecha[6]."".$fecha[7]."".$fecha[8]."".$fecha[9];
            
            //$fechaNueva = $anio."-".$mes."-".$dia;
        parent::con();
        $sql=sprintf
        (
            "update cursos1
            set

            nombre=%s,
            nivel=%s,
            horario=%s,
            fecha_inicio=%s,
            fecha_final=%s,
            capacidad=%s,
            profesor=%s
            where
            id_curso=%s
            ",

            parent::comillas_inteligentes($_POST["nombre"]),
            parent::comillas_inteligentes($_POST["nivel"]),
            parent::comillas_inteligentes($_POST["horario"]),
            parent::comillas_inteligentes($_POST["fecha_inicio"]),
            parent::comillas_inteligentes($_POST["fecha_final"]),
            parent::comillas_inteligentes($_POST["capacidad"]),
            parent::comillas_inteligentes($_POST["profesor"]),
            parent::comillas_inteligentes($_POST["id_curso"])
        );
            //echo $sql;
            //exit();
        $res=mysql_query($sql,Conectar::con());
        echo utf8_decode("<script type='text/javascript'>
        alert('Cambios realizados correctamente');
        window.location='?accion=cursos1&id=".$_POST["id_curso"]."';
        </script>");
    }

    public function get_curso_por_id($id)
    {
        parent::con();
        $sql=sprintf
        (
        "
        select
        *
        from cursos1 
        where 
        id_curso = %s",
        parent::comillas_inteligentes($id)
        );
        // echo $sql;
        // exit();
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->cursos1[]=$reg;
        }
            return $this->cursos1;
    }

    public function eliminar_curso()
    {
        //print_r($_GET);

        $sql=sprintf(
        "delete from cursos1 where id_curso=%s",
        parent::comillas_inteligentes($_GET["id"])
        );
        //echo $sql;
        //exit();
        
        $res=mysql_query($sql,Conectar::con());
        echo utf8_decode("<script type='text/javascript'>
        alert('El registro ha sido eliminado correctamente');
        window.location='?accion=cursos1';
        </script>");
    }


} 
?>