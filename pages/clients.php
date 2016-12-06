<section id="Client">
	<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Happy Clients</h2>
				</div>
			</div>
			<div class="row">
			<?php 
			$req = $bdd->prepare('SELECT c.nom_categ, s.nom, n.commentaire FROM categorie AS c LEFT JOIN service AS s ON s.categorie = c.id_categorie LEFT JOIN note AS n ON n.id_service = s.id_service ORDER BY id_note DESC LIMIT 3');
			$req->execute();

			$i = 0;
			while($res = $req->fetch(PDO::FETCH_ASSOC)) : ++$i; ?>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;<?= reduireText($res['commentaire']); ?>&rdquo;</p>
						</blockquote>
						<p class="author"><?= $res['nom']; ?> <span class="subtext"><?= $res['nom_categ']; ?></span></p>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>