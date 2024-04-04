<?php include "header/header.php";
if (!$_SESSION){
    echo '<script> location.href="login.php" </script>';
}

if($_SESSION["Key"]==""){

}else{
    echo '<script> location.href="crear_factura.php" </script>';
}

if (!empty($_POST["textnombre"])) {
    $nombre=strtoupper( $_POST['textnombre']);
}else{
    $nombre ="0";
}

?>
<div class="container white rounded z-depth-1" style="border-radius: 6px;">
    <div style="padding: 1em">
        <h5 class="alert alert-primary"><img src="assets/icono_cliente.png" alt="" width="5%">Buscardor de Clientes<a class="btn btn-dark blue-grey right" href="index.php" class="right btn btn-info"><i class="icon-user-plus white-text"></i> Nuevo Cliente</a></h5>
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
<!--                esta funcion hay que repara-->
                <div class="control-pares col-md-2">
                    <select name="texttipo" class="form-control alert-primary" required>
                        <?php if (!$_POST) { ?>
                            <option class="form-control" value="<?php echo "1"; ?>" selected>Doctor(@)</option>
                        <?php } else { ?>
                            <option class="form-control" value="<?php
                            echo $_POST['texttipo']; ?>" selected><?php

                                if ($_POST['texttipo'] == "1") {
                                    echo "Doctor(@)";
                                }

                                if ($_POST['texttipo'] == "2") {
                                    echo "Empresa";
                                } if ($_POST['texttipo'] == "3") {
                                    echo "Estudiante";
                                } if ($_POST['texttipo'] == "4") {
                                    echo "Paciente";
                                } if ($_POST['texttipo'] == "5") {
                                    echo "Tecnico";
                                } if ($_POST['texttipo'] == "6") {
                                    echo "Otro";
                                }
                                ?>
                            </option>
                        <?php } ?>
                        <option class="form-control" value="1">Doctor(@)</option>
                        <option class="form-control" value="2">Empresa</option>
                        <option class="form-control" value="3">Estudiante</option>
                        <option class="form-control" value="4">Paciente</option>
                        <option class="form-control" value="5">Tecnico</option>
                        <option class="form-control" value="6">Otro</option>
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
            <th scope="col">Factura Credito</th>
            <th scope="col">No.Facturas</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Detalles</th>
            <th scope="col">Crear Factura</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $contador=0;
        if ($_POST) {
            $sucursalB = $_POST["textsucursal"];
            $tipo_cliente = $_POST["texttipo"];
            if($sucursalB!="0"){
                $result4 = $mysqli->query("SELECT * FROM clientes 
         WHERE (nombre LIKE _utf8  '%$nombre%' 
         OR apellido LIKE _utf8  '%$nombre%') and status='1' and indsucursal='$sucursalB' and tipo='$tipo_cliente' ORDER BY nombre  ASC limit 45");
            }else{
                $result4 = $mysqli->query("SELECT * FROM clientes 
         WHERE (nombre LIKE _utf8  '%$nombre%' 
         OR apellido LIKE _utf8  '%$nombre%') and status='1' and tipo='$tipo_cliente' ORDER BY nombre  ASC limit 45");
            }
            while ($resultado = $result4->fetch_assoc()) {
                $contador=1+$contador;
                ?>
                <tr>
                    <th scope="row"><?php echo $contador; ?></th>
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
                    <td class="btn-link center-align"><a class="red-text" href="credito.php?indcliente=<?php echo $resultado['indcliente']; ?>">Deuda # <?php echo datos_clientes::conteo_cuentas_pagar($resultado['indcliente'],$mysqli);?></a></td>
                    <td><a href="temporal/todas_factura_clientes.php?indcliente=<?php echo $resultado['indcliente']; ?>" class="green-text">Total # <?php echo datos_clientes::conteo_total_facturas_cleintes($resultado['indcliente'],$mysqli);?></a></td>
                    <td><a href="temporal/eliminar_cuenta_cliente.php?indcliente=<?php echo $resultado['indcliente']; ?>" class="btn btn-danger"><i class="btn-danger icon-bin"></i></a></td>
                    <td><a href="detaller_clientes.php?indcliente=<?php echo $resultado['indcliente']; ?>"
                           class="btn btn-success">Detalles</a></td>
                    <td><a href="temporal/indcliente.php?indcliente=<?php echo $resultado['indcliente']; ?>"
                           class="btn btn-primary">Crear Factura</a></td>
                </tr>
            <?php }

        } ?>

        </tbody>
    </table>
</div>
<?php include "header/footer.php" ?>
