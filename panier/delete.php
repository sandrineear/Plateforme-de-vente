<?php
    session_start();
	
	$pid = $_GET['pid'];
    if ((isset ($_GET['pid'])) AND (count($_SESSION['panier']) >= 1)){ 
        unset ($_SESSION ['panier'][$pid]);
        header('location:../panier.php');
    }