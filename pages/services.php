<?php

$maxAngle = 0.25;

// On récupère les 8 services les plus proches
$query = 'SELECT * FROM service WHERE longitude >= '.($geolocalisation->long-$maxAngle).' AND longitude <= '.($geolocalisation->long+$maxAngle).' AND lattitude >= '.($geolocalisation->lat-$maxAngle).' AND lattitude <= '.($geolocalisation->lat+$maxAngle);
$req = $bdd->prepare($query);
$req->execute();

$all_services = array();
$taille = 0;
while($service = $req->fetch(PDO::FETCH_ASSOC))
{
	$distance = $geolocalisation->distance($service['longitude'], $service['lattitude']);
	$data = array_merge($service, array('distance' => $distance));	
	$all_services[''.$distance.''][] = $data;
	++$taille;
}

// On trie par distance
ksort($all_services);

// On limite la taille à 10 max
if($taille > 10)
	$taille = 10;

// On stockera tous les services
$services = array();
$i = 0;
foreach($all_services AS $d => $array)
{
	$j = 0;
	$count = count($array);
	while($i < $taille && $j < $count)
	{
		$services[] = $array[$j];
		++$j;
		++$i;

		if($i >= 10)
			break;
	}
}
?><section id="Nos Offres">  
	<div id="fh5co-destination">
		<div class="tour-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">				
					<form action="recherche.php" method="GET">
						<input type="text" name="service" placeholder="Service" id="service_id" onkeyup="autocomplet()">
		                    <ul id="liste_service" class="searchResult"></ul>
						<button type="submit">Rechercher</button>
					</form>
				</div>						
			</div>	
			<div class="row">
				<div class="col-md-12">
					<ul id="fh5co-destination-list" class="animate-box">
						<?php 
						 foreach($services AS $service): ?>
						<li class="one-forth text-center" style="background-image: url(images/place-<?= $i%9 +1; ?>.jpg); ">
							<a <?= !isset($user) ? 'onclick="alert(\'Veuillez-vous connecter.\'); return false;"' : ''; ?> href="client.php?idService=<?= $service['id_service']; ?>">
								<div class="case-studies-summary">
									<h2><?= $service['nom']; ?></h2>
									<h4><?= $geolocalisation->distToStr($service['distance']); ?></h4>
								</div>
							</a>
						</li>
						<?php endforeach; ?>						
					</ul>   
				</div>
			</div>
		</div>
	</div>
</section>