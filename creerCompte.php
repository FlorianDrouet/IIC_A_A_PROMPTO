<?php 
$title = 'Créer un compte';
require 'include/header.php';
?>
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
		<div class="desc">
			<div class="container">
				<div class="row">
					<div class="tabulation animate-box">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Inscription</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="flights">
								<form action="inscription.php" method="POST">
									<div class="row">
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="nom">Nom</label>
												<input type="text" class="form-control" name="nom" id="nom"/>
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="prenom">Prenom</label>
												<input type="text" class="form-control" name="prenom" id="prenom" />
											</div>
										</div>
										<div class="col-sm-12 mt">
											<div class="input-field">
												<label for="email">Email</label>
												<input  type="email" class="form-control" name="email" id="email" />
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="password">Password</label>
												<input type="password" class="form-control" name="pass" id="password"/>
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="password2">Confirmer</label>
												<input type="password" class="form-control"  name="pass_confirm" id="password2" />
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="u">Utilisateur</label>
												<input id="u" type="radio" name="type" value="u" /><br>
					                    		<label for="p">Professionel</label> <input type="radio" name="type" id="p" value="p" /> 
											</div>
										</div>
					                    
										<div class="col-xs-12">
											<input type="submit" name="Incription" class="btn btn-primary btn-block" value="Incription">
										</div>
									</div>
								</form>										
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require 'include/footer.php'; ?>