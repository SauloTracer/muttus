<?php include_once('header.php'); ?>

<div class="container">
	<div class="row" style="background-color: #83B999; ">
		<?php 
			$this->load->view('usuarioCategorias'); 
			//TODO - Verificar existência do arquivo
			$imagem = ($image) ? base_url() . 'uploads/' . $image : "#";
			$video = ($video) ? base_url() . 'uploads/' . $video : "#";
			$som = ($som) ? base_url() . 'uploads/' . $som : "#";
		?>
		<div class="mainContent" style="padding-top: 10px;">
			<span class="topicText"><?php echo $texto; ?></h4>
			<hr>
			
			<img src="<?php echo $imagem; ?>" width="100" height="100"/><br/>
			
			<video controls loop width="200px" width="200px">
				<source src="<?php echo $video; ?>">
				Seu navegador não suporta o elemento <code>video</code>.
			</video>

			<audio src="<?php echo $som; ?>" controls loop>
				 <p>Seu nevegador não suporta o elemento audio.</p>
			</audio>
		</div>
	</div>
</div>