<?php 
session_start();
include_once "../includes/setup.inc.php";

if((filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') && filter_input(INPUT_POST, 'idProduitSup')){
	$idProduitSup = filter_input(INPUT_POST, 'idProduitSup');
	$query="DELETE FROM orderitems WHERE product_id=$idProduitSup;";
	$result = mysqli_query($cnxDb, $query);
	unset($_SESSION['panier'][array_search($idProduitSup, array_column($_SESSION['panier'], 'product_id'))]);
}
if (isset($_SESSION['customer_id'])) {
		$customerId=$_SESSION['customer_id'];
		$query="SELECT * FROM orders WHERE customer_id='".$customerId."' AND status < 2;";
		$result = mysqli_query($cnxDb, $query);
		$order=mysqli_fetch_assoc($result);
		if($order){
			$_SESSION['SESS_ORDERNUM']=$order;
			$orderId=$order['id'];
			$query2="SELECT oi.order_id,oi.product_id,SUM(oi.quantity) as qty, p.name,p.description, p.image, p.price FROM orderitems oi, products p WHERE p.id=oi.product_id AND oi.order_id=$orderId GROUP BY oi.product_id;";
			$result2 = mysqli_query($cnxDb, $query2);
			$key=0;
			while($r=mysqli_fetch_array($result2)){
				$_SESSION['panier'][$key]['product_id'] = $r['product_id'];
				$_SESSION['panier'][$key]['name']=$r['name'];
				$_SESSION['panier'][$key]['description']=$r['description'];
				$_SESSION['panier'][$key]['image']=$r['image'];
				$_SESSION['panier'][$key]['price']=$r['price'];
				$_SESSION['panier'][$key]['quantite']=$r['qty'];
				$_SESSION['panier'][$key]['total']=$r['qty']*$r['price'];
				$key++;
			}
		}
}

if((filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') && filter_input(INPUT_POST, 'idProduit'))  {
	$idProduit = filter_input(INPUT_POST, 'idProduit');
	$qty = filter_input(INPUT_POST, 'qty');
	if (isset($_SESSION['customer_id']) && !isset($order)) {
		$session='0';
		$registered = '0';
		$date = 'NOW()';
		$total = '0';
		$status = '0';
		$query1="INSERT INTO orders(customer_id,registered,date,status,session,total) VALUES ($customerId, $registered, $date, $status, $session, $total);";
		$result1 = mysqli_query($cnxDb, $query1);
		$query2="SELECT id FROM orders ORDER BY id DESC LIMIT 0,1;";
		$result2 = mysqli_query($cnxDb, $query2);
		$order=mysqli_fetch_assoc($result2);
		$_SESSION['SESS_ORDERNUM']=$order;
		
	} elseif (isset($_SESSION['SESS_ORDERNUM']) && !isset($_SESSION['customer_id'])) {
		$sess_order_Id=session_id();
		$query="SELECT * FROM orders WHERE session='".$sess_order_Id."';";
		$result = mysqli_query($cnxDb, $query);
		$order=mysqli_fetch_assoc($result);
		if (!$order || $order['status'] >= 2) {
			$session=session_id();
			$id_customer='0';
			$registered = '0';
			$date = 'NOW()';
			$total = '0';
			$status = '0';
			$query1="INSERT INTO orders(customer_id,registered,date,status,session,total) VALUES ($id_customer, $registered, $date, $status, '$session', $total);";
			$result1 = mysqli_query($cnxDb, $query1);
			$query2="SELECT id FROM orders ORDER BY id DESC LIMIT 0,1;";
			$result2 = mysqli_query($cnxDb, $query2);
			$order=mysqli_fetch_assoc($result2);
			$_SESSION['SESS_ORDERNUM']=$order;	
		} 
	}elseif (!isset($_SESSION['SESS_ORDERNUM']) && !isset($_SESSION['customer_id'])) {
		$session=session_id();
		$id_customer='0';
		$registered = '0';
		$date = 'NOW()';
		$total = '0';
		$status = '0';
		$query1="INSERT INTO orders(customer_id,registered,date,status,session,total) VALUES ($id_customer, $registered, $date, $status, '$session', $total);";
		$result1 = mysqli_query($cnxDb, $query1);
		$query2="SELECT id FROM orders ORDER BY id DESC LIMIT 0,1;";
		$result2 = mysqli_query($cnxDb, $query2);
		$order=mysqli_fetch_assoc($result2);
		$_SESSION['SESS_ORDERNUM']=$order;	
	}
	
	if (isset($order) && $qty!=0) {
		$orderId=$order['id'];
		$query3="INSERT INTO orderitems(order_id,product_id,quantity) VALUES ('$orderId', '$idProduit', '$qty');";
		$result3 = mysqli_query($cnxDb, $query3);
		//$query4="SELECT oi.product_id, oi.quantity, oi.id FROM orderitems oi JOIN orders o ON o.id = oi.order_id WHERE order_id = $orderId AND status < 2 ;";
		//$result4=mysqli_query($cnxDb, $query4);
		$query5="SELECT * FROM orderitems ORDER BY id DESC LIMIT 0,1;";
		$result5 = mysqli_query($cnxDb, $query5);
		$lastItem=mysqli_fetch_array($result5);
		
		if((isset($_SESSION['panier'])) && (in_array($idProduit,array_column($_SESSION['panier'], 'product_id')))){
			$keyProduct = array_search($idProduit, array_column($_SESSION['panier'], 'product_id'));
			$_SESSION['panier'][$keyProduct]['quantite']+=$qty;
			$_SESSION['panier'][$keyProduct]['total']=$_SESSION['panier'][$keyProduct]['price']*$_SESSION['panier'][$keyProduct]['quantite'];
		}else {
			if(!isset($_SESSION['panier'])){
				$_SESSION['key']=0;
				$key=$_SESSION['key'];
				$_SESSION['panier'][$key]['product_id'] = $idProduit;
				$query5="SELECT p.name,p.description, p.image, p.price FROM products p, orderitems oi WHERE p.id=oi.product_id AND oi.order_id= $orderId AND p.id= $idProduit;";
				$result5 = mysqli_query($cnxDb, $query5);
				$details=mysqli_fetch_array($result5);
				$_SESSION['panier'][$key]['name']=$details['name'];
				$_SESSION['panier'][$key]['description']=$details['description'];
				$_SESSION['panier'][$key]['image']=$details['image'];
				$_SESSION['panier'][$key]['price']=$details['price'];
				$_SESSION['panier'][$key]['quantite']=$qty;
				$_SESSION['panier'][$key]['total']=$details['price']*$qty;
			} else {
				
				$panier['product_id'] = $idProduit;
				$query5="SELECT p.name,p.description, p.image, p.price FROM products p, orderitems oi WHERE p.id=oi.product_id AND oi.order_id= $orderId AND p.id= $idProduit;";
				$result5 = mysqli_query($cnxDb, $query5);
				$details=mysqli_fetch_array($result5);
				$panier['name']=$details['name'];
				$panier['description']=$details['description'];
				$panier['image']=$details['image'];
				$panier['price']=$details['price'];
				$panier['quantite']=$qty;
				$panier['total']=$details['price']*$qty;
				array_push($_SESSION['panier'],$panier);
			}
			
		}	
	}
	
	
}


require_once '../views/panier.php';

?>



