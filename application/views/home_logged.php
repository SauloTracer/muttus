<?php include_once('header.php'); ?>
<?php include_once('menu.php'); ?>

<div class="row">
	<div class="span12">
		<div class="well">
			Olá <?php echo $username; ?>! Seja bem vindo(a)! =D
			<?php 
				if(!empty($avatar)) { 
					echo "<br/><img src='" . "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['CONTEXT_PREFIX'] . "img/$avatar" . "'/>";
				}
			?>
		</div>
	</div>
</div>

<?php include_once('footer.php'); ?>