<?php 
$title = 'Recherche'; 
require 'include/header.php';

if(isset($_GET['service']))
{
	$service = '%'.$_GET['service'].'%';
	$sql = "SELECT s.* FROM service AS s LEFT JOIN categorie AS c ON c.id_categorie = s.categorie WHERE c.nom_categ LIKE (:service) AND (s.lattitude > :lat -1 AND s.lattitude < :lat +1) AND (s.longitude > :long -1 AND s.longitude < :long +1)";
	$query = $bdd->prepare($sql);
	$query->bindParam(':service', $service, PDO::PARAM_STR);
	$query->bindParam(':lat', $geolocalisation->lat);
	$query->bindParam(':long', $geolocalisation->long);
	$query->execute();
	$recherche = $query->fetchAll();
}

// Module de note
require 'modules/notation/notation.php'; 
?>
<div id="fh5co-car" class="fh5co-section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">				
				<form action="" method="GET">
					<input type="text" name="service" placeholder="Service" id="service_id" onkeyup="autocomplet()">
	                    <ul id="liste_service" class="searchResult"></ul>
					<button type="submit">Rechercher</button>
				</form>
			</div>
		</div>
		<h3>Resulat de votre recherche</h3>
		<div class="row row-bottom-padded-md">
			<?php if(isset($recherche) && $recherche) : ?>
				<?php foreach ($recherche as $rs) : ?>
					<div class="col-md-6 animate-box">
						<div class="car">
							<div class="one-4">
								<img src="images/car-4.jpg" height="150" width="150" class="img-circle">
								 <h4 style="padding-left: 30px">Avis :  <?php afficherNote($rs['id_service'], false); ?></h4>
							</div>
							<div class="one-1" style="background-image: url(images/car-5.jpg);">
								<div class="col-md-offset-2" style="padding-top: 1cm">
									<label style="color: white"><?= $rs['nom']; ?></label><br>							
									<label style="color: white"><?= $rs['region']; ?></label><br>
									<label style="color: white"><?= $geolocalisation->distToStr($geolocalisation->distance($rs['longitude'], $rs['lattitude'])); ?></label><br>								
									<label style="color: white"><?= $rs['description']; ?></label><br>
									
									<a class="btn btn-primary btn-outline" <?= !isset($user) ? 'onclick="alert(\'Veuillez vous connecter.\'); return false;"' : ''; ?> href="client.php">Prendre un rendez-vous <i class="icon-arrow-right22"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<?php if(!isset($_GET) || (isset($_GET) && !isset($_GET['service']))) : ?>
					<p>Veuillez effectuer votre recherche.</p>
				<?php else : ?>
					<p>Votre recherche n'est pas concluante, si vous le souhaitez, vous pouvez nous contacter en cliquant sur ce lien : <a href="index.php#Contact">Nous contacter</a></p>
				<?php endif; ?>
			<?php endif; ?>			
		</div>
	</div>
</div>
<?php require 'include/footer.php'; ?>