<div class="left topicText col-md-5" style="clear: both;">
	<ul class="lista navbar">
		<li>
			<a href="<?php echo base_url() . "index.php/ResponsavelController/editar" ?>">
				Editar Perfil
			</a>
		</li>
		<li>
			<a href="<?php echo base_url() . "index.php/ResponsavelController/alterarSenha" ?>">
				Alterar Senha
			</a>
		</li>
		<li><a href="#menuGerenciarUsuarios" data-toggle="collapse">Gerenciar Usuários</a>
			<div class="collapse" id="menuGerenciarUsuarios">
				<ul class="lista">
					<li>
						<a href="<?php echo base_url() . "index.php/ResponsavelController/listarUsuarios" ?>">
							Listar Usuários
						</a>
					</li>
					<li>Criar Usuários</li>
					<li>Editar Usuário</li>
				</ul>
			</div>
		</li>

		<li>Apagar Conta</li>
	</ul>
	<br/>
</div>