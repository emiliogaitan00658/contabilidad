<?php
include_once "../header/header_temporal.php";
include_once '../BD-Connection/conection.php';
include_once '../BD-Connection/datos_clientes.php';
session_start();
$Key = $_GET["temp"];

$verificacion = datos_clientes::datos_generales_talonario($Key, $mysqli);


if ($verificacion["indtalonario"] == "") {
    $_SESSION["indcliente"] = $_GET["indcliente"];
    $_SESSION["Key"] = $Key;
    datos_clientes::eliminar_indtalonario($Key,$mysqli);
    echo '<script> location.href="../crear_factura.php" </script>';
} else {
    echo '<script>
 swal({
   title: "Alerta",
   text: "Esta factura solo se puede editar una vez impresa, por que su numero de factura fue asignada",
   icon: "error",
   buttons: false,

 })
 .then((willDelete) => {
   if (willDelete) {
     location.href="../factura_dia.php";
   }else {
    location.href="../factura_dia.php";   }
 });
 </script>';
}
include_once "../header/footer_temporal.php";
