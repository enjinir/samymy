<?php
// Ust kisim
include "ust.php";
?>
<div id="featured"> 
     <img src="resimler/cute-baby.png" alt="Anneler gününe özel indirim!" />
     <img src="resimler/kiz-cocuk-sabun.png" alt="Kiz bebeklere özel bir sabun!" />
     <img src="resimler/erkek-cocuk-1.png" alt="1 Yaş için özel" />
</div>

<script type="text/javascript">
     $(window).load(function() {
         $('#featured').orbit();
     });
</script>
<?php
// Alt kisim
include "alt.php";

?>