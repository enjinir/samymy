<?php
// Veritabani Ayarlari
define('MySQL_HOST','samymy.com');
define('MySQL_PORT','3306');
define('MySQL_USERNAME','samymy_root');
define('MySQL_PASSWORD','reflu9191');
define('MySQL_DATABASE','samymy_main');

// Sistem Ayarlari
define('SAMYMY_DEBUG', 1);

// Sabitler
define('PERMISSION_ADMIN', 51);

if(!SAMYMY_DEBUG)
	error_reporting(0);
	

?>