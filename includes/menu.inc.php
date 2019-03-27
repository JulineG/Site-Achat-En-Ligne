<div class="container">
		<header class="page-header">
			<h1 class="text-center">ISIWEB4SHOP</h1>
		</header>
		<div class="row"> 
			<div class="col-md-12" id="contour"> 
				<p class="text-center"><a href="../views/index.php">Accueil</a> -
					<a href="../controllers/panier.controller.php">Voir Panier/Payer</a></p> 
			</div> 
		</div>
		<div class="row"> 
			<div class="col-md-2" id="contour" > 
				<h4>NOTRE OFFRE</h4> 
				<ul> 
					<?php foreach ($tabCategorie as $tab)
						{ ?>
						<li><a href='../views/categories.php?categ=<?= $tab['id'] ?>'><?= $tab['name'] ?></a></li> 
						<?php
						}
					?>
				</ul>
				<hr class="trait" width="80%" align=center> 
				<?php 
				if(!isset($_SESSION['customer_id'])){ ?>
							<p><a href='../controllers/connexion.controller.php'>Connexion</a></p>
							<?php
						} else {
							$login= $_SESSION['login']; ?>
							<p>Bonjour <?= $login ?></p>
							<p><a href='../controllers/deconnexion.controller.php'>Déconnexion</a></p>
							<?php
						}
				?>
			</div> 

