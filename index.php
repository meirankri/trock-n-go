<?php
include('header.php');
require_once ('connect.php');
?>

<!-- Masthead -->
<body class="masthead text-white text-center">
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
</body>
<div class="container">
  <div id="carouselExampleControls" class="carousel  carousel-fade" data-ride="carousel" data-interval="2000">
    <div id="slider" class="carousel-inner">
      <?php
      $query = "SELECT * from offers order by id DESC limit 5";
      $resultat = mysqli_query($dbconnect, $query);
      while($donnees = mysqli_fetch_assoc($resultat))
        { ?>
          <div class="carousel-item rechercher montrer" >
            <div class="row">
              <div class="col-md-6 col-xl-6 col-xs-6 col-lg-6 ">
               <img class="img img-fluid" alt="photo_annonce" src="img/<?php echo ($donnees['photo'])?>" onclick="zoom(this)">

             </div>
             <div class="col-md-6 col-xl-6 col-xs-6 col-lg-6 ">
              <img src="img/<?php echo ($donnees['type'])?>.png" class="icon">
              <h1><?php echo ($donnees['title'])?></h1>
              <p ><?php echo ($donnees['description'])?></p>


            </div>
          </div>


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
           <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>

         </a>

       </div>
     </div>







     <?php
     require_once ('footer.php');
     ?>
