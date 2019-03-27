<!DOCTYPE html>
	<?php 
		require_once "../controllers/menu.controller.php";
		$pagetitle="Panier"; 
		require_once "../includes/header.inc.php"; 
		require_once "../includes/menu.inc.php";
	?> 
	<div class="col-md-8"> 
		<h2>Informations de livraison</h2>
		<form class="form-horizontal" method='POST' action="../controllers/infos.controller.php">
			<?php if(isset($_SESSION['customer_id'])){ ?>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="prenom">Prenom*:</label>
				<div class="col-sm-10">
				  <input name="prenom" type="text" class="form-control" id="prenom" value="<?= $infoCustomer['firstname'] ?>" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="Nom">Nom*:</label>
				<div class="col-sm-10">
				  <input name="nom" type="text" class="form-control" id="Nom" value="<?= $infoCustomer['surname'] ?>" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2 adresse" for="adresse">Adresse*:</label>
				<div class="col-sm-10 radio">
					<label for="adresse1"><input name="adresse" type="radio" id="adresse1" value="<?= $infoCustomer['add1'] ?>" checked><?= $infoCustomer['add1'] ?></label>
				</div>
				<div class="col-sm-10 radio">
					<label for="adresse2"><input name="adresse" type="radio" id="adresse2" value="<?= $infoCustomer['add2'] ?>" ><?= $infoCustomer['add2'] ?></label>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="ville">Ville*:</label>
				<div class="col-sm-10">
				  <input name="ville" type="text" class="form-control" id="ville" value="<?= $infoCustomer['city'] ?>" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="codePostal">Code postal*:</label>
				<div class="col-sm-10">
				  <input name="codePostal" type="text" class="form-control" id="codePostal" value="<?= $infoCustomer['postcode'] ?>" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Email*:</label>
				<div class="col-sm-10">
				  <input name="email" type="email" class="form-control" id="email" value="<?= $infoCustomer['email'] ?>" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="telephone">Numéro de téléphone*:</label>
				<div class="col-sm-10">
				  <input name="telephone" type="tel" class="form-control" id="telephone" value="<?= $infoCustomer['phone'] ?>" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="paiement">Moyen de paiement*:</label>
				<div class="col-sm-10 radio">
				  <label for="paiementCheque"><input name="paiement" type="radio" id="paiementCheque" value="cheque" checked>Chèque</label>
				</div>
				<div class="col-sm-10 radio">
					<label for="paiementPaypal"><input name="paiement" type="radio" id="paiementPayPal" value="paypal">Paypal</label>
				</div>
			  </div>
			  <div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Paiement</button>
				</div>
			  </div>
			<?php } else{ ?>
			<div class="form-group">
				<label class="control-label col-sm-2" for="prenom">Prenom*:</label>
				<div class="col-sm-10">
				  <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Prénom" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="Nom">Nom*:</label>
				<div class="col-sm-10">
				  <input name="nom" type="text" class="form-control" id="Nom" placeholder="Nom" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="adresse">Adresse*:</label>
				<div class="col-sm-10">
				  <input name="adresse" type="text" class="form-control" id="adresse" placeholder="Rue,numéro,étage,..." required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="adresse2">Complément d'adresse:</label>
				<div class="col-sm-10">
				  <input name="adresse2" type="text" class="form-control" id="adresse2" placeholder="Code porte,nom société,...">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="ville">Ville*:</label>
				<div class="col-sm-10">
				  <input name="ville" type="text" class="form-control" id="ville" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="codePostal">Code postal*:</label>
				<div class="col-sm-10">
				  <input name="codePostal" type="text" class="form-control" id="codePostal" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Email*:</label>
				<div class="col-sm-10">
				  <input name="email" type="email" class="form-control" id="email" placeholder="Entrer email" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="telephone">Numéro de téléphone*:</label>
				<div class="col-sm-10">
				  <input name="telephone" type="tel" class="form-control" id="telephone" required>
				</div>
			  </div>
			   <div class="form-group">
				<label class="control-label col-sm-2" for="paiement">Moyen de paiement*:</label>
				<div class="col-sm-10 radio">
				  <label for="paiementCheque"><input name="paiement" type="radio" id="paiementCheque" value="cheque" checked>Chèque</label>
				</div>
				<div class="col-sm-10 radio">
					<label for="paiementPaypal"><input name="paiement" type="radio" id="paiementPayPal" value="paypal">Paypal</label>
				</div>
			  </div>
			  <div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Paiement</button>
				</div>
			  </div>
			<?php } ?>
			</form> 
		<p><i>L'ensemble de ce site est ISIWeb4Shop 2017-2018</i></p>
	</div>

</body>
</html>