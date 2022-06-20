<?php include "../header/header_panel.php";
if ($_POST) {

    if(!empty($_POST['textnombre'])){
        $nombreempres = strtoupper(filter_var($_POST['textnombre'], FILTER_SANITIZE_STRING));
        $ruc = strtoupper(filter_var($_POST['textapellido'], FILTER_SANITIZE_STRING));
        $files = strtoupper(filter_var($_POST['textdireccion1'], FILTER_SANITIZE_STRING));

    }
}
?>

<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <h4 class="modal-title blue-grey-text alert alert-primary">Registro de la empresa</h4>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="padding: 2em;">
        <section class="row">
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Nombre de Empresa: *</label>
                <input type="text" name="textempresa" class="form-control" value="<?php if (!empty($_POST['textempresa'])) {
                    echo $_POST['textnombre'];
                } ?>" placeholder="Nombres Empresa" required>
            </div>
            <div class="control-pares col-md-5">
                <label for="" class="control-label">RUC: *</label>
                <input type="text" name="textapellido" class="form-control" value="<?php if(!empty($_POST['textruc'])) {
                    echo $_POST['textruc'];
                } ?>" placeholder="Apellidos" required>
            </div>
        </section>
        <br>
        <section class="row">
            <div class="control-pares col-md-5 alert alert-info">
                <label for="" class="control-label">Subir logo</label>
                <input type="file" name="textlogo" class="form-control-file"  placeholder="Direccion de domicilio 2"
                       value="<?php if (!empty($_POST['textdireccion2'])) {
                           echo $_POST['textdireccion2'];
                       } ?>">
            </div>
        </section>
        <div class="modal-footer">
            <input type="submit" value="Guardar" class="btn white-text blue-grey btn-primary"/>
        </div>
    </form>
</div>

<?php include "../header/footer.php" ?>
