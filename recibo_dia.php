<?php include "header/header.php";
?>
    <div class="container white rounded z-depth-1" style="border-radius: 6px;">
        <div style="padding: 1em">
            <h5 class="alert alert-primary"><img src="assets/credito.png" alt="" width="5%" style="position:static">Facturación de Recibos<a style="margin: 0"
                                                                     class="nav-link alert alert-danger bg-red right"
                                                                     href="cambio_numeracion_recibo.php"
                                                                     class="right btn btn-info"><?php if (!empty($_SESSION)) {
                        echo "No." . $recibo;
                    } ?><i class="icon-arrow-right2 red-text"></i></a></h5>
            <hr>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <section class="row">
                    <div class="control-pares col-md-2">
                        <input type="date" name="textfecha" class="form-control aler alert-dark" placeholder="Fecha"
                               value="<?php
                               if ($_POST) {
                                   echo $_POST["textfecha"];
                               } else {
                                   $fcha = date("Y-m-d");
                                   echo $fcha;
                               }

                               ?>" required>
                    </div>
                    <div class="control-pares col-md-2">
                        <input type="number" name="textrecibo" class="form-control input_modificado"
                               placeholder="No Recibo" value="">
                    </div>
                    <div class="control-pares col-md-3">
                        <select name="textsucursal" class="form-control" required>
                            <?php if (!$_POST) { ?>
                                <option class="form-control" value="<?php
                                echo $_SESSION['sucursal']; ?>" selected><?php

                                    if ($_SESSION['sucursal'] == "1") {
                                        echo "Managua";
                                    }
                                    if ($_SESSION['sucursal'] == "2") {
                                        echo "Masaya";
                                    }
                                    if ($_SESSION['sucursal'] == "3") {
                                        echo "Chontales";
                                    }
                                    if ($_SESSION['sucursal'] == "6") {
                                        echo "Esteli";
                                    }
                                    if ($_SESSION['sucursal'] == "5") {
                                        echo "Leon";
                                    }
                                    if ($_SESSION['sucursal'] == "9") {
                                        echo "Matagalpa";
                                    }
                                    if ($_SESSION['sucursal'] == "4") {
                                        echo "Chinandega";
                                    }
                                    if ($_SESSION['sucursal'] == "7") {
                                        echo "Managua Bolonia";
                                    }
                                    if ($_SESSION['sucursal'] == "8") {
                                        echo "Managua Villa Fontana";
                                    }
                                    if ($_SESSION['sucursal'] == "10") {
                                        echo "Clinica Dansing";
                                    }
                                    ?>
                                </option>
                            <?php } else { ?>
                                <option class="form-control" value="<?php
                                echo $_POST['textsucursal']; ?>" selected><?php

                                    if ($_POST['textsucursal'] == "1") {
                                        echo "Managua";
                                    }
                                    if ($_POST['textsucursal'] == "2") {
                                        echo "Masaya";
                                    }
                                    if ($_POST['textsucursal'] == "3") {
                                        echo "Chontales";
                                    }
                                    if ($_POST['textsucursal'] == "6") {
                                        echo "Esteli";
                                    }
                                    if ($_POST['textsucursal'] == "5") {
                                        echo "Leon";
                                    }
                                    if ($_POST['textsucursal'] == "9") {
                                        echo "Matagalpa";
                                    }
                                    if ($_POST['textsucursal'] == "4") {
                                        echo "Chinandega";
                                    }
                                    if ($_POST['textsucursal'] == "7") {
                                        echo "Managua Bolonia";
                                    }
                                    if ($_POST['textsucursal'] == "8") {
                                        echo "Managua Villa Fontana";
                                    }
                                    if ($_POST['textsucursal'] == "10") {
                                        echo "Clinica Dansing";
                                    }
                                    ?>
                                </option>
                            <?php } ?>
                            <option class="form-control" value="1">Managua</option>
                            <option class="form-control" value="2">Masaya</option>
                            <option class="form-control" value="3">Chontales</option>
                            <option class="form-control" value="6">Esteli</option>
                            <option class="form-control" value="5">Leon</option>
                            <option class="form-control" value="9">Matagalpa</option>
                            <option class="form-control" value="4">Chinandega</option>
                            <option class="form-control" value="7">Managua Bolonia</option>
                            <option class="form-control" value="8">Managua Villa Fontana</option>
                            <option class="form-control" value="10">Clinica Dansing</option>
                        </select>
                    </div>

                    <div class="control-pares col-md-2">
                        <input type="submit" value="Buscar" class="btn white-text blue-grey btn-primary"/>
                    </div>
                </section>
            </form>
            <!--        <hr>-->
            <!--        <a class="btn btn-dark blue-grey right" href="index" style="margin-left:1em!important; "><i class="icon-user-plus white-text"></i> Nuevo Cliente</a>-->
            <!--        <br>-->
            <hr>
        </div>
    </div>
    <br>
    <div class="container z-depth-1 rounded white" style="border-radius: 6px;">
        <h5 class="modal-title blue-grey-text unoem alert alert-success">Credito Facturados</h5>
        <hr>
        <table class="table table-striped center-align"  style="padding: 1em;">
            <thead>
            <tr style="border-bottom: 1px solid black" class="alert alert-dark" >
                <th scope="col">No Recibo</th>
                <th scope="col">Nombre y Apellido</th>
                <th scope="col">USD Pago</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha Pago</th>
                <th scope="col">Eliminar</th>
                <th scope="col" class="center-align">Imprimir</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $fecha_consulta = datos_clientes::fecha_get_pc_MYSQL();

            if ($_POST) {
                $fecha2 = $_POST["textfecha"];
                $Nrecibo = $_POST["textrecibo"];
                $result4 = $mysqli->query("SELECT * FROM `creditos_pago` WHERE fechapago='$fecha2' or indrecibo='$Nrecibo' or indsucursal='$indsucursal'");
            } else {
                $result4 = $mysqli->query("SELECT * FROM `creditos_pago` WHERE indsucursal='$indsucursal' and fechapago='$fecha_consulta'");
            }
            while ($resultado = $result4->fetch_assoc()) {
                $indpago = $resultado['indpago'];
                $indtemp_id = $resultado['indtemp'];

                $indcliente = datos_clientes::idcliente_credito($indtemp_id, $mysqli);
                $nombre_apelido = datos_clientes::nombre_apellido_cliente($indcliente, $mysqli);
                ?>
                <tr>
                    <td><b><?php echo $resultado['indrecibo']; ?></b></td>
                    <td><p><?php echo $nombre_apelido; ?></p></td>
                    <td><b>$<?php echo$resultado['pago'] . ' (' . number_format((($dolar * $resultado['pago'])), 2, '.', ','). ')'; ?></b></td>
                    <td><?php
                        if ($resultado['indrecibo'] == "0") {
                            ?>
                            <p class="red white-text rounded" style="border-radius: 6px;">Pendiente</p>
                            <?php
                        } else {
                            ?>
                            <p class="bg-success white-text rounded"
                               style="background-color:#1cc88a!important;border-radius: 6px;">Cancelado</p>
                            <?php
                        }
                        ?></td>
                    <td><?php
                        $fecha_cambio = $resultado['fechapago'];
                        $timestamp = strtotime($fecha_cambio);
                        echo date("d/m/Y", $timestamp);
                        ?></td>
                    <td class="center-align"><a href="#"
                                                class="btn btn-danger" onclick="
                                var i='<?php echo $resultado['indtemp']; ?>';
                                verficar_eliminar(i);"><i class="btn-danger icon-bin"></i></a></td>
                    </td>
                    <td class="center-align"><a
                                href="pdfv2/htmlpdf_credito.php?key=<?php echo $resultado['indtemp']; ?>&indpago=<?php echo $indpago; ?>"
                                class="btn btn-success" target="_blank"><i class="icon-printer"></i></a>
                    </td>
                </tr>
                <?php

            } ?>

            </tbody>
        </table>
    </div>
///cambio de modifiacion actulizada
    <script>

        function verficar_eliminar(codigo) {
            swal({
                title: "Eliminar?",
                text: "Seguro de Eliminar Factura",
                icon: "success",
                buttons: true,

            })
                .then((willDelete) => {
                    if (willDelete) {
                        location.href = "temporal/eliminar_factura?key=" + codigo;
                    } else {
                        location.href = "recibo_dia.php";
                    }
                });
        }


    </script>


<?php include "header/footer.php" ?>