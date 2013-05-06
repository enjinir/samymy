<?php
session_start();
$_SESSION['title'] = 'Yönetici Girişi';

include '../veritabani.php';

if(isset($_SESSION['yetki']) && $_SESSION['yetki'] == 51) {
	header('Location: index.php');
	exit;
}
if(isset($_POST['submit'])) {
	// TODO: do login...
} else {
	printLoginForm();
}

function printLoginForm() { ?>
<html>
<head>
<title><?php if (isset($_SESSION['title'])) echo $_SESSION['title']; else echo "Samymy!"; ?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../css/admin.css" />
</head>
<body>
	<div id="admin-login-form">
	<h2>sAMYMy.com</h2>
	<hr>
	<form name="login-form" method="post" action="login.php">
	<fieldset>
	<legend>Yönetici Girişi</legend>
	<table>
	<tr><td><label for="txtKullaniciAdi">Kullanıcı Adı </label></td><td><input type="text" id="txtKullaniciAdi" name="kullanici_adi" /></td></tr>
	<tr><td><label for="txtSifre">Parola </label></td><td><input type="password" id="txtSifre" name="sifre" /></td></tr>
	</table>

	<input type="submit" value="Giriş Yap" />
	</fieldset>
	</form>
	</div>

<?php
}
?>