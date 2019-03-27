<!DOCTYPE html>
	<?php 
		require_once "../controllers/menu.controller.php";
		$pagetitle="Panier"; 
		require_once "../includes/header.inc.php"; 
		require_once "../includes/menu.inc.php";
	?> 
	<div class="col-md-8"> 
		<h2>Votre panier</h2>
		 <?php if (!empty($_SESSION['panier'])) { ?>

				<?php $valueOrder=array();
					$total=0;
					$_SESSION['totalCommande']=0;
					foreach ($_SESSION['panier'] as $valueOrder) {
						$_SESSION['totalCommande'] += $valueOrder['total']; ?>
						<div class="row">
							<div class="col-md-3" >
								<img id='panier'src='../productimages/<?= $valueOrder['image'] ?>' alt='ImageProduit'/>
							</div>
							<div class="col-md-3 infoPanier" >
								<p id="nomProduit"><b><?= $valueOrder['name'] ?></b></p>
								<p><?= $valueOrder['description'] ?></p>
								<p>Prix unitaire : <?= $valueOrder['price'] ?>€</p>
								<p>Quantité : <?= $valueOrder['quantite'] ?></p>
							</div>
							<div class="col-md-3" >
								<p id='panier'>Total : <?= $valueOrder['total'] ?>€</p>
							</div>
							<div class="col-md-3" >
								<button class="btn btn-info btnSup" id="panier" role="button" data-id="<?= $valueOrder['product_id']?>" >Supprimer</button>
							</div>
						</div>
					<?php
				}?>

				<div class="text-right">
						<h4 class="mt-2"> Total de la commande : <span id="totalPrice"><?= $_SESSION['totalCommande'] ?></span>  €</h4>
				</div>
					
				<form id="panierForm" method="POST" action="../controllers/infos.controller.php">
					<button id="checkoutBtn" type="submit" class="btn btn-info">Valider mon panier </button>
				</form>
				<form id="supprimerForm" action="../controllers/panier.controller.php" method="POST">
					<input id="inputId" type="hidden" name="idProduitSup">
				</form>
		<?php } else { ?>
					<div class="alert alert-info" role="alert">
						Votre panier est vide.
					</div>
		<?php } ?>
		<form id="retourForm" method="POST" action="../views/index.php">
			<button type="submit" class="btn btn-default">Continuer vos achats</button>
		</form>
		<p><i>L'ensemble de ce site est ISIWeb4Shop 2017-2018</i></p>
	</div>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../javascript/panier.js" type="text/javascript"></script>
</body>
</html>
		
	