<?php
include('header.php');
?>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Troc'n Go vous souhaite la bienvenue !</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="research.php" method="GET">
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





<?php
    require_once ('footer.php');
?>
