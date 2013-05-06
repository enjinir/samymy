<?php
session_start();
$_SESSION['title'] = 'Yönetici Girişi';
?>
<html>
<head>
<title><?php if (isset($_SESSION['title'])) echo $_SESSION['title']; else echo "Samymy!"; ?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../css/admin.css" />
</head>
<body>
<div id="container">
<?php
include '../veritabani.php';

if(isset($_SESSION['yetki']) && $_SESSION['yetki'] == PERMISSION_ADMIN) {
	header('Location: index.php');
	exit;
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
		header('Location: index.php');
	}
	else {
		printError("Kullanıcı adı & şifre kombinasyonunuz yanlış!");
		printLoginForm();
	}
} else {
	printLoginForm();
}

function printLoginForm() { ?>
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
<?php
}
function printError($message = "Bir hata oluştu!") {
?>
	<div class="error">
	<?php echo $message; ?>
	</div>
<?php
}
?>
</div>
</body>
</html>