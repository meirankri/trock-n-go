<?php
require_once ('header.php');
require_once ('connect.php');
?>
<div class="new-search">
	
		<input type="text" id="recherche" value="">
		<button type="submit" id="search" name="button">Rechercher</button>


</div>
<div id=new></div>

</div>
<div id="content">

<?php
$recherche= $_GET['recherche'];
$query = "SELECT * FROM offers WHERE (title like '%$recherche%') or (description like '%$recherche%') ORDER BY id DESC";
	$resultat = mysqli_query($dbconnect, $query);
	while($donnees = mysqli_fetch_assoc($resultat))
	{ ?>
		<div class="rechercher montrer">
    	<h1><?php echo ($donnees['title'])?></h1>
    	<p><?php echo ($donnees['description'])?></p>
    	<img alt="photo_annonce" src="img/<?php echo ($donnees['photo'])?>">
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
<?php
	require_once ('footer.php');
?>
