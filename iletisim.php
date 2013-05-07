<?php include "ust.php"; ?>
<?php
	if(isset($_POST["submit"])) {
		$isim = $_POST["isim"];
		$email=$_POST["email"];
		$telefon=$_POST["telefon"];
		$secenek=$_POST["secenek"];
		$mesaj=$_POST["mesaj"];
		$konusecenek=$_POST["konusecenek"];
		$sorgu="INSERT INTO VALUES";
	} 
?>
<div id="iletisim"> 
<form name="iletisim" method="post" action="">
<table>
<tr><td>Adınız Soyadınız</td><td>: <input type="text" name="isim" ></td></tr>
<tr><td>E-Mail Adresiniz</td><td>: <input type="text" name="email" ></td></tr>
<tr><td>Telefon Numaranız</td><td>: <input type="text" name="telefon" ></td></tr>
<tr><td>Size Nasıl Ulaşalım?</td>
<td>: 
	<select name ="secenek"> 
		<option value= "0">E-Mail ile </option>
		<option value= "1">Telefon ile </option>
	</select>
</td></tr>

<tr><td> Konu </td>
<td>:
	<select name="konusecenek">
		<option value="2">Ozel Siparis</option>
		<option value= "3">Siparis </option>
		<option value= "4">Diğer </option>
	</select>
</td></tr>
<tr><td style="vertical-align:top; margin-top: 0px;">Mesajınız:</td><td> <textarea name="mesaj" id="mesaj" cols="25" rows="15"> </textarea></td></tr>
<tr><td colspan=2><input type="submit" name="submit" value="Gönder"></td></tr>

</table>
</form>
</div>
<?php include "alt.php"; ?>