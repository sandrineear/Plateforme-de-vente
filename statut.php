<?php
    include("include/header_ven.php");
	
    $cmdid = $_GET["cmdid"];
    if (!isset($_GET["cmdid"])) {
        echo "<p>Erreur<p>\n";
    }else {
        require('db_config.php');

        $SQL = "SELECT * FROM commande WHERE cmdid=?";
        $st = $db->prepare($SQL);
        $st->execute(array($cmdid));

        if ($st->rowCount() ==0) {
            echo "<p>Erreur dans cmdid</p>\n";
        } else if (!isset($_POST['statut'])){
            include("statut_form.php");
        } else {
            $statut = $_POST['statut'];
            if ($statut == " ") {
                include("statut_form.php");
            }else{
                $SQL = "UPDATE commande SET statut=? WHERE cmdid=? ";
                $st = $db->prepare($SQL);
                $res = $st->execute(array($statut,$cmdid));
                if (!$res){ 
?>
					<div class="alert alert-danger" role="alert" style ="text-align:center">
						Erreur de changement de statut
					</div>
<?php
                } else {
?>
					<div class="alert alert-success" role="alert" style ="text-align:center">
						Statut de la commande modifiée
					</div>
<?php
					if($statut == "acceptee"){
						$donnees = $db->prepare('SELECT SUM(commande.qte) AS sum , commande.pid, produits.qte FROM commande INNER JOIN 
						produits ON commande.pid = produits.pid WHERE cmdid = ? GROUP BY commande.pid ');
						$donnees->execute(array($cmdid));

						foreach ($donnees as $value){ 
							$pid = $value['pid'];
							$qte = $value['qte'];
							$sum = $value['sum'];
							$stock = $qte - $sum ; 
							$qte = $stock;
							
							$SQL = "UPDATE produits SET qte =? WHERE pid=? ";
							$maj = $db->prepare($SQL);
							$maj = $maj->execute(array($qte, $pid));
						}
					}
				}
            }
        }  
    }

	$db=null;
	echo"<a href = 'listecommande.php'>Retour</a>";
	require('include/footer.php');
?>