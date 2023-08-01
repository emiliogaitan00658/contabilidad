<?php
include_once "../header/header_temporal.php";
include_once '../BD-Connection/conection.php';
include_once '../BD-Connection/datos_clientes.php';


if ($_GET){
$key=$_GET["key"];
$sucursal=$_GET["sucursal"];
datos_clientes:: transferencia_factura($sucursal, $key, $mysqli);
    echo ' <script> swal("Exito", "Transferencia con exito", "success")
.then((value) => {
  location.href="../factura_dia.php";
});
</script>';
}else{
    echo ' <script> swal("Acceso", "Denegado el acceso Intentar nuvamente", "error")
.then((value) => {
  location.href="../factura_dia.php";
});

</script>';
}



include_once "../header/footer_temporal.php";