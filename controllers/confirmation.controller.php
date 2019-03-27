<?php 
		session_start();
		include_once "../includes/setup.inc.php";
		$numCommande=$_SESSION['SESS_ORDERNUM']['id'];
		$query="UPDATE orders SET status='2' WHERE id=$numCommande;";
		echo $query;
		$result = mysqli_query($cnxDb, $query);
		$_SESSION['SESS_ORDERNUM']=null;
		$_SESSION['infoCommande']=null;
		$_SESSION['panier']=null;

		require_once '../views/accueil.php';
?>