<?php
require_once ('header.php');
require_once 'connect.php';

$firstName= htmlspecialchars($_POST['firstname']);
$lastName = htmlspecialchars($_POST['lastname']);
$lat = htmlspecialchars($_POST['lat']);
$lng = htmlspecialchars($_POST['lng']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$zipCode = htmlspecialchars($_POST['zipcode']);
$email = htmlspecialchars($_POST['email']);
$title = htmlspecialchars($_POST['title']);
$description = htmlspecialchars($_POST['description']);
$photo = htmlspecialchars($_FILES['photo']['name']);
$categorie = htmlspecialchars($_POST['category']);
$type = htmlspecialchars($_POST['type']);

//condition si aucune valeur n'est entrez on revient au formulaire
if (empty($title && $email )) {?>
  <div class="rechercher montrer">
    <p>Certain champs non pas été rempli</p>
  </div>
  <?php
  header('Refresh:5; url=form_offers.php');
  exit();
}
if ( $address && $city && $zipCode ===null || $lat && $lng===null ) {?>
  <div class="rechercher montrer">
    <p>Veuillez entrez une addresse ou vous géolocalisez</p>
  </div>
  <?php
  header('Refresh:5; url=form_offers.php');
  exit();
}

//test si il n'y a pas de photo le nom de la photo est $photoName
if (empty($photo)) {
  $photoName = "pasPhoto.png";
  $photo = $photoName;
  }

/* test query insert sans prepare*/
$reqPrepare = mysqli_prepare($dbconnect, 'insert into offers (firstname,lastname,lat,lng,address,city,zipcode,email,title,description,photo,category,type) values(?,?,?,?,?,?,?,?,?,?,?,?,?)');
if ($reqPrepare) {
  $pre = 1;
  echo "prepare passe";
}else {
  $pre = 0;
  echo "prepare passe pas";
}
if(mysqli_stmt_bind_param($reqPrepare, "ssddssissssss", $firstName,$lastName,$lat,$lng,$address,$city,$zipCode,$email,$title,$description,$photo,$categorie,$type)){
	$par = 1;
}else{
	$par = 0;
}
//execute la requete prepare
if(mysqli_stmt_execute($reqPrepare)){
	$exec = 1;
}else{
	$exec = 0;
  echo "execute passe pas";
}
if(mysqli_insert_id($dbconnect)){
	$lastId = mysqli_insert_id($dbconnect);
	$lid = 1;
}else{
	$lid = 0;
}



/*envoie de fichier avec upload dans un repertoire, en utilisant le derniere id entré comme nom*/

$tmpName = $_FILES['photo']['tmp_name'];
$bonne_extension =array('jpg','jpeg','gif','png');
$extensionFiles = strtolower(substr(strrchr($photo, '.'), 1));
if (in_array($extensionFiles, $bonne_extension)) {
	$photoPath = "img/{$lastId}.{$extensionFiles}";
	$envoie = move_uploaded_file($tmpName, $photoPath);
  $photoName = $lastId.".".$extensionFiles;

}

$sql = "UPDATE offers SET photo='$photoName' WHERE id=$lastId";
if (mysqli_query($dbconnect,$sql)){
  $pho = 1;
}

$result = mysqli_query($dbconnect, "SELECT * from offers where id= $lastId");
$numRow = mysqli_num_rows($result);
if ($numRow === 1) {


 while($donnees = mysqli_fetch_assoc($result))
	{ ?>
		<div class="rechercher montrer">
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

	<?php }}
  else {?>
    <div class="rechercher montrer">
      <p>la requete n'est pas passé</p>
    </div>
    <?php
  }




require_once ('footer.php');
 ?>
