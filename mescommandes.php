<?php
    require('db_config.php');
	require('auth/EtreAuthentifie.php');
	
	$id = $idm->getUid();
    $res = $db->prepare('SELECT cmdid, produits.uid, commande.qte, prix, date, statut, nom FROM commande INNER JOIN produits ON commande.pid = produits.pid WHERE commande.uid ='.$id.' ORDER BY cmdid');
    $res->execute(['id'=>$id]);
    require ('include/header_ach.php');
?>

<p class = "titre"> Mes commandes </p>
<div class ="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
            <table class = "table">
                <thead>
                    <tr>
                        <th>Commande ID</th>
						<th>Vendeur</th>
						<th>Article</th>
                        <th>Quantité</th>
						<th>Prix unitaire</th>
						<th>Prix total</th>
                        <th>Date</th>
                        <th>Statut de votre commande</th>
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach ($res as $value){
						$uid = $value['uid'];
						$nom = $value ['nom'];
                        $cmdid = $value ['cmdid'];
                        $qte = $value['qte'];
                        $date = $value ['date'];
                        $statut = $value ['statut'];
						$prix = $value ['prix'];
						$prix_total = $prix*$qte; 
?>
                        <tr>
                            <th><?php echo $cmdid ;?></th>
							<td><?php echo $uid ;?></td>
							<td><?php echo htmlspecialchars ($nom) ;?></td>
                            <td><?php echo $qte ;?></td>
							<td><?php echo $prix.' €' ;?></td>
							<td><?php echo $prix_total.' €' ;?></td>
                            <td><?php echo $date ;?></td>
                            <td><?php echo htmlspecialchars ($statut) ;?></td>
                        </tr>
<?php
                    }
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php 
	$db=null;
	require ('include/footer.php'); 
?>