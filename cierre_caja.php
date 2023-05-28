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
    if ($credito_verificado == $credito){

        if ($contador2 == 0) {
            datos_clientes::Cierre_Caja($indsucursal, $inicio, $final, $credito, $retencion, $mysqli);
            echo '<script>swal("Exito!", "Cierre de Caja con exito", "success");</script>';
        } else {
            echo '<script>swal("alerta!", "Tienes Facturas Pendiente", "error");</script>';
            echo "dd";
        }
    } else {
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
            <p>Contactar al ingeniero de la empresa por fallos tecnico.</p>
            <br>
        </div>
    </div>
    <br>
    <div class="container row z-depth-1 white" style="border-radius: 6px;">
            <h4 class="alert alert-primary" style="margin: 0.5em;">Registro de cierre de caja <?php echo datos_clientes::nombre_sucursal($indsucursal); ?></h4>
        <table class="table table-bordered  table-info style="height: 86px; width: 1189px;margin-bottom: 4em">
            <tbody>
            <tr class="alert alert-primary">
                <td style="width: 57px;">#</td>
                <td style="width: 260px;"><b>Inicio</b></td>
                <td style="width: 275px;"><b>Final</b></td>
                <td style="width: 205.962px;"><b>Credito</b></td>
                <td style="width: 205.962px;"><b>Retencio</b></td>
                <td style="width: 205.962px;"><b>Fecha</b></td>
                <td style="width: 205.962px;"><b>Hora</b></td>
                <td style="width: 205.962px;"><b>Eliminar</b></td>
            </tr>
            <?php
            $result = $mysqli->query("SELECT * FROM `cierre_caja` WHERE indsucursal='$indsucursal' AND bandera='1' LIMIT 4");
            while ($resultado = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td style="width: 57px;"><?php echo $resultado['ind_factura']; ?></td>
                    <td style="width: 260px;"><?php echo $resultado['inicio']; ?></td>
                    <td style="width: 275px;"><?php echo $resultado['fin']; ?></td>
                    <td style="width: 188px;"><?php echo $resultado['credito']; ?></td>
                    <td style="width: 190.038px;"><?php echo $resultado['retenciones']; ?></td>
                    <td style="width: 190.038px;"><?php echo $resultado['fecha']; ?></td>
                    <td style="width: 190.038px;"><?php echo $resultado['hora']; ?></td>
                    <td style="width: 190.038px;"><a href="#" onclick="
                            var i='<?php echo $resultado['indempleado']; ?>';
                            verficar_eliminar(i);" class="btn btn-danger"><i class="icon-bin white-text"></i></a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<!--examen de prueba-->
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
include_once "header/footer.php";
?>