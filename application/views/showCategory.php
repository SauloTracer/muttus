<?php //include_once('header.php'); ?>

<div class="row">
	<div class="span12">
		<div class="well">
			<h4>Categoria</h4>
			<hr>
			Nome: <?php echo $texto; ?><br/>
			Imagem: <img src="<?php echo base_url() . 'uploads/' . $image; ?>" width="100" height="100"/><br/>
			Vídeo: <a href="<?php echo base_url() . 'uploads/' . $video; ?>">#</a><br/>
			Som: <a href="<?php echo base_url() . 'uploads/' . $som; ?>">#</a><br/>
		</div>
	</div>
</div>

<?php //include_once('footer.php'); ?>