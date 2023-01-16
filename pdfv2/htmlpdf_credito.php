<?php
$key = $_GET["key"];
session_start();
$indsucursal = $_SESSION["sucursal"];
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
include "credito_pdf.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('newfile', array('Attachment'=>0));
?>