<?php
    include("include/header.php");
?>
<p class="error"><?= $error??""?></p>
<div class="centrer">
    <div class="container">
        <div class ="row" > 
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <p class ="titre">Inscription</p>
                <form method="post">
                    <table>

                        <label for="inputNom" class="control-label">Nom</label>
                        <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom" required value="<?= $data['nom']??""?>">

                        <label for="inputPrenom" class="control-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom" required aria-required="true" value="<?= $data['prenom']??""?>">

                        <label for="inputLogin" class="control-label">Login</label>
                        <input type="text" name="login" class="form-control" id="inputLogin" placeholder="Login" required value="<?= $data['login']??""?>">

                        <label for="inputMDP" class="control-label">MDP</label>
                        <input type="password" name="mdp" class="form-control" id="inputMDP" placeholder="Mot de passe" required value="">

                        <label for="inputMDP2" class="control-label">Répéter MDP</label>
                        <input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="Répéter le mot de passe" required value="">

						<label for="inputNom" class="control-label">Rôle</label></br>
						<input type="radio" name="role" checked="checked" value="acheteur"/> Acheteur </br>
						<input type="radio" name="role" value="vendeur"/> Vendeur

                    </table>
                    <br/>
                    <div class="form-group">
                        <button type="submit">S'enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

include("include/footer.php");
