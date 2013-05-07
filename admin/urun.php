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
		$yeniUrunAdi = $_POST["txtUrunAdi"];
		$kategori = $_POST["kategori"];
		if ($_FILES["file"]["error"] > 0) {
			$hata = "Resim yüklenemedi!";
		}
		$hata = "";
		$sorgu = "SELECT ad FROM urunler";
		$sonuc = mysql_query($sorgu);
		while($urun = mysql_fetch_array($sonuc)) {
			if($urun["ad"]==$yeniUrunAdi) {
				$hata = "Böyle bir ürün zaten var!";
				break;
			}
		}
		if($hata == "") {
			$sorgu = "INSERT INTO urunler(ad, kategori_id, resim) VALUES ('$yeniUrunAdi', $kategori, '".$_FILES["file"]["name"]."')";
			$sonuc = mysql_query($sorgu);
			if(!$sonuc)
				message("Ürün eklenemedi!", "error");
			else {
				$extension = substr($_FILES["file"]["name"], strrpos($_FILES["file"]["tmp_name"], "."));
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"../resimler/" . $_FILES["file"]["name"]);
				message("Ürün başarıyla eklendi.", "success");
			}
		} else {
			message($hata, "error");
		}
	}
?>
	<div id="urun-ekle-form">
	<form name="urun-ekle" method="post" action="urun.php?islem=ekle" enctype="multipart/form-data">
	<fieldset>
	<legend>Ürün Ekle</legend>
	<label for="txtUrunAdi">Ürün Adı : </label>
	<input type="text" name="txtUrunAdi">
	<br />
	<label for="kategori">Kategori : </label>
	<select name="kategori">
	<?php 
	$sorgu = "SELECT * FROM kategoriler";
	$sonuc = mysql_query($sorgu);
	while($kategori = mysql_fetch_array($sonuc)) {
		echo '<option value="'.$kategori["id"].'">'.$kategori["ad"].'</option>';
	}
	?>
	</select>
	<br />
	<label for="resim">Resim : </label>
	<input type="file" name="resim" id="resim" />
	<br />
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
	$sorgu = "SELECT * FROM urunler";
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