
<?php 
		session_start();
		include "../includes/setup.inc.php";
		
		$erreur=null;
		if (isset($_POST['login']) && isset($_POST['mdp'])){
			$login=$_POST['login'];
			$mdp=sha1($_POST['mdp']);
			$query = "SELECT customer_id,username,password FROM logins WHERE username = '".$login."' AND password= '".$mdp."';";
			$result = mysqli_query($cnxDb, $query);
			$id= mysqli_fetch_assoc($result);
			if(mysqli_num_rows($result)!=0){ //Sauvegarde du login, du mot de passe, du nom et du prénom de l'utilisateur si il appartient à la base de données
				$_SESSION['login'] = $login; 
				$_SESSION['mdp'] = $mdp;
				$_SESSION['customer_id']=$id['customer_id'];
				header("Location: ../views/index.php");
			}else {
				$erreur= "L'utilisateur n'est pas reconnu !";
				require_once '../views/connexion.php';
			}
			
		} else {
			
			require_once '../views/connexion.php';
		}
		
		
?>