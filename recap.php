<?php
	session_start(); 
    require ('db_config.php'); 
    require ('include/header_ach.php');
?>

<p class = "titre">Récapitulatif de votre panier</p>
<p><a href="panier.php">Retourner au panier</a></p>
<div class ="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
            <table class = "table">
                <thead>
                    <tr>
                        <th>Article(s)</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Prix total</th>
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
                        <td><?php echo $value;?></td>
                        <td><?php echo $prix.'€'; ?></td>
                        <td><?php echo $prix_total.'€'; ?></td>
                    </tr>
<?php
    }
?>
                </tbody>
                <tr>
					<td></td><td></td>
                    <td>Total de votre panier</td>
                    <td><?php echo $total.'€'; ?> </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<form action="commander.php" method="get">
    <input type="submit" class="btn btn-secondary btn-lg" name="commander" value="Commander" />
</form>
<?php 
	$db=null;
	require ('include/footer.php'); 
?>
