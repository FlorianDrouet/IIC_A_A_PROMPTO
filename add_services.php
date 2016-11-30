<?php 
require 'include/db.php';
require 'include/session.php';

// gestion du formulaire
if (isset($_POST['submit']))
{
	// Tableau d'erreur
	$err = array();

	if(!isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['cat']))	
		$err[] = "Formulaire invalide";
	else
	{
		$nom = htmlspecialchars($_POST['nom']);
		$cat = (int) $_POST['cat'];
		$description = nl2br(htmlspecialchars($_POST['description']));

		if(!count($err))
		{
			// Ajout en bdd
			$req = $bdd->prepare('INSERT INTO `service` (nom, categorie, descrciption) VALUE(:nom, :cat, :description)');
			$req->bindParam(':nom', $nom);
			$req->bindParam(':cat', $cat);
			$req->bindParam(':description', $description);

			$req->execute();

			// Affichage du message 
			$msg = "Le service a bien été ajouté.";
		}		
	}	
}

$title = "Ajouter un service";

require('include/header.php'); ?>
<div id="fh5co-car" class="fh5co-section-gray">
	<div class="container">
		<form class="form-horizontal" method="POST">
			<div class="row">
				<div class="form-group">
					<label for="nom" class="col-sm-2 control-label">Nom du service</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du service">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label for="cat" class="col-sm-2 control-label">Catégorie du service</label>
					<div class="col-sm-10">
						<select class="form-control" name="cat" id="cat">
							<?php $query = 'SELECT * FROM categorie WHERE parent_categ=0';
							$req = $bdd->prepare($query);
							$req->execute();

							while($cur_cat = $req->fetch(PDO::FETCH_ASSOC)) : ?>
								<option value="<?= $cur_cat['id_categorie'];?>" ><?= $cur_cat['nom_categ'];?></option>
									<?php 
									$q = 'SELECT * FROM categorie WHERE parent_categ='.$cur_cat['id_categorie'];
									$r = $bdd->prepare($q);
									$r->execute();
									while($cur_subcat = $r->fetch(PDO::FETCH_ASSOC)) : ?>
										<option value="<?= $cur_subcat['id_categorie'];?>">--<?= $cur_subcat['nom_categ'];?></option>
									<?php endwhile; ?>		
							<?php endwhile; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
						<textarea name="description" class="form-control"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label for="nom" class="col-sm-2 control-label">Localisation</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nom" name="localisation" placeholder="Locatlisation">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="submit" class="btn btn-default">Ajouter le service</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
	<?php if(count($err)) echo implode('<br>', $err); ?>
<?php require('include/footer.php'); ?>