<?php include_once('header.php'); ?>

<div class="container">
	<div class="row" style="background-color: #83B999; ">
		<?php $this->load->view('usuarioCategorias'); ?>
		Bem vindx <?php echo $usuario->nome; ?>!
	</div>
</div>