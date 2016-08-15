<!DOCTYPE HTML>
<html>
	<head>
		<title>Categorias</title>
	</head>
	<body>

	<center><h1>Categoria</h1></center>

	<?php echo form_open_multipart('CategoriaController/doUpload'); ?>

	Título: <br/>
	<input type="text" name="texto"/><br/>

	Imagem: <br/>
	<input type="file" name="up[]" size="20"/><br/>

	Áudio: <br/>
	<input type="file" name="up[]"/><br/>

	Vídeo: <br/>
	<input type="file" name="up[]"/><br/>

	Representação em Libras: <br/>
	<input type="file" name="up[]"/><br/>

	Emoção: <br/>
	<input type="file" name="up[]"/>
	
	<br/><br/>
	<input type="submit" value="Categoria" name="btnUpload" />

</form>

	</body>

</html>