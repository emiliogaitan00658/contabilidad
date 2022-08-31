<?php include "header/header.php"; ?>
<div class="container">
    <br>
    <h5 class="alert alert-primary">Modulo Admistrativo</h5>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Cambiar Producto</h5>
                    <p class="card-text">Cambio de Precio.</p>
                    <a href="temporal/producto_cambio_precio" class="btn btn-secondary">ir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Crear Usuario</h5>
                    <p class="card-text">Registro de usuario.</p>
                    <a href="temporal/crear_usuario" class="btn btn-secondary">ir</a>
                </div>
            </div>
        </div>
<!--        <div class="col-sm-3">-->
<!--            <div class="card">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">Reporte Venta Materiales</h5>-->
<!--                    <p class="card-text">Reprotes se pueden generar mensual o semana.</p>-->
<!--                    <a href="temporal/panel_reporte_rax" class="btn btn-primary">Crear Reporte</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-sm-3">-->
<!--            <div class="card">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">Reporte Radiografia</h5>-->
<!--                    <p class="card-text">Reprotes se pueden generar mensual o semana.</p>-->
<!--                    <a href="#" class="btn btn-primary">Crear Reporte</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-sm-3">-->
<!--            <div class="card">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">Reporte Cierre de Caja de Materiales</h5>-->
<!--                    <p class="card-text">Reprotes se pueden generar mensual o semana.</p>-->
<!--                    <a href="temporal/cierre_caja" class="btn btn-primary">Crear Reporte</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Asignar nuevo numero de factura Sucursal</h5>
                    <p class="card-text">Asignar numero de factura.</p>
                    <a href="temporal/crear_numero_talonario" class="btn btn-primary">Crear No Factura</a>
                </div>
            </div>
        </div>
        <br>
<!--        <div class="col-sm-3">-->
<!--            <div class="card">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">Entrega de Materiales</h5>-->
<!--                    <p class="card-text">Entrega de Materiales.</p>-->
<!--                    <a href="temporal/control_panel_entrega_materiales" class="btn btn-primary">Entregar</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>
<br>
<div class="container">
    <h5 class="alert alert-primary">Modulo Contador</h5>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Total Venta</h5>
                    <p class="card-text">Venta de ortho dental (Exedentes de ley 822 Art. 127 y 136)</p>
                    <a href="contador_modulo/fecha_exentas" class="btn btn-secondary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Retenciòn</h5>
                    <p class="card-text">Informe de retenciòn de sucursales</p>
                    <a href="contador_modulo/fecha_reporte_retencion" class="btn btn-secondary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Alerta de Factura</h5>
                    <p class="card-text">Alerta de Facturas no ingresadas</p>
                    <a href="contador_modulo/fecha_factura_ingresada" class="btn btn-secondary">Ir</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <h5 class="alert alert-primary">Modulo Configuraciones</h5>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Cambio Tasa de Cambio</h5>
                    <p class="card-text">Este modulo solo es personal autorizado puede cambiar la taza de cambio.</p>
                    <a href="cambio_dolar" class="btn btn-secondary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Configuraciones Generales</h5>
                    <p class="card-text">Configuraciones de empresa.</p>
                    <a href="configuraciones/empresa" class="btn btn-secondary">ir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body center-align">
                    <h5 class="card-title">Configuraciones Sucursales</h5>
                    <p class="card-text">Registro de sucursales.</p>
                    <a href="configuraciones/sucursales" class="btn btn-secondary">ir</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include "header/footer.php" ?>
