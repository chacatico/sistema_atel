<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{

require('includes/fpdf/fpdf.php');
require_once('Model/Cursos1Model.php');

$cu = new cursos1;

$total_registros = $cu->get_contar_cursos1();

$cursos = $cu->get_paginacion_cursos1_report(0, $total_registros);

class PDF extends FPDF
{
    

    function Header()
    {
        //Cabecera de la Página PDF
        //Logo
        $this->Image('public/img/logo_opt.png',10,10,25);
        //Fuente
        $this->SetFont('Arial','B',15);
        //Movernos a la derecha
        $this->Cell(80);
        //Título
        $this->Cell(30,10,utf8_decode('Sistema Adiministrativo SATEL'),0,0,'C');
        //Salto de línea
        $this->Ln(25);//Fuente

        $this->SetFont('Arial','B',10);
        $this->Cell(0,10,utf8_decode('Centro Comercial Torre Venaragua Local O, Calle Lopez Aveledo entre Calle Santos Michelena y Av. Bolívar.'),0,'L');
        $this->Ln(4);
        $this->Cell(0,10,utf8_decode('Telefonos: (0426) 908-7854 / (0414) 945-1901'),0,'L');
        $this->Ln(4);
        $this->Cell(0,10,utf8_decode('Correo: cursos@atelcorporation.com'),0,'L');
        $this->Ln(4);
        //$this->Cell(30,10,utf8_decode('Usuario: '.$_SESSION['usuario_nom']."  |"),0,'L');
        //$fecha=date("d-m-Y");
        $this->Cell(0,10,$fecha,0,'L');
        $this->Ln();
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,utf8_decode('Listado de Cursoss'),0,0,'C');
        $this->Ln();
    }


    function BasicTable($header, $data)
    {
        // Cabecera
        // foreach($header as $col)
        //     $this->Cell(37.5,7,$col,1);
        // $this->Ln();
        // Datos
        $this->SetFont('Arial','B',10);
        $this->Cell(20,6,utf8_decode(""),0);
        $this->Cell(26.5,6,utf8_decode("      Nombre"),1);
        $this->Cell(20.5,6,utf8_decode("     Nivel"),1);
        $this->Cell(17.5,6,utf8_decode("  Horario"),1);
        $this->Cell(20.5,6,utf8_decode(" Fecha Ini."),1);
        $this->Cell(20.5,6,utf8_decode(" Fecha Fin."),1);
        $this->Cell(20.5,6,utf8_decode("Capacidad"),1);
        $this->Cell(22.5,6,utf8_decode("  Profesor"),1);
        $this->Ln();


        for($i=0; $i<sizeof($data); $i++)
        {
            $anio = $data[$i]["fecha_de_nacimiento"];
            $fecha = substr($anio, 0,4);
            $anio_a = date("Y");
            $edad = $anio_a - $fecha;

            $fecha_nueva = Conectar::voltear_fecha($data[$i]['fecha_de_nacimiento']);

                $this->SetFont('Arial','',10);
                $this->Cell(20,6,utf8_decode(""),0);
                $this->Cell(26.5,6,utf8_decode($data[$i]['nombre']),1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['nivel']),1);
                $this->Cell(17.5,6,utf8_decode($data[$i]['horario']),1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['fecha_inicio']),1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['fecha_final']),1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['capacidad']),1);
                $this->Cell(22.5,6,utf8_decode($data[$i]['profesor']),1);
                $this->Ln();
        }
    }

    function Footer()
    {
        //Posición: a 1,5 cm del final
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial','I',8);
        //Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'',0,0,'C');
    }
}

$pdf = new PDF();
// Títulos de las columnas
$header = array('Cedula', 'Nombre', 'Apellido', 'Edad', 'Sexo');
// Carga de datos
$data = $cursos;
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();

}else{
    header("Location: ".Conectar::ruta()."?accion=home");
    exit();
}
?>