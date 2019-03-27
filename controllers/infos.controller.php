<?php 
	session_start();
	include_once "../includes/setup.inc.php"; 
	if((filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') && isset($_POST['nom'])) {
		$nom=filter_input(INPUT_POST, 'nom');
		$prenom=filter_input(INPUT_POST, 'prenom');
		$adresse=filter_input(INPUT_POST, 'adresse');
		if(filter_input(INPUT_POST, 'adresse2')){
			$adresse2=filter_input(INPUT_POST, 'adresse2');
		}else {
			$adresse2="";
		}
		$ville=filter_input(INPUT_POST, 'ville');
		$codePost=filter_input(INPUT_POST, 'codePostal');
		$email=filter_input(INPUT_POST, 'email');
		$tel=filter_input(INPUT_POST, 'telephone');
		$query="INSERT INTO delivery_addresses(firstname,lastname,add1,add2,city,postcode,phone,email) VALUES ('$prenom','$nom','$adresse','$adresse2','$ville','$codePost','$tel','$email');";
		echo $query;
		$result = mysqli_query($cnxDb, $query);
		$query2="SELECT * FROM delivery_addresses ORDER BY id DESC LIMIT 0,1;";
		$result2 = mysqli_query($cnxDb, $query2);
		$lastDelivery=mysqli_fetch_assoc($result2);
		$_SESSION['infoCommande']=$lastDelivery;
		$id_lastDelivery=$lastDelivery['id'];
		$lastOrder=$_SESSION['SESS_ORDERNUM'];
		$id_lastOrder=$lastOrder['id'];
		$query3="UPDATE orders SET delivery_add_id=$id_lastDelivery WHERE id=$id_lastOrder;";
		$result3 = mysqli_query($cnxDb, $query3);
		
		if(filter_input(INPUT_POST, 'paiement')== "paypal"){
			header('Location: https://www.paypal.com/');
		} else {
			header('Location: ../views/confirmation.php');
		}
		
	}
	if(isset($_SESSION['customer_id'])){
		$idCustomer=$_SESSION['customer_id'];
		$query="SELECT * FROM customers WHERE id=$idCustomer;";
		$result = mysqli_query($cnxDb, $query);
		$infoCustomer=mysqli_fetch_assoc($result);
	}
	
	require_once '../views/infos.php';