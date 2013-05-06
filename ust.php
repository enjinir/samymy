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
		<li><a href="bizkimiz.php">Biz kimiz?</a></li>
		<li><a href="neyapariz.php">Ne yaparız?</a></li>
		<li><a href="iletisim.php">İletişim</a></li>
	</ul>
</div>