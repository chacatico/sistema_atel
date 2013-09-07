<?php
session_start();

class Conectar 
{
    public function con()
    {
        $con=mysql_connect("localhost","root","123456");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("atel");
		return $con;
    }
    
    public static function ruta()
    {
        return "http://localhost/sistema_atel/";
    }

    public function comillas_inteligentes($valor)
	{
		// Retirar las barras
		if (get_magic_quotes_gpc()) {
			$valor = stripslashes($valor);
		}
	
		// Colocar comillas si no es entero
		if (!is_numeric($valor)) {
			$valor = "'" . mysql_real_escape_string($valor) . "'";
		}
		return $valor;
	}     

	 public static function url()
	 {
	     $pageURL = 'http';
	     if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	     $pageURL .= "://";
	     if ($_SERVER["SERVER_PORT"] != "80") {
	        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	     } else {
	        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	     }
	     return $pageURL;
	 }

	public static function voltear_fecha($fecha)
	{
		$dia = $fecha[8]."".$fecha[9];
		$mes = $fecha[5]."".$fecha[6];
		$anio = $fecha[0]."".$fecha[1]."".$fecha[2]."".$fecha[3];
		$fecha_nueva = $dia."-".$mes."-".$anio;
		
		return $fecha_nueva;
	} 

	public static function voltear_fecha2($fecha)
	{
		$dia = $fecha[0]."".$fecha[1];
		$mes = $fecha[3]."".$fecha[4];
		$anio = $fecha[6]."".$fecha[7]."".$fecha[8]."".$fecha[9];
		$fecha_nueva = $anio."-".$mes."-".$dia;
		
		return $fecha_nueva;
	}

	public static function convertir_hora($hora)
	{

	}

	public static function convertir_hora2($hora)
	{
		
	}
}
?>
