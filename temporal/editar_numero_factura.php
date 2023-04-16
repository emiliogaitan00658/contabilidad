<?php include "../header/header_panel.php";
if ($_GET) {
    $key = $_GET['key'];
    $indtalonario = $_GET['indtalonario'];
}
if ($_POST) {
    $key = $_POST['textkey'];
    $indtalonario = $_POST['texttalonario'];


    $respuesta = datos_clientes::Factura_petetida_verificacion($indsucursal,$indtalonario, $mysqli);

    if ($respuesta==false){
        $res = datos_clientes::cambio_numero_factura($key, $indtalonario, $mysqli);
        if ($res == true) {
            echo '<script>
   swal({
     title: "Exito ?",
     text: "Se a cambiado el numero de factura",
     icon: "success",
     buttons: true,

   })
   .then((willDelete) => {
     if (willDelete) {
        location.href="../factura_dia.php";
     }else {
       htmlspecialchars($_SERVER["PHP_SELF"]);
     }
   });
   </script>';
        }
    }else{
        echo '<script>
   swal({
     title: "Error ?",
     text: "Este numero de factura esta registrado",
     icon: "error",
     buttons: true,

   })
   .then((willDelete) => {
     if (willDelete) {
       htmlspecialchars($_SERVER["PHP_SELF"]);
     }else {
       htmlspecialchars($_SERVER["PHP_SELF"]);
     }
   });
   </script>';    }
}

?>

<div class="container z-depth-1 rounded white">
    <div class="modal-header white rounded">
        <h4 class="modal-title blue-grey-text unoem">Cambiar el numero factura</h4>
    </div>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <section class="row">
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Cambio de numero de factura: *</label>
                <input type="hidden" name="textkey" class="form-control" value="<?php echo $key; ?>">
                <input type="text" name="texttalonario" class="form-control" value="<?php echo $indtalonario; ?>"
                       placeholder="Numero Talonario" required>
            </div>
            <div class="control-pares col-md-5">
                <br>
                <input type="submit" class="btn btn-outline-info" value="Cambiar">
            </div>
        </section>
    </form>
    .
    <br>
    <p>Ustede es responsable de los que se este facturando, todo estara registrado el el sistema</p>
    <br>
</div>

<?php include "../header/footer_temporal.php" ?>

