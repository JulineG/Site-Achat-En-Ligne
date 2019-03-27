<!DOCTYPE html>
	<?php 
		require_once "../controllers/menu.controller.php";
		$pagetitle="Enregistrement"; 
		require_once "../includes/header.inc.php"; 
		require_once "../includes/menu.inc.php";
	?> 
	<div class="col-md-8"> 
		<h2>Inscription</h2>
		<form class="form-horizontal" method='POST' action="../controllers/enregistrement.controller.php">
			<div class="form-group">
			<label class="control-label col-sm-2" for="prenom">Login*:</label>
			<div class="col-sm-10">
			  <input name="login" type="text" class="form-control" id="login" placeholder="Login" required>
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="mdp">Mot de passe*:</label>
			<div class="col-sm-10">
			  <input name="mdp" type="password" class="form-control" id="mdp" required>
			</div>
		  </div>
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
			<label class="control-label col-sm-2" for="adresse2">Adresse 2 :</label>
			<div class="col-sm-10">
			  <input name="adresse2" type="text" class="form-control" id="adresse2" placeholder="Rue,numéro,étage,...">
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
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default">S'inscrire</button>
			</div>
		  </div>
		</form> 
		<p><i>L'ensemble de ce site est ISIWeb4Shop 2017-2018</i></p>
	</div>

</body>
</html>