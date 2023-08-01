<?php
include_once "../header/header_panel.php";
if ($_GET){
    $indcliente=$_GET["indcliente"];
    $llave=$_GET["key"];
    $total=$_GET["total"];
    $datos_cliente=datos_clientes::datos_clientes_generales($indcliente,$mysqli);
}
if ($_POST) {
    $key=$_POST["textkey"];
    $sucursal=$_POST["textsucursal"];
    echo ' <script>
swal("Contraseña de Autorización:", {
  content: "input",
})
.then((value) => {
    if ("orthodental2020"==value) {
        location.href="autorizacion_cambio_factura.php?key=' . $key.'&sucursal=' . $sucursal.'";
   }else{
     swal("Acceso", "Denegado el acceso Intentar nuvamente", "error")
.then((value) => {
  location.href="../factura_dia.php";
});
   }
});
 </script>';
}
?>
<br>
<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <h5 class="alert alert-info">Tranferencia de Factura <i class="icon-arrow-down-right"></i> Sucursal</h5>
        <p><span class="red-text"></span><i class="icon-stop red-text "></i>Debe de tener un codigo de autorización</p>
        <hr>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"
              method="post">
            <section class="row">
                <div class="control-pares col-md-3">
                    <label for="">Nombre Cliente: *</label>
                    <input type="text" name="textnombre" class="form-control" placeholder="Nombre sucursal"
                           value="<?php if ($_GET) {
                               echo $datos_cliente["nombre"];
                           } ?>" required readonly>
                </div>
                <div class="control-pares col-md-3">
                    <label for="">Apellido Cliente: *</label>
                    <input type="text" name="textnombre" class="form-control" placeholder="Nombre sucursal"
                           value="<?php if ($_GET) {
                               echo $datos_cliente["apellido"];
                           } ?>" required readonly>
                </div>
                <div class="control-pares col-md-5">
                    <label for="">Codigo de Factura: *</label>
                    <input type="text" name="textkey" class="form-control" placeholder="Direccion" readonly=readonly
                           value="<?php if ($_GET) {
                        echo $llave;
                    } ?>" required readonly>
                </div>
                <div class="control-pares col-md-3">
                    <label for="">Total Cordobas: *</label>
                    <input type="text" name="texttelefono" class="form-control" placeholder="Telefono"
                           value="<?php if ($_GET) {
                               echo number_format($total, 2, '.', ',');;
                           } ?>" readonly=readonly required>
                </div>

                    <div class="control-pares col-md-3 alert alert-danger">
                        <label>Sucursal Tranferir Factura: *</label>
                        <select name="textsucursal" class="form-control" required>
                            <option class="form-control" value="" selected>Seleccionar Sucursale</option>
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
                <br>
                <br>
                <div class="control-pares col-md-4">
                    <input type="submit" value="Trasferir Factura" class="btn white-text blue-grey btn-primary" style="margin:2em"/>
                </div>
            </section>
        </form>
        <hr>
    </div>
</div>
<?php
include_once "../header/footer_temporal.php";
?>


