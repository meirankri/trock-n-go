<?php
require_once ('header.php');
require_once 'connect.php';

 ?>

 <header class="masthead text-white">
  <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
     <form class="form-offers" action="confirm_offer.php" method="post" class="m-5 col-6" enctype="multipart/form-data">
       <div class="form-group">
         <h1 class="text-center">Je poste une annonce</h1>
         <label for="firstname">Prénom</label>
         <input class="form-control" type="text" name="firstname" placeholder="Entrez votre prénom" value="">
         <label for="lastname">Nom</label>
         <input class="form-control" type="text" name="lastname" placeholder="Entrez votre nom" value="">
         <label for="address">Votre adresse</label>
         <input class="form-control" type="text" name="address" placeholder="Entrez votre adresse"  value="">
         <label for="city">Votre ville</label>
         <input class="form-control" type="text" name="city" placeholder="Votre ville" value="">
         <label for="zipcode">Code postale</label>
         <input class="form-control" type="number" name="zipcode" placeholder="Entrez votre code postal" value=>
         <label for="email">Email</label>
         <input class="form-control" type="text" name="email" placeholder="Entrez votre email" value="">
         <label for="title">Titre de l'annonce</label>
         <input class="form-control" type="text" name="title" placeholder="Entrez le titre de l'annonce" value="">
         <label for="description">Description de l'annonce</label>
         <input class="form-control" type="text" name="description" placeholder="Entrez la description de l'annonce" value="">
         <label for="photo">Envoyez une Photo</label>
         <input class="form-control" type="file" name="photo">
         <div class="form-group">
           <label for="category">Categorie</label>
           <select class="form-control" name="category" >
             <option>Véhicule</option>
             <option selected>Informatique</option>
             <option>Bureatique</option>
             <option>Vêtements</option>
             <option>Meubles</option>
             <option>Jouets</option>
             <option>Figurines</option>
             <option>imbres</option>
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
  </header>
    <?php
    require_once ('footer.php');
    ?>
