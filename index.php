<?php
// Ust kisim
include "ust.php";

kategorileriListele();

// Alt kisim
include "alt.php";


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