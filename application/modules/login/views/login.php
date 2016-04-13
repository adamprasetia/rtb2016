<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php echo APP_NAME ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico')?>"/>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/bootstrap-3.3.5-dist/css/bootstrap.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/css/AdminLTE.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/css/skins/_all-skins.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/AdminLTE-2.3.0/plugins/morris/morris.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/ionicons-2.0.1/css/ionicons.min.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css') ?>"/>
</head>
<body>
	<div class="box-login">
		<?php echo validation_errors() ?>
		<?php echo form_open('login') ?>
		<div class="box box-default">
			<div class="box-body">
				<h3>Please sign in here</h3>
				<hr>
				<input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" autofocus>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>	
			<div class="box-footer">
				<input type="submit" class="btn btn-danger btn-sm" value="Sign in">
			</div>	
			<div class="box-footer">
				New Interviewer ? Register <?php echo anchor('registration','Here') ?>
			</div>	
		</div>	
		<?php echo form_close() ?>
	</div>	
	<script type="text/javascript" src="<?php echo base_url('../assets/js/jquery-1.11.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/bootstrap-3.3.5-dist/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('../assets/AdminLTE-2.3.0/js/app.js')?>"/></script>
</body>
</html>