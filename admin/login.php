<?php
session_start();
$_SESSION['title'] = 'Yönetici Girişi';
?>
<?php
include '../lib.php';
include '../veritabani.php';

if(isset($_SESSION['yetki']) && $_SESSION['yetki'] == PERMISSION_ADMIN) {
	redirect('index.php');
	exit;
}

include "ust.php";
if(isset($_GET["logout"]) && $_GET["logout"]=="success") {
	message("Çıkış işleminiz başarıyla tamamlandı.", "success");
}
if(isset($_POST['submit'])) {
	$kullaniciAdi = $_POST['txtKullaniciAdi'];
	$sifre = md5($_POST['txtSifre']);
	$sorgu = "SELECT * FROM yoneticiler WHERE kullanici_adi='$kullaniciAdi' AND sifre='$sifre' LIMIT 1;";
	$sonuc = mysql_query($sorgu);
	$yetki = mysql_fetch_array($sonuc);
	if(is_array($yetki)) {
		// Login credentials are OK!
		// Set session values
		$_SESSION['yetki'] = PERMISSION_ADMIN;
		$_SESSION['ad'] = $yetki['ad'];
		$_SESSION['soyad'] = $yetki['soyad'];
		$_SESSION['mail'] = $yetki['mail'];
		$_SESSION['kullanici_adi'] = $yetki['kullanici_adi'];
		
		// GO to index.php
		redirect('index.php');
	}
	else {
		message("Kullanıcı adı & şifre kombinasyonunuz yanlış!");	
	}
}
// Print login form.
printLoginForm();

include "alt.php";

function printLoginForm() { ?>
	<div id="admin-login-container">
	<div id="admin-login-form">
	<h2>sAMYMy.com</h2>
	<hr>
	<form name="login-form" method="post" action="login.php">
	<fieldset>
	<legend>Yönetici Girişi</legend>
	<table>
	<tr><td><label for="txtKullaniciAdi">Kullanıcı Adı </label></td><td><input type="text" id="txtKullaniciAdi" name="txtKullaniciAdi" /></td></tr>
	<tr><td><label for="txtSifre">Parola </label></td><td><input type="password" id="txtSifre" name="txtSifre" /></td></tr>
	<tr><td colspan="2"><input type="submit" name="submit" value="Giriş Yap" /></td></tr>
	</table>
	</fieldset>
	</form>
	</div>
	</div>
<?php
}
?>