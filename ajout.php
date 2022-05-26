<?php
    include("include/header_ven.php");
	require('auth/EtreAuthentifie.php');
	
    if (!isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['qte']) || !isset($_POST['prix']) || !isset($_POST['ctid'])) {
        include("ajout_form.php");
    } else {
        $nom = $_POST['nom'];
        $description= $_POST['description'];
        $qte= $_POST['qte'];
        $prix= $_POST['prix'];
		$uid = $idm->getUid();
        $ctid= $_POST['ctid'];

        if ($nom =="" || $description =="" || !is_numeric($qte) || !$qte>0 || 
			!is_numeric($prix) || !$prix>0 || !is_numeric($ctid) || !$ctid>0 ) {
            include("ajout_form.php"); 
        }else {    

            require("db_config.php");
            $SQL = "INSERT INTO produits VALUES (DEFAULT,?,?,?,?,?,?)";
            $st = $db->prepare($SQL);
            $res = $st->execute(array($nom, $description, $qte, $prix, $uid, $ctid));
            if (!$res) {
?>
				<div class="alert alert-danger" role="alert" style ="text-align:center">
					Erreur d'ajout
				</div>
<?php
                echo "<a href='pagevendeur.php'>Retour</a>";
            }else{ 
?>
				<div class="alert alert-success" role="alert" style ="text-align:center">
					L'ajout a été effectué
				</div>
<?php
                $db=null;
            }
        }
    }
	$db=null;
    echo "<a href='pagevendeur.php'>Retour</a>";
    include("include/footer.php");
?>