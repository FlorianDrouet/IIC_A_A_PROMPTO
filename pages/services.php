<?php

// On récupère les 8 services les plus proches
$query = 'SELECT * FROM service WHERE longitude >= '.($geolocalisation->long-1).' AND longitude <= '.($geolocalisation->long+1).' AND lattitude >= '.($geolocalisation->lat-1).' AND lattitude <= '.($geolocalisation->lat+1);
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
				<div class="col-md-12">
					<ul id="fh5co-destination-list" class="animate-box">
						<?php 
						 foreach($services AS $service): ?>
						<li class="one-forth text-center" style="background-image: url(images/place-<?= $i%9 +1; ?>.jpg); ">
							<a href="recherche.php">
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