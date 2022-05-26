<?php
	require ('auth/EtreAuthentifie.php');
    require ('db_config.php'); 
    require ('include/header_ach.php');
	
	
    foreach ($_SESSION ['panier'] as $key => $value){	
		$res = $db -> prepare ('SELECT * FROM produits WHERE produits.pid= ?');
        $res -> execute (array($key));
        $donnees = $res -> fetch();

		$nom = $donnees ['nom']; 
		$pid = $donnees['pid'];
		$uid = $idm->getUid();
		$date = date('Y-m-d H:i:s');

        $st = $db -> prepare ('INSERT INTO commande(cmdid,pid, uid, qte, date, statut) VALUES (DEFAULT,?,?,?,?,\'en_cours\')');
        $st -> execute (array($pid, $uid, $value, $date));
?>
		<p class = "titre"> Ma commande </p>
		<center>
			<td>Pid: <?php echo $pid; ?></td><br/>
			<td>Article(s): <?php echo $nom; ?></td><br/>
			<td>Quantité: <?php echo $value;?></td><br/>
			<td>Uid: <?php echo $uid;?></td><br/>
			<td>Date: <?php echo $date;?></td><br/><br/>
		</center>
<?php
    }     
	if (!$res) {
?>
		<div class="alert alert-danger" role="alert" style ="text-align:center">
			Erreur de commande
		</div>
<?php
	} else { 
?>
		<div class="alert alert-success" role="alert" style ="text-align:center">
			Commande prise en compte
		</div>
<?php
	}
	unset($_SESSION['panier']);
	$db=null;
?>
	<p><a href='mescommandes.php'>Voir mes commandes</a></p>
    <p><a href='pageacheteur.php'>Page principale</a></p>
<?php require ('include/footer.php'); ?>
