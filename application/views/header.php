<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/bootstrap.css' ?>" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="span12 header">
					<div style="float:left; display:inline;">
						<a href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url() . 'img/logo.png'?>">
						</a>
					</div>
					<?php 
						$logged = (empty($this->session->userdata('logged_in'))) ? false : true; 
						if ($logged) {
					?>
					<div style="float:right; padding-top:15px;" class="topicText">
						<a href="<?php echo base_url() . "index.php/LoginController/logout"; ?>">
							Sair
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>