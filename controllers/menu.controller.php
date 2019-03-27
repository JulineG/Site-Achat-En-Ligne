<?php
	include "../includes/setup.inc.php";
	
	$query = "SELECT DISTINCT id, name FROM categories;";
	$result = mysqli_query($cnxDb, $query);
	$tabCategorie = array();
	while($r = mysqli_fetch_array($result)){
				$tabCategorie[] = array(
					'id' => $r['id'],
					'name' => $r['name']
				);
	}
	
?> 