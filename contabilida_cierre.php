<?php include "header/header.php";
//session_start();
if (!$_SESSION) {
    echo '<script> location.href="login.php </script>';
}
?>
<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <br>
        <h5 class="alert alert-primary"><img src="assets/buscar_prodcuto.png" alt="" width="5%">Venta de Cierre </h5>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="row">
                <div class="control-pares col-md-2">
                    <input type="date" name="textfecha1" class="form-control aler alert-info" placeholder="Fecha inicio"
                           value="<?php
                           if ($_POST) {
                               echo $_POST["textfecha1"];
                           } else {
                               $fcha = date("Y-m-d");
                               echo $fcha;
                           }

                           ?>" required>
                </div>
                <span> A </span>
                <div class="control-pares col-md-2">
                    <input type="date" name="textfecha2" class="form-control aler alert-info" placeholder="Fecha final"
                           value="<?php
                           if ($_POST) {
                               echo $_POST["textfecha2"];
                           } else {
                               $fcha = date("Y-m-d");
                               echo $fcha;
                           }

                           ?>" required>
                </div>
                <div class="control-pares col-md-2">
                    <select name="textsucursal" class="form-control" required>
                        <?php if (!$_POST) { ?>
                            <option class="form-control" value="<?php echo "0"; ?>">Sucursale</option>
                        <?php } else { ?>
                            <option class="form-control" value="<?php
                            echo $_POST['textsucursal']; ?>"><?php

                                if ($_POST['textsucursal'] == "1") {
                                    echo "Managua";
                                }
                                if ($_POST['textsucursal'] == "0") {
                                    echo "Todas Sucursale";
                                }
                                if ($_POST['textsucursal'] == "2") {
                                    echo "Masaya";
                                }
                                if ($_POST['textsucursal'] == "3") {
                                    echo "Chontales";
                                }
                                if ($_POST['textsucursal'] == "6") {
                                    echo "Esteli";
                                }
                                if ($_POST['textsucursal'] == "5") {
                                    echo "Leon";
                                }
                                if ($_POST['textsucursal'] == "9") {
                                    echo "Matagalpa";
                                }
                                if ($_POST['textsucursal'] == "4") {
                                    echo "Chinandega";
                                }
                                if ($_POST['textsucursal'] == "7") {
                                    echo "Managua Bolonia";
                                }
                                if ($_POST['textsucursal'] == "8") {
                                    echo "Managua Villa Fontana";
                                }
                                if ($_POST['textsucursal'] == "10") {
                                    echo "Clinica Dansing";
                                }
                                ?>
                            </option>
                        <?php } ?>
                        <option class="form-control" value="0" selected>Sucursal</option>
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
                <div class="control-pares col-md-4">
                    <input type="submit" value="Buscar producto" class="btn white-text blue-grey btn-primary"/>
                </div>
            </section>
        </form>
        <hr>
    </div>
</div>
<hr>
<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <table class="table table-bordered table-striped" style="padding: 1em;">
        <thead>
        <tr style="border-bottom: 1px solid black;">
            <th scope="col">#Cantidad</th>
            <th scope="col">Estado</th>
            <th scope="col">Numero_Factura</th>
            <th scope="col">Venta Contado</th>
            <th scope="col">Venta Credito</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_POST)) {
            if ($_POST["textsucursal"] == "0") {
                echo '<script>
 swal({
   title: "Error ?",
   text: "Sucursal Seleccionar",
   icon: "error",
   buttons: false,

 })
 .then((willDelete) => {
   if (willDelete) {
     
   }else {
      
   }
 });
 </script>';
            } else {
                $sucusa_id = $_POST["textsucursal"];
                $fecha1 = $_POST["textfecha1"];
                $fecha2 = $_POST["textfecha2"];
                $result4 = $mysqli->query("SELECT * FROM `total_factura` WHERE (fecha BETWEEN '$fecha1' and '$fecha2') and indsucursal='$sucusa_id' and indtalonario is not null ");
            }
        }
        $id_contabilida = 0;
        while ($resultado = $result4->fetch_assoc()) {
            $id_contabilida = $id_contabilida + 1;
            ?>
            <tr>
                <th class="center-align" scope="row"><?php echo $id_contabilida; ?></th>
                <td class="center-align"><?php if ($resultado['bandera'] == "0") {
                        echo "Anulada";
                    } ?></td>
                <td class="center-align"><?php echo $resultado['indtalonario']; ?></td>
                <td class="center-align"><?php if ($resultado['credito'] == "0" and $resultado["bandera"]=="1") {
                        echo number_format($resultado['total'], 2, '.', ',');;
                        $total_venta=$total_venta+$resultado['total'];
                    } ?></td>
                <td class="center-align"><?php if ($resultado['credito'] == "1" and $resultado["bandera"]=="1") {
                        echo number_format($resultado['total'], 2, '.', ',');;
                        $total_credito=$total_credito+$resultado['total'];
                    } ?></td>
            </tr>
        <?php } ?>
        <tr class="alert-danger">
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td>Venta= C$ <?php echo number_format($total_venta, 2, '.', ','); ?></td>
            <td>Credito= C$ <?php echo number_format($total_credito, 2, '.', ','); ?></td>
        </tr>
        <tr class="alert-danger">
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td>Total = C$ <?php echo $t=$total_venta+$total_credito; ?></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
<?php include "header/footer.php" ?>
