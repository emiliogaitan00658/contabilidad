<?php
include_once "../header/header_temporal.php";
include_once '../BD-Connection/conection.php';
include_once '../BD-Connection/datos_clientes.php';
session_start();
$_SESSION["TALONARIO"]=NULL;
$Key = $_GET["temp"];

$_talonario=datos_clientes::verficiar_talonario_numero($Key,$mysqli);
$_SESSION["TALONARIO"] = $_talonario;



$_SESSION["indcliente"] = $_GET["indcliente"];
$_SESSION["Key"] = $Key;
datos_clientes::eliminar_indtalonario($Key, $mysqli);
echo '<script> location.href="../crear_factura.php" </script>';

