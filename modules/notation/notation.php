<?php 
function afficherNote($id)
{

	echo '<div class="rating"><!--
	--><a href="modules/notation/ajouterNote.php?note=5&amp;id_service='.$id.'" title="Donner 5 étoiles">☆</a><!-- 
	--><a href="modules/notation/ajouterNote.php?note=4&amp;id_service='.$id.'" title="Donner 4 étoiles">☆</a><!--
	--><a href="modules/notation/ajouterNote.php?note=3&amp;id_service='.$id.'" title="Donner 3 étoiles">☆</a><!--
	--><a href="modules/notation/ajouterNote.php?note=2&amp;id_service='.$id.'" title="Donner 2 étoiles">☆</a><!--
	--><a href="modules/notation/ajouterNote.php?note=1&amp;id_service='.$id.'" title="Donner 1 étoile">☆</a>
	</div>';
}
?>

