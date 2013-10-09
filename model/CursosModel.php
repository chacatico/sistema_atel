<?php

Class cursos extends Conectar
{
    //Primero Creo Mis Atributos
    private $cursos;
    
    //Crear mi Contructor de la clase

    public function __construct()
    {
        $this->curso=array();
    }
        
     public function get_contar_cursos()
    {
        $sql=
        "
        select 
        c.imagen,
        c.descripcion
        from 
        cursos as c "; 
        

        //echo $sql;
        $res=mysql_query($sql, parent::con());
        $total_registros=mysql_num_rows($res);
          
        return $total_registros;    
    }

    public function get_paginacion_cursos($inicio, $limite)
    {
        $sql=
        "
        select 
        c.imagen,
        c.descripcion
        from 
        cursos as c 
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

} 
?>