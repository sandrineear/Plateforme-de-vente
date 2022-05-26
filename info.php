<?php
	require ('db_config.php');
	require ('auth/EtreAuthentifie.php');
	
	if($idm->getRole() == "acheteur"){
		require ('include/header_ach.php');
	} else {
		require ('include/header_ven.php');
	}
	
	$login = $idm->getIdentity();
    $res = $db -> prepare ('SELECT * FROM users WHERE login =?');
    $res->execute(array($login));
?>
	
<p class = "titre"> Mon profil </p>
<center>
	<p>
		<img src="img/user.jpg"/>
	</p>
	<p>
<?php
	foreach ($res as $value){
		$uid = $value ['uid'];
		$nom = $value ['nom'];
		$prenom = $value ['prenom'];
		$login = $value ['login'];
		$role = $value ['role'];
?>
		<td>Utilisateur ID : <?php echo $uid ;?></td><br/>
		<td>Nom : <?php echo htmlspecialchars ($nom) ;?></td><br/>
		<td>Prénom : <?php echo htmlspecialchars ($prenom) ;?></td><br/>
		<td>Login : <?php echo htmlspecialchars ($login) ;?></td><br/>
		<td>Rôle : <?php echo htmlspecialchars ($role) ;?></td><br/>
<?php 
	}
?>
	</p>
</center>
<?php
	$db=null;
	require ('include/footer.php'); 
?>