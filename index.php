<?php include "header/header.php";

if (!$_SESSION) {
    echo '<script> location.href="login.php" </script>';
}
if ($_POST) {

    if (!empty($_POST['textnombre'])) {
        function quitarCaracteresEspeciales($texto)
        {
            // Utilizamos una expresión regular para reemplazar todo lo que no sean dígitos o letras con una cadena vacía
//            return preg_replace('/[^a-zA-Z0-9]/', '', $texto);
            return preg_replace('/[^a-zA-Z0-9-ñÑ\s]/', '', $texto);
        }

// Ejemplo de uso
        $nombre = strtoupper($_POST['textnombre']);
        $nombre1 = quitarCaracteresEspeciales($nombre);
        $apellido = strtoupper($_POST['textapellido']);
        $apellido2 = quitarCaracteresEspeciales($apellido);


        $sucursale = strtoupper($_POST['textsucursal']);
        $tipo = strtoupper($_POST['texttipo']);
        $direccion1 = strtoupper($_POST['textdireccion1']);
        $direccion2 = strtoupper($_POST['textdireccion2']);
        $telefono = strtoupper($_POST['texttelefono']);

        $varficar_nombres = datos_clientes::verificar_nombre_apellido($nombre1, $apellido2, $mysqli);


        function validarInput($input)
        {
            // Eliminar espacios en blanco al inicio y al final del input
            $input = trim($input);

            // Comprobar si el input es igual a un punto o está en blanco
            if ($input === '.' || empty($input)) {
                return false; // No válido
            } else {
                return true; // Válido
            }
        }


        if ($varficar_nombres == false) {

            if (validarInput($apellido)) {
                $indusuario = datos_clientes::generar_ind_cliente($mysqli);
                $recues = datos_clientes::nuevo_usuario($indusuario, $nombre1, $direccion1, $direccion2, $tipo, $telefono, $sucursale, $apellido2, $mysqli);
                if ($recues == true) {
                    echo '<script>
 swal({
   title: "Exito ?",
   text: "Guardado Con Exitoooo",
   icon: "success",
   buttons: true,

 })
 .then((willDelete) => {
   if (willDelete) {
     location.href="temporal/indcliente.php?indcliente=' . $indusuario . '";
   }else {

   }
 });
 </script>';
                }
            } else {
                echo '<script>
 swal({
   title: "No valido ?",
   text: "No puede integrar caracter en apellido",
   icon: "error",
   buttons: false,

 })
 .then((willDelete) => {
   if (willDelete) {

   }else {

   }
 });
 </script>';
            }
        } else {
            echo '<script>
 swal({
   title: "Error ?",
   text: "Este Usuario Existe",
   icon: "error",
   buttons: false,

 })
 .then((willDelete) => {
   if (willDelete) {

   }else {

   }
 });
 </script>';
        }

    }
}
?>
<?php

