<?php 
function afficherNote($id, $notable)
{
	global $bdd;
	try
	{
		$req = $bdd->prepare('SELECT * FROM note WHERE id_service = :id');
		$req->bindParam(':id', $id);
		$req->execute();
	}
	catch(Exception $e)
	{
		die('Erreur notation :' . $e->getMessage());
	}	

	$somme = 0;
	$nbNotes = 0;
	while($note = $req->fetch(PDO::FETCH_ASSOC))
	{
		++$nbNotes;
		$somme += $note['note'];
	}
	$moy = $nbNotes == 0 ? 0 : round($somme / $nbNotes);

	echo '<div class="rating '.($notable ? 'notable' : '').'">';
	for($i = 5; $i > $moy; $i--){
		if($notable)
			echo '<!----><a href="modules/notation/ajouterNote.php?note='.$i.'&amp;id_service='.$id.'" title="Donner '.$i.' étoiles">☆</a>';	
		else
			echo '<!----><a>☆</a>';	
	}
	for($i = $moy; $i > 0; $i--)
	{
		if($notable)
			echo '<!----><a class="shine" href="modules/notation/ajouterNote.php?note='.$i.'&amp;id_service='.$id.'" title="Donner '.$i.' étoiles">☆</a>';	
		else
			echo '<!----><a class="shine">☆</a>';
	}

	echo '</div>';
}
?>

