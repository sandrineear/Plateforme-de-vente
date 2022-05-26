<?php
    require('db_config.php');

	$SQL = 'SELECT SUM(commande.qte) AS sum , commande.pid, produits.qte FROM commande INNER JOIN 
	produits ON commande.pid = produits.pid WHERE statut = \'acceptee\' GROUP BY commande.pid ';
    $res = $db->prepare($SQL);
    $res->execute();

	foreach ($res as $value){ 
		$pid = $value['pid'];
		$qte = $value['qte']; 
		$sum = $value['sum'];
		$stock = $qte - $sum ;
		$qte = $stock;
		
		$SQL = "UPDATE produits SET qte =? WHERE pid=? ";
		$st = $db->prepare($SQL);
		$res = $st->execute(array($qte, $pid));
	}
	$db=null;
?>

