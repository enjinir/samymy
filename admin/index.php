<?php
session_start();
$_SESSION['title'] = 'Yönetici Paneli';
include '../veritabani.php';

if(!isset($_SESSION['yetki']) || $_SESSION['yetki'] != 51) {
	header('Location: login.php');
	exit;
}
?>
<?php include "ust.php"; ?>
<?php include "menu.php"; ?>

<?php include "alt.php"; ?>