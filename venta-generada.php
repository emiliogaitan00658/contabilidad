<?php include "header/header.php";
if (!$_SESSION) {
    echo '<script> location.href="login.php </script>';
}
?>
<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <br>
        <h5 class="alert alert-primary center-align">***** Reporte general de ventas marca *******</h5>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="row">
                <div class="control-pares col-md-3">
                    <input type="text" name="textproducto" value="<?php if ($_POST)echo $producto = $_POST["textproducto"];?>" class="form-control input_modificado" placeholder="Codigo Producto ....." required>
                </div>
                <div class="control-pares col-md-2">
                    <input type="date" name="textfecha1" class="form-control aler alert-info" placeholder="Fecha"
                           value="<?php
                           if ($_POST) {
                               echo $_POST["textfecha1"];
                           } else {
                               $fcha = date("Y-m-d");
                               echo $fcha;
                           }

                           ?>" required>
                </div>
                <div class="control-pares col-md-2">
                    <input type="date" name="textfecha2" class="form-control aler alert-info" placeholder="Fecha"
                           value="<?php
                           if ($_POST) {
                               echo $_POST["textfecha2"];
                           } else {
                               $fcha = date("Y-m-d");
                               echo $fcha;
                           }

                           ?>" required>
                </div>
<!--                <div class="control-pares col-md-2">-->
<!--                    <select name="textsucursal" class="form-control" required>-->
<!--                        <option class="form-control" value="0">Todos</option>-->
<!--                        <option class="form-control" value="1">Managua</option>-->
<!--                        <option class="form-control" value="2">Masaya</option>-->
<!--                        <option class="form-control" value="3">Chontales</option>-->
<!--                        <option class="form-control" value="6">Esteli</option>-->
<!--                        <option class="form-control" value="5">Leon</option>-->
<!--                        <option class="form-control" value="9">Matagalpa</option>-->
<!--                        <option class="form-control" value="4">Chinandega</option>-->
<!--                        <option class="form-control" value="7">Managua Bolonia</option>-->
<!--                        <option class="form-control" value="8">Managua Villa Fontana</option>-->
<!--                    </select>-->
<!--                </div>-->
                <div class="control-pares col-md-2">
                    <input type="submit" value="Buscar producto" class="btn white-text blue-grey btn-primary"/>
                </div>
            </section>
        </form>
        <hr>

    </div>
</div>
<hr>
<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <table class="table table-responsive-sm table-striped" style="padding: 1em;">
        <thead>
        <tr style="border-bottom: 1px solid black;" class="alert alert-info">
            <th scope="col">#Codigo</th>
            <th scope="col">Nombre Producto</th>
            <th scope="col">Total Unidad</th>
            <th scope="col">Precio 2</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_POST["textproducto"])) {
            $suma=0;
            $suma2=0;
            $fecha1=$_POST["textfecha1"];
            $fecha2=$_POST["textfecha2"];
            $result4 = $mysqli->query("SELECT f.codigo_producto as ss, f.nombre_producto as ss1, COUNT(f.indfactura) AS cantidad_vendida, SUM(f.precio_total) AS total_precio FROM total_factura tf LEFT JOIN factura f
    ON CONVERT(tf.indtemp USING utf8mb4) = f.indtemp WHERE (tf.indsucursal = 1 OR tf.indsucursal IS NULL)
                                                       AND tf.fecha BETWEEN'$fecha1' AND '$fecha2' 
            And f.codigo_producto like '%$producto%' GROUP BY f.codigo_producto, f.nombre_producto ORDER BY f.codigo_producto;");
        }
        while ($resultado = $result4->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $resultado['ss']; ?></th>
                <td><?php echo $resultado['ss1']; ?></td>
                <td>
                    <?php  $suma=$resultado['cantidad_vendida']+$suma; echo $resultado['cantidad_vendida']; ?>
                </td>
                <td>
                    <?php $suma2=$resultado['total_precio']+$suma2; echo  number_format(($resultado['total_precio']), 2, '.', ','); ?>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
    <hr><br>
    <h5>Cantidad vendida unitario=<?php echo $suma; ?></h5>
    <h5>Cantidad Ventas totales C$=<?php echo number_format(($suma2), 2, '.', ',');; ?></h5>
    <h5>Cantidad Ventas totales $=<?php echo number_format(($suma2/$dolar), 2, '.', ',');; ?></h5>
    <hr>
    <br>
</div>
<?php include "header/footer.php" ?>


