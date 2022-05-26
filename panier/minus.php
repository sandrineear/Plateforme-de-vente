<?php
    session_start();

    $pid= $_GET['pid'];
    if ($_SESSION ['panier'][$pid] > 0){
        $_SESSION ['panier'][$pid] --;
        if (($_SESSION ['panier'][$pid] == 0) AND (count($_SESSION['panier']) >= 1)){
            unset ($_SESSION ['panier'][$pid]);
            header('location:../panier.php');
        } 
        header('location:../panier.php');
    } else {
        header('location:../panier.php');
    }
