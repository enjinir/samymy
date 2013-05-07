<?php
function message($message = "Bir hata oluştu!", $type = "error") {
?>
	<div class="<?php echo $type; ?>">
	<?php echo $message; ?>
	</div>
<?php
}
function redirect($url) {
	try {
		if (!headers_sent()) {
			// Header'lar gonderilmedi, server-side redirecting !
			@header('Location: ' . $url);
			exit;
		} else
			throw new Exception();
	} catch (Exception $ex) {
		// Headers already sent!! O zaman Javascript?
		echo '<script type="text/javascript">';
		echo 'window.location.href="' . $url . '";';
		echo '</script>';
		// Javascript disable ise, meta ile yolluyoruz
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
		echo '</noscript>';
		exit;
	}
}
?>