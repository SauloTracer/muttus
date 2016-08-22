<?php 
	function tree($categories) {
		foreach ($categories as $category) {
			$id = $category["categoria"]->ID_categoria;
			$sub = $category["SubCategoria"];

			echo "<li>
					<a href='" . base_url() . "/index.php/CategoriaController/exibirCategoria/" . $id . "'>" 
					. $category["categoria"]->texto . "<br/>
					<img src='" . base_url() . "uploads/" . $category["categoria"]->imagem . "' width='100' height='100'/></a><br/>";
			if(count($sub) > 0) {
				echo "<div class='fold icon-folder-close' style='cursor:pointer;'>&nbsp;</div>
						<ul class='lista navbar' style='display:none;'>";
				tree($sub); 
				echo "</ul>";
			}
			echo "</li>";
		}
	} 
?>

<div class="left topicText col-md-5" style="clear: both;">
	<ul id="categorias" class="lista navbar">
		<?php tree($categorias); ?>
	</ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$(".fold").css("cursor", "pointerhand");
		$(".fold").click(function (){
			if($(this).hasClass("icon-folder-close")) {
				$(this).removeClass("icon-folder-close");
				$(this).addClass("icon-folder-open");
				$(this).parent().children("ul").show();
				$('html, body').animate({scrollTop: $(this).offset().top}, 1000);
			} else {
				$(this).removeClass("icon-folder-open");
				$(this).addClass("icon-folder-close");
				$(this).parent().children("ul").hide();
				$('html, body').animate({scrollTop: $(this).parent().parent().offset().top}, 1000);
			}
		});
	});
</script>