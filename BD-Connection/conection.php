<?php
/**
 * Created by PhpStorm.
 * User: Emilio-Gaitan
 * Date: 05/03/2020
 * Time: 03:38 PM
 */
$mysqli = new mysqli("localhost", "root", "root2020", "contabilidad");
//$mysqli = new mysqli("localhost", "root", "", "contabilidad22");

if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}
$mysqli->set_charset("utf8"); //Estableciendo utf8




