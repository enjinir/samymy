<?php
function message($message = "Bir hata oluştu!", $type = "error") {
?>
	<div class="<?php echo $type; ?>">
	<?php echo $message; ?>
	</div>
<?php
}
?>