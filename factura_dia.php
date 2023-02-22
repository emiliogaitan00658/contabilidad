<?php include "header/header.php";
//session_start();
if (!$_SESSION) {
    echo '<script> location.href="login.php" </script>';
}
//if($indsucursal!=1) {
//    $dia_dos = Extraccion_fecha::_data_primer_fecha_del_mes();
//$dia_uno = Extraccion_fecha::_data_ultima_fecha_del_mes();
//$primera = datos_clientes::primera_factura_no($idsucursal, $dia_uno, $dia_dos, $mysqli);
//$segunda = datos_clientes::ultima_factura_no($idsucursal, $dia_uno, $dia_dos, $mysqli);
//$total = 0;
//for ($i = $primera; $i <= 10; $i++) {
//    $res = datos_clientes::busqueda_alerta($i,$indsucursal ,$mysqli);
//    if ($res == 0) {
//        $total = $total + 1;
//    }
//}
//if ($total >  0) {
//    ?>
<!--    <div class="container">-->
<!--        <p class="alert alert-danger" style="position: center">!Alerta:-->
<!--            Total de factura no ingresadas <b><i>--><?php //echo $total; ?><!--</i></b> (Manualmente o regitras factura). <a-->
<!--                    href="faltante.php" class="btn btn-danger">ver</a></p>-->
<!--    </div>-->
<!--    --><?php
//}
//}
?>

    <style>
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 10px;
            border-radius: 6px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #2980B9;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgba(39, 104, 148, 0.8);
            min-width: 100px;
            overflow: auto;
            color: white !important;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            position: ;
            color: white !important;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #2c3e50;
        }
        /*.circle_demo {*/
        /*    height:5px!important;*/
        /*    width:5px!important;*/
        /*    background: #204c63;*/
        /*    -moz-border-radius:30px;*/
        /*    -webkit-border-radius:30px;*/
        /*    border-radius:30px;*/
        /*}*/
        .show {
            display: block;
        }
    </style>

    <div class="container white rounded z-depth-1" style="border-radius: 6px;">
        <div style="padding: 1em">
            <h5 class="alert alert-primary"><img src="assets/icono_factura.png" alt="" width="5%">Factura Generadas<a class="btn btn-secondary right" style="margin-left: 1em;"
                                                                href="cierre_caja.php"
                                                                class="right btn btn-danger"><i class="icon-exit"></i> Cierre Caja</a>&nbsp;   <a class="btn btn-dark blue-grey right"
                                                                href="temporal/cliente_manual.php"
                                                                class="right btn btn-info">Factura Manual</a></h5>
            <hr>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <section class="row">
                    <div class="control-pares col-md-2">
                        <input type="date" name="textfecha" class="form-control aler alert-info" placeholder="Fecha"
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
                        <input type="number" name="textfactura" class="form-control input_modificado"
                               placeholder="No Factura" value="">
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
                    <div class="control-pares col-md-2">
                        <a class="nav-link alert alert-danger bg-red" href="talonario_cambio.php" style="margin: 0">
                            <b><?php if (!empty($_SESSION)) {
                                    echo "No." . $talonario;
                                } ?> <i class="icon-arrow-right2 red-text"></i></b></a>
                    </div>

                </section>
            </form>
            <hr>
            <!--            <p class="red-text">Las facturas anuladas deben de ser reportadas en el sistema, es una obligación  del personal reportarlas, igual registrar todas las facturas  realizadas</p>-->
            <!--            <hr>-->
        </div>
    </div>
    <hr>
    <div class="z-depth-1 rounded white center-block" style="width: 90%;border-radius: 6px;padding: 1em;">
        <table class="table table-responsive-sm table-bordered  table-hover" style="padding:0em">
            <thead>
            <tr style="border-bottom: 1px solid black;" class="alert alert-info">
