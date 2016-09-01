<?php include_once('header.php'); ?>

<div class="container">
	<div class="row topicText" style="background-color: #83B999; ">
		<?php require_once("menuResponsavel.php"); ?>
		<div class="mainContent clearfix">
			<?php echo form_open_multipart('CategoriaController/doUpload'); ?>
				<?php
					function tree($categories, $nivel=0) {
						$select = "<option value=''>Raíz</option>";
						foreach ($categories as $category) {
							$id = $category["categoria"]->ID_categoria;
							$sub = $category["SubCategoria"];
							$ident = str_repeat('-',$nivel);
							$select .=  "<option value='$id'>$ident " . $category["categoria"]->texto . "</option>";
							if(count($sub) > 0) $select .= tree($sub, $nivel+1);
						}
						return $select;
					}
					$select = tree($arvore);
				?>
				Categoria superior: <select><?php echo $select; ?></select><br/>
				Título: <input type="text" name="texto"/><br/>
				Imagem: <input type="file" name="up[]" size="20"/><br/>
				Áudio: <input type="file" name="up[]"/><br/>
				Vídeo: <input type="file" name="up[]"/><br/>
				Representação em Libras: <input type="file" name="up[]"/><br/>
				Emoção: <input type="file" name="up[]"/>
				<br/><br/>
				<input type="submit" value="Categoria" name="btnUpload" />
			</form>
		</div>
	</div>
</div>