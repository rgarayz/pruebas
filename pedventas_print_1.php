<?php
include_once './tcpdf/tcpdf.php';
include_once 'clases/conexion.php';
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0,0, 'Pag. '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 
                false, 'R', 0, '', 0, false, 'T', 'M');
    }
}
// create new PDF document // CODIFICACION POR DEFECTO ES UTF-8
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Renzo Garay');
$pdf->SetTitle('REPORTE DE PEDIDO VENTAS');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->setPrintHeader(false);
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins POR DEFECTO
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetMargins(8,10, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks SALTO AUTOMATICO Y MARGEN INFERIOR
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


// ---------------------------------------------------------

// TIPO DE LETRA
$pdf->SetFont('timesB', 'U', 18);

// AGREGAR PAGINA
$pdf->AddPage('P','LEGAL');
$pdf->Cell(0,0,"REPORTE DE PEDIDO VENTAS",0,1,'C');
//SALTO DE LINEA
$pdf->Ln();

$cabecera = consultas::get_datos("select * from v_pedido_cabventa where ped_cod =".$_REQUEST['vped_cod']);
//GENERAR CONSULTA
if (!empty(isset($_REQUEST['opcion']))) {
    switch ($_REQUEST['opcion']) {
        case 1://fecha
            $cabecera = consultas::get_datos("select *from v_pedido_cabventa where ped_fecha::date between '".$_REQUEST['vdesde']."' and '".$_REQUEST['vhasta']."'");
        
            break;
        case 2://cliente
            $cabecera = consultas::get_datos("select * from v_pedido_cabventa where cli_cod in(".$_REQUEST['vcliente'].")");
        
            break;
        case 3://articulo
            $cabecera = consultas::get_datos("select * from v_pedido_cabventa where ped_cod in(select ped_cod from detalle_pedventa where art_cod in(".$_REQUEST['varticulo']."))");
            
            break;
        case 4://empleado
            $cabecera = consultas::get_datos("select * from v_pedido_cabventa where emp_cod in(".$_REQUEST['vempleado'].")");
            
            break;   
    }
}else{
    $cabecera = consultas::get_datos("select * from v_pedido_cabventa where ped_cod =".$_REQUEST['vped_cod']);
}
$pdf->SetFont('times', '',11);

if(!empty($cabecera)) {
    foreach ($cabecera as $cab) {
$pdf->Cell(130,2,"CLIENTE: ".$cab['cli_ci']." - ".$cab['clientes'],0,'','L');
$pdf->Cell(80,2,"FECHA: ".$cab['ped_fecha'],0,'','L');
$pdf->Ln();
$pdf->Cell(130,2,"ELABORADO POR: ".$cab['empleado'],0,'','L');
$pdf->Cell(80,2,"ESTADO: ".$cab['estado'],0,'','L');
$pdf->Ln();
$pdf->Cell(130,2,"SUCURSAL:  ".$cab['suc_descri'],0,'','L');
$pdf->Cell(80,2,"PEDIDO N°: ".$cab['ped_cod'],0,'','L');

$pdf->Cell(0,10,"",0,'','L');
$pdf->Ln();

//COLOR DE TABLA

        $pdf->SetFont('', 'B',12);
        // Header        
        $pdf->SetFillColor(86, 195, 250);
        //consulta detalle pedido
        
        
        $pdf->Cell(15,5,'COD', 1, 0, 'C', 1);
        $pdf->Cell(70,5,'DESCRIPCION', 1, 0, 'C', 1);
        $pdf->Cell(20,5,'PRECIO', 1, 0, 'C', 1);
        $pdf->Cell(30,5,'CANTIDAD', 1, 0, 'C', 1);
        $pdf->Cell(30,5,'SUB-TOTAL', 1, 0, 'C', 1);
        $pdf->Cell(30,5,'IMPUESTO', 1, 0, 'C', 1);
        
        $pdf->Ln();
        $pdf->SetFont('', '');
        $pdf->SetFillColor(255, 255, 255);
        //CONSULTAS DE REGISTROS
        $detalles = consultas::get_datos("select * from v_detalle_pedventa where ped_cod=".$cab['ped_cod']);            
        
        foreach ($detalles as $det) {
            $pdf->Cell(15,5,$det['art_cod'], 1, 0, 'C', 1);
            $pdf->Cell(70,5,$det['art_descri']." ".$det['mar_descri'], 1, 0, 'C', 1);
            $pdf->Cell(20,5, number_format($det['ped_precio'],0,",","."), 1, 0, 'C', 1);
            $pdf->Cell(30,5,$det['ped_cant'], 1, 0, 'C', 1);
            $pdf->Cell(30,5,number_format($det['subtotal'],0,",","."), 1, 0, 'C', 1);
            $pdf->Cell(30,5,$det['tipo_descri'], 1, 0, 'C', 1);
            $pdf->Ln();
            
        }
     
       $pdf->SetFont('', 'B',12);
       $pdf->SetFillColor(86, 195, 250);
       $pdf->Cell(50,8,'TOTAL: '.number_format($cabecera[0]['ped_total'],0,",","."), 1, 0, 'C', 1);
       $pdf->Ln();
          
       $pdf->Cell(130,2,"TOTAL en letras (guaraníes): ".$cabecera[0]['totalletra'],0,'','L');
       $pdf->Ln();
        $pdf->Ln();
       $pdf->SetFont('times', '',11);
    
    }
    
    }else{
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(0.2);
        $pdf->Cell(165,2,"No se encontraron registros  ",0,'','L',1);
    }

    

//SALIDA AL NAVEGADOR
ob_end_clean();
$pdf->Output('reporte_marca.pdf', 'I');
?>