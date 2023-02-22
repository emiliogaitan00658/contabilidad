<?php
include "header/header.php";
$dia_dos = Extraccion_fecha::_data_primer_fecha_del_mes();
$dia_uno = Extraccion_fecha::_data_ultima_fecha_del_mes();
?>
<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <table class="table table-responsive-sm table-bordered  table-hover" style="padding:0em">
        <thead>
        <tr style="border-bottom: 1px solid black;" class="alert alert-info">
            <th scope="col">#Codigo</th>
            <th scope="col">Factura Inicio</th>
            <th scope="col">Factura Cierre</th>
            <th scope="col">Fecha </th>
            <th scope="col">Hora</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result4 = $mysqli->query("SELECT * FROM `cierre_caja` WHERE fecha BETWEEN '$dia_uno' and '$dia_dos' and indsucursal='$indsucursal'");

        while ($resultado = $result4->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $resultado['ind_factura']; ?></th>
                <td><?php echo $resultado['inicio'];?></td>
                <td><?php echo $resultado['fin']; ?></td>
                <td><?php echo datos_clientes::traforma_fecha($resultado['fecha']); ?></td>
                <td><?php echo $resultado['hora']; ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<?php
include_once "header/footer.php";
?>

