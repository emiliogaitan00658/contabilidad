<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=materiales_exportado_" . date('Y:m:d:m:s') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

session_start();

require_once '../BD-Connection/conection.php';
require_once '../BD-Connection/datos_clientes.php';
$fecha1=$_SESSION["exporta_fecha1"];
$fecha2=$_SESSION["exporta_fecha2"];

$output = "";

if (isset($_POST['export'])) {
    $output .= "
			<table>
				<thead>
					<tr>
                <th>N.# SUCURSAL</th>
                <th>SUCURSAL</th>
                <th>N.# INICIO</th>
                <th>N.# FINAL</th>
                <th>TOTAL DE FACTURAS</th>
                <th>VENTAS DE CONTADO</th>
                <th>VENTA AL CREDITO</th>
                <th>TOTAL VENDIDO POR MES</th>
            </tr>
					</thead>
					
				<tbody>
		";
        $total_factura = 0;
        $total_contado = 0;
        $total_credito = 0;
        $suma_totalventas=0;

        $result4 = $mysqli->query("SELECT * FROM `sucursal` order by serie");
        while ($resultado = $result4->fetch_assoc()) {
            $n1 = 0;
            $n2 = 0;
            $sum = 0;
            $sum1 = 0;
            $d = 0;

        $output .= "
					<tr>
                    <td>" .$resultado["serie"]. "</td>
                    <td>" . $resultado["nombre_sucursal"]. "</td>
                    <td>" . datos_clientes::primera_factura_no($resultado["indsucursal"], $fecha1, $fecha2, $mysqli) . "</td>
                    <td>" . datos_clientes::ultima_factura_no($resultado["indsucursal"], $fecha1, $fecha2, $mysqli). "</td>
                    <td>" . $d = datos_clientes::conteo_factura($resultado["indsucursal"], $fecha1, $fecha2, $mysqli);
                        $total_factura = $total_factura + $d. "</td>
                    <td>" . $n1 = datos_clientes:: suma_total_venta_contado_totales($resultado["indsucursal"], $fecha1, $fecha2, $mysqli);echo datos_clientes::dos_decimales($n1). "</td>
                    <td>" . $n2 = datos_clientes::suma_total_venta_credito_totales($resultado["indsucursal"], $fecha1, $fecha2, $mysqli);echo datos_clientes::dos_decimales($n2) . "</td>
                    <td>" . $suma1=datos_clientes::total_suma_contador($resultado["indsucursal"], $fecha1, $fecha2, $mysqli);echo datos_clientes::dos_decimales($suma1). "</td>
                </tr>
					
					
					
		";
            $total_contado = $total_contado + $n1;
            $total_credito = $total_credito + $n2;
            $suma_totalventas=$suma_totalventas+$suma1;
    }

    $output .= "
<tr>
                <td><b>TOTAL:</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>" . $total_factura. "</td>
                <td>" . datos_clientes::dos_decimales($total_contado). "</td>
                <td>" . datos_clientes::dos_decimales($total_credito). "</td>
                <td>" . "C$ ".datos_clientes::dos_decimales($suma_totalventas). "</td>
            </tr>
				</tbody>
				
			</table>
		";

    echo $output;
}

?>