<?php
session_start();
if(isset($_SESSION["Email"])){
    require('FPDF/fpdf.php');
    $total=0;
        
    $SID = session_id();
    //echo $SID ."<br>";      
    foreach(($_SESSION['CARRITO']) as $indice=>$producto){   //Recolecta los prodcutos dentro del carrito              
        $total=$total+($producto['precio']*$producto['cantidad']);
        $producto = $producto['nombre'];
    }
    

    class PDF extends FPDF
    {
    // Cabecera de página
        function Header()
        {
    
            $this->SetFillColor(0, 74, 173);
            $this->Rect(0,0, 220, 40, 'F');
            $this->SetY(10);
            $this->SetFont('Arial', 'B', 20);
            $this->SetTextColor(255,255,255);
            $this->Image("../img\utilidades\storetransblan.png",5,4,35);
            $this->Write(30, '                    Datos para trasferencia a StoreCodeWay');
        }

    // Pie de página
    function Footer()
    {
        $this->SetFillColor(0, 74, 173);
        $this->Rect(0,280, 220, 70, 'F');
        $this->SetY(-10);
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(255,255,255);
        $this->SetX(70);
        $this->Write(5, 'Documento otorgado por StoreCodeWay');
    }
    }

    include("../model/conexion.php");

    $consulta = "SELECT * FROM transfCobroStoreCode;";
    $consultaDireccion = mysqli_query($conect,$consulta);

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);


    $pdf->SetY(70);
        $pdf->SetFillColor(79,78,77);
        $pdf->Cell(40, 10, utf8_decode("Usuario a Depositar"), 1, 0, '  B', 0);
        $pdf->Cell(38, 10, utf8_decode("Nombre del Banco"), 1, 0, 'B', 0);
        $pdf->Cell(38, 10, utf8_decode("Clave Interbancaria"), 1, 0, 'B', 0);
        $pdf->Cell(38, 10, utf8_decode("Numero de Tarjeta"), 1, 0, 'B', 0);
        $pdf->Cell(40, 10, utf8_decode("Numero de cuenta"), 1, 0, 'B', 0);
        
        $pdf->Ln();

    while($row = mysqli_fetch_array($consultaDireccion)){
        $pdf->Cell(40, 10, utf8_decode( $row['nombreEmpresa']), 1, 0, 'B', 0);
        $pdf->Cell(38, 10, utf8_decode($row['nombreBanco']), 1, 0, 'B', 0);
        $pdf->Cell(38, 10, utf8_decode($row['claveInterbancaria']), 1, 0, 'B', 0);
        $pdf->Cell(38, 10, utf8_decode($row['numeroTarjeta']), 1, 0, 'B', 0);
        $pdf->Cell(40, 10, utf8_decode($row['numeroCuenta']), 1, 1, 'B', 0);
    }

    $pdf->Cell(40, 10, utf8_decode("Total a pagar es de"), 1, 0, 'B', 0);
    $pdf->Cell(38, 10, utf8_decode("$".$total), 1, 0, 'B', 0);
    $pdf->Cell(38, 10, utf8_decode("Tu producto es:"), 1, 0, 'B', 0);
    $pdf->Cell(38, 10, utf8_decode($producto), 1, 0, 'B', 0);

    $pdf->SetFont('Arial', '', 12); 
    $pdf->SetTextColor(255,0,0); 
    $pdf->SetXY(10, 45); 
    $pdf->Write(4, "Tienes un plazo de 24 horas para realizar la transferencia o el deposito de tu producto a la cuenta mencionada y se pueda validar la compra con el vendedor.");
    $pdf->Write(4, " Cuando se realice la transferencia de deposito procede ir a tus productos comprados, para cargar el comprobante de tu deposito.");
    $pdf->Output();


//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
}
//Fin de la condicion de la sesion
?>