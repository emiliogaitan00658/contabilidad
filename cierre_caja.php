<?php
include "header/header.php";
$contador1 = 0;
$contador2 = 0;
if ($_POST) {
    $inicio = $_POST['textinicio'];
    $final = $_POST['textfinal'];
    $credito = $_POST['textcredito'];
    $retencion = $_POST['textretencion'];
    $total_error = $inicio - $final;
    if ($total_error <= 50) {
        for ($i = $inicio; $i <= $final; $i++) {
            $resultado = datos_clientes::verificar_numero_factura($i, $mysqli);
            if ($resultado = "") {
                $contador2 = $contador2 + 1;
            } else {
                $contador1 = $contador1 + 1;
            }

        }
    }
    $credito_verificado = datos_clientes::verificar_retencion_credito($indsucursal, $inicio, $final, $mysqli);
    if ($credito_verificado == $credito ) {
        if ($contador2 == 0) {
            datos_clientes::Cierre_Caja($indsucursal,$inicio,$final,$credito,$retencion,$mysqli);
            echo '<script>swal("Exito!", "Cierre de Caja con exito", "success");</script>';
        } else {
            echo '<script>swal("alerta!", "Tienes Facturas Pendiente", "error");</script>';

        }
    }else{
        echo '<script>swal("alerta!", "Falta Credito", "error");</script>';
    }
}


?>
    <div class="container white rounded z-depth-2" style="border-radius: 6px;">
        <div style="padding: 1em">
            <h5 class="alert alert-success"><i class="icon-exit"></i>Cierre de caja
                (<?php echo datos_clientes::fecha_get_pc(); ?>)</h5>
            <hr>
            <p><span class="red-text">*</span>Los cierre de caja son obligatorio si no el sistema no dejara facturar</p>
            <p><span class="red-text">*</span>Registrar Credito</p>
            <p><span class="red-text">*</span>Registrar Retenciones</p>
            <hr>
            <br>
            <form action="cierre_caja.php" method="post">
                <section class="row">
                    <div class="control-pares col-md-2">
                        <input type="number" name="textinicio" class="form-control" placeholder="Factura de incio"
                               value="<?php
                               if ($_POST) {
                                   echo $_POST['textinicio'];
                               }
                               ?>" required>
                    </div>
                    <span>a</span>
                    <div class="control-pares col-md-2">
                        <input type="number" name="textfinal" class="form-control" placeholder="Factura Final"
                               value="<?php
                               if ($_POST) {
                                   echo $_POST['textfinal'];
                               }
                               ?>" required>
                    </div>
                    <div class="control-pares col-md-2">
                        <input type="number" name="textcredito" class="form-control" placeholder="Total Credito"
                               value="<?php
                               if ($_POST) {
                                   echo $_POST['textcredito'];
                               }
                               ?>" required>
                    </div>
                    <div class="control-pares col-md-2">
                        <input type="number" name="textretencion" class="form-control" placeholder="Total Retencion"
                               value="<?php
                               if ($_POST) {
                                   echo $_POST['textretencion'];
                               }
                               ?>" required>
                    </div>
                    <div class="control-pares col-md-2">
                        <input type="submit" value="Cierre Caja" class="btn white-text blue-grey btn-primary"/>
                    </div>
                </section>
            </form>
            <hr>
            <a class="btn btn-dark light-blue right" href="factura_dia.php"><i class="icon-arrow-left2"></i>Regresar</a>
            <br>
            <p>Nota: El detalles solo seran cambiado y autizado por el personal adminstrativo de la
                plataforma.</p>
            <p>Contactar al ingeniero de la empresa</p>
            <br>
        </div>
    </div>
<?php
include_once "header/footer.php";
?>