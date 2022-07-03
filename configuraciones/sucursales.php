<?php
include_once "../header/header_panel.php";
if ($_POST) {
    $nombre = strtoupper(filter_var($_POST['textnombre'], FILTER_SANITIZE_STRING));
    $direccion = strtoupper(filter_var($_POST['textapellido'], FILTER_SANITIZE_STRING));
    $telefono = strtolower(filter_var($_POST['textuser'], FILTER_SANITIZE_STRING));
    $celular = $_POST["textpass"];
    $sucursal = $_POST["textsucursal"];

    datos_clientes::registro_usuario_mysql($nombre, $apellido, $user, $pas, $sucursal, $mysqli);

    echo '<script> swal({
  title: "Usuario Registrado con exito?",
  text: "Exito",
  icon: "success",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   location.href="crear_usuario.php";
  } else {
    location.href="crear_usuario.php";
  }
}); </script>';

}

?>
<br>
<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <h5 class="alert alert-warning">Agregar sucursal</h5>
        <p><span class="red-text"></span><i class="icon-stop red-text "></i> Solo Personal Autorizado</p>
        <hr>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"
              method="post">
            <section class="row">
                <div class="control-pares col-md-3">
                    <label for="">Nombre Sucursal: *</label>
                    <input type="text" name="textnombre" class="form-control" placeholder="Nombre sucursal"
                           value="<?php if ($_POST) {
                               echo $_POST["textnombre"];
                           } ?>" required>
                </div>
                <div class="control-pares col-md-3">
                    <label for="">Dirección de sucursal: *</label>
                    <input type="text" name="textdireccion" class="form-control" placeholder="Direccion"
                           value="<?php if ($_POST) {
                               echo $_POST["textdireccion"];
                           } ?>" required>
                </div>
                <div class="control-pares col-md-3">
                    <label for="">Telefono Sucursal: *</label>
                    <input type="text" name="texttelefono" class="form-control" placeholder="Telefono"
                           value="<?php if ($_POST) {
                               echo $_POST["texttelefono"];
                           } ?>" required>
                </div>
                <div class="control-pares col-md-3">
                    <label for="">Celular Sucursal: *</label>
                    <input type="text" name="textcelular" class="form-control" placeholder="Celular"
                           value="<?php if ($_POST) {
                               echo $_POST["textcelular"];
                           } ?>" required>
                </div>
                <br>
                <br>
                <div class="control-pares col-md-4">
                    <input type="submit" value="Agregar Registar" class="btn white-text blue-grey btn-primary"/>
                </div>
            </section>
        </form>
        <a class="btn btn-dark light-blue right" href="../panel_control.php"><i
                class="icon-arrow-left2"></i>Regresar</a>
        <br>
        <hr>
        <p>Nota: Autorizado por el personal adminstrativo de la
            plataforma.</p>
        <p>Contactar al ingeniero de la empresa</p>
        <br>
    </div>
</div>
<br>
<br>
<div class="container row z-depth-1 white">
    <hr>
    <h4 class="alert alert-info">Usuarios Registrados</h4>
    <hr>
    <table class="table table-responsive-lg" style="height: 86px; width: 1189px;margin-bottom: 4em">
        <tbody>
        <tr class="aler alert-primary">
            <td style="width: 57px;">#</td>
            <td style="width: 260px;" class="center-align"><b>Nombres</b></td>
            <td style="width: 275px;"><b>Apellidos</b></td>
            <td style="width: 188px;"><b>Usuario</b></td>
            <td style="width: 190.038px;"><b>Contraseña</b></td>
            <td style="width: 205.962px;"><b>Sucursal</b></td>
            <td style="width: 205.962px;"><b>Eliminar</b></td>
        </tr>
        <?php
        $result = $mysqli->query("SELECT * FROM `sucursal`");
        while ($resultado = $result->fetch_assoc()) {
            ?>
            <tr>
                <td style="width: 57px;"><?php echo $resultado['indsucursal']; ?></td>
                <td style="width: 70px;" class="center-align"><h5><b><u><?php echo $resultado['nombre_sucursal']; ?></u></b></h5></td>
                <td style="width: 400px;"><?php echo $resultado['direccion']; ?></td>
                <td style="width: 188px;"><?php echo $resultado['telefono']; ?></td>
                <td style="width: 190.038px;"><?php echo $resultado['celular']; ?></td>
                <td style="width: 205.962px;"><?php echo datos_clientes::nombre_sucursal($resultado['indsucursal']); ?></td>
                <td style="width: 190.038px;"><a href="#" onclick="
                        var i='<?php echo $resultado['indsucursal']; ?>';
                        verficar_eliminar(i);" class="btn btn-danger"><i class="icon-bin white-text"></i></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script>
    function verficar_eliminar(codigo) {
        swal({
            title: "Desea Eliminar?",
            text: "Eliminiar Usuario",
            icon: "success",
            buttons: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    location.href = "eliminar_usuario_user.php?induser=" + codigo;
                } else {
                    location.href = "#";
                }
            });
    }

</script>
<?php
include_once "../header/footer_temporal.php";
?>


