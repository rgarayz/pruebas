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
$pdf->SetTitle('REPORTE DE ARTÍCULO');
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
$pdf->SetFont('times', 'B', 14);

// AGREGAR PAGINA
$pdf->AddPage('P','LEGAL');
$pdf->Cell(0,0,"REPORTE DE ARTÍCULO",0,1,'C');
//SALTO DE LINEA
$pdf->Ln();
//COLOR DE TABLA
        $pdf->SetFillColor(51, 178, 255);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(0.2);
        
        $pdf->SetFont('', 'B',12);
        // Header        
        $pdf->SetFillColor(72, 186, 255);
        $pdf->Cell(25,5,'CÓDIGO', 1, 0, 'C', 1);
        $pdf->Cell(35,5,'DESCRIPCIÓN', 1, 0, 'C', 1);
        $pdf->Cell(40,5,'PRECIO COMPRA', 1, 0, 'C', 1);
        $pdf->Cell(40,5,'PRECIO VENTA', 1, 0, 'C', 1);
        $pdf->Cell(40,5,'IMPUESTO', 1, 0, 'C', 1);
        
        $pdf->Ln();
        $pdf->SetFont('', '');
        $pdf->SetFillColor(255, 255, 255);
        //CONSULTAS DE REGISTROS
          if (!empty(isset($_REQUEST['vdesde']))&& !empty(isset($_REQUEST['vhasta']))) {
            if ($_REQUEST['opcion']==1) {
        $articulos = consultas::get_datos("select * from articulo where art_cod between ".$_REQUEST['vdesde']." and ".$_REQUEST['vhasta']." order by art_cod");
            }else{
                if($_REQUEST['opcion']==2) {
                $marcas = consultas::get_datos("select * from marca where mar_cod = ".$_REQUEST['vmarca']);
            }
        $articulos = consultas::get_datos("select * from articulo where art_descri between '".$_REQUEST['vdesde']."' and '".$_REQUEST['vhasta']."' order by art_descri");
            }
            
        $articulos = consultas::get_datos("select * from articulo where art_precioc between '".$_REQUEST['vdesde']."' and '".$_REQUEST['vhasta']."' order by art_precioc");
        $articulos = consultas::get_datos("select * from articulo where art_preciov between '".$_REQUEST['vdesde']."' and '".$_REQUEST['vhasta']."' order by art_preciov");
        $articulos = consultas::get_datos("select * from articulo where tipo_cod between '".$_REQUEST['vdesde']."' and '".$_REQUEST['vhasta']."' order by tipo_cod");

            }else{
                
        $articulos = consultas::get_datos("SELECT * FROM articulo ORDER BY art_cod");
            }
        
        //CONSULTAS DE LOS REGISTROS
               
                
        foreach ($articulos as $art) {
            $pdf->Cell(25,5,$art['art_cod'], 1, 0, 'C', 1);
            $pdf->Cell(35,5,$art['art_descri'], 1, 0, 'C', 1);
            $pdf->Cell(40,5,$art['art_precioc'], 1, 0, 'C', 1);
            $pdf->Cell(40,5,$art['art_preciov'], 1, 0, 'C', 1);
            $pdf->Cell(40,5,$art['tipo_cod'], 1, 0, 'C', 1);
            $pdf->Ln();
        }
        


//SALIDA AL NAVEGADOR
ob_end_clean();
$pdf->Output('reporte_articulo.pdf', 'I');
?>