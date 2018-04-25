<?php
require_once ('header.php');
require_once ('connect.php');

?>
<header class="masthead text-white text-center">
<div class="new-search rechercher">

<div class="form-row">
	<div class="col-12 col-md-9 mb-2 mb-md-0">
		<input type="text" id="recherche" class="form-control form-control-lg" placeholder="Que recherchez vous ?">
	</div>
		<div class="col-12 col-md-3">
		<button type="submit" id="search" value="Search" class="btn btn-block btn-lg">Rechercher</button>
	</div>
</div>
</div>
<div id=new></div>

</div>
<div id="content">



<?php
if (isset($_POST['recherche'])) {
	$recherche= $_POST['recherche'];
}
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
	<?php while ($donnees = mysqli_fetch_assoc($resultat)){
 ?>
		<div class="rechercher montrer">
			<img src="img/<?php echo ($donnees['type'])?>">
			<h1><?php echo ($donnees['title'])?></h1>
			<p><?php echo ($donnees['description'])?></p>
        	<img class="photo-annonce" alt="photo_annonce" src="img/<?php echo ($donnees['photo'])?>" onclick="zoom(this)">
			<button class="toggleMore">Contacter</button>
			<div class="cacher">
			<h2><?php echo ($donnees['firstname'])?></h2>
			<p><?php echo ($donnees['address'])?></p>
			<p><?php echo ($donnees['city'])?></p>
			<p><?php echo ($donnees['email'])?></p>
		</div>
		</div>
		</header>
	<?php }
	mysqli_free_result($resultat);


}
require_once ('footer.php');
?>
</div>
