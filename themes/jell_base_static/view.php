<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

$this->inc('elements/header.php'); ?>

<div id="content_inner">
	

	   	<?php
	   	echo $innerContent;
	   	?>

</div>
<? $this->inc('elements/footer.php');
?>