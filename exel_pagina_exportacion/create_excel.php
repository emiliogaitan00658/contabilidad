<?php
//header("Content-Type: application/xls");
//header("Content-Disposition: attachment; filename=materiales_exportado_" . date('Y:m:d:m:s') . ".xls");
//header("Pragma: no-cache");
//header("Expires: 0");

require_once '../BD-Connection/conection.php';
require_once '../BD-Connection/datos_clientes.php';

$output = "";

if (isset($_POST['export'])) {
    $output .= "
			<table>
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Numero de Factura</th>
						<th>Cantidad</th>
						<th>Detalles</th>
						<th>Precio Unid</th>
						<th>Precio Total</th>
					</tr>
					</thead>
					
				<tbody>
		";

    $query = mysqli_query($mysqli, "SELECT * FROM `factura` order by indtalonario asc ") or die(mysqli_errno());
    while ($fetch = mysqli_fetch_array($query)) {

        $output .= "
					<tr>
						<td>" . $fetch['indtalonario'] . "</td>
						<td>" . $fetch['nombre_producto'] . "</td>
						<td>" . $fetch['precio_unidad'] . "</td>
						<td>" . $fetch['precio_total'] . "</td>
					</tr>
		";
    }

    $output .= "
				</tbody>
				
			</table>
		";

    echo $output;
}

?>