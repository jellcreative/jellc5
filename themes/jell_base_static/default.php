<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php'); ?>
<div id="content_inner">
	<?php $a = new Area('Main');
	$a->display($c); ?>
</div>
<? $this->inc('elements/footer.php');
?>