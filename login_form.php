<?php 
    include("include/header.php");
    echo "<p class=\"error\">".($error??"")."</p>";
?>

<div class="centrer">
    <div class = "container">
        <div class ="row"> 
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <p class ="titre"> Connexion </p>
                <form method="post">

                    <label for="inputNom" class="control-label">Login</label>
                    <input type="text" name="login" size="20" class="form-control" id="inputLogin" required placeholder="Login"
                           required value="<?= $data['login']??"" ?>">

                    <label for="inputPassword" class="control-label">Password</label>
                    <input type="password" name="password" size="20" class="form-control" required id="inputMDP"
                           placeholder="Password">

                    <br/><br/>
                    <div class = "form-group">
                        <button type="submit">Se connecter</button>
                        <span class="pull-center"><a href="<?= $pathFor['adduser'] ?>">S'enregistrer</a></span>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php

include("include/footer.php");