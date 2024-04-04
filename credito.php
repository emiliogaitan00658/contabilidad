<?php include "header/header.php";
if (!$_SESSION) {
    echo '<script> location.href="login.php" </script>';
}
if ($_GET) {
    $nombre = $_GET['indcliente'];
} else {
    echo '<script> location.href="factura_dia.php" </script>';
}

?>
<div class="container z-depth-1 rounded white" style="border-radius: 6px;">
    <br>
    <h4 class="modal-title blue-grey-text unoem alert alert-info">Lista de Creditos <a class="nav-link alert alert-primary bg-red right" href="temporal/credito_manual.php?indcliente=<?php echo $_GET['indcliente']; ?>">Registros Manuales</a></h4>

    <br>
    <table class="table table-bordered" style="padding: 1em;">
        <thead>
        <tr style="border-bottom: 1px solid black" class="center-align">
            <th scope="col"># ID</th>
            <th scope="col">Numero Factura</th>
            <th scope="col">Credito</th>
            <th scope="col" class="red-text">Faltante Pago $</th>
            <th scope="col">Fecha Credito</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Pagar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $contador = 1;
        if ($_GET) {
            $result4 = $mysqli->query("SELECT * FROM `credito` WHERE indcliente='$nombre' ORDER BY indcredito DESC");
            while ($resultado = $result4->fetch_assoc()) {
               $total_faltante = datos_clientes::total_deuda_faltante($resultado['indtemp'], $mysqli);
                $total_faltante_resta = $resultado['totalCredito'] - $total_faltante;
                if ($total_faltante_resta == "0") {
                    datos_clientes::bandera_credito_cancelado($resultado['indtemp'], $mysqli);
                }
                ?>
                <tr class="center-align">
                    <th scope="row"><?php echo $contador; ?></th>
                    <td><a href="pdfv2/cotizar_factura_link_credito.php?dolar=1&key=<?php echo $resultado['indtemp']; ?>"
                           target="_blank"><b>No #<?php echo $resultado['producto']; ?></b></a></td>
                    <td class="center-align"><b>$ <?php echo number_format($resultado['totalCredito'], 2, '.', ','); ?></b></td>
                    <td class="center-align red-text"><b>$ <?php echo number_format($total_faltante_resta, 2, '.', ','); ?></b></td>
                    <td><?php echo  datos_clientes::traforma_fecha($resultado['fechaInicio']);?></td>
                    <?php if ($total_faltante_resta == "0") { ?>
                        <td><a href="#" class="btn btn-danger"><i class="btn-danger icon-bin"></i></a></td>
                    <?php } else { ?>
                        <td>
                            <a href="temporal/eliminar_credito.php?indtemp=<?php echo $resultado['indtemp']; ?>&indcliente=<?php echo $nombre; ?>"
                               class="btn btn-danger"><i class="btn-danger icon-bin"></i></a></td>
                    <?php }
                    if ($resultado['producto'] == null) { ?>

                        <td><a href="#" class="btn btn-primary green white-text">Pagar Creditos</a></td>
                    <?php } else { ?>
                        <td>
                            <a href="tabla_pago.php?indcredito=<?php echo $resultado['indcredito']; ?>&indtemp=<?php echo $resultado['indtemp']; ?>"
                               class="btn btn-primary green white-text">Pagar Creditos</a></td>

                    <?php } ?>
                </tr>
                <?php
                $contador = $contador + 1;
            }
        } ?>

        </tbody>
    </table>
</div>

<?php include "header/footer.php" ?>
