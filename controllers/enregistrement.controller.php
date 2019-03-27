<?php 
	session_start();
	include "../includes/setup.inc.php";
	$erreur=null;
	if((filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') && isset($_POST['login'])) {
		$login=filter_input(INPUT_POST, 'login');
		$mdp=filter_input(INPUT_POST, 'mdp');
		$nom=filter_input(INPUT_POST, 'nom');
		$prenom=filter_input(INPUT_POST, 'prenom');
		$adresse=filter_input(INPUT_POST, 'adresse');
		$adresse2=filter_input(INPUT_POST, 'adresse2');
		$ville=filter_input(INPUT_POST, 'ville');
		$codePost=filter_input(INPUT_POST, 'codePostal');
		$email=filter_input(INPUT_POST, 'email');
		$tel=filter_input(INPUT_POST, 'telephone');
		$registered='1';
		$query="INSERT INTO customers(firstname,surname,add1,add2,city,postcode,phone,email,registered) VALUES ('$prenom','$nom','$adresse','$adresse2','$ville','$codePost','$tel','$email','$registered');";
		echo $query;
		$result = mysqli_query($cnxDb, $query);
		$query2="SELECT id FROM customers ORDER BY id DESC LIMIT 0,1;";
		$result2 = mysqli_query($cnxDb, $query2);
		$lastCustomer=mysqli_fetch_assoc($result2);
		$id_lastCustomer=$lastCustomer['id'];
		$query3="INSERT INTO logins(customer_id,username,password) VALUES ('$id_lastCustomer','$login', SHA1('$mdp'));";
		$result2 = mysqli_query($cnxDb, $query3);
		$_SESSION['inscrit']=true;
		header('Location: connexion.controller.php');
		
	}
	
	require_once '../views/enregistrement.php';