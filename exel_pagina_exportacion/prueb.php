<head>
    <meta charset="utf-8">
</head>
<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=materiales_exportado_" . date('Y:m:d:m:s') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");
$inicio=$_POST['textinicio'];
$final=$_POST['textfinal'];
session_start();
$idsucursal = $_SESSION['sucursal'];
include_once '../BD-Connection/conection.php';
include_once '../BD-Connection/datos_clientes.php';
$dolar = datos_clientes::cambio_dolar($mysqli);
echo "    ORTHODENTAL    ".strtoupper(datos_clientes::nombre_sucursal($idsucursal));
?>

<style>
    .linea {
        display: inline-block;
        font-family: 'lucida grande', helvetica, verdana, arial, sans-serif!important;
    }
    #contenidoTabla {
        font-size: 5px;
        font-family: 'lucida grande', helvetica, verdana, arial, sans-serif!important;
    }
    td {
        font-size: 13px;
        font-family: 'lucida grande', helvetica, verdana, arial, sans-serif!important;
        border-color: #0d0d0d!important;
    }
    th {
        font-size: 13px;
        font-family: 'lucida grande', helvetica, verdana, arial, sans-serif!important;
        border-color: #0d0d0d!important;

    }
</style>
<style>
    * {
        font-family: Helvetica;
    }

    .linea {
        display: inline-block;
        font-family: 'lucida grande', helvetica, verdana, arial, sans-serif !important;
    }

    #contenidoTabla {
        font-size: 5px;
        font-family: 'lucida grande', helvetica, verdana, arial, sans-serif !important;
        border-color: #0d0d0d;
    }

    td {
        font-size: 13px;
        font-family: 'lucida grande', helvetica, verdana, arial, sans-serif !important;
    }

    th {
        font-size: 13px;
        font-family: 'lucida grande', helvetica, verdana, arial, sans-serif !important;
    }
    html {
        font-family: sans-serif;
        line-height: 1.15;
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
    }
    body {
        margin: 0;
        font-family: Nunito, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #858796;
        text-align: left;
        background-color:
    }
    .text-center {
        text-align: center !important;
    }
    .center-blocks {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .left-align {
        text-align: left;
    }

    .right-align {
        text-align: right;
    }

    .center, .center-align {
        text-align: center;
    }

    .table {
        width: 100%;
        margin-bottom: 0;
        color: #858796
    }

    .table td, .table th {
        padding: 0;
        vertical-align: top;
        border-top: 1px solid #0d3349;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #0d3349;
    }

    .table tbody + tbody {
        border-top: 2px solid #0d3349;
    }

    .table-sm td, .table-sm th {
        padding: 0
    }


</style>
<table>
    <tbody>
    <tr>
        <td style="width: 60px; height: 20px;margin-left: 0;padding-left: 0;">Fecha</td>
        <td style="width: 60px; height: 20px;margin-left: 0;padding-left: 0;">No Factura</td>
        <td style="width: 100px; height: 20px;margin-left: 0;padding-left: 0;">Codigo</td>
        <td style="width: 60px; height: 20px;margin-left: 0;padding-left: 0;">Cantidad</td>
        <td style="width: 60px; height: 20px;margin-left: 0;padding-left: 0;">Detalles</td>
        <td style="width: 60px; height: 20px;margin-left: 0;padding-left: 0;">Precio Unid</td>
        <td style="width: 60px; height: 20px;margin-left: 0;padding-left: 0;">Precio Total</td>
    </tr>
    <?php
    $result4 = $mysqli->query("SELECT * FROM `factura` where indtalonario BETWEEN '$inicio' and '$final' order by indtalonario asc ");
    while ($resultado = $result4->fetch_assoc()) {
        if ($resultado['indtalonario'] != null) {
            $fecha=datos_clientes::fecha_factura($resultado['indtalonario'], $mysqli)
            ?>
            <tr style="height: 5px;">
                <td style="width: 60px; height: 20px;margin-left: 0;padding-left: 0;"
                    class="left-align"><b><?php echo datos_clientes::traforma_fecha($fecha); ?></b>
                </td><td style="width: 60px; height: 20px;margin-left: 0;padding-left: 0;"
                         class="left-align"><b><?php echo $resultado['indtalonario']; ?></b></td>
                <td style="width: 100px; height: 20px;margin-left: 0;padding-left: 0;"
                    class="left-align"><b><?php echo $resultado['codigo_producto']; ?></b></td>
                <td style="width: 40px; height: 20px;margin-left: 6px"
                    class="right-align"><b><?php echo $resultado['unidad']; ?></b></td>
                <td style="width: 400px; height: 20px;margin-left: 6px">
                    <b><?php echo datos_clientes::nombre_producto_completo($resultado['codigo_producto'], $mysqli); ?></b>
                </td>
                <td style="width: 68px; height: 20px;padding-left: 2em"
                    class="right-align"><b><?php echo number_format(($resultado['precio_unidad']/$dolar), 2, '.', ','); ?></b>
                </td>
                <td style="width: 68px; height: 20px;padding-left: 1em"
                    class="right-align"><b><?php echo number_format(($resultado['precio_total']/$dolar), 2, '.', ','); ?></b>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
</body>
