<?php
include_once "../header/header_panel.php";
$dolar = datos_clientes::cambio_dolar($mysqli);
if ($_GET) {
    $indcliente = $_GET["indcliente"];
    $_SESSION["manual"] = $indcliente;
} else {
    $indcliente = $_SESSION["manual"];
}

$sucursal = $_SESSION['sucursal'];
$row = datos_clientes::buscar($indcliente, $mysqli);
if (!$_SESSION) {
    echo '<script> location.href="login" </script>';
}
if ($_POST) {
    $Key = datos_clientes::Verificar_generador_codigo($mysqli);
    $check_cordoba = isset($_POST['flexCheckCheckedcordoba']) ? 1 : 0;
    $check_dolar = isset($_POST['flexCheckCheckeddolar']) ? 1 : 0;
    $check_tras = isset($_POST['flexCheckCheckedtraferencia']) ? 1 : 0;
    $check_efect = isset($_POST['flexCheckCheckedefectivo']) ? 1 : 0;
    $check_fise = isset($_POST['flexCheckCheckedlafise']) ? 1 : 0;
    $check_bac = isset($_POST['flexCheckCheckedbac']) ? 1 : 0;
    $check_credito = isset($_POST['flexCheckCheckedcredito']) ? 1 : 0;
    $check_targeta = isset($_POST['flexCheckCheckedtargeta']) ? 1 : 0;
    $check_rx = isset($_POST['flexCheckCheckedrx']) ? 1 : 0;
    $nofactura = $_POST["textnofactura"];
    $detalles = $_POST["textdetalles"];
    $subtotal = number_format($_POST["textsubtotal"], 2, '.', '');
    $total = number_format($_POST["texttotal"], 2, '.', '');

    if ($check_rx == 1) {
        datos_clientes::control_ingreso_facturar($sucursal, "RX", $Key, $mysqli);
        $RAX = 0;
        datos_clientes::rax_cliente_doctor($RAX, $indcliente, $Key, $sucursal, $mysqli);
    } else {
        datos_clientes::control_ingreso_facturar($sucursal, "PX", $Key, $mysqli);
    }
    $exito = datos_clientes::facturafinal($Key, $sucursal, $check_credito, $indcliente, $check_cordoba, $check_dolar
        , $check_tras, $check_efect, $check_fise, $check_bac, $check_targeta,
        "0", $dolar, $subtotal, $total, $mysqli);
    datos_clientes::Factura_genera_codigo($Key, $nofactura, $sucursal, $mysqli);
    datos_clientes::facturagenerada_filtro3($Key, $dolar, $sucursal, $total, $detalles, "GENERICO", $mysqli);
    if ($exito == true) {
        $_SESSION["Key"] = "";
        if ($check_credito == 1) {
            echo '<script> location.href="../detalles_credito.php?indcliente=' . $indcliente . '&key=' . $Key . '&total= ' . $total . '" </script>';
        } else {
            if ($check_rx == 1) {
                echo '<script> location.href="temporal/buscar_RAX_medico.php?key='. $Key .'" </script>';
            } else {
                echo '<script> location.href="../factura_dia.php" </script>';
            }
        }
    }
}

?>

<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <div class="modal-header white rounded">
        <h4 class="modal-title blue-grey-text unoem"> Registro de Factura
            Manual</h4>
    </div>
    <p class="alert alert-danger">Si se genero una factura manual debe de registras solo el numero de factura y el mónto
        total, si tambien es de credito igual</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <section class="row">
            <div class="control-pares col-md-3">
                <label for="" class="control-label">Nombres: *</label>
                <input type="text" name="textnombre" class="form-control"
                       value="<?php echo $row["nombre"] ?>" placeholder="Nombres" readonly=readonly>
            </div>
            <div class="control-pares col-md-3">
                <label for="" class="control-label">Apellidos: *</label>
                <input type="text" name="textapellido" class="form-control"
                       value="<?php echo $row["apellido"] ?>" placeholder="Apellidos" readonly=readonly>
            </div>
            <div class="control-pares col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedefectivo"
                           name="flexCheckCheckedefectivo">
                    <label class="form-check-label" for="flexCheckChecked">
                        Efectivo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedcordoba"
                           name="flexCheckCheckedcordoba">
                    <label class="form-check-label" for="flexCheckChecked">
                        Cordobas
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckeddolar"
                           name="flexCheckCheckeddolar">
                    <label class="form-check-label" for="flexCheckChecked">
                        Dolar
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedtargeta"
                           name="flexCheckCheckedtargeta">
                    <label class="form-check-label" for="flexCheckChecked">
                        Tarjeta
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedrx"
                           name="flexCheckCheckedrx">
                    <label class="form-check-label" for="flexCheckChecked">
                        RX
                    </label>
                </div>
            </div>

            <div class="control-pares col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedtrasferencia"
                           name="flexCheckCheckedtraferencia">
                    <label class="form-check-label" for="flexCheckChecked">
                        Trasferencia
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedbac"
                           name="flexCheckCheckedbac">
                    <label class="form-check-label" for="flexCheckChecked">
                        BAC
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedlafise"
                           name="flexCheckCheckedlafise">
                    <label class="form-check-label" for="flexCheckChecked">
                        LaFise
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedcredito"
                           name="flexCheckCheckedcredito">
                    <label class="form-check-label" for="flexCheckChecked">
                        Credito
                    </label>
                </div>
            </div>
        </section>
        <hr>
        <div class="center-block center">
            <section class="row">
                <div class="control-pares col-md-2">
                    <label for="" class="control-label">Numero Factura:</label>
                    <input type="number" name="textnofactura" class="form-control"
                           value="<?php if (!empty($_POST['textnofactura'])) {
                               echo $_POST['textnofactura'];
                           } ?>" placeholder="No Factura" required>
                </div>
                <div class="control-pares col-md-4">
                    <label for="" class="control-label">Detalles de la factura: *</label>
                    <input type="text" name="textdetalles" placeholder="Contenido de la factura" class="form-control"
                           value="<?php if (!empty($_POST['textdetalles'])) {
                               echo $_POST['textdetalles'];
                           } ?>" required>
                </div>
                <div class="control-pares col-md-2">
                    <label for="" class="control-label">SubtotalC$: *</label>
                    <input type="text" name="textsubtotal" class="form-control" placeholder="C$"
                           value="<?php if (!empty($_POST['textsubtotal'])) {
                               echo $_POST['textsubtotal'];
                           } ?>" required>
                </div>
                <div class="control-pares col-md-2">
                    <label for="" class="control-label">Total C$: *</label>
                    <input type="text" name="texttotal" class="form-control" placeholder="C$"
                           value="<?php if (!empty($_POST['texttotal'])) {
                               echo $_POST['texttotal'];
                           } ?>" required>
                </div>
            </section>
        </div>
        <br>
        <div class="modal-footer">
            <input type="submit" value="Guardar Factura" class="btn white-text blue-grey btn-primary"/>
        </div>
    </form>
</div>
<?php
include_once "../header/footer_temporal.php";
?>

