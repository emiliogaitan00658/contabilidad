<?php include "header/header.php";
if($_SESSION){

}else{
    echo '<script>location.href="login.php";</script>';
}
if ($_GET) {
    $indcliente = $_GET['indcliente'];
} else {
    echo '<script> location.href="buscar_clientes.php" </script>';
}

if ($_POST) {
   $sucursale = $_POST['textsucursal'];
    $nombre = strtoupper($_POST['textnombre']);
    $apellido = strtoupper($_POST['textapellido']);
    $tipo = $_POST['texttipo'];
    $direccion1 = $_POST['textdireccion1'];
    $direccion2 = $_POST['textdireccion2'];
    $telefono = strtoupper($_POST['texttelefono']);
    $recues = datos_clientes::datos_clientes_generales_actualizar($indcliente,$nombre,$apellido,$tipo, $direccion1, $direccion2, $telefono, $sucursale, $mysqli);
    if ($recues == true) {
        echo '<script>
 swal({
   title: "Exito ?",
   text: "Datos Actualizado",
   icon: "success",
   buttons: true,

 })
 .then((willDelete) => {
   if (willDelete) {
     location.href="detaller_clientes.php?indcliente='.$indcliente.'";
   }else {
     location.href="detaller_clientes.php?indcliente='.$indcliente.'";
   }
 });
 </script>';
    }
}
$datos = datos_clientes::datos_clientes_generales($indcliente, $mysqli);
?>

<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <br>
        <h5 class="alert alert-primary">Datos del Cliente</h5>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?indcliente=<?php echo $indcliente;?>" method="post">
        <section class="row">
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Nombres o Empresa: *</label>
                <input type="text" name="textnombre" class="form-control"
                       value="<?php echo $datos['nombre']; ?>" placeholder="Nombres" required>
            </div>
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Apellidos o No RUC: *</label>
                <input type="text" name="textapellido"  class="form-control"
                       value="<?php echo $datos['apellido']; ?>" placeholder="Apellidos" required>
            </div>
        </section>
        <br>
        <section class="row">
            <div class="control-pares col-md-3">
                <label>Seleccionar Sucursal: *</label>
                <select name="textsucursal" disabled class="form-control">
                    <option class="form-control" value="<?php
                    if($datos['tipo']=="Managua"){echo "1";}
                    if($datos['tipo']=="Masaya"){echo "2";}
                    if($datos['tipo']=="Chontales"){echo "3";}
                    if($datos['tipo']=="Esteli"){echo "6";}
                    if($datos['tipo']=="Leon"){echo "5";}
                    if($datos['tipo']=="Matagalpa"){echo "9";}
                    if($datos['tipo']=="Chinandega"){echo "4";}
                    if($datos['tipo']=="Managua Bolonia"){echo "7";}
                    if($datos['tipo']=="Managua Villa Fontana"){echo "8";}
                    if($datos['tipo']=="Clinica Dansing"){echo "10";}
                    ?>" selected hidden><?php
                    if($datos['tipo']=="1"){echo "Managua";}
                    if($datos['tipo']=="2"){echo "Masaya";}
                    if($datos['tipo']=="3"){echo "Chontales";}
                    if($datos['tipo']=="6"){echo "Esteli";}
                    if($datos['tipo']=="5"){echo "Leon";}
                    if($datos['tipo']=="9"){echo "Matagalpa";}
                    if($datos['tipo']=="4"){echo "Chinandega";}
                    if($datos['tipo']=="7"){echo "Managua Bolonia";}
                    if($datos['tipo']=="8"){echo "Managua Villa Fontana";}
                    if($datos['tipo']=="10"){echo "Clinica Dansing";}
                    ?></option>
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
            <div class="control-pares col-md-3">
                <label class="alert-primary">Tipo Cliente: *</label>
                <select name="texttipo" class="form-control alert-primary" required>
                    <option class="form-control" value="<?php
                    if($datos['tipo']=="Doc(@)"){echo "1";}
                    if($datos['tipo']=="Empresa"){echo "2";}
                    if($datos['tipo']=="Estudiante"){echo "3";}
                    if($datos['tipo']=="Paciente"){echo "4";}
                    ?>" selected hidden><?php
                        if($datos['tipo']=="1"){echo "Doc(@)";}
                        if($datos['tipo']=="2"){echo "Empresa";}
                        if($datos['tipo']=="3"){echo "Estudiante";}
                        if($datos['tipo']=="4"){echo "Paciente";}
                        ?></option>
                    <option class="form-control" value="1">Doc(@)</option>
                    <option class="form-control" value="2">Empresa</option>
                    <option class="form-control" value="3">Estudiante</option>
                    <option class="form-control" value="4">Paciente</option>
                </select>
            </div>
            <div class="control-pares col-md-3">
                <label for="" class="control-label">Telefono: *</label>
                <input type="text" name="texttelefono" placeholder="Telefono" class="form-control"
                       value="<?php echo $datos['telefono']; ?>" >
            </div>
        </section>
        <br>
        <section class="row">
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Dirección 1: *</label>
                <input type="text" name="textdireccion1" class="form-control" placeholder="Direccion de domicilio"
                       value="<?php echo $datos['direccion1']; ?>">
            </div>
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Dirección 2: *</label>
                <input type="text" name="textdireccion2" class="form-control" placeholder="Direccion de domicilio"
                       value="<?php echo $datos['direccion2']; ?>">
            </div>
        </section>
        <br>
        <div class="modal-footer">
            <a href="#" onclick="
                    var i='<?php echo $indcliente; ?>';
                    verficar_eliminar(i);" class="btn white-text red btn-primary">Eliminar usuario</a>
            <input type="submit" value="Actualizar Datos" class="btn white-text blue-grey btn-primary"/>
        </div>
    </form>
</div>

<script>
    function verficar_eliminar(codigo) {
        swal({
            title: "Eliminiar?",
            text: "Seguro de eliminiar cliente",
            icon: "success",
            buttons: true,

        })
            .then((willDelete) => {
                if (willDelete) {
                    location.href = "temporal/eliminar_cuenta_cliente.php?indcliente=" + codigo;
                } else {
                    location.href = "factura_dia.php";
                }
            });
    }
</script>
<?php include "header/footer.php" ?>
