<?php include_once('header.php'); ?>

<div class="row">
	<div class="span12">
		<div class="well">
			<h4><i>Login</i></h4>
			<hr>

			<?php echo validation_errors(); ?>

			<?php echo form_open('LoginController/checkLogin'); ?>
				Usuário: <br/>
				<input type="text" name="username" id="txtUsername"/><br/>
				Senha: <br/>
				<input type="password" name="password" id="txtPassword"/><br/>

				<input type="submit" value="Entrar" name="btnEntrar" id="btnEntrar" />
			</form>

		</div>
	</div>
</div>



<?php include_once('footer.php'); ?>