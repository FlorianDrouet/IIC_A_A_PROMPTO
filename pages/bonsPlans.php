<section id="BonPlan">
	<div id="fh5co-tours" class="fh5co-section-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
					<h3>Bon Plans</h3>
				</div>
			</div>
			<div class="row">
				<?php for($i = 0; $i < 3; $i++) : ?>
				<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
					<div href="#"><img src="images/place-<?= $i+1; ?>.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
						<div class="desc">
							<span></span>
							<h3>Coiffeur</h3>
							<span>bala bala balabala </span>
							<span class="price">$1,000</span>
							<a class="btn btn-primary btn-outline" href="#">Devis <i class="icon-arrow-right22"></i></a>
						</div>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</div>
</section>