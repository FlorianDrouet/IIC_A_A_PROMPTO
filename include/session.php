<?php
require('db.php');

session_start();
if(isset($_SESSION) && isset($_SESSION['user']))
{
	list($mail, $mdp) = explode('###___###', $_SESSION['user']);

	try
	{
		$req = $bdd->prepare('SELECT * FROM membre WHERE mail=:email AND passe=:mdp');
	    $req->bindParam(':email', $mail);
	    $req->bindParam(':mdp', $mdp);
	    $req->execute();
	    $user = $req->fetch(PDO::FETCH_ASSOC);
	}
	catch(Exception $e)
	{
		die('Erreur session : '.$e->getMessage());
	}
}


require 'modules/geolocalisation/geolocalisation.php';
$geolocalisation->getPosition();
?>