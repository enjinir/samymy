<?php
session_start();
include '../lib.php';
include '../ayarlar.php';
if(isset($_SESSION['yetki']) && $_SESSION['yetki'] == PERMISSION_ADMIN) {
	unset($_SESSION['yetki']);
	unset($_SESSION['ad']);
	unset($_SESSION['soyad']);
	unset($_SESSION['mail']);
	unset($_SESSION['kullanici_adi']);
	session_destroy();	
	header('Location: login.php?logout=success');
}
else {
	header('Location: index.php');
	exit;
}
?>