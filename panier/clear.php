<?php
    session_start();
	
	unset($_SESSION['panier']);
	header('location:../panier.php');
