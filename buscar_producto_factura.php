<?php include "header/header.php";
//session_start();
if (!$_SESSION) {
    echo '<script> location.href="login.php" </script>';
}
if ($_GET) {
    $indproducto = $_GET['codigo'];
    $precio = $_GET['precio'];
    $dato = datos_clientes::buscar_producto_codigo_producto($indproducto, $mysqli);
    $producto = $dato['nombre_producto'];
    $indtemp = $_SESSION['Key'];
    $indsucursal = $_SESSION['sucursal'];
    $reques = datos_clientes::verificar_producto_factura($indtemp, $indproducto, $mysqli);
    if ($reques == "false") {
        if ($precio == 0) {
            echo '<script>
        swal("Error  C$0.0 ?", "Error", "warning")
.then((value) => {
  location.href="buscar_producto_factura.php";
});
</script>';
        } else {
            datos_clientes::facturagenerada_filtro1($indtemp, $dolar, $indsucursal, $precio, $producto, $indproducto, $mysqli);
            echo '<script>
    swal("Exito .")
.then((value) => {
  location.href="crear_factura.php";
});
</script>';
        }

    }else {
        echo '<script>
        swal("Repetiste Producto!", "Error", "warning")
.then((value) => {
  location.href="buscar_producto_factura.php";
});
</script>';
    }
}
?>

<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <h5 class="alert alert-primary">Buscar producto<a href="crear_factura.php"
                                                          class="right btn btn-info">Regresar</a></h5>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="row">
                <div class="control-pares col-md-4">
                    <input type="text" name="textproducto" class="form-control input_modificado"
                           placeholder="Buscar ....." required>
                </div>
                <div class="control-pares col-md-4">
                    <input type="submit" value="Buscar producto" class="btn white-text blue-grey btn-primary"/>
                </div>
            </section>
        </form>
        <!--        <br>-->
        <!--        <p>Si desea buscar el producto por marca debe de asignar el codigo mas ( - ) ejemplo=(MAQUIRA-)</p>-->
        <hr>
    </div>
</div>
<hr>
<div class="z-depth-1 rounded white center-block" style="width: 85%!important;">
    <table class="table table-striped table-bordered" style="padding: 1em;">
        <thead>
        <tr style="border-bottom: 1px solid black;" class="alert alert-info">
            <th scope="col">No# Codigo</th>
            <th scope="col">Detalles Producto</th>
            <th scope="col">Precio 1</th>
            <th scope="col">Precio 2</th>
            <th scope="col">Precio 3</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_POST["textproducto"])) {
            $producto = $_POST["textproducto"];
            $result4 = $mysqli->query("SELECT * FROM `producto` WHERE `nombre_producto` LIKE '%$producto%' OR `codigo_producto` LIKE '%$producto%' ORDER by codigo_producto ASC ");
        } else {
            $result4 = $mysqli->query("SELECT * FROM `producto` ORDER by nombre_producto ASC limit 30");
        }
        while ($resultado = $result4->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $resultado['codigo_producto']; ?></th>
                <td><?php echo $resultado['nombre_producto']; ?></td>
                <td>
                    <a href="buscar_producto_factura.php?codigo=<?php echo $resultado['codigo_producto'] . '&precio=' . $resultado['precio1'] . '&producto=' . $resultado['nombre_producto']; ?>">$ <?php echo $resultado['precio1'] . ' (' . number_format((($dolar * floatval($resultado['precio1']))), 2, '.', ',') . ')'; ?></a>
                </td>
                <td>
                    <a href="buscar_producto_factura.php?codigo=<?php echo $resultado['codigo_producto'] . '&precio=' . $resultado['precio2'] . '&producto=' . $resultado['nombre_producto']; ?>">$ <?php echo $resultado['precio2'] . ' (' . number_format((($dolar * floatval($resultado['precio2']))), 2, '.', ',') . ')'; ?></a>
                </td>
                <td>
                    <a href="buscar_producto_factura.php?codigo=<?php echo $resultado['codigo_producto'] . '&precio=' . $resultado['precio3'] . '&producto=' . $resultado['nombre_producto']; ?>">$ <?php echo $resultado['precio3'] . ' (' . number_format((($dolar * floatval($resultado['precio3']))), 2, '.', ',') . ')'; ?></a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<?php include "header/footer.php" ?>


