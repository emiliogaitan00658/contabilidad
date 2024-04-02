<?php
include_once "../header/header_panel.php";

if (!$_SESSION) {
    echo '<script> location.href="login" </script>';
}
if ($_GET) {
    $nombre = $_GET['indcliente'];
} else {
    echo '<script> location.href="factura.php" </script>';
}
$datos_clientes = datos_clientes::datos_clientes_generales($nombre, $mysqli);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_POST){
    $numero_factura=$_POST["textnofactura"];
    $total_credito=$_POST["texttotal"];
    $fecha=$_POST["textfechainicio"];
    datos_clientes::nuevo_credito_itm_manual($nombre, $indsucursal, $total_credito,$numero_factura, $mysqli);


  echo ' <script>
 swal({
  title: "Exito!",
  text: "Credito Agregado!",
  icon: "success",
  button: "OK",
}).then((value) => {
    location.href="../credito.php?indcliente=' . $nombre .'";
});
 </script>';

}

$indsucursal;
?>

<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <div class="modal-header white rounded">
        <h4 class="modal-title blue-grey-text unoem"> Registro Creditos
            Manual</h4>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?indcliente='.$nombre; ?>" method="post">
        <section class="row">
            <div class="control-pares col-md-3">
                <label for="" class="control-label">Nombres: *</label>
                <input type="text" name="textnombre" class="form-control"
                       value="<?php echo $datos_clientes["nombre"] ?>" placeholder="Nombres" readonly=readonly>
            </div>
            <div class="control-pares col-md-3">
                <label for="" class="control-label">Apellidos: *</label>
                <input type="text" name="textapellido" class="form-control"
                       value="<?php echo $datos_clientes["apellido"] ?>" placeholder="Apellidos" readonly=readonly>
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
                <div class="control-pares col-md-3">
                    <label for="" class="control-label">Monto Adeudado Total $: *</label>
                    <input type="text" name="texttotal" class="form-control" placeholder="$"
                           value="<?php if (!empty($_POST['texttotal'])) {
                               echo $_POST['texttotal'];
                           } ?>" required>
                </div>
                <div class="control-pares col-md-3">
                    <label for="" class="control-label">Fecha Inicio: *</label>
                    <input type="date" name="textfechainicio" class="form-control"
                           value="<?php echo date('Y-m-d', strtotime(datos_clientes::fecha_get_pc_MYSQL())) ?>">
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

