<?php


require('fpdf/fpdf.php');
require('../../config.php');
session_start();

$data = $_SESSION["data"];


$pdf = new FPDF();
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial', 'B', 14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(120, 5, COMPANY, 0, 0);
$pdf->Cell(59, 5, 'INVOICE', 0, 1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial', '', 12);

$pdf->ln();

$pdf->Cell(120, 5, STREET, 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(34, 5, date('d M, Y H:i:s'), 0, 1);//end of line

$pdf->Cell(120, 5, CITY . ', ' . COUNTRY . ', ' . ZIP, 0, 0);
$pdf->Cell(25, 5, 'Invoice #', 0, 0);
$pdf->Cell(34, 5, $data[0]["order_id"], 0, 1);//end of line

$pdf->Cell(120, 5, 'Phone ' . PHONE, 0, 0);
$pdf->Cell(25, 5, 'Customer ID', 0, 0);
$pdf->Cell(34, 5, $data[0]["user_id"], 0, 1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->ln();
$pdf->ln();

//billing address
$pdf->Cell(100, 5, 'Bill to', 0, 1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $data[0]["user_name"], 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $data[0]["email"], 0, 1);

$pdf->ln();
$pdf->ln();

//invoice contents
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(120, 5, 'Description', 1, 0);
$pdf->Cell(25, 5, 'Amount', 1, 0);
$pdf->Cell(34, 5, 'Price incl.', 1, 1);//end of line

$pdf->SetFont('Arial', '', 12);

//Numbers are right-aligned so we give 'R' after new line parameter
//ALL THE TICKET_ORDERS
$totalInclBTW = 0;

foreach ($data as $row) {
    $pdf->Cell(120, 5, $row["event"] . ', ' . $row["ticket_name"], 1, 0);
    $pdf->Cell(25, 5, $row["amount"], 1, 0);
    $pdf->Cell(34, 5, $row["price"], 1, 1, 'R');//end of line
    $totalInclBTW += $row["total_price"];
}

$totalExclBTW = number_format($totalInclBTW / 1.21, 2);
$totalBtw = number_format($totalInclBTW - $totalExclBTW, 2);
$totalInclBTW = number_format($totalInclBTW, 2);
$btw = '21%';

/* SUMMARY */
$pdf->Cell(120, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Subtotal', 0, 0);
$pdf->Cell(4, 5, chr(128), 1, 0);//chr(128) = Euro sign
$pdf->Cell(30, 5, $totalExclBTW, 1, 1, 'R');//end of line

$pdf->Cell(120, 5, '', 0, 0);
$pdf->Cell(25, 5, 'BTW', 0, 0);
$pdf->Cell(4, 5, chr(128), 1, 0);//chr(128) = Euro sign
$pdf->Cell(30, 5, $totalBtw, 1, 1, 'R');//end of line

$pdf->Cell(120, 5, '', 0, 0);
$pdf->Cell(25, 5, 'BTW %', 0, 0);
$pdf->Cell(4, 5, chr(128), 1, 0);//chr(128) = Euro sign
$pdf->Cell(30, 5, $btw, 1, 1, 'R');//end of line

$pdf->Cell(120, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Total Due', 0, 0);
$pdf->Cell(4, 5, chr(128), 1, 0);//chr(128) = Euro sign
$pdf->Cell(30, 5, $totalInclBTW, 1, 1, 'R');//end of line
$pdf->Output();
?>
