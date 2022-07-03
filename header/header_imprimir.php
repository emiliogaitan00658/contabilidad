<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ORTHODENTAL S.A CONTABILIDAD</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/cssindex.css">
    <link rel="stylesheet" href="../assets/icomoon/style.css">

    <link rel="stylesheet" href="../assets/bootstrap/jquery-ui.css">
    <script src="../assets/js/jquery-1.12.4.js"></script>
    <script src="../assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="../resources/demos/style.css">

    <link rel="stylesheet" href="../assets/animate/css/libs/animate.css">


    <script src="../assets/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/jquery-expander/jquery.expander.min.js"></script>
</head>

<body>

<?php
session_start();
if (!empty($_SESSION)) {
    $idsucursal = $_SESSION['sucursal'];
    try {
        if (!empty($_SESSION['sucursal'])) {
            $indsucursal = $_SESSION['sucursal'];
            //$talonario=datos_clientes::cambio_do($idsucursal, $mysqli);
        }
    } catch (Exception $e) {

    }
}
$dolar=datos_clientes::cambio_dolar($mysqli);
$nombre_empleado=datos_clientes::nombre_empleado($_SESSION["indempleado"],$mysqli);
$indempleado=$_SESSION["indempleado"];
$datos_empresa=datos_clientes::mostrar_detalle_empresa($mysqli);
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NVK62C6JJC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NVK62C6JJC');
</script>


