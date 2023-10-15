<?php
include "BD-Connection/datos_clientes.php";
include "BD-Connection/conection.php";
echo "<br>";
echo "<br>";
echo $fecha1 = datos_clientes::fecha_get_pc_MYSQL();
echo "<span>---</span>" . $fecha2 = datos_clientes::fecha_get_pc_MYSQL();
echo "<br>";
echo "<br>";

$indsucursal = 1;
echo "<u>".datos_clientes::nombre_sucursal($indsucursal)."</u>";
$uno = datos_clientes::primera_factura_no($indsucursal, $fecha1, $fecha2, $mysqli);
$dos = datos_clientes::ultima_factura_no($indsucursal, $fecha1, $fecha2, $mysqli);
$numeros_presentes = datos_clientes::rango_hoy_facturacion($i, $fecha1, $fecha2, $mysqli);
function numeros_faltantes_en_rango($A, $B, $numeros_presentes, $indsucursal, $mysqli)
{
    $numeros_faltantes = array();
    for ($num = $A; $num <= $B; $num++) {
        if (!in_array($num, $numeros_presentes)) {
            if (datos_clientes::verificar_numero_factura2($num, $indsucursal, $mysqli) == "0") {
                $numeros_faltantes[] = $num;
            }
        }
    }
    return $numeros_faltantes;
}

$A = $uno;
$B = $dos;


$numeros_faltantes = numeros_faltantes_en_rango($A, $B, $numeros_presentes, $indsucursal, $mysqli);
$datos_hoy_con = datos_clientes::datos_cierre_caja($indsucursal, $mysqli);
echo "    (Inicio de cierre de caja)";
?>
<br>
<div class="row" style="margin: 0;padding: 0;border: 1px solid #0d0d0d">
    <p class="alert alert-primary center-block">
                        <span class="red-text">Rango No: <?php echo "[" . $uno . " - " . $dos . "] Faltantes No=" . // Mostrar los números faltantes
                                implode(", ", $numeros_faltantes); ?>  </span>
        <span>Total Factura: <?php echo $datos_hoy_con["total_factura"]; ?></span> <span
                style="margin-left:1em ;">Factura Credito: <?php echo $datos_hoy_con["total_credito"]; ?></span><span
                style="margin-left:1em ;"
                class="red-text">Factura Duplicada: <?php echo datos_clientes::factura_duplicada($uno, $dos, $indsucursal, $mysqli); ?></span>
    </p>
</div>
<?php
$indsucursal = null;
?>











<?php
for ($i = 2; $i <= 9; $i++) {
    $indsucursal = $i;
    echo "<u>".datos_clientes::nombre_sucursal($indsucursal)."</u>";
    $uno = datos_clientes::primera_factura_no($indsucursal, $fecha1, $fecha2, $mysqli);
    $dos = datos_clientes::ultima_factura_no($indsucursal, $fecha1, $fecha2, $mysqli);
    $numeros_presentes = datos_clientes::rango_hoy_facturacion($i, $fecha1, $fecha2, $mysqli);

    $A = $uno;
    $B = $dos;


    $numeros_faltantes = numeros_faltantes_en_rango($A, $B, $numeros_presentes, $indsucursal, $mysqli);
    $datos_hoy_con = datos_clientes::datos_cierre_caja($indsucursal, $mysqli);
    echo "    (Inicio de cierre de caja)";
    ?>
    <br>
    <div class="row" style="margin: 0;padding: 0;border: 1px solid #0d0d0d">
        <p class="alert alert-primary center-block">
                        <span class="red-text">Rango No: <?php echo "[" . $uno . " - " . $dos . "] Faltantes No=" . // Mostrar los números faltantes
                                implode(", ", $numeros_faltantes); ?>  </span>
            <span>Total Factura: <?php echo $datos_hoy_con["total_factura"]; ?></span> <span
                    style="margin-left:1em ;">Factura Credito: <?php echo $datos_hoy_con["total_credito"]; ?></span><span
                    style="margin-left:1em ;"
                    class="red-text">Factura Duplicada: <?php echo datos_clientes::factura_duplicada($uno, $dos, $indsucursal, $mysqli); ?></span>
        </p>
    </div>
    <?php
    $indsucursal = null;
}
?>











