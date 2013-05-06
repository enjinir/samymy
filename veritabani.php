<?php

// Ayarlar
include "ayarlar.php";

$baglanti = mysql_connect(MySQL_HOST . ':' . MySQL_PORT, MySQL_USERNAME, MySQL_PASSWORD) or die("<h1>Veritabani sunucusuna baglanti saglanamadi!</h1><hr><h3>Lutfen sistem yoneticisi ile irtibata geciniz!</h3>");
$veritabani = mysql_select_db(MySQL_DATABASE, $baglanti) or die("<h1>Veritabani secilemedi!</h1><hr><h3>Lutfen sistem yoneticisi ile irtibata geciniz!</h3>");

mysql_query("SET NAMES 'UTF8'");
mysql_query("SET character_set_connection = 'UTF8'");
mysql_query("SET character_set_client = 'UTF8'");
mysql_query("SET character_set_results = 'UTF8'");

?>