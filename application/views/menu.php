<div class="row">
	<div class="span12">
		<div class="well">
			<ul class="menu-horizontal">
				<?php if(!$logged) { ?>
					<li><a href="#">Cadastro</a></li>
					<li><a href="<?php echo $baseurl; ?>/index.php/LoginController">Login</a></li>
				<?php } else { ?>
					<li><a href="<?php echo $baseurl; ?>/index.php/CategoriaController/menuCategoria">Categorias</a></li>
					<li><a href="<?php echo $baseurl; ?>/index.php/HomeController/">Home</a></li>
					<li><a href="<?php echo $baseurl; ?>/index.php/LoginController/logout">Logoff</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>