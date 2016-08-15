<?php include_once('header.php'); ?>

<div class="container">
	<div class="row" style="background-color: #83B999;">

		<?php 
			foreach ($usuarios as $usuario => $value) { 
				$img = base_url() . "img/usuario.png";
				if($value->avatar) $img = $value->avatar;
		?>
			<div class="span4">
				<div class="userBox" style="padding-left:70px;">
					<a href="<?php echo base_url() . "/index.php/LoginController/logarUsuario/$value->ID_usuario"; ?>">
						<img src="<?php echo $img ?>">
						<br/>
						<div class="userType"><?php echo $value->nome; ?></div>
					</a>
				</div>
			</div>
		<?php } ?>

	</div>
	<div class="row" style="background-color: #83B999;">&nbsp;</div>
</div>