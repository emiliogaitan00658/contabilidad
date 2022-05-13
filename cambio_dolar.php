<?php
include "header/header.php";
if ($_POST) {
    $dolar_nuevo = $_POST['textdolar'];
    echo ' <script>
swal("Contraseña de Autorización:", {
  content: "input",
})
.then((value) => {
    if ("15006580"==value) {
    location.href="cambio_dolar.php?cambio_dolar=' . $dolar_nuevo.'";
   }else{
     swal("Acceso", "Denegado el acceso", "error");
   }
});
 </script>';
}
if ($_GET) {
    $dolar_nuevo=$_GET['cambio_dolar'];
    datos_clientes::cambio_taza_dolar($mysqli,$dolar_nuevo);
echo ' <script>
 swal({
  title: "Exito!",
  text: "Taza de Cambio Actualizada!",
  icon: "success",
  button: "OK",
}).then((value) => {
    location.href="cambio_dolar.php";
});
 </script>';
}

?>
<br>
<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <h5><i class="icon-coin-dollar green-text" style="font-size: 50px!important;"></i>Solo personal autorizado puede
            cambiar la taza de cambio.</h5>
        <hr>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="row">
                <div class="control-pares col-md-3">
                    <input type="text" name="textdolar" class="form-control" placeholder="Fecha"
                           value="<?php echo $dolar; ?>" required>
                </div>
                <div class="control-pares col-md-2">
                    <input type="submit" value="Guardar Cambio" class="btn btn-dark"/>
                </div>
            </section>
        </form>
        <hr>
        <a class="btn btn-dark light-blue right" href="panel_control.php"><i class="icon-arrow-left2"></i>Regresar</a>
        <hr>
        <br>
    </div>
</div>
<?php
include_once "header/footer.php";
?>
