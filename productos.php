<?php include "header/header.php";
//session_start();
if (!$_SESSION) {
    echo '<script> location.href="login" </script>';
}
?>
<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <br>
        <h5 class="alert alert-primary">Buscar producto</h5>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="row">
                <div class="control-pares col-md-4">
                    <input type="text" name="textproducto" class="form-control input_modificado" placeholder="Buscar ....." required>
                </div>
                <div class="control-pares col-md-4">
                    <input type="submit" value="Buscar producto" class="btn white-text blue-grey btn-primary"/>
                </div>
            </section>
        </form>
        <hr>
<!--        <div class="modal-footer">-->
<!---->
<!--            <a class="btn white-text btn-dark" href="faltantes">Faltantes</a>-->
<!--            <a class="btn white-text btn-dark" href="entregado_materiales">Entregado Materiales</a>-->
<!--            --><?php
//            if (empty($_SESSION["root"])) {
//                ?>
<!--                <a class="btn white-text blue-grey btn-primary" href="entregar_materiales">Entregar-->
<!--                    Materiales</a>-->
<!--                --><?php
//            }
//            ?>
<!---->
<!--        </div>-->
    </div>
</div>
<hr>
<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <table class="table table-responsive-sm table-bordered" style="padding: 1em;">
        <thead>
        <tr style="border-bottom: 1px solid black;" class="alert alert-info">
            <th scope="col">#Codigo</th>
            <th scope="col">Detalles de producto</th>
            <th scope="col">Precio 1</th>
            <th scope="col">Precio 2</th>
            <th scope="col">Precio 3</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_POST["textproducto"])) {
            echo $producto = $_POST["textproducto"];
            $result4 = $mysqli->query("SELECT * FROM `producto` WHERE `nombre_producto` LIKE '%%$producto%%' OR `codigo_producto` LIKE '%%$producto%%' ORDER by nombre_producto ASC");
        } else {
            $result4 = $mysqli->query("SELECT * FROM `producto` ORDER by nombre_producto ASC limit 10");
        }
        while ($resultado = $result4->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $resultado['codigo_producto']; ?></th>
                <td><?php echo $resultado['nombre_producto']; ?></td>
                <td>
                    $ <?php echo $resultado['precio1'] . ' (' . number_format((($dolar * $resultado['precio1'])), 2, '.', ','). ')'; ?>
                </td>
                <td>
                    $ <?php echo $resultado['precio2'] . ' (' . number_format((($dolar * $resultado['precio2'])), 2, '.', ','). ')'; ?>
                </td>
                <td>
                  $ <?php echo $resultado['precio3'] . ' (' . number_format((($dolar * $resultado['precio3'])), 2, '.', ','). ')'; ?>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<?php include "header/footer.php" ?>

