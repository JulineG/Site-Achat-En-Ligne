<!DOCTYPE html>
	<?php 
		session_start();
		require_once '../controllers/menu.controller.php';
		$pagetitle="Accueil"; 
		require_once "../includes/header.inc.php"; 
		require_once "../includes/menu.inc.php";
	?> 
			<div class="col-md-8"> 
				<h2>Merci <?= $_SESSION['infoCommande']['firstname'] ?> pour votre commande !</h2> 
				<p> Vous recevrez un email de confirmation de votre commande.</p> 
				<p> Merci d'envoyer le chèque d'un montant de <?= $_SESSION['totalCommande'] ?>€ à l'adresse suivante 10 rue de la Ouille Blanche 38000 Grenoble et à l'ordre de ISIWeb4Shop.</p>
				<p> Vous pouvez consulter votre facture <a href="../controllers/facture.controller.php">ici</a></p> 
				
			<form id="retourForm" method="POST" action="../controllers/confirmation.controller.php">
				<button type="submit" class="btn btn-default">Retour à l'accueil</button>
			</form>
			<p><i>L'ensemble de ce site est ISIWeb4Shop 2017-2018</i></p>
			</div> 
			
		</div>
	</div>
	</body>
</html>