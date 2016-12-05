<?php
$title = "Contacter un service";
require 'include/header.php';
if(!isset($user))
	header('location : index.php');
?>
<div id="fh5co-car" class="fh5co-section-gray">
	<div class="container">
		<form method="POST" action="message_traitement.php?professionnel=<?= $_GET['professionnel']; ?>">
			<label class="control-label">Message:</label>
			<textarea name="message" id="message" cols="40" rows="3" class="form-control" placeholder="Entrer le Message"></textarea>			
			<center><input type="submit" value="Envoyer" class="btn btn-primary" /></center>		
		</form>
	</div>
</div>
<?php require 'include/footer.php'; ?>