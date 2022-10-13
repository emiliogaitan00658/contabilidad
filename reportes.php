<?php
include "header/header.php";
?>

<div class="container white rounded z-depth-2" style="border-radius: 6px;">
    <div style="padding: 1em">
        <h5>Imprimir reporte de Materiales y Radiografias</h5>
        <p><span class="red-text">*</span>Nota si el sistema hace falta un factura manual ingresar despues generada la impresiòn
        </p>
        <hr>
        <br>
        <form action="exel_pagina_exportacion/prueb.php" target="_blank" method="post">
            <section class="row">
                <div class="control-pares col-md-3">
                    <input type="text" name="textinicio" class="form-control" placeholder="Inicio N Factura" required>
                </div>
                <span>a</span>
                <div class="control-pares col-md-3">
                    <input type="text" name="textfinal" class="form-control" placeholder="Final N Factura" required>
                </div>
                <div class="control-pares col-md-2">
                    <input type="submit" value="Generar Informe" class="btn white-text blue-grey btn-primary"/>
                </div>
            </section>
        </form>
        <br>
    </div>
</div>
<?php
include_once "header/footer.php";
?>
