<?php
    include("include/header_ven.php");
	
	$pid = $_GET["pid"];
    if (!isset($_GET["pid"])) {
        echo "<p>Erreur</p>\n";
    }else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"]) ){
        include("sup_form.php");
    }else if (isset($_POST["annuler"])){
?>
		<div class="alert alert-info" role="alert" style ="text-align:center">
			Opération annulée
		</div>
<?php
    }else{
        require ('db_config.php');
        $SQL = "DELETE FROM produits WHERE pid=?";
        $st = $db->prepare($SQL);
        $st->execute([$pid]);
        if ($st->rowCount() ==0){
?>			
			<div class="alert alert-danger" role="alert" style ="text-align:center">
				Erreur de suppression
			</div>
<?php
        } else { 
?>		
			<div class="alert alert-success" role="alert" style ="text-align:center">
				La suppression a été effectuée avec succès
			</div>
<?php 
		}       
    }
	$db=null;
    echo "<a href='pagevendeur.php'>Retour</a>";
    require ('include/footer.php');
?>