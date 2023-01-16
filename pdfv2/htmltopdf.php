<?php
$key = $_GET["key"];
session_start();
$indsucursal = $_SESSION["sucursal"];
$indempleado = $_SESSION["indempleado"];
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();

if ($_SESSION["sucursal_acceso"] == $indsucursal) {
    if ($indsucursal == "1") {
        if ($indempleado == "24") {
            include "imprimir_altamira.php";
        } else {
            include "visualizar_factura.php";
        }
    } else if ($indsucursal == "2") {
        include "imprimir_masaya.php";
    } else if ($indsucursal == "3") {
        include "imprimir_juigalpa.php";
    } else if ($indsucursal == "4") {
        include "factura_chinandega.php";
    } else if ($indsucursal == "5") {
        include "factura_leon.php";
    } else if ($indsucursal == "8") {
        include "imprimir_villafontana.php";
    } else if ($indsucursal == "6") {
        include "imprimir_esteli.php";
    } else {
        include "imprimir_factura.php";
    }
} else {
    include "no_autroizado.php";
}


$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('newfile', array('Attachment'=>0));
?>