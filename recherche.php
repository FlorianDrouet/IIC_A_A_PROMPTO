<?php 
$title = 'Recherche'; 
require 'include/header.php';

// Module de note
require 'modules/notation/notation.php'; 
?>	
<div id="fh5co-car" class="fh5co-section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
				<h3>Resulat de votre recherche</h3>
				<input type="text" name="profession" value="coiffeur">
				<input type="text" name="profession" value="Paris">
				<input type="text" name="profession" value="22/01/2016">
				<button type="submit">Rechercher</button>
			</div>
		</div>
		<div class="row row-bottom-padded-md">
			<?php for($i = 0; $i < 6; $i++) : ?> 
			<div class="col-md-6 animate-box">
				<div class="car">
					<div class="one-4">
						<img src="images/car-4.jpg" height="150" width="150" class="img-circle">
						 <h4 style="padding-left: 30px">Avis :  <?php 
						 afficherNote($i+1); ?></h4>
					</div>
					<div class="one-1" style="background-image: url(images/car-5.jpg);">
					<div class="col-md-offset-2" style="padding-top: 1cm">
					<label style="color: white">NOM : </label><br>
					<label style="color: white">Prenom : </label><br>
					<label style="color: white">Description : </label><br>
					<a class="btn btn-primary btn-outline" href="#">Demander un devis <i class="icon-arrow-right22"></i></a>
					<a class="btn btn-primary btn-outline" href="#">Contacter <i class="icon-arrow-right22"></i></a>
					</div>
					</div>
				</div>
			</div>
		<?php endfor; ?>					
		</div>
	</div>
</div>
<?php require 'include/footer.php'; ?>