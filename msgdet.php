<?php
if(!isset($_GET["pseudo"]))
{
	header('location : index.php');
	exit;
}

$title = "Conversation";
require 'include/header.php';

$k = $user['mail'];		
//on recupere les message entre le membre connecter et le personne qui a envoyer le message 
$resultat = $bdd->prepare("select * from message where (pseudo='".$_GET["pseudo"]."' or pseudo='$k' ) AND (destinataire='$k' or  destinataire='".$_GET["pseudo"]. "') ORDER BY `message`.`id_message` DESC");
$resultat->execute();
?>
<div id="fh5co-car" class="fh5co-section-gray">
	<div class="container">
		<h2><?= $_GET["pseudo"]; ?></h2>
		<?php 
		// on affiche que 8 dernier message 	
		while($message = $resultat->fetch(PDO::FETCH_ASSOC)) :
			// on veut recuperer le nom de l'utilisateur
			$res_nom = $bdd->prepare("select nom from membre where mail='".$message["pseudo"] ."' ");
			$res_nom->execute();
			?>
			<table>
				<tr>
				<?php while($res_nom2=$res_nom->fetch(PDO::FETCH_ASSOC)) : ?>				
					<td><b><?= $res_nom2["nom"]; ?></b></td>
				<?php endwhile; ?>
				</tr>
				<tr>
					<td><?= $message["message"]; ?></td>
				</tr>
			</table>
		<?php endwhile;?>
		<form action="re_envoyer.php?destination=<?= $_GET["pseudo"]; ?>" method="post" class="form-inline">
			<center>
				<table border="0" class="table table-bordered table-hover">
			        <tr>
						<input type="hidden" id="pseudo" name="pseudo" value="'.$k.'"/></td>
					</tr>
					<tr>
			        	<td><label for="message">Message</label> :  <textarea  name="message" id="message" cols="40" rows="3" class="form-control" placeholder="Entrer le Message" /></textarea></td>
					</tr>		
					<tr>
						<td>
			       	 		<center><input type="submit" value="Envoyer" class="btn btn-primary" /><center>
			       	 	</td>
					</tr>
				</table>
			</center>
	    </form>		  
	</div>
</div>
<?php require 'include/footer.php'; ?>