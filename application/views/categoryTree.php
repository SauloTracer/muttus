<?php 
	function tree($categories, $baseurl) {
		foreach ($categories as $category) {
			$id = $category["categoria"]->ID_categoria;
			$sub = $category["SubCategoria"];

			echo "<li>";
			echo "<a href='" . $baseurl . "/index.php/CategoriaController/exibirCategoria/" . $id . "' target='content'>" . $category["categoria"]->texto . "<br/><img src='" . base_url() . "uploads/" . $category["categoria"]->imagem . "' width='100' height='100'/></a><br/>";
			if(count($sub) > 0) echo "<div class='fold icon-folder-close' style='cursor:pointer;'>&nbsp;</div>";

			if(count($sub) > 0) {
				echo "<ul class='menu' style='display:none;'>";
					tree($sub, $baseurl); 
				echo "</ul>";
			}
			echo "</li>";
		}
	} 
?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
    	<div class="well">
		  	<ul id="categorias" class="menu">
				<?php tree($categorias, $baseurl); ?>
			</ul>
		</div>
    </div>
    <div class="span9">
    	<div class="well" style="height:auto">
	      <iframe id="categoryContent" name="content" href="#" style="border:none;width:100%;height:100%;"></iframe>
	    </div>
    </div>
  </div>
</div>