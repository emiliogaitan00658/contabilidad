<?php
include_once "../header/header_panel.php";

$key = $_GET["key"];
if ($indsucursal == "2" or $indsucursal == "1" or $indsucursal == "24" or $indsucursal == "3" or $indsucursal == "4" or $indsucursal == "5" or $indsucursal == "6" or $indsucursal == "7" or $indsucursal == "8" or $indsucursal == "9") {
    $re22 = datos_clientes::datos_generales_talonario($key, $mysqli);
    if ($_POST) {
        $Confirmacion = $_POST["textcambio"];
        $key = $_POST["textkey"];

        $r = datos_clientes::cambio_numero_factura($key, $Confirmacion, $mysqli);
        echo '<script> location.href="../pdfv2/htmltopdf.php?key=' . $key . '" </script>';
    }
} else {
    echo '<script> location.href="../pdfv2/htmltopdf.php?key=' . $key . '" </script>';
}
if ($_POST) {

} else if (!$_GET) {
    echo '<script> location.href="../factura_dia.php" </script>';
}
?>
<div class="row center-block" style="width: 50%;border-radius: 10px!important;">
    <div class="container z-depth-2" style="padding: 1em;border-radius: 6px!important;border: red">
        <h5 class="center-align alert alert-danger">Confirma Número de Factura</h5>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
              style="padding: 1.5em;border-radius: 6px" class="z-depth-1">
            <section class="row" style="padding: 1em">
                <p>Númerode factura: </p>
                <div class="control-pares col-md-5">
                    <input type="text" name="textcambio" class="form-control" placeholder="ind talonario"
                           value="<?php if ($re22["indtalonario"] != null) {
                               echo $re22["indtalonario"];
                           } else {
//                               echo $talonario;
                           } ?>" required>
                    <input type="hidden" name="textkey" value="<?php echo $key; ?>">
                </div>
                <div class="control-pares col-md-2">
                    <input type="submit" value="Confirmar e Imprimir" class="btn btn-dark"/>
                </div>
            </section>
            <hr>
            <p class="alert alert-info">Nota: Confirma antes de Imprimir</p>
        </form>

    </div>
</div>
<?php
include_once "../header/footer_temporal.php";
?>
