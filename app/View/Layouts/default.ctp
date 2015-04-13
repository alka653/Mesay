<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?= $this->Html->css('template/plugins/bootstrap/bootstrap') ?>
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<?= $this->Html->css(array('template/style_v1', 'sty', 'message', 'toastr', 'jquery-ui.min')) ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<?= $this->Html->script(array("template/plugins/jquery/jquery.min", 'template/plugins/bootstrap/bootstrap.min', 'template/plugins/tinymce/tinymce.min', 'template/plugins/tinymce/jquery.tinymce.min', 'template/devoops', 'toastr', 'jquery-ui.min', 'search')) ?>
		<title>Bienvenido :: <?= $pageTitle ?></title>
	</head>
	<body>
		<?= $this->element('nav') ?>
		<div id="main" class="container-fluid">	
			<div class="row">
				<?= $this->element('nav-menu') ?>
				<div id="content" class="col-xs-12 col-sm-10">
					<div id="ajax-content">
						<div class="row">
							<div id="breadcrumb" class="col-xs-12">
								<a href="#" class="show-sidebar">
									<i class="fa fa-bars"></i>
								</a>
								<div id="social" class="pull-right">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</div>
							</div>
						</div>
						<div id="dashboard-header" class="row">
							<?= $this->fetch('content') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-load"></div>
	</body>
</html>