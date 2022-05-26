<?php 
    session_start(); 
    require ('db_config.php'); 
    require ('include/header_ach.php');

	if (!empty ($_POST)){ 
        foreach ($_POST as $key => $value){
            $pid = $key;
        }
        if (isset ($_SESSION ['panier'][$pid])){
            $res = $db -> prepare ('SELECT qte FROM produits WHERE pid = ?');
            $res -> execute (array($pid));
            $row = $res -> fetch();
            $qte = $row['qte'];
			if ((!empty ($qte)) AND ($_SESSION ['panier'][$pid] < $qte)){
				$_SESSION ['panier'][$pid]++;
			}
        } else { 
            $_SESSION ['panier'][$pid] = 1; 
	    }
    } else if (!isset($_SESSION['panier'])){
        $_SESSION ['panier'] = array ();
        echo "Votre panier est vide.";		
    } else if ($_SESSION['panier'] == array()) {
        echo "Votre panier est vide.";		
    }

    if (isset ($_SESSION ['stock'])){
		echo $_SESSION ['stock']; 
        unset ($_SESSION ['stock']);
    }
?>

<p class = "titre">Votre Panier</p>
<p><a href="pageacheteur.php">Continuez vos achats</a></p>
<div class ="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
            <table class = "table table-bordered">
                <thead>
                    <tr>
                        <th>Article(s)</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Prix total</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
<?php 
    $total = 0; 

    foreach ($_SESSION ['panier'] as $key => $value){
        $res = $db -> prepare ('SELECT * FROM produits WHERE pid= ?');
        $res -> execute (array($key));
        $donnees = $res -> fetch();

        $nom = $donnees ['nom'];
        $prix = $donnees ['prix'];
		
        $prix_total = $prix*$value; 
        $total += $prix_total;
?>
                    <tr>
                        <td><?php echo $nom; ?></td>
                        <td>
                            <a href="panier/minus.php?pid=<?php echo $key; ?>"><span class ="glyphicon glyphicon-minus"></span></a>
                            <span><?php echo $value;?></span>
                            <a href="panier/plus.php?pid=<?php echo $key;?>"><span class ="glyphicon glyphicon-plus"></span></a>
                        </td>
                        <td><?php echo $prix.'€'; ?></td>
                        <td><?php echo $prix_total.'€'; ?></td>
                        <td><a href="panier/delete.php?pid=<?php echo $key; ?>"><span class ="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
<?php
    }
?>
                </tbody>
                <tr>
                    <td></td><td></td>
                    <td>TOTAL</td>
                    <td><?php echo $total.'€'; ?> </td>
					<td>
						<form action="panier/clear.php">
							<input type="submit" class="btn btn-secondary btn-md" name="vider" value="Vider le panier" />
						</form>
					</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<form action="recap.php">
    <input type="submit" class="btn btn-secondary btn-lg" name="valider" value="Valider le panier" />
</form>

<?php 
	$db=null;
	require ('include/footer.php'); 
?>