if ($_POST) {
    if ($varficar_nombres != false) { ?>
        }
        <div class="container">
            <p class="alert alert-danger">Cliente
                existe <?php echo $varficar_nombres['nombre'] . "  " . $varficar_nombres['apellido']; ?>
                <a href="temporal/indcliente.php?indcliente=<?php echo $varficar_nombres['indcliente']; ?>"
                   class="btn btn-info">Genera
                    factura</a></p>
        </div>
    <?php }
} ?>
<div class="container z-depth-1 rounded white" style="border-radius: 6px">
    <h4 class="modal-title blue-grey-text alert alert-primary"><i class="icon-user-plus" size="80%"></i> Registro
        Clientes Nuevos</h4>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <section class="row">
            <div class="control-pares col-md-5">
                <label for="" class="control-label"><u>Nombres o Empresa: *</u></label>
                <input type="text" name="textnombre" class="form-control"
                       value="<?php if (!empty($_POST['textnombre'])) {
                           echo $_POST['textnombre'];
                       } ?>" placeholder="Nombres" required
                       onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || )">
            </div>
            <div class="control-pares col-md-5">
                <label for="" class="control-label"><u>Apellidos o No RUC: *</u></label>
                <input type="text" name="textapellido" class="form-control"
                       value="<?php if (!empty($_POST['textapellido'])) {
                           echo $_POST['textapellido'];
                       } ?>" placeholder="Apellidos" required>
            </div>
        </section>
        <br>
        <section class="row">
            <div class="control-pares col-md-3">
                <label>Seleccionar Sucursal: *</label>
                <select name="textsucursal" class="form-control" required>
                    <option class="form-control" value="<?php
                    echo $_SESSION['sucursal']; ?>" selected><?php

                        if ($_SESSION['sucursal'] == "1") {
                            echo "Managua";
                        }
                        if ($_SESSION['sucursal'] == "2") {
                            echo "Masaya";
                        }
                        if ($_SESSION['sucursal'] == "3") {
                            echo "Chontales";
                        }
                        if ($_SESSION['sucursal'] == "6") {
                            echo "Esteli";
                        }
                        if ($_SESSION['sucursal'] == "5") {
                            echo "Leon";
                        }
                        if ($_SESSION['sucursal'] == "9") {
                            echo "Matagalpa";
                        }
                        if ($_SESSION['sucursal'] == "4") {
                            echo "Chinandega";
                        }
                        if ($_SESSION['sucursal'] == "7") {
                            echo "Managua Bolonia";
                        }
                        if ($_SESSION['sucursal'] == "8") {
                            echo "Managua Villa Fontana";
                        }
                        if ($_SESSION['sucursal'] == "10") {
                            echo "Clinica Dansing";
                        }

                        ?></option>
                    <option class="form-control" value="1">Managua</option>
                    <option class="form-control" value="2">Masaya</option>
                    <option class="form-control" value="3">Chontales</option>
                    <option class="form-control" value="6">Esteli</option>
                    <option class="form-control" value="5">Leon</option>
                    <option class="form-control" value="9">Matagalpa</option>
                    <option class="form-control" value="4">Chinandega</option>
                    <option class="form-control" value="7">Managua Bolonia</option>
                    <option class="form-control" value="8">Managua Villa Fontana</option>
                    <option class="form-control" value="10">Clinica Dansing</option>
                </select>
            </div>
            <div class="control-pares col-md-3">
                <label class="alert-primary">Tipo Cliente: *</label>
                <select name="texttipo" class="form-control alert-primary" required>
                    <option value="">--seleccionar--</option>
                    <option class="form-control" value="1">Doc(@)</option>
                    <option class="form-control" value="2">Empresa</option>
                    <option class="form-control" value="3">Estudiante</option>
                    <option class="form-control" value="4">Paciente</option>
                    <option class="form-control" value="5">Tecnico</option>
                    <option class="form-control" value="6">Otro</option>
                </select>
            </div>
            <div class="control-pares col-md-3">
                <label for="" class="control-label">Telefono: *</label>
                <input type="text" name="texttelefono" placeholder="Telefono" class="form-control"
                       value="<?php if (!empty($_POST['texttelefono'])) {
                           echo $_POST['texttelefono'];
                       } ?>">
            </div>
        </section>
        <br>
        <section class="row">
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Dirección 1: *</label>
                <input type="text" name="textdireccion1" class="form-control" placeholder="Direccion de domicilio 1"
                       value="<?php if (!empty($_POST['textdireccion1'])) {
                           echo $_POST['textdireccion1'];
                       } ?>">
            </div>
            <div class="control-pares col-md-5">
                <label for="" class="control-label">Dirección 2: *</label>
                <input type="text" name="textdireccion2" class="form-control" placeholder="Direccion de domicilio 2"
                       value="<?php if (!empty($_POST['textdireccion2'])) {
                           echo $_POST['textdireccion2'];
                       } ?>">
            </div>
        </section>
        <div class="modal-footer">
            <input type="submit" value="Nuevo Cliente" class="btn white-text blue-grey btn-primary"/>
        </div>
    </form>
</div>

<?php include "header/footer.php" ?>
