
<!DOCTYPE HTML>
	<?php 
		require_once "../controllers/menu.controller.php";
		require_once "../controllers/categories.controller.php";
		$pagetitle="Catégories"; 
		require_once "../includes/header.inc.php"; 
		require_once "../includes/menu.inc.php";
	?> 
			<div class="col-md-8"> 
					<?php for($i=0; $i<count($tabNom);$i++)
					{ ?>
						<div class="row">
							<div class="col-md-3" >
								<img id="produits" src='../productimages/<?= $tabImage[$i] ?>' alt='Image produit'/>
							</div>
							<div class="col-md-3 produits" >
								<p id="nomProduit"><b><?= $tabNom[$i] ?></b></p>
								<p><?= $tabDescription[$i] ?></p>
								<p>Prix: <?= $tabPrix[$i] ?>€</p>
							</div>
							<div class="col-md-3" >
								<input id="qty" class="form-group" type="number" min="0" value="1">
							</div>
							<div class="col-md-3" >
								<button class="btn btn-info btnBuy" id="produits" role="button" data-id="<?= $tabId[$i] ?>">Acheter</button>
							</div>
						</div>
						<?php
					}?>
				<form id="formAdd" action="../controllers/panier.controller.php" method="POST">
					<input id="inputId" type="hidden" name="idProduit">
					<input id="inputQty" type="hidden" name="qty">
				</form>
				<p><i>L'ensemble de ce site est ISIWeb4Shop 2017-2018</i></p>
			</div> 
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../javascript/categories.js" type="text/javascript"></script>
	</body>
</html>
		
	
