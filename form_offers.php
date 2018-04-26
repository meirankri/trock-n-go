<?php
require_once ('header.php');
require_once 'connect.php';

?>

  <div class="col-md-10 col-lg-8 col-xl-7 mx-auto text">
   <form class="form-offers" action="confirm_offer.php" method="post" class="m-5 col-6" enctype="multipart/form-data">
     <div class="form-group">
       <h1 class="text-center">Je poste une annonce</h1>
       <label for="firstname">Prénom: &nbsp; </label>
       <input  class="form-control" type="text" name="firstname" placeholder="Entrez votre prénom" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrez votre prénom'" required>
       <label for="lastname">Nom:&nbsp; </label>
       <input class="form-control" type="text" name="lastname" placeholder="Entrez votre nom" value="" onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Entrez votre nom'" required >
       <label for="localisation"></label>
       <button type="button" class="btn btn-lg btn-block" onclick="getLocation()">Géolocalise toi</button>
       <input class="form-control geo" type="text" name="lat" id="latitude" readonly>
       <input class="form-control geo" type="text" name="lng" id="longitude" readonly>
       <label for="address">Votre adresse: &nbsp; </label>
       <input class="form-control" type="text" name="address" placeholder="Entrez votre adresse"  value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrez votre adresse'" required>
       <label for="city">Votre ville: &nbsp; </label>
       <input class="form-control" type="text" name="city" placeholder="Votre ville" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre ville'" required>
       <label for="zipcode">Code postal: &nbsp;</label>
       <input class="form-control" type="number" name="zipcode" placeholder=" Entrez votre code postal" onfocus="this.placeholder = ''" value="" onblur="this.placeholder = 'Entrez votre code postal'" required>
       <label for="email">Email</label>
       <input class="form-control" type="text" name="email" placeholder="Entrez votre email" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrez votre email'"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
       <label for="title">Titre de l'annonce: &nbsp;</label>
       <input class="form-control" type="text" name="title" placeholder="Entrez le titre de votre annonce" value="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrez le titre de votre annonce'" required>
       <label for="description">Description de l'annonce: &nbsp; </label>
       <textarea  class="form-control"  name="description"  rows="6" cols="50" maxlength="300"  placeholder="Entrez la description de votre annonce" value="" onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Entrez la description de votre annonce'" required ></textarea>
       <label for="photo">Envoyez une Photo:  &nbsp;</label>
       <input class="form-control" type="file" name="photo" >
       <div class="form-group">
         <label for="category">Categorie: &nbsp; </label>
         <select class="form-control" name="category" >
           <option>Véhicule</option>
           <option selected>Informatique</option>
           <option>Bureatique</option>
           <option>Vêtements</option>
           <option>Meubles</option>
           <option>Jouets</option>
           <option>Figurines</option>
           <option>Timbres</option>
           <option>Autre</option>
         </select>
       </div>
       <div class="form-group">
         <div>Type d'offre</div>
         <label for="type">Don</label>
         <input type="radio" name="type" value="don">
         <label for="type">Echange</label>
         <input type="radio" name="type" value="echange" checked>
       </div>
       <div class="col-6 col-md-3">
         <button type="submit" name="button" value="Search" class="btn btn-block btn-lg">Envoyez</button>
       </div>
     </div>
   </form>
 </div>

<?php
require_once ('footer.php');
?>
