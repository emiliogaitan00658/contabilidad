<?php
include_once "../header/header_panel.php";
$dolar = datos_clientes::cambio_dolar($mysqli);
?>
<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <h5 class="alert alert-success">Reporte de radiografias<a class="btn btn-dark blue-grey right"
                                                                  href="nuevo_producto.php" class="right btn btn-info">Imprimir PDF</a></h5>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="row">
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
                <div class="control-pares col-md-4">
                    <input type="submit" value="Buscar" class="btn white-text blue-grey btn-primary"/>
                </div>
            </section>
        </form>
        <hr>
        <br>
    </div>
</div>
<hr>
<div class="container z-depth-1 rounded white">
    <table class="table table-bordered" style="padding: 1em;">
        <thead>
        <tr style="border-bottom: 1px solid black">
            <th scope="col">#Codigo</th>
            <th scope="col">Servicio</th>
            <th scope="col">Precio 1</th>
            <th scope="col">Precio 2</th>
            <th scope="col">Precio 3</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Cambiar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_POST["textproducto"])) {
            echo $producto = $_POST["textproducto"];
            $result4 = $mysqli->query("SELECT * FROM `producto` WHERE `nombre_producto` LIKE '%$producto%' OR `codigo_producto` LIKE '%$producto%' ORDER by codigo_producto ASC");
        } else {
            $result4 = $mysqli->query("SELECT * FROM `producto` ORDER by nombre_producto ASC limit 30");
        }
        while ($resultado = $result4->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $resultado['codigo_producto']; ?></th>
                <td><?php echo $resultado['nombre_producto']; ?></td>
                <td>$ <?php echo $resultado['precio1']; ?></td>
                <td>$ <?php echo $resultado['precio2']; ?></td>
                <td>$ <?php echo $resultado['precio3']; ?></td>
                <td><a href="eliminar_producto_lista.php?producto=<?php echo $resultado['indproducto']; ?>"
                       class="btn btn-danger"><i class="icon-bin bt btn-danger"></i></a></td>
                <td><a href="Edit_producto.php?producto=<?php echo $resultado['indproducto']; ?>"
                       class="btn btn-success" target="_blank">Editar</a></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>


<?php
include_once "../header/footer_temporal.php";
?>
