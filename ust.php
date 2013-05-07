<?php include 'lib.php'; ?>
<?php include "veritabani.php"; ?>

<html>
<head>
<title><?php if (isset($_SESSION['title'])) echo $_SESSION['title']; else echo "Samymy!"; ?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/main.css" >
</head>
<body>
<div id="background-left"></div>
<div id="background-right"></div>
<div id="wrapper">
<div id="header">
	<div id="logo"></div>
</div>
<div id="nav-container">
	<ul>
		<li><a href="index.php">Anasayfa</a></li>
		<li><a href="urunler.php">Ürünler</a></li>
		<li><a href="hakkimizda.php">Hakkımızda</a></li>
		<li><a href="iletisim.php">İletişim</a></li>
	</ul>
</div>
<div id="left-container">

<?php kategorileriListele(); ?>

</div>
<div id="right-container">


<?php
function kategorileriListele() {
	$sorgu = "SELECT * FROM kategoriler";
	$sonuc = mysql_query($sorgu);
	echo '<div id="kategoriler">';
	echo '<ul>';
	while($kategori = mysql_fetch_array($sonuc)) {
		echo '<li><a href="urunler.php?kategori='.$kategori["id"].'">'.$kategori["ad"].'</a></li>';
	}
	echo '</ul>';
	echo '</div>';	
}
?>
