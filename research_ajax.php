<?php
require_once ('connect.php');

$recherche= $_GET['recherche'];
$query = "SELECT * FROM offers WHERE (title like '%$recherche%') or (description like '%$recherche%') ORDER BY id DESC";
$resultat = mysqli_query($dbconnect, $query);
$numberRows = mysqli_num_rows($resultat);
if ( $numberRows === 0){ ?>
<div class="rechercher">
	<p>Il n'y a aucun resultat correspondant au votre recherche </p>
</div>
<?php
}	else if (empty($recherche)){ ?>
<div class="rechercher">
	<p>Votre recherche est vide </p>
</div>


<?php
} else { ?>
<p><?php echo $numberRows?> resultat correspondent a votre recherche : <?php echo $recherche ?></p>
<?php while($donnees = mysqli_fetch_assoc($resultat))
{ ?>
	<div class="rechercher montrer <?php echo ($donnees['type'])?>">
		 <div class="row">
              <div class="col-md-6 col-xl-6 col-xs-6 col-lg-6 ">
               <img class="img img-fluid" alt="photo_annonce" src="img/<?php echo ($donnees['photo'])?>" width="300px" height="200px" onclick="zoom(this)">

             </div>
			<div class="col-md-6 col-xl-6 col-xs-6 col-lg-6">
				  <img src="img/<?php echo ($donnees['type'])?>.png" width="30px" height="30px">
				<h1><?php echo ($donnees['title'])?></h1>
				<p><?php echo ($donnees['description'])?></p>


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


}
require_once ('footer.php');
?>
