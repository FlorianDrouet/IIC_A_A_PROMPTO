<?php 
if(isset($_POST) && isset($_POST['submit_contact']))
{
	if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['message']) && !empty($_POST['message']))
	{
		// Envoie de l'email
		$message_contact = "Le mail a bien été envoyé";
	}
	else
		$message_contact = "Veuillez remplir tous les champs";
}
?>
<section id="Contact">
	<div id="fh5co-contact" class="fh5co-section-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
					<h3>Contact Information</h3>
				</div>
			</div>
			<?php if(isset($message_contact)) : ?>
				<div class="row">
					<p><?= $message_contact; ?></p>
				</div>
			<?php endif; ?>
			<form action="" method="post">
				<div class="row animate-box">
					<div class="col-md-6">
						<h3 class="section-title">Our Address</h3>
						<ul class="contact-info">
							<li><i class="icon-location-pin"></i>chemin des rouliers Reims 51100</li>
							<li><i class="icon-phone2"></i>+ 1235 2355 98</li>
							<li><i class="icon-mail"></i><a href="#">info@yoursite.com</a></li>
							<li><i class="icon-globe2"></i><a href="#">www.yoursite.com</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="nom" placeholder="Votre nom">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="email" placeholder="Votre email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="" class="form-control" id="" cols="30" rows="7" name="message" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" name="submit_contact" value="Nous contacter" class="btn btn-primary">
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>    
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10418.982232280818!2d4.0623987!3d49.2433131!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4daff33cc88dd9fd!2sUniversit%C3%A9+de+Reims+Champagne-Ardenne+UFR+Sciences+Exactes+et+Naturelles!5e0!3m2!1sfr!2sfr!4v1480321874760" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>