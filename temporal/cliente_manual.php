<?php
include_once "../header/header_panel.php";
$dolar = datos_clientes::cambio_dolar($mysqli);

if (!empty($_POST["textnombre"])) {
$nombre = strtoupper(filter_var($_POST['textnombre'], FILTER_SANITIZE_STRING));
}else{
$nombre ="0";
}
?>
<div class="container white rounded z-depth-1" style="border-radius: 6px;">
    <div style="padding: 1em">
        <h5 class="alert alert-dark"><img src="assets/icono_cliente.png" alt="" width="5%">Buscardor de Clientes (Factura Manual)</h5>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="row">
                <div class="control-pares col-md-4">
                    <input type="text" name="textnombre" class="form-control mr-sm-2 input_modificado" type="search" value="<?php if ($_POST) {
                        echo strtoupper($_POST['textnombre']);
                    }else{ echo ""; } ?>" placeholder="Buscar cliente o Empresa ....."  aria-label="Search" required>
                </div>
                <div class="control-pares col-md-2">
                    <select name="textsucursal" class="form-control" required>
                        <?php if (!$_POST) { ?>
                            <option class="form-control" value="<?php echo "0"; ?>" selected>Todas Sucursale</option>
                        <?php } else { ?>
                            <option class="form-control" value="<?php
                            echo $_POST['textsucursal']; ?>" selected><?php

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
                        <option class="form-control" value="0" selected>Todas Sucursale</option>
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
                <div class="control-pares col-md-2">
                    <select name="texttipo" class="form-control alert-primary" required>
                        <option class="form-control" value="0">Todo Clientes</option>
                        <option class="form-control" value="1">Doctor(@)</option>
                        <option class="form-control" value="2">Empresa</option>
                        <option class="form-control" value="3">Estudiante</option>
                        <option class="form-control" value="4">Paciente</option>
                    </select>
                </div>
                <div class="control-pares col-md-4">
                    <input type="submit" value="Buscar" class="btn  white-text blue-grey btn-primary"/>
                </div>
            </section>
        </form>
        <!--        <hr>-->
        <!--        <a class="btn btn-dark blue-grey right" href="index" style="margin-left:1em!important; "><i class="icon-user-plus white-text"></i> Nuevo Cliente</a>-->
        <!--        <br>-->
        <hr>
    </div>
</div>
<br>
<div class="container z-depth-1 rounded white">
    <table class="table table-responsive-sm table-bordered" style="padding: 1em;">
        <thead>
        <tr style="border-bottom: 1px solid black;" class="alert alert-info">
            <th scope="col"># ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Crear Factura</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $contador=0;
        if ($_POST) {
            $sucursalB = $_POST["textsucursal"];
            if($sucursalB!="0"){
                $result4 = $mysqli->query("SELECT * FROM clientes 
         WHERE (nombre LIKE _utf8  '%$nombre%' 
         OR apellido LIKE _utf8  '%$nombre%') and status='1' and indsucursal='$sucursalB' ORDER BY nombre  ASC limit 45");
            }else{
                $result4 = $mysqli->query("SELECT * FROM clientes 
         WHERE (nombre LIKE _utf8  '%$nombre%' 
         OR apellido LIKE _utf8  '%$nombre%') and status='1' ORDER BY nombre  ASC limit 45");
            }
            while ($resultado = $result4->fetch_assoc()) {
                $contador=1+$contador;
                ?>
                <tr>
                    <th scope="row"><?php echo $resultado['indcliente']; ?></th>
                    <td><?php echo $resultado['nombre']; ?></td>
                    <td><?php echo $resultado['apellido']; ?></td>
                    <td><?php
                        if($resultado['indsucursal']=="1"){echo "Managua";}
                        if($resultado['indsucursal']=="2"){echo "Masaya";}
                        if($resultado['indsucursal']=="3"){echo "Chontales";}
                        if($resultado['indsucursal']=="6"){echo "Esteli";}
                        if($resultado['indsucursal']=="5"){echo "Leon";}
                        if($resultado['indsucursal']=="9"){echo "Matagalpa";}
                        if($resultado['indsucursal']=="4"){echo "Chinandega";}
                        if($resultado['indsucursal']=="7"){echo "Managua Bolonia";}
                        if($resultado['indsucursal']=="8"){echo "Managua Villa Fontana";}
                        if($resultado['indsucursal']=="10"){echo "Clinica Dansing";}
                        ?></td>
                    <td><a href="factura_manual.php?indcliente=<?php echo $resultado['indcliente']; ?>"
                           class="btn btn-dark">Crear Factura Manual</a></td>
                </tr>
            <?php }

        } ?>
        </tbody>
    </table>
</div>
<?php
include_once "../header/footer_temporal.php";
?>
