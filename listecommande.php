<?php
    require('db_config.php');
	require('auth/EtreAuthentifie.php');
	
	$id = $idm->getUid();
	$res = $db->prepare('SELECT cmdid, commande.uid, commande.qte, prix, date, statut, nom FROM commande INNER JOIN produits ON commande.pid = produits.pid 
	WHERE produits.uid ='.$id.' ORDER BY cmdid');
	$res->execute(['id'=>$id]);
    require ('include/header_ven.php');
?>

<p class = "titre"> Liste des commandes </p>
<div class ="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
            <table class = "table">
                <thead>
                    <tr>
						<th>Commande ID</th>
                        <th>Client</th>
						<th>Article</th>
                        <th>Quantité</th>
						<th>Prix unitaire</th>
						<th>Prix total</th>
                        <th>Date</th>
                        <th>Statut des commandes</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach ($res as $value){
						$uid = $value ['uid'];
						$nom = $value ['nom'];
                        $cmdid = $value ['cmdid'];
                        $qte = $value['qte'];
                        $date = $value ['date'];
                        $statut = $value ['statut'];
						$prix = $value ['prix'];
						$prix_total = $prix*$qte;
?>
                        <tr>
                            <td><?php echo $cmdid ;?></td>
							<td><?php echo $uid ;?></td>
							<td><?php echo htmlspecialchars ($nom) ;?></td>
                            <td><?php echo $qte ;?></td>
							<td><?php echo $prix.' €' ;?></td>
							<td><?php echo $prix_total.' €' ;?></td>
                            <td><?php echo $date ;?></td>
                            <td><?php echo htmlspecialchars ($statut) ;?></td>
<?php
                       if($statut == "en_cours"){
?>
								<td>
									<a href="statut.php?cmdid=<?php echo $cmdid; ?>">Modifier la statut</a>
								</td>
                        </tr>
<?php
						}
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