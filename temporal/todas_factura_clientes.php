<?php include "../header/header_panel.php";
if ($_GET) {
    $nombre = $_GET['indcliente'];
} else {
    echo '<script> location.href="factura_dia.php" </script>';
}
?>
<div class="container z-depth-1 rounded white">
        <div style="padding: 1em">
            <h5 class="alert alert-info">Todas la Factura Generadas <a href="../temporal/cliente_manual.php" class="right btn btn-info">Regresar</a></h5>

            <hr>
<!--            <form action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><!--" method="post">-->
<!--                <section class="row">-->
<!--                    <div class="control-pares col-md-3">-->
<!--                        <input type="date" name="textfecha" class="form-control" placeholder="Fecha" value="--><?php
//                        if ($_POST) {
//                            echo $_POST["textfecha"];
//                        } else {
//                            $fcha = date("Y-m-d");
//                            echo $fcha;
//                        }
//
//                        ?><!--" required>-->
<!--                    </div>-->
<!--                    <div class="control-pares col-md-2">-->
<!--                        <input type="number" name="textfactura" class="form-control" placeholder="No Factura" value="">-->
<!--                    </div>-->
<!--                    <div class="control-pares col-md-3">-->
<!--                        <select name="textsucursal" class="form-control" required>-->
<!--                            --><?php //if (!$_POST) { ?>
<!--                                <option class="form-control" value="--><?php
//                                echo $_SESSION['sucursal']; ?><!--" selected>--><?php
//
//                                    if ($_SESSION['sucursal'] == "1") {
//                                        echo "Managua";
//                                    }
//                                    if ($_SESSION['sucursal'] == "2") {
//                                        echo "Masaya";
//                                    }
//                                    if ($_SESSION['sucursal'] == "3") {
//                                        echo "Chontales";
//                                    }
//                                    if ($_SESSION['sucursal'] == "6") {
//                                        echo "Esteli";
//                                    }
//                                    if ($_SESSION['sucursal'] == "5") {
//                                        echo "Leon";
//                                    }
//                                    if ($_SESSION['sucursal'] == "9") {
//                                        echo "Matagalpa";
//                                    }
//                                    if ($_SESSION['sucursal'] == "4") {
//                                        echo "Chinandega";
//                                    }
//                                    if ($_SESSION['sucursal'] == "7") {
//                                        echo "Managua Bolonia";
//                                    }
//                                    if ($_SESSION['sucursal'] == "8") {
//                                        echo "Managua Villa Fontana";
//                                    }
//                                    if ($_SESSION['sucursal'] == "10") {
//                                        echo "Clinica Dansing";
//                                    }
//                                    ?>
<!--                                </option>-->
<!--                            --><?php //} else { ?>
<!--                                <option class="form-control" value="--><?php
//                                echo $_POST['textsucursal']; ?><!--" selected>--><?php
//
//                                    if ($_POST['textsucursal'] == "1") {
//                                        echo "Managua";
//                                    }
//                                    if ($_POST['textsucursal'] == "2") {
//                                        echo "Masaya";
//                                    }
//                                    if ($_POST['textsucursal'] == "3") {
//                                        echo "Chontales";
//                                    }
//                                    if ($_POST['textsucursal'] == "6") {
//                                        echo "Esteli";
//                                    }
//                                    if ($_POST['textsucursal'] == "5") {
//                                        echo "Leon";
//                                    }
//                                    if ($_POST['textsucursal'] == "9") {
//                                        echo "Matagalpa";
//                                    }
//                                    if ($_POST['textsucursal'] == "4") {
//                                        echo "Chinandega";
//                                    }
//                                    if ($_POST['textsucursal'] == "7") {
//                                        echo "Managua Bolonia";
//                                    }
//                                    if ($_POST['textsucursal'] == "8") {
//                                        echo "Managua Villa Fontana";
//                                    }
//                                    if ($_POST['textsucursal'] == "10") {
//                                        echo "Clinica Dansing";
//                                    }
//                                    ?>
<!--                                </option>-->
<!--                            --><?php //} ?>
<!--                            <option class="form-control" value="1">Managua</option>-->
<!--                            <option class="form-control" value="2">Masaya</option>-->
<!--                            <option class="form-control" value="3">Chontales</option>-->
<!--                            <option class="form-control" value="6">Esteli</option>-->
<!--                            <option class="form-control" value="5">Leon</option>-->
<!--                            <option class="form-control" value="9">Matagalpa</option>-->
<!--                            <option class="form-control" value="4">Chinandega</option>-->
<!--                            <option class="form-control" value="7">Managua Bolonia</option>-->
<!--                            <option class="form-control" value="8">Managua Villa Fontana</option>-->
<!--                            <option class="form-control" value="10">Clinica Dansing</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                    <div class="control-pares col-md-3">-->
<!--                        <input type="submit" value="Buscar" class="btn white-text blue-grey btn-primary"/>-->
<!--                    </div>-->
<!--                </section>-->
<!--            </form>-->
        </div>
    </div>
    <hr>
    <div class="z-depth-1 rounded white center-block" style="width: 95%;border-radius: 6px;padding: 1em;">
        <table class="table table-striped table-bordered" style="padding: 1em;">
            <thead>
            <tr style="border-bottom: 1px solid black;" class="alert alert-info">
                <th scope="col">No.Factura</th>
                <th scope="col" class="center-align">Nombre y Apellido</th>
                <th scope="col">Subtotal C$</th>
                <th scope="col">Total C$</th>
                <th scope="col">Total $</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Imprimir</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $result4 = $mysqli->query("SELECT * FROM `total_factura` WHERE indcliente='$nombre' and indtalonario!='' ORDER by indtotalfactura  DESC limit 15");
            while ($resultado = $result4->fetch_assoc()) {
                $indcliente = $resultado['indcliente'];
                $_SESSION["sucursal_acceso"] = $indsucursal = $resultado['indsucursal'];
                $nombre_apelido = datos_clientes::nombre_apellido_cliente($indcliente, $mysqli);
                ?>
                <?php if ($resultado['bandera'] == "1") { ?>
                    <tr>
                    <td>
                        <a href="#"><?php echo $resultado["indtalonario"]; ?></a>
                    </td>
                    <td><b><?php echo $nombre_apelido; ?></b></td>
                    <td class="center-align">C$ <?php echo number_format($resultado["subtotal"], 2, '.', ','); ?></td>
                    <td class="center-align">C$ <?php echo number_format($resultado["total"], 2, '.', ','); ?></td>
                    <td class="center-align"><b>$ <?php echo number_format(($resultado["total"] / $dolar), 2, '.', ','); ?></b></td>
                    <td class="center-align"><?php echo datos_clientes::traforma_fecha($resultado["fecha"]); ?></td>
                    <td class="center-align"><?php echo $resultado["hora"]; ?></td>
                    <td class="center-align"><a
                                href="../PDF/cotizar_factura_link_credito.php?dolar=1&key=<?php echo $resultado['indtemp']; ?>"
                                class="btn btn-success" target="_blank"><i class="icon-printer"></i></a>
                    </td>
                <?php } else { ?>
                    <tr class="red-text">
                        <td>
                            <del><a class="red-text"
                                    href="#"><?php echo $resultado["indtalonario"]; ?></a>
                            </del>
                        </td>
                        <td><?php echo $nombre_apelido; ?></td>
                        <td class="center-align">C$ <?php echo number_format($resultado["subtotal"], 2, '.', ','); ?></td>
                        <td class="center-align">C$ <?php echo number_format($resultado["total"], 2, '.', ','); ?></td>
                        <td class="center-align"><b>$ <?php echo number_format(($resultado["total"] / $dolar), 2, '.', ','); ?></b></td>
                        <td><?php echo datos_clientes::traforma_fecha($resultado["fecha"]); ?></td>
                        <td><?php echo $resultado["hora"]; ?></td>
                        <td>
                            <a href="../PDF/cotizar_factura_link_credito.php?dolar=1&key=<?php echo $resultado['indtemp']; ?>"
                               class="btn btn-success" target="_blank"><i class="icon-printer"></i></a></td>
                    </tr>
                    <?php
                }
                ?>

                <?php
            } ?>
            </tbody>
        </table>
</div>

<?php include "../header/footer_temporal.php" ?>

