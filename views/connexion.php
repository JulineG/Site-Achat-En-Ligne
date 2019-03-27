<!DOCTYPE html>
	<?php 
		require_once "../controllers/menu.controller.php";
		$pagetitle="Connexion"; 
		require_once "../includes/header.inc.php"; 
		require_once "../includes/menu.inc.php";
	?> 
	
			<div class="col-md-8"> 
				<h2>Indentification Client</h2> 
				<p>Merci d'entrer votre identifiant et votre mot de passe pour accéder à votre espace client. Si vous n'avez pas de compte client vous pouvez en créer un gratuitement ici <a href="enregistrement.php"><b>Enregistrement</b></a>.</p> 
				<?php if(isset($erreur)){ ?>
						<div class="alert alert-info" role="alert">
							<?php echo $erreur; ?>
						</div>
				<?php } ?>
				<?php if(isset($_SESSION['inscrit']) && $_SESSION['inscrit']){ ?>
						<div class="alert alert-info" role="alert">
							Bravo vous êtes inscrit !
							<?php $_SESSION['inscrit']=false; ?>
						</div>
				<?php } ?>
				<form action="../controllers/connexion.controller.php" method="post">
				<table class="connexion" >
					<tr>
						<td class="connexion"><label for="login">Nom d'utilisateur :</label></td>
						<td class="connexion"><input class="form-control" type="text" name="login" size="20" required /></td>
					</tr>
					<tr>
						<td class="connexion"><label for="mdp">Mot de passe :</label></td>
						<td class="connexion"><input class="form-control" type="password" name="mdp" size="20" required /></td>
					</tr>
					<tr>
						<td class="connexion"><input class="btn btn-default" type="submit" value="Connexion" /></td>
						<td class="connexion"><input class="btn btn-default" type="reset" value="Annuler" /></td>
					</tr>
				</table>	
			</form>
				
				
				<p><i>L'ensemble de ce site est ISIWeb4Shop 2017-2018</i></p>
			</div> 
		</div>
	</div>
	</body>
</html>