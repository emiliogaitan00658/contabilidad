<?php include "../header/header_panel.php";
$datos_empresa=datos_clientes::mostrar_detalle_empresa($mysqli);
if ($_POST) {
    if (!empty($_POST['textnombre'])) {
        $nombre_empresa = strtoupper(filter_var($_POST['textnombre'], FILTER_SANITIZE_STRING));
        $ruc = strtoupper(filter_var($_POST['textapellido'], FILTER_SANITIZE_STRING));
        $url_logo = strtoupper(filter_var($_POST['textdireccion1'], FILTER_SANITIZE_STRING));
        $detalles_empresa = filter_var($_POST['textdetalles_detalles'], FILTER_SANITIZE_STRING);
        datos_clientes::ingresar_empresa_datos($nombre_empresa, $ruc, $detalles_empresa, $url_logo, $mysqli);
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
                <input type="text" name="textempresa" class="form-control"
                       value="<?php if (!empty($_POST['textempresa'])) {
                           echo $_POST['textnombre'];
                       }else{echo $datos_empresa['nombre_empresa'];  }?>" placeholder="Nombres Empresa" required>
            </div>
            <div class="control-pares col-md-5">
                <label for="" class="control-label">RUC: *</label>
                <input type="text" name="textapellido" class="form-control"
                       value="<?php if (!empty($_POST['textruc'])) {
                           echo $_POST['textruc'];
                       }else{echo $datos_empresa['numero_ruc'];  } ?>" placeholder="Apellidos" required>
            </div>
        </section>
        <br>
        <section class="row">
            <div class="control-pares col-md-5 alert alert-info">
                <label for="" class="control-label">Subir logo</label>
                <input type="file" name="textlogo" class="form-control-file">
            </div>
        </section>
        <section class="row">
            <div class="control-pares">
                <label for="" class="control-label">Detalles Empresa: </label>
                <textarea name="textdetalles_detalles" id="textdetalles_empresa" class="form-control" cols="60"
                          rows="5"><?php if (!empty($_POST['textdetalles_detalles'])) {
                        echo $_POST['textdetalles_detalles'];
                    }else{echo $datos_empresa['detalles'];  } ?>
                </textarea>
            </div>
        </section>
        <div class="modal-footer">
            <input type="submit" value="Guardar" class="btn white-text blue-grey btn-primary"/>
        </div>
    </form>
</div>

<?php include "../header/footer.php" ?>
