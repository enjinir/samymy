<?php
// Veritabani Ayarlari
define('MySQL_HOST','localhost');
define('MySQL_PORT','3306');
define('MySQL_USERNAME','root');
define('MySQL_PASSWORD','');
define('MySQL_DATABASE','samymy');

// Sistem Ayarlari
define('SAMYMY_DEBUG', 1);

if(!SAMYMY_DEBUG)
	error_reporting(0);
	

?>