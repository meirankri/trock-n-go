<?php
require_once ('header.php');
?>
<?php require_once 'connect.php';

 ?>

     <form  action="confirm_offer.php" method="post" class="m-5">
       <div class="form-group">
         <h1 class="text-center">Je poste une annonce</h1>
         <label for="firstname">Prénom</label>
         <input class="form-control" type="text" name="firstname" placeholder="entrez votre prénom" value="test">
         <label for="lastname">Nom</label>
         <input class="form-control" type="text" name="lastname" placeholder="entrez votre nom" value="test">
         <label for="address">Votre adresse</label>
         <input class="form-control" type="text" name="address" placeholder="entrez votre adresse"  value="test">
         <label for="city">Votre ville</label>
         <input class="form-control" type="text" name="city" placeholder="votre ville" value="test">
         <label for="zipcode">Code postale</label>
         <input class="form-control" type="number" name="zipcode" placeholder="entrez votre code postal" value=93500>
         <label for="email">Email</label>
         <input class="form-control" type="text" name="email" placeholder="entrez votre email" value="test">
         <label for="title">Titre de l'annonce</label>
         <input class="form-control" type="text" name="title" placeholder="entrez le titre de l'annonce" value="test">
         <label for="description">Description de l'annonce</label>
         <input class="form-control" type="text" name="description" placeholder="entrez la description de l'annonce" value="test">
         <label for="photo">Envoyez une Photo</label>
         <input class="form-control" type="text" name="photo">
         <div class="form-group">
           <label for="category">Categorie</label>
           <select class="form-control" name="category" >
             <option>véhicule</option>
             <option selected>informatique</option>
             <option>bureatique</option>
             <option>vêtements</option>
             <option>meubles</option>
             <option>jouets</option>
             <option>figurines</option>
             <option>timbres</option>
           </select>
         </div>
         <div class="form-group">
           <div>Type d'offre</div>
           <label for="type">Don</label>
           <input type="radio" name="type" value="don">
           <label for="type">Echange</label>
           <input type="radio" name="type" value="echange" checked>
         </div>
         <button type="submit" name="button">Envoyez</button>
      </div>
    </form>
    <?php
    require_once ('footer.php');
    ?>
