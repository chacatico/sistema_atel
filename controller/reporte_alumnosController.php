<?php
if(isset($_SESSION["usuario_id"]) and $_SESSION["usuario_id"] != "" and $_SESSION["usuario_lvl"] == 1)
{
require('includes/fpdf/fpdf.php');
require_once('Model/PersonasModel.php');

$a = new personas;

$total_registros = $a->get_contar_alumnos();

$alumnos = $a->get_paginacion_alumnos_report(0, $total_registros);

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
        $this->Cell(0,10,utf8_decode('Listado de Alumnos'),0,0,'C');
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
        $this->Cell(20.5,6,utf8_decode("   Cédula"),1);
        $this->Cell(20.5,6,utf8_decode("   Nombre"),1);
        $this->Cell(20.5,6,utf8_decode("  Apellido"),1);
        $this->Cell(25.5,6,utf8_decode("F.Nacimiento"),1);
        $this->Cell(10.5,6,utf8_decode("Edad"),1);
        $this->Cell(20.5,6,utf8_decode("    Sexo"),1);
        $this->Cell(20.5,6,utf8_decode("  Dirección"),1);
        $this->Cell(20.5,6,utf8_decode("  Teléfono"),1);
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
                $this->Cell(20.5,6,utf8_decode($data[$i]['cedula']),1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['nombre']),1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['apellido']),1);
                $this->Cell(25.5,6,$fecha_nueva,1);
                $this->Cell(10.5,6,$edad,1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['sexo']),1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['direccion']),1);
                $this->Cell(20.5,6,utf8_decode($data[$i]['telf_personal']),1);
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
$data = $alumnos;
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();

}else{
    header("Location: ".Conectar::ruta()."?accion=home");
    exit();
}
?>