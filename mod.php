<?php
    include("include/header_ven.php");
	
    $pid = $_GET["pid"];
    if (!isset($_GET["pid"])) {
        echo "<p>Erreur<p>\n";
    }else {
        require('db_config.php');

        $SQL = "SELECT * FROM produits WHERE pid=?";
        $st = $db->prepare($SQL);
        $st->execute(array($pid));

        if ($st->rowCount() ==0) {
            echo "<p>Erreur dans pid</p>\n";
        } else if (!isset($_POST['nom']) || !isset($_POST['description']) ||!isset($_POST['qte']) || !isset($_POST['prix'])){
            include("mod_form.php");
        } else {
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $qte = $_POST['qte'];
            $prix = $_POST['prix'];
            if ($nom == " " || $description == " " || !is_numeric($qte) || !$qte>0 || !is_numeric($prix) || !$prix>0) {
                include("mod_form.php");
            }else{

                $SQL = "UPDATE produits SET nom=?, description=?, qte=?, prix=? WHERE pid=? ";
                $st = $db->prepare($SQL);
                $res = $st->execute(array($nom, $description, $qte, $prix, $pid));
                if (!$res){ 
?>
					<div class="alert alert-danger" role="alert" style ="text-align:center">
						Erreur de modification
					</div>
<?php
                } else {
?>
					<div class="alert alert-success" role="alert" style ="text-align:center">
						La modification a été effectuée avec succès
					</div>
<?php
				}
            }
        }
    }
	$db=null;
	echo"<a href = 'pagevendeur.php'>Retour</a>";
	require('include/footer.php');
?>