<!--                <th scope="col">*</th>-->
                <th scope="col">No.Factura</th>
                <th scope="col" class="center-align">Nombre y Apellido</th>
                <th scope="col">Subtotal C$</th>
                <th scope="col">Total C$</th>
                <th scope="col">Total $</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Imprimir</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Editar</th>
                <th scope="col">Opciones</th>
                <!--                <th scope="col">Anular</th>-->
                <!--                <th scope="col">Proforma</th>-->
                <!--                <th scope="col">Retencion</th>-->
            </tr>
            </thead>
            <tbody>
            <?php

            if ($_POST) {
                $fecha2 = $_POST["textfecha"];
                $sucursal = $_POST["textsucursal"];
                $talo = $_POST["textfactura"];
                if ($talo == "") {
                    $result4 = $mysqli->query("SELECT * FROM `total_factura` WHERE total_factura.fecha='$fecha2' and total_factura.indsucursal='$sucursal' ORDER by indtotalfactura DESC");
                } else {
                    $result4 = $mysqli->query("SELECT * FROM `total_factura` WHERE  indtalonario='$talo' ORDER by indtotalfactura DESC");
                }
            } else {
                $fecha = datos_clientes::fecha_get_pc_MYSQL();
                $result4 = $mysqli->query("SELECT * FROM `total_factura` WHERE total_factura.fecha='$fecha'and total_factura.indsucursal='$indsucursal' ORDER by indtotalfactura DESC");
            }
            $conteo_i = 0;
            while ($resultado = $result4->fetch_assoc()) {
                $indcliente = $resultado['indcliente'];
                $_SESSION["sucursal_acceso"] = $indsucursal = $resultado['indsucursal'];
                $nombre_apelido = datos_clientes::nombre_apellido_cliente($indcliente, $mysqli);
                $conteo_i = $conteo_i + 1;
                ?>
                <?php if ($resultado['bandera'] == "1") { ?>
                    <tr>
<!--                        <td class="circle_demo">-->
<!--                        </td>-->
                        <td>
                            <a href="temporal/editar_numero_factura.php?key=<?php echo $resultado['indtemp'] . '&indtalonario=' . $resultado['indtalonario']; ?>">
                                <?php echo $resultado["indtalonario"]; ?></a>
                        </td>
                        <td>
                            <a href="detaller_clientes.php?indcliente=<?php echo $resultado['indcliente']; ?>"><?php echo $nombre_apelido; ?></a>
                        </td>
                        <td class="center-align">
                            <?php echo number_format($resultado["subtotal"], 2, '.', ','); ?></td>
                        <td class="center-align"><?php echo number_format($resultado["total"], 2, '.', ','); ?></td>
                        <td class="center-align">
                            <b><?php echo number_format(($resultado["total"] / $dolar), 2, '.', ','); ?></b></td>
                        <td class="center-align"><?php echo datos_clientes::traforma_fecha($resultado["fecha"]); ?></td>
                        <td class="center-align"><?php echo $resultado["hora"]; ?></td>
                        <td class="center-align"><a href="pdfv2/htmltopdf.php?key=<?php echo $resultado['indtemp']; ?>"
                                                    class="btn btn-success" target="_blank"><i class="icon-printer"></i></a>
                        </td>

                        <td><a href="#"
                               class="btn btn-danger" onclick="
                                    var i='<?php echo $resultado['indtemp']; ?>';
                                    verficar_eliminar(i);"><i class="btn-danger icon-bin"></i></a></td>


                        <td class="center-align"><a
                                    href="temporal/editar_factura_verificacion.php?temp=<?php echo $resultado['indtemp'] . "&indcliente=" . $indcliente. '&indtalonario=' . $resultado['indtalonario'];; ?>"
                                    class="btn btn-success">Editar</a></td>
                        <!--                        <td class="center-align"></td>-->

                        <!--                        <td class="center-align"></td>-->

                        <!--                        <td class="center-align"></td>-->


                        <td class="center-align">

                            <div class="dropdown">
                                <button onclick="myFunction<?php echo $conteo_i; ?>()" class="dropbtn">:</button>
                                <div id="myDropdown<?php echo $conteo_i; ?>" class="dropdown-content">
                                    <a href="#" onclick="
                                            var i='<?php echo $resultado['indtemp']; ?>';
                                            verficar_anulacion(i);">Anular</a>
                                    <a href="temporal/dolar_pregunta.php?key=<?php echo $resultado['indtemp']; ?>"
                                       target="_blank">Proforma</a>
                                    <a href="contador_modulo/registro_retencion.php?key=<?php echo $resultado['indtemp']; ?>"
                                    >Retenciòn</a>
                                    <a href="detalles_credito.php?indcliente=<?php echo $resultado['indcliente']. "&key=" . $resultado['indtemp']. '&total= '.$resultado["total"]; ?>"
                                    >Nuevo.Creditos</a>
                                    <?php  if ($resultado['indtalonario']==null){?>
                                    <a href="temporal/tranferir_factura.php?indcliente=<?php echo $resultado['indcliente']. "&key=" . $resultado['indtemp']. '&total= '.$resultado["total"]; ?>"
                                    >Tranferir.Factura</a>

                                    <?php  } ?>

                                </div>
                                <script>
                                    /* When the user clicks on the button,
                                    toggle between hiding and showing the dropdown content */
                                    function myFunction<?php echo $conteo_i; ?>() {
                                        document.getElementById("myDropdown<?php echo $conteo_i; ?>").classList.toggle("show");
                                    }

                                    // Close the dropdown if the user clicks outside of it
                                    window.onclick = function (event) {
                                        if (!event.target.matches('.dropbtn')) {
                                            var dropdowns = document.getElementsByClassName("dropdown-content");
                                            var i;
                                            for (i = 0; i < dropdowns.length; i++) {
                                                var openDropdown = dropdowns[i];
                                                if (openDropdown.classList.contains('show')) {
                                                    openDropdown.classList.remove('show');
                                                }
                                            }
                                        }
                                    }
                                </script>
                            </div>

                        </td>

                    </tr>
                <?php } else { ?>0
                    <tr class="red-text">
<!--                        <td>-->
<!--                            <i class="circle_demo"></i>-->
<!--                        </td>-->
                        <td>
                            <del><a class="red-text"
                                    href="temporal/editar_numero_factura.php?key=<?php echo $resultado['indtemp'] . '&indtalonario=' . $resultado['indtalonario']; ?>"><?php echo $resultado["indtalonario"]; ?></a>
                            </del>
                        </td>
                        <td>
                            <a href="detaller_clientes.php?indcliente=<?php echo $resultado['indcliente']; ?>"><?php echo $nombre_apelido; ?></a>
                        </td>
                        <td class="center-align"><?php echo number_format($resultado["subtotal"], 2, '.', ','); ?></td>
                        <td class="center-align"><?php echo number_format($resultado["total"], 2, '.', ','); ?></td>
                        <td class="center-align"><?php echo number_format(($resultado["total"] / $dolar), 2, '.', ','); ?></td>
                        <td><?php echo datos_clientes::traforma_fecha($resultado["fecha"]); ?></td>
                        <td><?php echo $resultado["hora"]; ?></td>
                        <td><a href="pdfv2/htmltopdf.php?key=<?php echo $resultado['indtemp']; ?>"
                               class="btn btn-success" target="_blank"><i class="icon-printer"></i></a></td>
                        <td><a href="#" onclick="
                                    var i='<?php echo $resultado['indtemp']; ?>';
                                    verficar_eliminar(i);"
                               class="btn btn-danger"><i class="btn-danger icon-bin"></i></a></td>
                        <td><a href="#"
                               class="btn btn-success">Editar</a></td>

                        <?php ?>
                        <!--                        <td><a href="#" class="btn btn-primary">--</a></td>-->
                        <!--                        <td><a href="temporal/dolar_pregunta.php?key=-->
                        <?php //echo $resultado['indtemp']; ?><!--"-->
                        <!--                               target="_blank" class="btn btn-primary"><i class="icon-insert-template"></i></a></td>-->
                        <!--                        <td><a href="#" class="btn btn-primary"><i>%</i></a></td>-->

                        <td class="center-align">

                            <div class="dropdown">
                                <button onclick="myFunction<?php echo $conteo_i; ?>()" class="dropbtn">:</button>
                                <div id="myDropdown<?php echo $conteo_i; ?>" class="dropdown-content">
                                    <a href="#">--</a>
                                    <a href="temporal/dolar_pregunta.php?key=<?php echo $resultado['indtemp']; ?>"
                                       target="_blank">Proforma</a>
                                    <a href="contador_modulo/registro_retencion.php?key=<?php echo $resultado['indtemp']; ?>">Retenciòn</a>
                                    <a href="detalles_credito.php?indcliente=<?php echo $resultado['indcliente']. "&key=" . $resultado['indtemp']. '&total= '.$resultado["total"]; ?>"
                                    >Crear Creditos</a>
                                </div>
                            </div>
                            <script>
                                /* When the user clicks on the button,
                                toggle between hiding and showing the dropdown content */
                                function myFunction<?php echo $conteo_i; ?>() {
                                    document.getElementById("myDropdown<?php echo $conteo_i; ?>").classList.toggle("show");
                                }

                                // Close the dropdown if the user clicks outside of it
                                window.onclick = function (event) {
                                    if (!event.target.matches('.dropbtn')) {
                                        var dropdowns = document.getElementsByClassName("dropdown-content");
                                        var i;
                                        for (i = 0; i < dropdowns.length; i++) {
                                            var openDropdown = dropdowns[i];
                                            if (openDropdown.classList.contains('show')) {
                                                openDropdown.classList.remove('show');
                                            }
                                        }
                                    }
                                }
                            </script>
                        </td>


                    </tr>
                    <?php
                }
                ?>

                <?php
            } ?>
            </tbody>
        </table>
    </div>


    <script>
        function verficar_anulacion(codigo) {
            swal({
                title: "Anular?",
                text: "Seguro de Anular Factura",
                icon: "success",
                buttons: true,

            })
                .then((willDelete) => {
                    if (willDelete) {
                        location.href = "temporal/anular.php?key=" + codigo;
                    } else {
                        location.href = "factura_dia.php";
                    }
                });
        }

        function verficar_eliminar(codigo) {
            swal({
                title: "Eliminar?",
                text: "Seguro de Eliminar Factura",
                icon: "success",
                buttons: true,

            })
                .then((willDelete) => {
                    if (willDelete) {
                        location.href = "temporal/eliminar_factura.php?key=" + codigo;
                    } else {
                        location.href = "factura_dia.php";
                    }
                });
        }

        function refrescar_factura() {
            location.href = "factura_dia.php";
        }

        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction2() {
            document.getElementById("myDropdown2").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
<?php include "header/footer.php" ?>