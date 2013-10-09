<?php

Class personas extends Conectar
{
    //Primero Creo Mis Atributos
    private $persona;
    private $profesor;
    private $estudiante;
    private $cliente;
    
    //Crear mi Contructor de la clase

    public function __construct()
    {
        $this->persona=array();
        $this->profesor=array();
        $this->estudiante=array();
        $this->cliente=array();
    }
        
    public function select_dinamico()
    {
        // $consulta = "SELECT * from tabla WHERE id_padre = ".$_GET['id'];
        // $query = mysql_query($consulta);
        // while ($fila = mysql_fetch_array($query)) {
        //     echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
        // };
    }

    public function get_contar_profesores()
    {
        $sql=
        "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 1";

        //echo $sql;
        $res=mysql_query($sql, parent::con());
        $total_registros=mysql_num_rows($res);

        return $total_registros;
    } 

    public function get_paginacion_profesores($inicio, $limite)
    {
        $sql=
       "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 1 order by p.id_persona desc
        limit " . $inicio . "," . $limite;

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res)) 
        {
            $this->persona[]=$reg;
        }
            return $this->persona;

    }

    public function get_paginacion_profesores_report($inicio, $limite)
    {
        $sql=
        "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 1 order by p.id_persona desc
        limit " . $inicio . "," . $limite;

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }


    public function crear_profesor()
    {
        if(
            isset($_POST["cedula"]) and $_POST["cedula"] == "" or
            isset($_POST["nacionalidad"]) and $_POST["nacionalidad"] == "" or
            isset($_POST["nombre"]) and $_POST["nombre"] == "" or
            isset($_POST["apellido"]) and $_POST["apellido"] == "" or
            isset($_POST["fecha_de_nacimiento"]) and $_POST["fecha_de_nacimiento"] == "" or
            isset($_POST["telf_trabajo"]) and $_POST["telf_trabajo"] == "" or
            isset($_POST["telf_personal"]) and $_POST["telf_personal"] == "" or
            isset($_POST["correo"]) and $_POST["correo"] == "" or
            isset($_POST["ciudad"]) and $_POST["ciudad"] == "" or
            isset($_POST["profesion"]) and $_POST["profesion"] == "" 
            )
        {
            header("Location: ".Conectar::ruta()."?accion=crear_profesor&e=1");
        }else
        {
            if (is_numeric($_POST["cedula"])) 
            {

                //Verifica si una persona existe
            #Primero Hago una consulta con el parametro que quiero que es la cedula
            $consulta = "select p.cedula from personas as p where p.cedula =".$_POST["cedula"].";";
            //echo $consulta;
            //exit();
            #creo una variable persona y me paso la consulta con el mysql_query
            $persona = mysql_query($consulta,parent::con());
            #luego creo una variable "pers" con un mysql_num_rows que me devuelve el numero de columnas de una consulta y me los guarda en esa variable
            $pers=mysql_num_rows($persona);
            //echo $pers;
            //exit();

            #Condicion si mi variable $pers es mayor o no a 1 el numero 1 vendria siendo mi bandera para saber si un registro esxiste o no
            #si es 1 es porque hay un registro por lo tanto existe si es 0 es porque el registro no existe y se puede registrar la persona...
            if($pers >=1)
            {
                //Si es mayor a 0 es porque ya existe un registro entonces lo mando con un error
                echo utf8_decode("<script type='text/javascript'>
                alert('Ya existe un registro con esta cédula');
                window.location='?accion=profesores';
                </script>");
            }else
            {
                
            $fecha = $_POST["fecha_de_nacimiento"];
            $dia = $fecha[0]."".$fecha[1];
            $mes = $fecha[3]."".$fecha[4];
            $anio = $fecha[6]."".$fecha[7]."".$fecha[8]."".$fecha[9];
            
            $fechaNueva = $anio."-".$mes."-".$dia;

            $fecha_tope = date("Y") - "18";

            if($anio > $fecha_tope)
            {
            header("Location: ".Conectar::ruta()."?accion=crear_profesor&e=1");
            exit();
            
            }else{

            parent::con();
            $query=sprintf
                (
                    "insert into personas 
                    values
                    (NULL, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);
                    ",
                    parent::comillas_inteligentes($_POST["nombre"]),
                    parent::comillas_inteligentes($_POST["apellido"]),
                    parent::comillas_inteligentes($_POST["cedula"]),
                    parent::comillas_inteligentes($_POST["nacionalidad"]),
                    parent::comillas_inteligentes($_POST["fecha_de_nacimiento"]),
                    parent::comillas_inteligentes($_POST["direccion"]),
                    parent::comillas_inteligentes($_POST["grupo"]),
                    parent::comillas_inteligentes($_POST["sexo"]),
                    parent::comillas_inteligentes($_POST["fecha_ingreso"]),
                    parent::comillas_inteligentes($_POST["telf_trabajo"]),
                    parent::comillas_inteligentes($_POST["telf_personal"]),
                    parent::comillas_inteligentes($_POST["correo"]),
                    parent::comillas_inteligentes($_POST["ciudad"]),
                    parent::comillas_inteligentes($_POST["estado"]),
                    parent::comillas_inteligentes($_POST["cod_postal"]),
                    parent::comillas_inteligentes($_POST["profesion"])
                    );
                // echo $query;            
                // exit();
                mysql_query($query);
                $var = mysql_insert_id();
                echo utf8_decode("<script type='text/javascript'>
                alert('El registro se realizó correctamente');
                window.location='?accion=profesores&id=$var';
                </script>");
                
                // header("Location: ".Conectar::ruta()."?accion=detalle_abuelos&id=$var");
                exit();
                }

            }

            }else{

                 echo utf8_decode("<script type='text/javascript'>
                 alert('Solo numeros en el campo de CÉDULA');
                 window.location='?accion=crear_profesor';
                 </script>");
               
               exit();
            }
            


            }
    }

    public function eliminar_profesor()
    {
        //print_r($_GET);

        $sql=sprintf(
        "delete from personas where id_persona=%s",
        parent::comillas_inteligentes($_GET["id"])
        );
        //echo $sql;
        //exit();
        
        $res=mysql_query($sql,Conectar::con());
        echo utf8_decode("<script type='text/javascript'>
        alert('El registro ha sido eliminado correctamente');
        window.location='?accion=profesores';
        </script>");
    }

    public function editar_profesor()
    {
         //$fecha = $_POST["fecha_nac"];
           // $dia = $fecha[0]."".$fecha[1];
            //$mes = $fecha[3]."".$fecha[4];
            //$anio = $fecha[6]."".$fecha[7]."".$fecha[8]."".$fecha[9];
            
            //$fechaNueva = $anio."-".$mes."-".$dia;
        parent::con();
        $sql=sprintf
        (
            "update personas
            set

            nombre=%s,
            apellido=%s,
            cedula=%s,
            nacionalidad=%s,
            fecha_de_nacimiento=%s,
            direccion=%s,
            grupo=%s,
            sexo=%s,
            fecha_ingreso=%s,
            telf_trabajo=%s,
            telf_personal=%s,
            correo=%s,
            ciudad=%s,
            estado=%s,
            cod_postal=%s,
            profesion=%s
            where
            id_persona=%s
            ",

            parent::comillas_inteligentes($_POST["nombre"]),
            parent::comillas_inteligentes($_POST["apellido"]),
            parent::comillas_inteligentes($_POST["cedula"]),
            parent::comillas_inteligentes($_POST["nacionalidad"]),
            parent::comillas_inteligentes($_POST["fecha_de_nacimiento"]),
            parent::comillas_inteligentes($_POST["direccion"]),
            parent::comillas_inteligentes($_POST["grupo"]),
            parent::comillas_inteligentes($_POST["sexo"]),
            parent::comillas_inteligentes($_POST["fecha_ingreso"]),
            parent::comillas_inteligentes($_POST["telf_trabajo"]),
            parent::comillas_inteligentes($_POST["telf_personal"]),
            parent::comillas_inteligentes($_POST["correo"]),
            parent::comillas_inteligentes($_POST["ciudad"]),
            parent::comillas_inteligentes($_POST["estado"]),
            parent::comillas_inteligentes($_POST["cod_postal"]),
            parent::comillas_inteligentes($_POST["profesion"]),
            parent::comillas_inteligentes($_POST["id_alumno"])
        );
            //echo $sql;
            //exit();
        $res=mysql_query($sql,Conectar::con());
        echo utf8_decode("<script type='text/javascript'>
        alert('Cambios realizados correctamente');
        window.location='?accion=profesores&id=".$_POST["id_profesor"]."';
        </script>");
    }

    public function get_profesor_por_id($id)
    {
        parent::con();
        $sql=sprintf
        (
        "
        select 
        p.id_persona, 
        p.nombre, 
        p.apellido, 
        p.cedula,
        p.nacionalidad,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo and 
        p.id_persona = %s",
        parent::comillas_inteligentes($id)
        );
        //echo $sql;
        //exit();
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }



    //---------------------------------Fin Profesor-------------------------------

    // --------------------------------Inicio Personal----------------------------

    public function get_contar_personal()
    {
        $sql=
        "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 5";

        //echo $sql;
        $res=mysql_query($sql, parent::con());
        $total_registros=mysql_num_rows($res);

        return $total_registros;
    }

    public function get_personal()
    {
        $sql=
       "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 5 order by p.id_persona desc
        ";

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res)) 
        {
            $this->persona[]=$reg;
        }
            return $this->persona;   
    }

    public function get_paginacion_personal($inicio, $limite)
    {
       $sql=
       "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 5 order by p.id_persona desc
        limit " . $inicio . "," . $limite;

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res)) 
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }

    public function get_paginacion_personal_report($inicio, $limite)
    {
        $sql=
        "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 5 order by p.id_persona desc
        limit " . $inicio . "," . $limite;

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }

    public function crear_personal()
    {
        if(
            isset($_POST["cedula"]) and $_POST["cedula"] == "" or
            isset($_POST["nacionalidad"]) and $_POST["nacionalidad"] == "" or
            isset($_POST["nombre"]) and $_POST["nombre"] == "" or
            isset($_POST["apellido"]) and $_POST["apellido"] == "" or
            isset($_POST["fecha_de_nacimiento"]) and $_POST["fecha_de_nacimiento"] == "" or
            isset($_POST["telf_trabajo"]) and $_POST["telf_trabajo"] == "" or
            isset($_POST["telf_personal"]) and $_POST["telf_personal"] == "" or
            isset($_POST["correo"]) and $_POST["correo"] == "" or
            isset($_POST["ciudad"]) and $_POST["ciudad"] == "" or
            isset($_POST["profesion"]) and $_POST["profesion"] == "" 
            )
        {
            header("Location: ".Conectar::ruta()."?accion=crear_personal&e=1");
        }else
        {
            if (is_numeric($_POST["cedula"])) 
            {

                //Verifica si una persona existe
            #Primero Hago una consulta con el parametro que quiero que es la cedula
            $consulta = "select p.cedula from personas as p where p.cedula =".$_POST["cedula"].";";
            //echo $consulta;
            //exit();
            #creo una variable persona y me paso la consulta con el mysql_query
            $persona = mysql_query($consulta,parent::con());
            #luego creo una variable "pers" con un mysql_num_rows que me devuelve el numero de columnas de una consulta y me los guarda en esa variable
            $pers=mysql_num_rows($persona);
            //echo $pers;
            //exit();

            #Condicion si mi variable $pers es mayor o no a 1 el numero 1 vendria siendo mi bandera para saber si un registro esxiste o no
            #si es 1 es porque hay un registro por lo tanto existe si es 0 es porque el registro no existe y se puede registrar la persona...
            if($pers >=1)
            {
                //Si es mayor a 0 es porque ya existe un registro entonces lo mando con un error
                echo utf8_decode("<script type='text/javascript'>
                alert('Ya existe un registro con esta cédula');
                window.location='?accion=personal';
                </script>");
            }else
            {
                
            $fecha = $_POST["fecha_de_nacimiento"];
            $dia = $fecha[0]."".$fecha[1];
            $mes = $fecha[3]."".$fecha[4];
            $anio = $fecha[6]."".$fecha[7]."".$fecha[8]."".$fecha[9];
            
            $fechaNueva = $anio."-".$mes."-".$dia;

            $fecha_tope = date("Y") - "18";

            if($anio > $fecha_tope)
            {
            header("Location: ".Conectar::ruta()."?accion=crear_personal&e=2");
            exit();
            
            }else{
                // print_r($_POST);

            parent::con();
            $query=sprintf
                (
                    "insert into personas 
                    values
                    (NULL, %s, %s, %s, %s, %s, %s, %s, NOW(), %s, %s, %s, %s, %s, %s);
                    ",
                    parent::comillas_inteligentes($_POST["nombre"]),
                    parent::comillas_inteligentes($_POST["apellido"]),
                    parent::comillas_inteligentes($_POST["cedula"]),
                    parent::comillas_inteligentes($_POST["nacionalidad"]),
                    parent::comillas_inteligentes($_POST["fecha_nac"]),
                    parent::comillas_inteligentes($_POST["grupo"]),
                    parent::comillas_inteligentes($_POST["sexo"]),
                    parent::comillas_inteligentes($_POST["telf_trabajo"]),
                    parent::comillas_inteligentes($_POST["telf_personal"]),
                    parent::comillas_inteligentes($_POST["correo"]),
                    parent::comillas_inteligentes($_POST["ciudad"]),
                    parent::comillas_inteligentes($_POST["estado"]),
                    parent::comillas_inteligentes($_POST["profesion"])
                    );
                // echo $query;            
                // exit();
                mysql_query($query);
                $var = mysql_insert_id();
                echo utf8_decode("<script type='text/javascript'>
                alert('El registro se realizó correctamente');
                window.location='?accion=personal&id=$var';
                </script>");
                
                // header("Location: ".Conectar::ruta()."?accion=detalle_abuelos&id=$var");
                exit();
                }

            }

            }else{

                 echo utf8_decode("<script type='text/javascript'>
                 alert('Solo numeros en el campo de CÉDULA');
                 window.location='?accion=crear_personal';
                 </script>");
               
               exit();
            }
            


            }
    }

     public function eliminar_personal()
    {
        //print_r($_GET);

        $sql=sprintf(
        "delete from personas where id_persona=%s",
        parent::comillas_inteligentes($_GET["id"])
        );
        //echo $sql;
        //exit();
        
        $res=mysql_query($sql,Conectar::con());
        echo utf8_decode("<script type='text/javascript'>
        alert('El registro ha sido eliminado correctamente');
        window.location='?accion=personal';
        </script>");
    }

    public function editar_personal()
    {
         //$fecha = $_POST["fecha_nac"];
           // $dia = $fecha[0]."".$fecha[1];
            //$mes = $fecha[3]."".$fecha[4];
            //$anio = $fecha[6]."".$fecha[7]."".$fecha[8]."".$fecha[9];
            
            //$fechaNueva = $anio."-".$mes."-".$dia;
        parent::con();
        $sql=sprintf
        (
            "update personas
            set

            nombre=%s,
            apellido=%s,
            cedula=%s,
            nacionalidad=%s,
            fecha_de_nacimiento=%s,
            direccion=%s,
            grupo=%s,
            sexo=%s,
            fecha_ingreso=%s,
            telf_trabajo=%s,
            telf_personal=%s,
            correo=%s,
            ciudad=%s,
            estado=%s,
            cod_postal=%s,
            profesion=%s
            where
            id_persona=%s
            ",

            parent::comillas_inteligentes($_POST["nombre"]),
            parent::comillas_inteligentes($_POST["apellido"]),
            parent::comillas_inteligentes($_POST["cedula"]),
            parent::comillas_inteligentes($_POST["nacionalidad"]),
            parent::comillas_inteligentes($_POST["fecha_de_nacimiento"]),
            parent::comillas_inteligentes($_POST["direccion"]),
            parent::comillas_inteligentes($_POST["grupo"]),
            parent::comillas_inteligentes($_POST["sexo"]),
            parent::comillas_inteligentes($_POST["fecha_ingreso"]),
            parent::comillas_inteligentes($_POST["telf_trabajo"]),
            parent::comillas_inteligentes($_POST["telf_personal"]),
            parent::comillas_inteligentes($_POST["correo"]),
            parent::comillas_inteligentes($_POST["ciudad"]),
            parent::comillas_inteligentes($_POST["estado"]),
            parent::comillas_inteligentes($_POST["cod_postal"]),
            parent::comillas_inteligentes($_POST["profesion"]),
            parent::comillas_inteligentes($_POST["id_personal"])
        );
            //echo $sql;
            //exit();
        $res=mysql_query($sql,Conectar::con());
        echo utf8_decode("<script type='text/javascript'>
        alert('Cambios realizados correctamente');
        window.location='?accion=personal&id=".$_POST["id_personal"]."';
        </script>");
    }

    public function get_personal_por_id($id)
    {
        parent::con();
        $sql=sprintf
        (
        "
        select 
        p.id_persona, 
        p.nombre, 
        p.apellido, 
        p.cedula,
        p.nacionalidad,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo and 
        p.id_persona = %s",
        parent::comillas_inteligentes($id)
        );
        //echo $sql;
        //exit();
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }



    // --------------------------------Fin Personal-------------------------------

    public function get_contar_alumnos()
    {
        $sql=
        "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 2";

        //echo $sql;
        $res=mysql_query($sql, parent::con());
        $total_registros=mysql_num_rows($res);

        return $total_registros;
    }

    public function get_paginacion_alumnos($inicio, $limite)
    {
       $sql=
       "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 2 order by p.id_persona desc
        limit " . $inicio . "," . $limite;

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res)) 
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }

    public function get_paginacion_alumnos_report($inicio, $limite)
    {
        $sql=
        "
        select
        p.id_persona,
        p.cedula,
        p.nombre, 
        p.apellido,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from 
        personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo 
        and p.grupo = 2 order by p.id_persona desc
        limit " . $inicio . "," . $limite;

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }

    public function get_pre_inscritos()
    {
        parent::con();
        $sql=sprintf
        (
        "select
        p.id_preinscripcion,
        p.nombre,
        p.apellido,
        p.nacionalidad,
        p.cedula,
        p.correo,
        p.profesion
        from
        pre_inscripcion as p
        order by p.id_preinscripcion");

        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res)) 
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }

    public function pre_inscripcion()
    {
        parent::con();
        $sql=sprintf
            (
                "insert into pre_inscripcion 
                values
                (NULL, %s, %s, %s, %s, %s, %s);
                ",
                parent::comillas_inteligentes($_POST["nombre"]),
                parent::comillas_inteligentes($_POST["apellido"]),
                parent::comillas_inteligentes($_POST["nacionalidad"]),
                parent::comillas_inteligentes($_POST["cedula"]),
                parent::comillas_inteligentes($_POST["correo"]),
                parent::comillas_inteligentes($_POST["profesion"])
                );
            // echo $sql;
            // exit();
            $res=mysql_query($sql);
            $var = mysql_insert_id();

              $mensaje="Mensajeeee LLEGO!!!";
              $mensaje.= "\nNombre: ". $_POST['nombre'];
              $mensaje.= "\nEmail: ".$_POST['correo'];
              $mensaje.= "\nTelefono: ". $_POST['telefono'];
              $mensaje.= "\nMensaje: \n".$_POST['mensaje'];
              $destino= "torrealba133@gmail.com";
              $remitente = $_POST['correo'];
              $asunto = "Mensaje de prueba";
              mail($destino,$asunto,$mensaje,"FROM: $remitente");

            echo utf8_decode("<script type='text/javascript'>
            alert('Pronto le enviaremos la información a su correo electrónico, Gracias.');
            window.location='?accion=detalle_curso';
            </script>");
            
            // header("Location: ".Conectar::ruta()."?accion=detalle_abuelos&id=$var");
            exit();
            
    }

    public function crear_alumno()
    {
        if(
            isset($_POST["cedula"]) and $_POST["cedula"] == "" or
            isset($_POST["nacionalidad"]) and $_POST["nacionalidad"] == "" or
            isset($_POST["nombre"]) and $_POST["nombre"] == "" or
            isset($_POST["apellido"]) and $_POST["apellido"] == "" or
            isset($_POST["fecha_de_nacimiento"]) and $_POST["fecha_de_nacimiento"] == "" or
            isset($_POST["telf_trabajo"]) and $_POST["telf_trabajo"] == "" or
            isset($_POST["telf_personal"]) and $_POST["telf_personal"] == "" or
            isset($_POST["correo"]) and $_POST["correo"] == "" or
            isset($_POST["ciudad"]) and $_POST["ciudad"] == "" or
            isset($_POST["profesion"]) and $_POST["profesion"] == "" 
            )
        {
            header("Location: ".Conectar::ruta()."?accion=crear_alumno&e=1");
        }else
        {
            if (is_numeric($_POST["cedula"])) 
            {

                //Verifica si una persona existe
            #Primero Hago una consulta con el parametro que quiero que es la cedula
            $consulta = "select p.cedula from personas as p where p.cedula =".$_POST["cedula"].";";
            //echo $consulta;
            //exit();
            #creo una variable persona y me paso la consulta con el mysql_query
            $persona = mysql_query($consulta,parent::con());
            #luego creo una variable "pers" con un mysql_num_rows que me devuelve el numero de columnas de una consulta y me los guarda en esa variable
            $pers=mysql_num_rows($persona);
            //echo $pers;
            //exit();

            #Condicion si mi variable $pers es mayor o no a 1 el numero 1 vendria siendo mi bandera para saber si un registro esxiste o no
            #si es 1 es porque hay un registro por lo tanto existe si es 0 es porque el registro no existe y se puede registrar la persona...
            if($pers >=1)
            {
                //Si es mayor a 0 es porque ya existe un registro entonces lo mando con un error
                echo utf8_decode("<script type='text/javascript'>
                alert('Ya existe un registro con esta cédula');
                window.location='?accion=alumnos';
                </script>");
            }else
            {
                
            $fecha = $_POST["fecha_de_nacimiento"];
            $dia = $fecha[0]."".$fecha[1];
            $mes = $fecha[3]."".$fecha[4];
            $anio = $fecha[6]."".$fecha[7]."".$fecha[8]."".$fecha[9];
            
            $fechaNueva = $anio."-".$mes."-".$dia;

            $fecha_tope = date("Y") - "18";

            if($anio > $fecha_tope)
            {
            header("Location: ".Conectar::ruta()."?accion=crear_alumno&e=2");
            exit();
            
            }else{

            parent::con();
            $query=sprintf
                (
                    "insert into personas 
                    values
                    (NULL, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);
                    ",
                    parent::comillas_inteligentes($_POST["nombre"]),
                    parent::comillas_inteligentes($_POST["apellido"]),
                    parent::comillas_inteligentes($_POST["cedula"]),
                    parent::comillas_inteligentes($_POST["nacionalidad"]),
                    parent::comillas_inteligentes($_POST["fecha_de_nacimiento"]),
                    parent::comillas_inteligentes($_POST["grupo"]),
                    parent::comillas_inteligentes($_POST["sexo"]),
                    parent::comillas_inteligentes($_POST["fecha_ingreso"]),
                    parent::comillas_inteligentes($_POST["telf_trabajo"]),
                    parent::comillas_inteligentes($_POST["telf_personal"]),
                    parent::comillas_inteligentes($_POST["correo"]),
                    parent::comillas_inteligentes($_POST["ciudad"]),
                    parent::comillas_inteligentes($_POST["estado"]),
                    parent::comillas_inteligentes($_POST["profesion"])
                    );
                // echo $query;            
                // exit();
                mysql_query($query);
                $var = mysql_insert_id();
                echo utf8_decode("<script type='text/javascript'>
                alert('El registro se realizó correctamente');
                window.location='?accion=alumnos&id=$var';
                </script>");
                
                // header("Location: ".Conectar::ruta()."?accion=detalle_abuelos&id=$var");
                exit();
                }

            }

            }else{

                 echo utf8_decode("<script type='text/javascript'>
                 alert('Solo numeros en el campo de CÉDULA');
                 window.location='?accion=crear_alumno';
                 </script>");
               
               exit();
            }
            


            }
    }

    public function eliminar_alumno()
    {
        //print_r($_GET);

        $sql1=sprintf(
        "delete from personas where id_persona=%s",
        parent::comillas_inteligentes($_GET["id"])
        );
        //echo $sql;
        //echo $sql1;
        //exit();
        
        $res=mysql_query($sql1,Conectar::con());
        echo utf8_decode("<script type='text/javascript'>
        alert('El registro ha sido eliminado correctamente');
        window.location='?accion=alumnos';
        </script>");
    }

    public function editar_alumno()
    {
         //$fecha = $_POST["fecha_nac"];
           // $dia = $fecha[0]."".$fecha[1];
            //$mes = $fecha[3]."".$fecha[4];
            //$anio = $fecha[6]."".$fecha[7]."".$fecha[8]."".$fecha[9];
            
            //$fechaNueva = $anio."-".$mes."-".$dia;
        parent::con();
        $sql=sprintf
        (
            "update personas
            set

            nombre=%s,
            apellido=%s,
            cedula=%s,
            nacionalidad=%s,
            fecha_de_nacimiento=%s,
            direccion=%s,
            grupo=%s,
            sexo=%s,
            fecha_ingreso=%s,
            telf_trabajo=%s,
            telf_personal=%s,
            correo=%s,
            ciudad=%s,
            estado=%s,
            cod_postal=%s,
            profesion=%s
            where
            id_persona=%s
            ",

            parent::comillas_inteligentes($_POST["nombre"]),
            parent::comillas_inteligentes($_POST["apellido"]),
            parent::comillas_inteligentes($_POST["cedula"]),
            parent::comillas_inteligentes($_POST["nacionalidad"]),
            parent::comillas_inteligentes($_POST["fecha_de_nacimiento"]),
            parent::comillas_inteligentes($_POST["direccion"]),
            parent::comillas_inteligentes($_POST["grupo"]),
            parent::comillas_inteligentes($_POST["sexo"]),
            parent::comillas_inteligentes($_POST["fecha_ingreso"]),
            parent::comillas_inteligentes($_POST["telf_trabajo"]),
            parent::comillas_inteligentes($_POST["telf_personal"]),
            parent::comillas_inteligentes($_POST["correo"]),
            parent::comillas_inteligentes($_POST["ciudad"]),
            parent::comillas_inteligentes($_POST["estado"]),
            parent::comillas_inteligentes($_POST["cod_postal"]),
            parent::comillas_inteligentes($_POST["profesion"]),
            parent::comillas_inteligentes($_POST["id_alumno"])
        );
            //echo $sql;
            //exit();
        $res=mysql_query($sql,Conectar::con());
        echo utf8_decode("<script type='text/javascript'>
        alert('Cambios realizados correctamente');
        window.location='?accion=alumnos&id=".$_POST["id_alumno"]."';
        </script>");
    }

    public function get_alumno_por_id($id)
    {
        parent::con();
        $sql=sprintf
        (
        "
        select 
        p.id_persona, 
        p.nombre, 
        p.apellido, 
        p.cedula,
        p.nacionalidad,
        p.fecha_de_nacimiento,
        p.sexo,
        p.fecha_ingreso,
        p.telf_trabajo,
        p.telf_personal,
        p.correo,
        p.ciudad,
        p.estado,
        p.profesion,
        g.nombre_grupo 
        from personas as p, 
        grupos as g 
        where 
        p.grupo = g.id_grupo and 
        p.id_persona = %s",
        parent::comillas_inteligentes($id)
        );
        //echo $sql;
        //exit();
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->persona[]=$reg;
        }
            return $this->persona;
    }

    public function get_estados()
    {
        parent::con();
        $sql=
        (
        "
        select
        e.id_estado,
        e.estado
        from
        estados as e
        order by e.estado
        "
        );
        // echo $sql;
        // exit();
        $res=mysql_query($sql,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->persona[]=$reg;
        }
            return $this->persona;   
        
    }
     // Fin de Alumnos

    public function get_profesion()
    {
        parent::con();
        $sent=sprintf
        (
        "
        select
        p.id_profesion,
        p.nombre_profesion
        from
        tipo_profesion as p
        ");
        // echo $sql;
        // exit();
        $res=mysql_query($sent,parent::con());
        while ($reg=mysql_fetch_assoc($res))
        {
            $this->estudiante[]=$reg;
        }
            return $this->estudiante;
    }

    // Módulo Cliente

    public function get_cliente_cedula($cedula)
    {
        // print_r($_POST);
        $sql="select * from clientes where cedula = ".$cedula;

            $res=mysql_query($sql,parent::con());
            while ($reg=mysql_fetch_assoc($res))
            {
                $this->cliente[]=$reg;
            }
             
             return $this->cliente;
    }

    public function nuevo_cliente()
    {
        // print_r($_POST);
        parent::con();
        $sql=sprintf
        ("
            insert into clientes
            values(NULL, %s, %s, %s, %s, %s, %s);
            ",
            parent::comillas_inteligentes($_POST["cedula"]),
            parent::comillas_inteligentes($_POST["nombre"]),
            parent::comillas_inteligentes($_POST["apellido"]),
            parent::comillas_inteligentes($_POST["telefono"]),
            parent::comillas_inteligentes($_POST["correo"]),
            parent::comillas_inteligentes($_POST["direccion"])
            );
        // echo $sql;
        // exit();
        mysql_query($sql);
        echo utf8_decode("<script type='text/javascript'>
        alert('Registro exitoso');
        </script>");
    }
    // Fin Módulo

} 
?>