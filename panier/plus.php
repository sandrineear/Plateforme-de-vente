<?php
    session_start();
    require ('../db_config.php'); 

    $pid = $_GET['pid'];
    $res = $db -> prepare ('SELECT qte FROM produits WHERE pid = ?');
    $res -> execute (array($pid));
	foreach($res as $value){
		$qte = $value['qte'];
	}

    if ((!empty ($qte)) AND ($_SESSION ['panier'][$pid] < $qte)){
        $_SESSION ['panier'][$pid] ++;
        header('location:../panier.php');
    } else {
        $_SESSION ['stock'] = 'Le stock est insuffisant.';
        header('location:../panier.php');
    }