<?php include_once('header.php'); ?>

<div class="container">
	<div class="row" style="background-color: #83B999;">

		<?php 
			foreach ($alunos as $aluno => $value) { 
				$img = base_url() . "img/usuario.png";
				if($value->avatar) $img = $avatar;
		?>
			<div class="span4">
				<div class="userBox" style="padding-left:70px;">
					<a href="<?php echo base_url() . "/index.php/LoginController/logarAluno/$value->ID_aluno"; ?>">
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