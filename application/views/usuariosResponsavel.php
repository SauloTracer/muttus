<?php include_once('header.php'); ?>

<div class="container">
	<div class="row topicText" style="background-color: #83B999; ">
		<?php require_once("menuResponsavel.php"); ?>
		<div class="mainContent clearfix" style="width:73%;padding-left:67px;">
			<?php 
				foreach ($usuarios as $usuario => $value) { 
					$img = base_url() . "img/usuario.png";
					if($value->avatar) $img = $value->avatar;
			?>
				<div class="span4">
					<div class="userBox" style="padding-left:70px;">
							<img src="<?php echo $img ?>">
							<br/>
							<div class="userType"><?php echo $value->nome; ?></div>
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php //var_dump($usuarios); ?>