<?php include "header/header.php";

if (!$_SESSION){
    echo '<script> location.href="login" </script>';
}
if ($_POST){
    if(!empty($_POST['texttalonario'])){
        $indsucursal=$_SESSION['sucursal'];
        $notalonario=$_POST['texttalonario'];
        $res=datos_clientes::cambio_talonario($indsucursal,$notalonario,$mysqli);
        if($res==true){
            echo '<script>
   swal({
     title: "Exito ?",
     text: "Talonario Guardado",
     icon: "success",
     buttons: true,

   })
   .then((willDelete) => {
     if (willDelete) {
        location.href="factura_dia.php";
     }else {
       htmlspecialchars($_SERVER["PHP_SELF"]);
     }
   });
   </script>';
        }
    }
}

?>

<div class="container z-depth-1 rounded white">
    <div class="modal-header white rounded">
        <h4 class="modal-title blue-grey-text unoem">Registro de Talonar</h4>
    </div>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <section class="row">
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Cambio numero talonario: *</label>
                <input type="text" name="texttalonario" class="form-control" value=" <?php
                try{
                    if(!empty($_SESSION['sucursal'])){
                        $indsucursal=$_SESSION['sucursal'];
                        echo datos_clientes::cambio_do($indsucursal,$mysqli);
                    }
                }catch (Exception $e){

                }
                ?>" placeholder="Numero Talonario"  required>
            </div>
        </section>
        <br>
        <div class="modal-footer">
            <input type="submit" value="Agregar Talonario" class="btn white-text blue-grey btn-primary"/>
        </div>
    </form>
    <p> Este Cambio no aplica en las sucursale de Managua, Leon, Esteli</p>
    <br>
</div>

<?php include "header/footer.php" ?>

