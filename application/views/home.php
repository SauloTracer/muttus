<?php include_once('header.php'); ?>

<div class="container">
	<div class="row" style="background-color: #83B999; ">
		<div class="span4">
			<img src="<?php echo base_url() . "img/avatar.png" ?>">
		</div>
		
		<div class="span8">
			<div class="userBox">
				<a href="<?php echo base_url() . "index.php/LoginController/loginUsuario" ?>">
					<img src="<?php echo base_url() . "img/aluno.png" ?>">
					<div class="userType">Usuário</div>
				</a>
			</div>
			<div class="userBox">
				<a href="<?php echo base_url() . "index.php/LoginController" ?>">
					<img src="<?php echo base_url() . "img/responsavel.png" ?>">
					<div class="userType">Responsável</div>
				</a>
			</div>
			<a href="#">
				<div class="button">CADASTRE-SE</div>
			</a>
		</div>
	</div>
</div>