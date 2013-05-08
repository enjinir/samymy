<?php
session_start();
$_SESSION["title"] = "Samymy : Ürünler"; 
// Ust kisim
include "ust.php";
if(isset($_GET["kategori"])) $kategori = $_GET["kategori"]; else $kategori = -1;
echo '<div id="urunler">';
$sorgu = "SELECT * FROM urunler";
if($kategori > 0) $sorgu .= " WHERE kategori_id=$kategori";
$sonuc = mysql_query($sorgu);
while($urun = mysql_fetch_array($sonuc)) {
?>
<div class="urun">
	<img src="<?php echo "resimler/urunler/".$urun["resim"]; ?>" />
	<span class="ad"><?php echo $urun["ad"]; ?></span>
</div>
<?php
}
echo '</div>';
// Alt kisim
include "alt.php";

?>