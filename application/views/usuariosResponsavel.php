<?php include_once('header.php'); ?>

<div class="container">
	<div class="row topicText" style="background-color: #83B999; ">
		<?php require_once("menuResponsavel.php"); ?>
		<div class="mainContent clearfix">
			<?php 
				if($selected) $this->load->view('usuarioSelecionado');
				foreach ($usuarios as $usuario => $value) { 
					$img = ($value->avatar) ? base_url() . $value->avatar : base_url() . "img/usuario.png";
			?>
				<div class="span3" style="display:inline-block;">
					<div class="userBox" style="padding-left:70px;">
						<a href="<?php echo base_url() . "/index.php/ResponsavelController/selecionarUsuario/" . $value->ID_usuario; ?>">
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