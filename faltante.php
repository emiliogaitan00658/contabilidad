<?php
include_once "header/header.php";
$fecha1 = date("Y-m-01");
$fecha2 = date("Y-m-t");
$sucursal_nombre = datos_clientes::nombre_sucursal_ind($indsucursal, $mysqli);

$primera = datos_clientes::primera_factura_no($indsucursal, $fecha1, $fecha2, $mysqli);
$segunda = datos_clientes::ultima_factura_no($indsucursal, $fecha1, $fecha2, $mysqli);
?>
<div class="container">
    <hr>
    <h2 class="center text-uppercase">Registro de factura no reportados</h2>
    <h5 class="center-align">Fecha de facturaciòn <?php echo datos_clientes::traforma_fecha($fecha1) ?>
        al <?php echo datos_clientes::traforma_fecha($fecha2) ?></h5>
    <p class="center-align">Las sucursales debe de ingresar las factura manuales por el sistema</p>
    <hr>
</div>
<div class="container">
    <div class="z-depth-1 rounded white center-block" style="width: 95%;padding: 1em;">
        <h5 class="red-text">Numero de Factura : <?php echo $primera . "" . " AL " . "" . $segunda; ?></h5>
        <table class="table table-bordered">
            <thead>
            <tr style="border-bottom: 1px solid black;">
                <th scope="col">N.# SUCURSAL</th>
                <th scope="col">FALTANTE</th>
                <th scope="col" class="center-align">SUCURSAL</th>
                <th scope="col" class="center-align">No Fatura</th>
                <th scope="col" class="center-align">Registrar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $r1 = 0;
            for ($i = $primera; $i <= $segunda; $i++) {
                $res = datos_clientes::busqueda_alerta($i, $mysqli);
                if ($res == "0") {
                    $r1 = $r1 + 1;
                    ?>
                    <tr>
                        <td class="center-align"><?php echo $r1; ?></td>
                        <td class="center-align">Factura Faltante</td>
                        <td class="center-align"><?php echo $sucursal_nombre; ?></td>
                        <td class="center-align"><?php echo $i; ?></td>
                        <td class="center-align"><a href="temporal/cliente_manual.php" class="btn btn-info">Registrar</a></td>
                    </tr>
                    <?php
                }
            } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "header/footer.php"; ?>
