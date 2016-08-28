<?php include_once('header.php'); ?>

<div class="container">
	<div class="row topicText" style="background-color: #83B999; ">
		<?php require_once("menuResponsavel.php"); ?>
		<div class="mainContent clearfix" style="width:73%;padding-left:67px;">
			<div class="userBox" style="padding-left:35%">
				<img src="<?php echo base_url() . $responsavel->avatar; ?>" style="width:100px; height:100px;">
			</div>
			<div style="padding-left:10%;">
				<?php echo validation_errors(); ?>
			
				<?php echo form_open_multipart('ResponsavelController/validar'); ?>
					<ul class="lista listaEditaResponsavel">
						<li>
							Nome:
							<div class="editaResponsavel">
								<input type="text" name="nome" id="txtNome" placeholder="Nome" value="<?php echo $responsavel->nome; ?>" />
							</div>
						</li>
						<li>
							E-mail:
							<div class="editaResponsavel">
								<input type="text" name="email" id="txtEmail" value="<?php echo $responsavel->email; ?>" />
							</div>
						</li>
						<li>
							Endereço:
							<div class="editaResponsavel">
								<input type="text" name="endereco" id="txtEndereco" value="<?php echo $responsavel->endereco; ?>" />
							</div>
						</li>
						<li>
							Telefone:
							<div class="editaResponsavel">
								<input type="text" name="telefone" id="txtTelefone" value="<?php echo $responsavel->telefone; ?>"/>
							</div>
						</li>
						<li>
							Data de Nascimento:
							<div class="editaResponsavel dtNascimento">
								<input type="text" name="dt_nascimento" id="txtNascimento" placeholder="dd/mm/yyyy" value="<?php echo $responsavel->dt_nascimento; ?>" />
							</div>
						</li>
						<li>
							Sexo:
							<?php 
								$checked = 'checked="checked"';
								$male = $female = "";
								if (strtolower($responsavel->sexo) == 'm') {
									$male = $checked;
									$female = "";
								} else if (strtolower($responsavel->sexo) == 'f') {
									$female = $checked;
									$male = "";
								}
							?>
							<div class="editaResponsavel">
								<input type="radio" name="sexo" id="rdbSexo" value="M" <?php echo $male; ?> />Masculino &nbsp;
								<input type="radio" name="sexo" id="rdbSexo" value="F" <?php echo $female; ?>/>Feminino
							</div>
						</li>
						<li>
							Imagem: 
							<div class="editaResponsavel" style="overflow:hide;">
								<input type="file" name="userfile" id="userfile" class="inputfile" />
								<label id="teste" for="userfile">Selecionar arquivo...</label>
							</div>
						</li>
					</ul>

					<div style="align:center;">
						<input type="submit" value="Salvar" name="btnSalvar" id="btnSalvar" class="button" />
					</div>

				</form>
			</div><br/>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#userfile").change(function(){
		file = $("#userfile").val();
		re = /\w+\.\w+/;
		r = re.exec(file);
		if (r) file = r[0];
		texto = (file != "") ? file : "Selecionar arquivo...";
		$("#teste").html(texto);
	});
</script>

<?php //var_dump($responsavel); ?>