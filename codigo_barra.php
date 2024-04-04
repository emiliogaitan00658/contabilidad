<?php
include "header/header.php";
session_start();
if (!$_SESSION) {
    echo '<script> location.href="login.php" </script>';
}
if ($_GET) {
    $indproducto1 = $_GET['codigo'];
    $indproducto = datos_clientes::buscar_producto_codigo_producto_barra_codigo($indproducto1, $mysqli);
    $dato = datos_clientes::buscar_producto_codigo_producto($indproducto, $mysqli);
    $precio = $dato['precio1'];
    $producto = $dato['nombre_producto'];
    $indtemp = $_SESSION['Key'];
    $indsucursal = $_SESSION['sucursal'];
    $reques = datos_clientes::verificar_producto_factura($indtemp, $indproducto, $mysqli);

    if ($reques=="false") {
        datos_clientes::facturagenerada_filtro1($indtemp, $dolar, $indsucursal, $precio, $producto, $indproducto, $mysqli);
        echo '<script> location.href="crear_factura.php" </script>';
    }else{
        echo '<script> location.href="crear_factura.php" </script>';
    }



}
