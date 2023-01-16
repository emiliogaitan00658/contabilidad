<?php
$key=$_GET["key"];
$pregunta=$_GET["dolar"];
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();

include "cotizar_factura_page_credito.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('newfile', array('Attachment'=>0));
?>