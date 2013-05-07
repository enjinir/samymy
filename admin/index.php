<?php
session_start();
$_SESSION['title'] = 'Yönetici Paneli';
include '../lib.php';
include '../veritabani.php';

if(!isset($_SESSION['yetki']) || $_SESSION['yetki'] != PERMISSION_ADMIN) {
	redirect('login.php');
	exit;
}
?>
<?php include "ust.php"; ?>
<?php include "menu.php"; ?>

<?php include "alt.php"; ?>