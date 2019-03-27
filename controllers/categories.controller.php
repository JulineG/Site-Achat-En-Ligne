<?php 
	session_start();
	if(isset($_GET["categ"])){
		$idCateg = $_GET["categ"];
		$query="SELECT p.id, p.name,p.description, p.image, p.price FROM products p, categories c WHERE c.id=p.cat_id AND c.id = $idCateg";
		$result = mysqli_query($cnxDb, $query);
		$tabNom = array();
		$tabDescription =array();
		$tabImage= array();
		$tabPrix= array();
		while($r = mysqli_fetch_array($result)){ //On organise dans des tableaux les informations de chaque produit de la catégorie choisi lors du clique à la page sélection
			$tabId[]= $r['id'];
			$tabNom[]= $r['name'];
			$tabDescription[] =$r['description'];
			$tabImage[]=$r['image'];
			$tabPrix[]=$r['price'];
		}
	}
?>