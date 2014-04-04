<?php

	$jtv = Loader::helper('JellTrackVisitor');
	$jtv->trackVisitor();

?><!doctype html>
<html>
<head>
<!-- remove on launch -->
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<!-- end remove on launch -->

<!-- set a static viewport size -->
<meta name="viewport" content="width=1024">


<!--favicon-->
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="icon" href="/favicon.ico" type="image/x-icon">

<?php Loader::element('header_required'); ?>


<script src="<?php echo $this->getThemePath() ?>/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo $this->getThemePath() ?>/js/main.js"></script>
<script src="<?php echo $this->getThemePath() ?>/js/ios-orientation-change-fix.js"></script>
<link href="<?php echo $this->getThemePath() ?>/css/main.css" rel="stylesheet" media="all"/>
<link href="<?php echo $this->getThemePath() ?>/css/print.css" rel="stylesheet" media="print"/>

<!--[if lt IE 9]>
<link href="<?php echo $this->getThemePath() ?>/css/ie8.css" rel="stylesheet" media="all"/>
<script src="<?php echo $this->getThemePath() ?>/js/html5shiv.js"></script>
<![endif]-->

<!--[if lte IE 7]>
<script src="<?php echo $this->getThemePath() ?>/js/lte-ie7.js"></script>
<link href="<?php echo $this->getThemePath() ?>/css/ie7.css" rel="stylesheet" media="all"/>
<![endif]-->



</head>
<body>
<noscript>
<div id="noscript">
	<p>Please enable JavaScript in your browser's preferences to use all of the features available on this site.</p>
</div>
</noscript>
<div id="outer_wrap">

	<div id="inner_wrap">
		<? include('topnavigation.php'); ?>
