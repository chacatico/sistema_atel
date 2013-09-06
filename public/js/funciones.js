function validar_login()
{
    var gestor=document.gestor;
	if (gestor.usuario.value==0)
	{
		alert("Ingrese su Login");
		gestor.usuario.value="";
		gestor.usuario.focus();
		return false;
	}
	if (gestor.clave.value==0)
	{
		alert("Ingrese su Password");
		gestor.clave.value="";
		gestor.clave.focus();
		return false;
	}
	
	gestor.submit();
}

function agregar_alumno()
{	
	if (alumnos.nacionalidad.value==0)
	{
		alert("Debe seleccionar la Nacionalidad");
		alumnos.nacionalidad.value=0;
		alumnos.nacionalidad.focus();
		return false;	}
		
	if (alumnos.cedula.value=="" || isNaN(alumnos.cedula.value))
	{
		alert("La Cédula es un campo Obligatorio y Numerico");
		alumnos.cedula.value="";
		alumnos.cedula.focus();
		return false;	}


	if (alumnos.nombre.value=="")
	{
		alert("Debe ingresar nombre");
		alumnos.nombre.value="";
		alumnos.nombre.focus();
		return false;		}
		
	if (alumnos.apellido.value=="")
	{
		alert("Debe ingresar apellido");
		alumnos.apellido.value="";
		alumnos.apellido.focus();
		return false;		}
		
	if (alumnos.fecha_nac.value==0)
	{
		alert("Debe ingresar fecha de Nacimiento");
		alumnos.fecha_nac.value="";
		alumnos.fecha_nac.focus();
		return false;		}

		if (alumnos.sexo.value==0)
	{
		alert("Debe Seleccionar el Sexo");
		alumnos.sexo.value=0;
		alumnos.sexo.focus();
		return false;		}

		if (alumnos.telf_personal.value=="")
	{
		alert("Debe Ingresar el Celular");
		alumnos.telf_personal.value="";
		alumnos.telf_personal.focus();
		return false;		
	}
		if (alumnos.correo.value=="")
	{
		alert("Debe Ingresar el Correo");
		alumnos.correo.value="";
		alumnos.correo.focus();
		return false;		
	}
		if (alumnos.profesion.value==0)
	{
		alert("Debe Seleccionar su Profesión");
		alumnos.profesion.value=0;
		alumnos.profesion.focus();
		return false;		
	}
		if (alumnos.estado.value==0)
	{
		alert("Debe Seleccionar el Estado");
		alumnos.estado.value=0;
		alumnos.estado.focus();
		return false;		
	}
		if (alumnos.ciudad.value=="")
	{
		alert("Debe Ingresar la Ciudad");
		alumnos.ciudad.value="";
		alumnos.ciudad.focus();
		return false;		
	}
		if (alumnos.cod_postal.value=="")
	{
		alert("Debe Ingresar el Código Postal");
		alumnos.cod_postal.value="";
		alumnos.cod_postal.focus();
		return false;		
	}
	if (alumnos.direccion.value=="")
	{
		alert("Debe ingresar dirección");
		alumnos.direccion.value="";
		alumnos.direccion.focus();
		return false;		
	}

	if (alumnos.telf_trabajo.value=="")
	{
		alert("Debe Ingresar el Teléfono Trabajo");
		alumnos.telf_trabajo.value=="";
		alumnos.telf_trabajo.focus();
		return false;	
	}

	document.alumnos.submit();
}


function crear_contacto()
{
	document.contacto.submit();
}

function eliminar(identificador, controlador)
{
	if (confirm("¿ Realmente desea eliminar este registro ?"))
	{
		window.location="?accion="+controlador+"&id="+identificador;		
	}
}