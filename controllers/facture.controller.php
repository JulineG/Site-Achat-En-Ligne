<?php
	session_start();

	require('../includes/tfpdf.php');
	$nb=0;
	$panier=array();
	foreach($_SESSION['panier'] as $value){
		$panier[]=$value;
	}
	$total=$_SESSION['totalCommande']; 
	$numCommande=$_SESSION['SESS_ORDERNUM'];
	$num=$numCommande['id'];
	$infos=$_SESSION['infoCommande'];
	$pdf = new TFPDF();
	$pdf->AddPage();
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetMargins(15,15);
	$pdf->Ln(1);
	$pdf->SetFont('DejaVu','',20);
	$pdf->Write(20,'ISIWEB4SHOP');
	$pdf->Ln(20);
	$pdf->SetFont('DejaVu','',10);
	$pdf->Cell(0,5,'10 rue de la Ouille Blanche',0,1);
	$pdf->Cell(0,5,'38000 Grenoble',0,1);
	$pdf->Cell(0,5,'Tel: 0956417632',0,1);
	$pdf->Ln(10);
	$pdf->Rect(145, 50, 55, 40);
	$pdf->MultiCell(0,6,$infos['lastname']." ".$infos['firstname']." \n ".$infos['add1']." \n ".$infos['postcode']." ".$infos['city']." \n Tel: ".$infos['phone']." \n Email: ".$infos['email'],0,'R');
	$pdf->Ln(10);
	$pdf->SetFont('DejaVu','',14);
	$pdf->Write(8,"Facture de la commande N°$num");
	$pdf->Ln(20);
	$pdf->Cell(35,10,'N°Produit',1,0);
	$pdf->Cell(45,10,'Nom',1,0);
	$pdf->Cell(30,10,'Prix (en €)',1,0);
	$pdf->Cell(30,10,'Quantité',1,0);
	$pdf->Cell(30,10,'Total (en €)',1,0);
	foreach($panier as $value){
		$pdf->Ln(10);
		$pdf->SetFont('DejaVu','',10);
		$pdf->Cell(35,10,$value['product_id'],1,0);
		$pdf->Cell(45,10,$value['name'],1,0);
		$pdf->Cell(30,10,$value['price'],1,0);
		$pdf->Cell(30,10,$value['quantite'],1,0);
		$pdf->Cell(30,10,$value['total'],1,0);
	}
	$pdf->SetFont('DejaVu','',14);
	$pdf->Ln(15);
	$pdf->Cell(0,10,'Montant total : '.$_SESSION['totalCommande'].'€',0,0,'R');
	$pdf->Output();

?>

