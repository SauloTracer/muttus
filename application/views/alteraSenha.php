<?php include_once('header.php'); ?>

<div class="container">
	<div class="row topicText" style="background-color: #83B999; ">
		<?php require_once("menuResponsavel.php"); ?>
		<div class="mainContent clearfix" style="width:73%;padding-left:67px;">
			<div class="userBox" style="padding-left:35%">
				<img src="<?php echo base_url() . $responsavel->avatar; ?>" style="width:100px; height:100px;">
			</div>
			<div style="padding-left:10%;">
				<?php echo form_open('ResponsavelController/validarSenha'); ?>
					<ul class="lista listaEditaResponsavel">
						<li>
							Senha atual:
							<div class="alteraSenha">
								<input type="password" name="senha" id="pwdSenha" />
							</div>
						</li>
						<li>
							Nova Senha:
							<div class="alteraSenha">
								<input type="password" name="nova_senha" id="pwdNovaSenha" />
							</div>
						</li>
						<li>
							Repetir nova senha:
							<div class="alteraSenha">
								<input type="password" name="confere_nova_senha" id="pwdConfereNovaSenha" />
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

<?php //var_dump($responsavel); ?>