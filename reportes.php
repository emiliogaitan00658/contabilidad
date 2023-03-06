<?php include "header/header.php"; ?>
<div class="container">
    <br>
    <h5 class="alert alert-primary">Admistración de sucursales</h5>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Reporte Radiografia</h5>
                    <p class="card-text">Informes de RX.</p>
                    <a href="reportes_informenes/reporte_radiografias.php" class="btn btn-secondary">ir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Reporte de Materiales</h5>
                    <p class="card-text">Informe de materiales.</p>
                    <a href="temporal/crear_usuario.php" class="btn btn-secondary">ir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Garantia Equipos</h5>
                    <p class="card-text">Reporte de Garantia Equipos.</p>
                    <a href="temporal/crear_usuario.php" class="btn btn-secondary">ir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Asignar nuevo numero de factura Sucursal</h5>
                    <p class="card-text">Asignar numero de factura.</p>
                    <a href="temporal/crear_numero_talonario.php" class="btn btn-primary">Crear No Factura</a>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include "header/footer.php" ?>
