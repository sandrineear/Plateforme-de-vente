<?php 
	require ('db_config.php'); 

    $res = $db -> prepare ('SELECT * FROM produits');
    $res->execute();
    require ('include/header.php');

    if(isset($_GET['q']) AND !empty($_GET['q'])){
        $q = htmlspecialchars($_GET['q']);
        $res = $db->prepare('SELECT * FROM produits WHERE nom LIKE "%'.$q.'%" OR uid LIKE "%'.$q.'%" ');
        $res->execute(array($q));
    }
?>

<p class = "titre"> Tous les produits </p>
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
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach ($res as $value){
                        $uid = $value ['uid'];
                        $nom = $value ['nom'];
                        $description = $value ['description'];
                        $prix = $value ['prix'];
?>
                        <tr>
                            <td><?php echo $uid ;?></td>
                            <td><?php echo htmlspecialchars ($nom) ;?></td>
                            <td><?php echo htmlspecialchars ($description) ;?></td>
                            <td><?php echo $prix.' €'; ?></td>
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