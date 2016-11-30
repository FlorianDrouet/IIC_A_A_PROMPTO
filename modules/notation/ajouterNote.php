<?php
require '../../include/db.php';

if(isset($_GET) && isset($_GET["note"]) && isset($_GET['id_service']))
{
	$note = $_GET["note"];
	$id = $_GET["id_service"];

	if($note >= 0 && $note <= 5 && $id >= 0)
	{
		try
		{
			$req = $bdd->prepare('INSERT INTO note (note, id_service) VALUE (:note, :id_service)');
			$req->bindParam(':note', $note);
			$req->bindParam(':id_service', $id);
			$req->execute();
		}
		catch(Exception $e)
		{
			die('Erreur notation : '.$e->getMessage());
		}		
	}		
}
header('Location:'.$_SERVER['HTTP_REFERER']);
?> 