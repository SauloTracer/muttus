<?php include_once('header.php'); ?>

<div class="container">
	<div class="row" style="background-color: #83B999; ">
		<div class="span4">
			<img src="<?php echo base_url() . "img/avatar.png" ?>">
		</div>
		<div class="span8">
		<br/>
			<span class="topicText">Login</span>
			<hr width="90%">

			<?php echo validation_errors(); ?>

			<?php echo form_open('LoginController/checkLogin'); ?>
				<input type="text" name="username" id="txtUsername" placeholder="Usuário" class="bigInput" /><br/>
				<input type="password" name="password" id="txtPassword" placeholder="Senha" class="bigInput" /><br/>
				<div style="align:center;">
					<input type="submit" value="Enviar" name="btnEntrar" id="btnEntrar" class="button bigInput" />
				</div>
			</form>

		</div>
	</div>
</div>