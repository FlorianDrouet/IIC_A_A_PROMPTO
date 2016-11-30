<?php 


$title = "M1-IIC - Groupe A Prompto";
require 'include/header.php'; 
?>
	<!-- end:header-top -->  
	<div class="fh5co-hero">
		<div class="fh5co-overlay"></div>
		<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
			<div class="desc">
				<div class="container">
					<div class="row">
						<div class="desc2 ">
							<div class="col-sm-8 col-md-7">
								<div class="tabulation">  
									<!-- Tab panes -->                
									<div class="col-sm-12 mt">
										<div class="input-field">
											<input  type="text" class="form-control" id="email" placeholder="Quel service recherchez-vous ?" />
										</div>
									</div>
									<div class="col-sm-12 mt">
										<div class="input-field">
											<input  type="text" class="form-control" id="email" placeholder="ville ou code postal" />
										</div>
									</div>
									<div class="col-sm-12 mt">
										<div class="input-field">
											<div class="form-group">
												<div class='input-group date' id='datetimepicker1'>
													<input type='text' class="form-control" />
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12">
										<input type="submit" class="btn btn-primary"  value="Search">
									</div>
								</div>
							</div>
						</div>
						<?php if(!isset($user)) : ?>
						<div class="col-sm-5 col-md-5">
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
														<INPUT id="u" type="radio" name="type" value="u"><br>
							                    		<label for="p">Professionel</label> <INPUT type="radio" name="type" id="p" value="p"> 
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
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="scroll-down">
		<a class="scrollto" href=""></a>
	</div>
	<?php include 'pages/services.php'; ?>
	<?php include 'pages/bonsPlans.php'; ?>
	<?php include 'pages/clients.php'; ?>
	<?php include 'pages/contact.php'; ?>
<?php require 'include/footer.php'; ?>