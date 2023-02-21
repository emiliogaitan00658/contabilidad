<?php include "header/header.php";

if (!$_SESSION){
    echo '<script> location.href="login.php" </script>';
}
if ($_POST){
    if(!empty($_POST['texttalonario'])){
        $indsucursal=$_SESSION['sucursal'];
        $notalonario=$_POST['texttalonario'];
        $res=datos_clientes::cambio_talonario_talonario($indsucursal,$notalonario,$mysqli);
        if($res==true){
            echo '<script>
   swal({
     title: "Exito ?",
     text: "Recibo Guardado",
     icon: "success",
     buttons: true,

   })
   .then((willDelete) => {
     if (willDelete) {
        location.href="recibo_dia.php";
     }else {
       htmlspecialchars($_SERVER["PHP_SELF"]);
     }
   });
   </script>';
        }
    }
}

?>

<div class="container z-depth-1 rounded white" style="width: 60%;border-radius: 6px">

    <h4 class="modal-title blue-grey-text alert alert-danger">Registro Recibo</h4>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="control-pares col-md-4">
            <label for="" class="control-label">Cambio numero Recibo:</label>
            <input type="text" name="texttalonario" class="form-control" value=" <?php
            echo $recibo;
            ?>" placeholder="Agregar numero de factura"  required>
        </div>
        <br>
        <hr>
        <p>* Numero de recibo al modificar o editar sus datos es reponsabilida de la sucursal</p>
        <br>
        <div class="modal-footer">
            <input type="submit" value="Guardar Cambios" class="btn white-text blue-grey btn-primary"/>
        </div>
    </form>
</div>

<?php include "header/footer.php" ?>

