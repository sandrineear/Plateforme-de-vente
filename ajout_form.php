<div class="centrer">
    <div class = "container">
        <div class ="row"> 
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
                <p class="titre">Ajouter un produit</p>
                <form action="" method="post">
                    <table>

                        <label for="inputNom" class="control-label">Nom</label>
                        <input type="text" name="nom" size="20" class="form-control" placeholder="Nom"/>
                    
                        <label for="inputDescription" class="control-label">Description</label>
                        <input type="text" name="description" size="20" class="form-control" placeholder="Description"/>
              
                        <label for="inputQuantite" class="control-label">Quantité</label>
                        <input type="number" name="qte" size="20" class="form-control" placeholder="Quantité" />
                        
                        <label for="inputPrix" class="control-label">Prix</label>
                        <input type="text" name="prix" size="20" class="form-control" placeholder="Prix" />

						<label for="inputNom" class="control-label">Catégorie</label></br>
						<input type="radio" name="ctid" value="1"/> Alimentaire </br>
						<input type="radio" name="ctid" value="2"/> Vêtements </br>
						<input type="radio" name="ctid" value="3"/> Jouets </br>
                        
                    </table>
                    <input type="submit" class="btn btn-secondary btn-lg" value="Ajouter" style="margin-top:5%;"/>
                </form>
            </div>
        </div>
    </div>
</div>