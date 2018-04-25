<?php
include('header.php');
require_once ('connect.php');
?>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="bvn mb-5">Troc'n Go vous souhaite la bienvenue !</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="research.php" method="POST">
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" name="recherche" class="form-control form-control-lg" placeholder="Que recherchez vous ?">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" value="Search" class="btn btn-block btn-lg">Rechercher</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div id="slider" class="carousel-inner">
          <?php
              $query = "SELECT * from offers order by id DESC limit 5";
              $resultat = mysqli_query($dbconnect, $query);
               while($donnees = mysqli_fetch_assoc($resultat))
              { ?>
                <div class="carousel-item rechercher montrer">
                  <img src="img/<?php echo ($donnees['type'])?>">
                  <h1><?php echo ($donnees['title'])?></h1>
                  <p><?php echo ($donnees['description'])?></p>
                  <img class="img" alt="photo_annonce" src="img/<?php echo ($donnees['photo'])?>">
                  <button class="toggleMore">Contacter</button>
                  <div class="cacher">
                    <h2><?php echo ($donnees['firstname'])?></h2>
                    <p><?php echo ($donnees['address'])?></p>
                    <p><?php echo ($donnees['city'])?></p>
                    <p><?php echo ($donnees['email'])?></p>
                  </div>
                </div>

              <?php }
              mysqli_free_result($resultat);

           ?>
         </div>
       </div>
    </div>




<?php
    require_once ('footer.php');
?>
