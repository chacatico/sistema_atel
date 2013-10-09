<?php

Class noticias extends Conectar
{
	private $noticias;

	public function __construct()
	{
		$this->noticias=array();
	}

	public function get_contar_noticias()
	{
		$sql=
		"
		select
		n.id_noticia,
		n.noticia,
		n.autor
		from
		noticias as n
		";
		$res=mysql_query($sql, parent::con());
		$total_registros=mysql_num_rows($res);

		return $total_registros;
	}

	public function paginar_noticias()
	{
		$sql=
		"
		select
		n.id_noticia,
		n.noticia,
		n.autor
		from
		noticias as n
		order by n.id_noticia desc
		limit". $inicio.",".$limite;
		
		$res=mysql_query($sql,parent::con());
		while ($reg=mysql_fetch_assoc($res)) 
		{
			$this->noticias[]=$reg;
		}
			return $this->noticias;
	}

	public function get_noticias()
	{
		$sql=
		"
		select
		n.id_noticia,
		n.titulo,
		n.noticia,
		n.autor
		from
		noticias as n
		order by n.id_noticia desc
		";
		$res=mysql_query($sql,parent::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->noticias[]=$reg;
		}
			return $this->noticias;
	}

	public function agregar_noticia()
	{
		parent::con();
		$sql=sprintf
		(
			"
			insert into
			noticias 
			values(NULL, %s, %s, %s);
			",
			parent::comillas_inteligentes($_POST["titulo"]),
			parent::comillas_inteligentes($_POST["mensaje"]),
			parent::comillas_inteligentes($_POST["autor"])
		);
		// echo $sql;
		// exit();
		mysql_query($sql);
		mysql_insert_id();
		echo utf8_decode("<script type='text/javascript'>
        alert('Noticia Agregada');
        window.location='?accion=home';
        </script>");

	}
}

?>