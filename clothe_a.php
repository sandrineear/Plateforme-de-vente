<?php 
	require ('db_config.php'); 

    $res = $db -> prepare ('SELECT * FROM produits WHERE ctid = 2');
    $res->execute();
    require ('include/header_ach.php');

    if(isset($_GET['q']) AND !empty($_GET['q'])){
        $q = htmlspecialchars($_GET['q']);
        $res = $db->prepare('SELECT * FROM produits WHERE nom LIKE "%'.$q.'%" AND ctid = 2');
        $res->execute();
    }
?>

<p class = "titre"> Vêtements </p>
<div class ="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
            <table class = "table">
                <thead>
                    <tr>
                        <th>Vendeur</th>
                        <th>Produit</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Panier</th>
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach ($res as $value){
                        $uid = $value ['uid'];
                        $nom = $value ['nom'];
                        $description = $value ['description'];
                        $prix = $value ['prix'];
                        $pid = $value ['pid'];
                        $qte = $value ['qte'];
?>
                        <tr>
                            <td><?php echo $uid ;?></td>
                            <td><?php echo htmlspecialchars ($nom) ;?></td>
                            <td><?php echo htmlspecialchars ($description) ;?></td>
                            <td><?php echo $prix.' €'; ?></td>
<?php
                        if ($qte > 0){ 
?>
							<td>
								<form action="panier.php" method="post">
									<p><input type="submit" class="btn btn-secondary btn-md" name="<?php echo $pid; ?>" value="Ajouter au panier"/></p>
								</form>
							</td>
						
<?php						
						} else {	

?>
							<td>
							<div class="alert alert-danger" role="alert" style ="text-align:center;">
								En rupture de stock
							</div>
							</td>
<?php
						}
?>
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