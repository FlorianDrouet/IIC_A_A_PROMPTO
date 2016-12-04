<?php
require 'include/session.php';

$destinataire = $_GET['professionnel'];
$message = $_POST['message'];
$pseudo = $user['mail'];

// Insertion du message à l'aide d'une requête préparée
try 
{
	$req = $bdd->prepare('INSERT INTO message ( message, pseudo, destinataire) VALUE( :message, :pseudo, :destinataire)');
    $req->bindParam(':message', $message);
    $req->bindParam(':pseudo', $pseudo);
    $req->bindParam(':destinataire', $destinataire);

    $req->execute();
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

// Redirection du visiteur vers la page du minichat
header('Location: msgdet.php?pseudo='.$destinataire.'');
?>