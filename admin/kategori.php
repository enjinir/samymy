<?php
session_start();
$_SESSION['title'] = 'Kategoriler..';
include '../lib.php';
include '../veritabani.php';
if(!isset($_SESSION['yetki']) || $_SESSION['yetki'] != PERMISSION_ADMIN) {
	redirect('login.php');
	exit;
}
?>
<?php include "ust.php"; ?>
<?php include "menu.php"; ?>

<?php
if(isset($_GET["islem"])) $islem = $_GET["islem"]; else $islem = "listele";
if($islem == "ekle") { 
	if(isset($_POST["submit"])) {
		$yeniKategoriAdi = $_POST["txtKategoriAdi"];
		$hata = "";
		$sorgu = "SELECT ad FROM kategoriler";
		$sonuc = mysql_query($sorgu);
		while($kategori = mysql_fetch_array($sonuc)) {
			if($kategori["ad"]==$yeniKategoriAdi) {
				$hata = "Böyle bir kategori zaten var!";
				break;
			}
		}
		if($hata == "") {
			$sorgu = "INSERT INTO kategoriler(ad) VALUES ('$yeniKategoriAdi')";
			$sonuc = mysql_query($sorgu);
			if(!$sonuc)
				message("Kategori eklenemedi!", "error");
			else
				message("Kategori başarıyla eklendi.", "success");
		} else {
			message($hata, "error");
		}
	}
?>
	<div id="kategori-ekle-form">
	<form name="kategori-ekle" method="post" action="kategori.php?islem=ekle">
	<fieldset>
	<legend>Kategori Ekle</legend>
	<label for="txtKategoriAdi">Kategori Adı : </label>
	<input type="text" name="txtKategoriAdi">
	<input type="submit" name="submit" value="Ekle">
	</fieldset>
	</form>
	</div>
<?php	
}
if($islem == "duzenle") {
	if(isset($_POST["submit"])) {
	 $yeniAd = $_POST['ad'];
	 $id = $_POST["id"];
	 $sorgu = "UPDATE kategoriler SET ad='$yeniAd' WHERE id=$id LIMIT 1;";
	 $sonuc = mysql_query($sorgu);
	 if(!$sonuc)
		message("Kategori düzenlenemedi!");
	else
		message("Kategori başarıyla düzenlendi!", "success");
	}
	if(isset($_GET["id"])) $id = $_GET["id"]; else $id = -1;
	$sorgu = "SELECT * FROM kategoriler";
	$sonuc = mysql_query($sorgu);
	echo '<div id="kategoriler">';
	echo '<table>';
	echo '<form name="kategori-duzenle" action="kategori.php?islem=duzenle" method="post">';
	while($kategori = mysql_fetch_array($sonuc)) {
		if($id == $kategori["id"])
			echo '<tr><td><input type="text" value="'.$kategori["ad"].'" name="ad"/><input type="hidden" name="id" value="'.$kategori["id"].'"</td><td><input type="submit" name="submit" value="Kaydet"></td></tr>';
		else
			echo '<tr><td>'.$kategori["ad"].'</td><td><a href="kategori.php?islem=duzenle&id='.$kategori["id"].'">Düzenle</a></td></tr>';
	}
	echo '</form>';
	echo '</table>';
	echo '</div>';
}
if($islem == "sil") {

}

?>

<?php include "alt.php"; ?>