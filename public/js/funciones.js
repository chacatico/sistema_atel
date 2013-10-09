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

	alumnos.submit();
}

function agregar_curso1()
{
	if (curso1.nombre.value=="")
	{
		alert("Debe ingresar el nombre del curso");
		curso1.nombre.value="";
		curso1.nombre.focus();
		return false;		
	}

	if (curso1.nivel.value=="")
	{
		alert("Debe ingresar el nivel del curso");
		curso1.nivel.value="";
		curso1.nivel.focus();
		return false;
	}

	if (curso1.horario.value=="") 
	{
		alert("Debe ingresar el horario");
		curso1.horario.value="";
		curso1.horario.focus();
		return false;
	}

	if (curso1.fecha_inicio.value=="")
	 {
	 	alert("Debe ingresar la fecha de inicio");
	 	curso1.fecha_inicio.value="";
	 	curso1.fecha_inicio.focus();
	 	return false;
	 }

	 if (curso1.fecha_final.value=="") 
	 {
	 	alert("Debe ingresar la fecha de culminación");
	 	curso1.fecha_final.value="";
	 	curso1.fecha_final.focus();
	 	return false;
	 }

	 if (curso1.capacidad.value=="")
	 {
	 	alert("Debe ingresar la capacidad");
	 	curso1.capacidad.value="";
	 	curso1.capacidad.focus();
	 	return false;
	 }

	 if (curso1.profesor.value=="")
	 {
	 	alert("Debe ingresar al profesor");
	 	curso1.profesor.value="";
	 	curso1.profesor.focus();
	 	return false;
	 }

	curso1.submit();
}

function agregar_profesor()
{	
	if (profesor.nacionalidad.value==0)
	{
		alert("Debe seleccionar la Nacionalidad");
		profesor.nacionalidad.value=0;
		profesor.nacionalidad.focus();
		return false;	}
		
	if (profesor.cedula.value=="" || isNaN(profesor.cedula.value))
	{
		alert("La Cédula es un campo Obligatorio y Numerico");
		profesor.cedula.value="";
		profesor.cedula.focus();
		return false;	}


	if (profesor.nombre.value=="")
	{
		alert("Debe ingresar nombre");
		profesor.nombre.value="";
		profesor.nombre.focus();
		return false;		}
		
	if (profesor.apellido.value=="")
	{
		alert("Debe ingresar apellido");
		profesor.apellido.value="";
		profesor.apellido.focus();
		return false;		}
		
	if (profesor.fecha_nac.value==0)
	{
		alert("Debe ingresar fecha de Nacimiento");
		profesor.fecha_nac.value="";
		profesor.fecha_nac.focus();
		return false;		}

		if (profesor.sexo.value==0)
	{
		alert("Debe Seleccionar el Sexo");
		profesor.sexo.value=0;
		profesor.sexo.focus();
		return false;		}

		if (profesor.telf_personal.value=="")
	{
		alert("Debe Ingresar el Celular");
		profesor.telf_personal.value="";
		profesor.telf_personal.focus();
		return false;		
	}
		if (profesor.correo.value=="")
	{
		alert("Debe Ingresar el Correo");
		profesor.correo.value="";
		profesor.correo.focus();
		return false;		
	}
		if (profesor.profesion.value==0)
	{
		alert("Debe Seleccionar su Profesión");
		profesor.profesion.value=0;
		profesor.profesion.focus();
		return false;		
	}
		if (profesor.estado.value==0)
	{
		alert("Debe Seleccionar el Estado");
		profesor.estado.value=0;
		profesor.estado.focus();
		return false;		
	}
		if (profesor.ciudad.value=="")
	{
		alert("Debe Ingresar la Ciudad");
		profesor.ciudad.value="";
		profesor.ciudad.focus();
		return false;		
	}
		if (profesor.cod_postal.value=="")
	{
		alert("Debe Ingresar el Código Postal");
		profesor.cod_postal.value="";
		profesor.cod_postal.focus();
		return false;		
	}
	if (profesor.direccion.value=="")
	{
		alert("Debe ingresar dirección");
		profesor.direccion.value="";
		profesor.direccion.focus();
		return false;		
	}

	if (profesor.telf_trabajo.value=="")
	{
		alert("Debe Ingresar el Teléfono Trabajo");
		profesor.telf_trabajo.value=="";
		profesor.telf_trabajo.focus();
		return false;	
	}

	profesor.submit();
}

function agregar_personal()
{	
	if (personal.nacionalidad.value==0)
	{
		alert("Debe seleccionar la Nacionalidad");
		personal.nacionalidad.value=0;
		personal.nacionalidad.focus();
		return false;	}
		
	if (personal.cedula.value=="" || isNaN(personal.cedula.value))
	{
		alert("La Cédula es un campo Obligatorio y Numerico");
		personal.cedula.value="";
		personal.cedula.focus();
		return false;	}


	if (personal.nombre.value=="")
	{
		alert("Debe ingresar nombre");
		personal.nombre.value="";
		personal.nombre.focus();
		return false;		}
		
	if (personal.apellido.value=="")
	{
		alert("Debe ingresar apellido");
		personal.apellido.value="";
		personal.apellido.focus();
		return false;		}
		
	if (personal.fecha_nac.value==0)
	{
		alert("Debe ingresar fecha de Nacimiento");
		personal.fecha_nac.value="";
		personal.fecha_nac.focus();
		return false;		}

		if (personal.sexo.value==0)
	{
		alert("Debe Seleccionar el Sexo");
		personal.sexo.value=0;
		personal.sexo.focus();
		return false;		}

		if (personal.telf_personal.value=="")
	{
		alert("Debe Ingresar el Celular");
		personal.telf_personal.value="";
		personal.telf_personal.focus();
		return false;		
	}
		if (personal.correo.value=="")
	{
		alert("Debe Ingresar el Correo");
		personal.correo.value="";
		personal.correo.focus();
		return false;		
	}
		if (personal.profesion.value==0)
	{
		alert("Debe Seleccionar su Profesión");
		personal.profesion.value=0;
		personal.profesion.focus();
		return false;		
	}
		if (personal.estado.value==0)
	{
		alert("Debe Seleccionar el Estado");
		personal.estado.value=0;
		personal.estado.focus();
		return false;		
	}
		if (personal.ciudad.value=="")
	{
		alert("Debe Ingresar la Ciudad");
		personal.ciudad.value="";
		personal.ciudad.focus();
		return false;		
	}
		if (personal.cod_postal.value=="")
	{
		alert("Debe Ingresar el Código Postal");
		personal.cod_postal.value="";
		personal.cod_postal.focus();
		return false;		
	}
	if (personal.direccion.value=="")
	{
		alert("Debe ingresar dirección");
		personal.direccion.value="";
		personal.direccion.focus();
		return false;		
	}

	if (personal.telf_trabajo.value=="")
	{
		alert("Debe Ingresar el Teléfono Trabajo");
		personal.telf_trabajo.value=="";
		personal.telf_trabajo.focus();
		return false;	
	}

	personal.submit();
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