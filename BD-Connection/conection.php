<?php
/**
 * Created by PhpStorm.
 * User: Emilio-Gaitan
 * Date: 05/03/2020
 * Time: 03:38 PM
 */
error_reporting (0);
//$mysqli = new mysqli("localhost", "root", "root2020", "contabilidad_may_2023");
$mysqli = new mysqli("localhost", "root", "", "orthodental2024");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}
$mysqli->set_charset("utf8"); //Estableciendo utf8




