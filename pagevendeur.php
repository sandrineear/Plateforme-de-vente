<?php 
	require('db_config.php');
	require('auth/EtreAuthentifie.php');
	
	$id = $idm->getUid();
    $res = $db -> prepare ('SELECT * FROM produits WHERE uid ='.$id.'');
    $res->execute(['id'=>$id]);
    require ('include/header_ven.php');

    if(isset($_GET['q']) AND !empty($_GET['q'])){
        $q = htmlspecialchars($_GET['q']);
        $res = $db->prepare('SELECT * FROM produits WHERE nom LIKE "%'.$q.'%" AND uid ='.$id.'');
        $res->execute(['id'=>$id]);
    }
?>

<p class = "titre"> Mes produits </p>
<div class ="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
            <table class = "table">
                <thead>
                    <tr>
                        <th>PID</th>
                        <th>Produit</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Prix</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach ($res as $value){
                        $pid = $value ['pid'];
                        $nom = $value ['nom'];
                        $description = $value ['description'];
                        $prix = $value ['prix'];
                        $qte = $value ['qte'];
?>
                        <tr>
                            <td><?php echo $pid ;?></td>
                            <td><?php echo htmlspecialchars ($nom) ;?></td>
                            <td><?php echo htmlspecialchars ($description) ;?></td>
                            <td><?php echo $qte ;?></td>
                            <td><?php echo $prix.' €'; ?></td>
                            <td><a href="mod.php?pid=<?php echo $pid; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            <td><a href="sup.php?pid=<?php echo $pid; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
<?php
                    } 
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="ajout.php"><span class="glyphicon glyphicon-plus"></span> Ajouter un produit </a>
<?php 
	$db=null;
	require ('include/footer.php'); 
?>