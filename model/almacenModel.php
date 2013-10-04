<?php
Class almacen extends Conectar
{
	private $factura;
	private $categoria;
	private $producto;

	public function __construct()
	{
		$this->factura=array();
		$this->categoria=array();
		$this->producto=array();
	}


// Módulo de Producto

	public function get_productos()
	{
		parent::con();
		$sql=
		"
		select
		* 
		from
		productos
		order by nombre_producto;
		";
		$res=mysql_query($sql,parent::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}	
	public function get_categorias()
	{
		parent::con();
		$sql=
		"
		select
		*
		from
		categorias
		order by id_categoria;";
		// echo $sql;
		// exit();
		$res=mysql_query($sql,parent::con());
		while ($reg=mysql_fetch_assoc($res)) 
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}

	public function agregar_producto()
	{
		parent::con();
		$query=sprintf
		(
			"insert into productos 
			values
			(NULL, %s, %s, %s, %s, %s, %s, %s, %s);
			",
			parent::comillas_inteligentes($_POST["nombre"]),
			parent::comillas_inteligentes($_POST["descripcion"]),
			parent::comillas_inteligentes($_POST["costo"]),
			parent::comillas_inteligentes($_POST["pvp"]),
			parent::comillas_inteligentes($_POST["cantidad"]),
			parent::comillas_inteligentes($_POST["tipo"]),
			parent::comillas_inteligentes($_POST["codigo"]),
			parent::comillas_inteligentes($_POST["categoria"])
			);
		// echo $query;
		// exit();
		mysql_query($query);
		echo utf8_decode("<script type='text/javascript'>
        alert('Ha agregado una categoría.');
        window.location='?accion=almacen';
        </script>");
        exit();
	}

// Fin Módulo Producto

// Comienzo de módulo de factura
	public function get_contar_facturas()
	{
		$sql=
		"
		select 
		c.nombreCliente,
		f.id_factura,
		f.fecha,
		f.monto_total, 
		f.estadoFactura 
		from 
		clientes as c, 
		facturas as f 
		where 
		f.id_cliente = c.id_cliente;
		";
		$res=mysql_query($sql,parent::con());
		$total_registros=mysql_num_rows($res);

		return $total_registros;
	}

	public function get_paginacion_facturas($inicio, $limite)
	{
		$sql=
		"
		select 
		c.nombreCliente,
		f.id_factura,
		f.fecha,
		f.monto_total, 
		f.estadoFactura 
		from 
		clientes as c, 
		facturas as f 
		where 
		f.id_cliente = c.id_cliente
		order by f.fecha desc
		limit " . $inicio . "," . $limite;
		
		$res=mysql_query($sql,parent::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->factura[]=$reg;
		}
			return $this->factura;
	}

	public function registrar_factura()
	{
		// print_r($_POST);
		parent::con();
		$query=sprintf
		("
			insert into facturas (id_factura, id_cliente, fecha, idVendedor, estadoFactura)
			values(NULL, %s, %s, %s, %s);
			",
			parent::comillas_inteligentes($_POST["id_cliente"]),
			parent::comillas_inteligentes($_POST["fecha"]),
			parent::comillas_inteligentes($_POST["vendedor"]),
			parent::comillas_inteligentes($_POST["estado"])
			);
		// echo $query;            
		// exit();
        mysql_query($query);
        $var = mysql_insert_id();

        echo utf8_decode("<script type='text/javascript'>
        alert('Alerta: Factura en Proceso');
        window.location='?accion=nuevaFactura_2&id=$var';
        </script>");
        
        header("Location: ".Conectar::ruta()."?accion=nuevaFactura_2&id=$var");
        exit();
	}

	public function finalizar_factura($id)
	{
		parent::con();
		// print_r($_POST);
		$sql=sprintf
		("
			update 
			facturas
			set
			monto_total = %s,
			iva = %s,
			totalIva = %s,
			estadoFactura = %s
			where 
			id_factura = %s",
			parent::comillas_inteligentes($_POST["monto_total"]),
			parent::comillas_inteligentes($_POST["iva"]),
			parent::comillas_inteligentes($_POST["monto"]),
			parent::comillas_inteligentes($_POST["estado"]),
			parent::comillas_inteligentes($id)
			);
		// echo $sql;
		// exit();
		mysql_query($sql);
		echo utf8_decode("<script type='text/javascript'>
        alert('Factura finalizada.');
        window.location='?accion=facturacion';
        </script>");
	}

	public function get_datos_factura($id)
	{
		parent::con();
		$sql=sprintf
		(
		"
		select 
		p.login, 
		c.id_cliente, 
		c.nombreCliente, 
		c.apellido, 
		c.cedula, 
		c.telefono, 
		c.correo, 
		c.direccion, 
		f.fecha,
		f.estadoFactura 
		from 
		usuarios as p, 
		clientes as c, 
		facturas as f 
		where 
		p.id_usuario = f.idVendedor  and 
		c.id_cliente = f.id_cliente and 
		f.id_factura = %s",
		parent::comillas_inteligentes($id)
		);
		$res=mysql_query($sql,parent::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->factura[]=$reg;
		}
			return $this->factura;

	}

	public function addProduct_factura()
	{
		// print_r($_POST);
		parent::con();
		$query=sprintf
		("
			insert into detalle_factura
			values(NULL, %s, %s, %s);",
			parent::comillas_inteligentes($_POST["id_factura"]),
			parent::comillas_inteligentes($_POST["id_producto"]),
			parent::comillas_inteligentes($_POST["cantidad"])
			);
		// echo $query;
		// exit();
		mysql_query($query);
		$var = $_POST["id_factura"];
		header("Location: ".Conectar::con()."?accion=nuevaFactura_2$id=$var");
		exit();
	}

	public function detalle_factura($id)
	{
		// print_r($id);
		parent::con();
		$query=sprintf
		("
			select 
			d.id_factura,
			d.cantidad_producto,
			p.nombre_producto, 
			p.descripcion, 
			p.pvp 
			from 
			productos as p, 
			detalle_factura as d, 
			facturas as f 
			where 
			f.id_factura = ".$id." and 
			d.id_factura = f.id_factura and
			d.id_producto = p.id_producto
			order by d.id_detallefactura asc
			",
			parent::comillas_inteligentes($id)
			);
		// echo $query;
		// exit();
		$res=mysql_query($query,parent::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}

// Fin Módulo Factura

// Comienzo de módulo de Categoria
	
	public function get_contar_categorias()
	{
		$sql=
		"
		select
		c.id_categoria,
		c.nombre_categoria,
		c.descripcion_categoria
		from 
		categorias as c
		order by c.nombre_categoria
		";
		$res=mysql_query($sql,parent::con());
		$total_registros=mysql_num_rows($res);

		return $total_registros;
	}

	public function get_paginacion_categorias()
	{
		$sql=
		"
		select
		c.id_categoria,
		c.nombre_categoria,
		c.descripcion_categoria
		from 
		categorias as c
		order by c.nombre_categoria
		";
		$res=mysql_query($sql,parent::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->categoria[]=$reg;
		}
			return $this->categoria;
	}

	public function agregar_categoria()
	{
		parent::con();
		$sql=sprintf
		(
			"insert into categorias values(NULL, %s, %s);",
			parent::comillas_inteligentes($_POST["nombre_categoria"]),
			parent::comillas_inteligentes($_POST["descripcion_categoria"])
		);
		// echo $sql;
		// exit();
		mysql_query($sql);
		echo utf8_decode("<script type='text/javascript'>
        alert('Ha agregado una categoría.');
        window.location='?accion=almacen';
        </script>");
        exit();
	}

// Fin módulo Categoria
}
?>