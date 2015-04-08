<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?= $this->Html->css('mesay/style/bootstrap.min'); ?>
		<?= $this->Html->css('mesay/message'); ?>
		<?= $this->Html->css('mesay/style/personalize'); ?>
		<?= $this->Html->css('mesay/style'); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<title>MESAY :: <?= $pageTitle ?></title>
	</head>
	<body>
		<?php echo $this->fetch('content'); ?>
	</body>
</html>