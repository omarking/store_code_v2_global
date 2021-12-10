<?php
session_start();        
if(isset($_SESSION["Email"])) {   
    $idusuario = ($_SESSION["Iden"]);
    $venta= $_POST["txtFactura"];
    
require('fpdf/fpdf.php');
include("../model/conexion.php");
$sqlMosUsuario ="CALL psMosTicketUsuario('$idusuario');";
$mosUsua = mysqli_query($conect,$sqlMosUsuario);
mysqli_close($conect);
include("../model/conexion.php");
$sqlmosProd ="CALL psMosTicketProductos($venta);";
$mosProd = mysqli_query($conect,$sqlmosProd);
mysqli_close($conect);
include("../model/conexion.php");
$sqlMosFechaVeta ="CALL psMosTicketFechav($venta);";
$mosFechaVeta = mysqli_query($conect,$sqlMosFechaVeta);
mysqli_close($conect);


class pdf extends FPDF{//Herencia
    public function header(){
        $this->SetFillColor(102, 153, 255);//Color Naranja
        $this->Rect(0,0,220,40,'F'); //X,Y,ACHO,ALTO        
        $this->SetY(20);
        $this->SetFont('Arial', 'B', 30);
        $this->SetTextColor(255, 255, 255);//Color de La letra
        $this->Write(5,'STORE CODE');
        $this->Image('../img/utilidades/logostorewayblanco.png', 160, 2, 40,'','PNG');
    }
    public function footer(){
        $this->SetFillColor(102, 153, 255);//Color Naranja
        $this->Rect(0,250,220,50,'F'); //X,Y,ACHO,ALTO        
        $this->SetY(-20);
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(255, 255, 255);//Color de La letra
        $this->SetX(120);
        $this->Write(5,'STORE CODE');
        $this->Ln();
        $this->SetX(120);//Pocicion en milimetros
        $this->Write(5,'1');
        $this->Ln();
        $this->SetX(120);
        $this->Write(5,'');
    }
}

function SetCurrency(float $valor, string $signo = '$'):string{
    return $signo.number_format($valor,2,'.','');
}

$fpdf = new pdf('P','mm','LETTER',TRUE);
$fpdf->AddPage('portrait', 'LETTER');
$fpdf->SetMargins(20,20,20,20);
$fpdf->SetFont('Arial', '' ,10);


$fpdf->SetY(33);
$fpdf->SetX(110);
while($row=mysqli_fetch_row($mosFechaVeta)){    
    $fpdf->Write(5,'Fecha de la compra: ' . $row[0]);
}

$fpdf->SetFont('Arial', 'B',12);
$fpdf->SetTextColor(0,0,0);//Color de La letra
$fpdf->SetY(50);

    $fpdf->Cell(20,5,'Folio de venta: '); 
    $fpdf->Cell(15,8,'');    
    $fpdf->SetFont('Arial', 'B',12);
    $fpdf->SetTextColor(9,9,221);    
    $fpdf->Cell(20,5, $venta);    
    $fpdf->Ln();

while($row2=mysqli_fetch_row($mosUsua)){            
    $fpdf->Cell(20,5,'Nombre: ');    
    $fpdf->SetFont('Arial', 'B',12);
    $fpdf->SetTextColor(9,9,221);    
    $fpdf->Cell(20,5, $row2[0]);    
    $fpdf->Ln(15);    
}

$fpdf->SetFont('Arial', 'B',12);
$fpdf->SetTextColor(255,255,255);    
$fpdf->SetFillColor(79,78,77);
$fpdf->Cell(10,8,'No. ',0,0,'C',1);    
$fpdf->Cell(70,8,'Producto ',0,0,'C',1);    
$fpdf->Cell(30,8,'Precio Unitario ',0,0,'C',1);
$fpdf->Cell(30,8,'Cantidad',0,0,'C',1);
$fpdf->Cell(30,8,'Subtotal ',0,0,'C',1);
$fpdf->Ln();



$fpdf->SetLineWidth(0.5);
$fpdf->SetFont('Arial', '',12);
$fpdf->SetTextColor(0,0,0);    
$fpdf->SetFillColor(255,255,255);
$fpdf->SetDrawColor(80,80,80);
$total = 0;
$i = 1;
while($row3=mysqli_fetch_row($mosProd)){        
    $fpdf->Cell(10,8,$i,'B',0,'C',1);    //LRTB
    $fpdf->Cell(70,8,$row3[0],'B',0,'C',1);    
    $fpdf->Cell(30,8,'$ '. $row3[1],'B',0,'C',1);
    $fpdf->Cell(30,8,$row3[2],'B',0,'C',1);
    $fpdf->Cell(30,8,'$ '. ($row3[2] * $row3[1]) . '.00','B',0,'C',1);
    $total += $row3[2] * $row3[1];
    $i++;    
    $fpdf->Ln();
}

$fpdf->SetFont('Arial', 'B',12);
$fpdf->SetTextColor(255,255,255);    
$fpdf->SetFillColor(79,78,77);
$fpdf->Cell(10,8,'',0,0,'C',1);    
$fpdf->Cell(70,8,'',0,0,'C',1);    
$fpdf->Cell(30,8,'',0,0,'C',1);
$fpdf->Cell(30,8,'Total  $',0,0,'C',1);
$fpdf->Cell(30,8,$total. '.00',0,0,'C',1);

$fpdf->Ln();

$fpdf->OutPut();
}
?>

