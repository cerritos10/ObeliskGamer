<?php
include('../fpdf/fpdf.php');
session_start();
define('EURO',chr(128)); // Constante con el símbolo Euro.
$pdf = new FPDF('P','mm',array(80,150)); // Tamaño tickt 80mm x 150 mm (largo aprox)
$pdf->AddPage();
 
// CABECERA
$pdf->SetFont('Helvetica','',12);
$pdf->Image('../assets/images/logo.png',3,3,-300);
$pdf->Cell(60,4,'ObeliskGamer',0,1,'C');
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,'C.I.F.: 01234567A',0,1,'C');
$pdf->Cell(60,4,'C/ Milton Cerritos',0,1,'C');
$pdf->Cell(60,4,'Candelaria de la Frontera',0,1,'C');
$pdf->Cell(60,4,'7409-4565',0,1,'C');
$pdf->Cell(60,4,'obeliskgamer@gmail.com.com',0,1,'C');
 
// DATOS FACTURA   
//$metodo=$_GET['metodo'];  
$pdf->Ln(5);
$fecha= date('Y-m-d h:m:s');   
$pdf->Cell(60,4,'Fecha: '.$fecha,0,1,'');
$metodo=$_GET['metodo'];
$pdf->Cell(60,4,'Metodo de pago: '.$metodo,0,1,'');
 
// COLUMNAS
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(30, 10, 'Articulo', 0);
$pdf->Cell(5, 10, 'Ud',0,0,'R');
$pdf->Cell(10, 10, 'Precio',0,0,'R');
$pdf->Cell(15, 10, 'Total',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(60,0,'','T');
$pdf->Ln(0);
 
// PRODUCTOS
include('../php/conexion.php');
$valor= $_GET['venta'];
$query = "SELECT p.nombre,v.cantidad,v.precio,v.subtotal FROM productos_venta AS v 
INNER JOIN productos AS p ON v.id_producto = p.id_producto WHERE v.id_venta=$valor";
$resultado= mysqli_query($conexion, $query); 
while ($row=$resultado->fetch_assoc()) {
	$pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(30, 10, $row['nombre'], 0);
    $pdf->Cell(3, 10, $row['cantidad'],0,0,'R');
    $pdf->Cell(12, 10, '$'.$row['precio'],0,0,'R');
    $pdf->Cell(15, 10, '$'.$row['subtotal'],0,0,'R');
    $pdf->Ln(8);
    $pdf->Cell(60,0,'','T');
    $pdf->Ln(0);
}

 
// SUMATORIO DE LOS PRODUCTOS Y EL IVA
$pdf->Ln(6);
$pdf->Cell(60,0,'','T');
$pdf->Ln(2);    
$consulta = "SELECT total FROM ventas WHERE id_venta=$valor";
$res = mysqli_query($conexion, $consulta);


while ($row2=$res->fetch_assoc()) {
    $stotal='$'.$row2['total'];
    $pdf->Cell(20, 10, 'TOTAL', 0);    
    $pdf->Cell(20, 10, '', 0);
    $pdf->Cell(15, 10,$stotal ,0,0,'R');
} 
 

 
// PIE DE PAGINA
$pdf->Ln(15);
$pdf->Cell(60,0,'Gracias por su compra',0,1,'C');

$pdf->Output('ticket.pdf','i');

?>