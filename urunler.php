<?php
session_start();
$_SESSION["title"] = "Samymy : Ürünler"; 

// Ust kisim
include "ust.php";

// Alt kisim
include "alt.php";

?>