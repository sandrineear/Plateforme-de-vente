<?php
    require("auth/EtreAuthentifie.php");
	
	echo "Bonjour " . $idm->getIdentity().". Ton uid est: ". $idm->getUid() .". Ton role est: ".$idm->getRole();

	//echo "Escaped values: ".$e_($ci->idm->getIdentity());
    include("include/footer.php");
