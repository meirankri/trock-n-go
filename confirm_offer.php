<?php
  require_once ('header.php');
  require_once 'connect.php';
  $firstName= htmlspecialchars($_POST['firstname']);
  $lastName = htmlspecialchars($_POST['lastname']);
  $lat = htmlspecialchars($_POST['lat']);
  $lng = htmlspecialchars($_POST['lng']);
  $address = htmlspecialchars($_POST['address']);
  $city = htmlspecialchars(strtolower($_POST['city']));
  $zipCode = htmlspecialchars($_POST['zipcode']);
  $email = htmlspecialchars($_POST['email']);
  $title = htmlspecialchars($_POST['title']);
  $description = htmlspecialchars($_POST['description']);
  $photo = htmlspecialchars($_FILES['photo']['name']);
  $categorie = htmlspecialchars($_POST['category']);
  $type = htmlspecialchars($_POST['type']);
//condition si aucune valeur n'est entrez en titre et email on revient au formulaire
  if (empty($title && $email )) {?>
  <div class="rechercher montrer">
    <p>Certain champs n'ont pas été rempli</p>
  </div>
  <?php
  header('Refresh:5; url=form_offers.php');
  exit();
}
//si adresse ville codepostale ou les valeurs gps sont vide, redirection vers le formuaire
if ( $address && $city && $zipCode ===null || $lat && $lng===null ) {?>
<div class="rechercher montrer">
  <p>Veuillez entrez une adresse ou vous géolocalisez</p>
</div>
<?php
header('Refresh:5; url=form_offers.php');
exit();
}
//test si il n'y a pas de photo le nom de la photo est $photoName
/*envoie de fichier avec upload dans un repertoire, en utilisant le derniere id entré comme nom*/

/*  prepare de la requete */
$reqPrepare = mysqli_prepare($dbconnect, 'insert into offers (firstname,lastname,lat,lng,address,city,zipcode,email,title,description,photo,category,type) values(?,?,?,?,?,?,?,?,?,?,?,?,?)');
   //echo "Erreur lors de publication de l'annonce! ";
mysqli_stmt_bind_param($reqPrepare, "ssddssissssss", $firstName,$lastName,$lat,$lng,$address,$city,$zipCode,$email,$title,$description,$photo,$categorie,$type);
//execute la requete prepare
mysqli_stmt_execute($reqPrepare);

if (!isset($photo)) {
  $photoName = "pasPhoto.png";
  $photo = $photoName;
  echo $photo;
 
}else{
  if (mysqli_insert_id($dbconnect)===0) {
    $lastId = $lastName; 
  }else{
     $lastId = mysqli_insert_id($dbconnect);
   
  }

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ){
 
$nom = "img/{$lastId}.{$extension_upload}";
$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$nom);
$photoName = $lastId.".".$extension_upload;
 if ($resultat){ 
  mysqli_query($dbconnect,"UPDATE offers SET photo = '$photoName' WHERE id='$lastId' ");

};



}}
	

/*envoie de fichier avec upload dans un repertoire, en utilisant le derniere id entré comme nom,
qui sera envoyé apres le depot de l'offre de l'utilisateur*/



mysqli_query($dbconnect,"UPDATE offers SET photo = 'pasPhoto.png' WHERE photo='' ");
    
    

$result = mysqli_query($dbconnect, "SELECT * from offers where id= '$lastId'");

if (mysqli_num_rows($result)) {
  $numRow = mysqli_num_rows($result);
  }
  
if ($numRow === 1) {
  while ($donnees = mysqli_fetch_assoc($result)){
  	?>
  	<div class="rechercher montrer <?php echo ($donnees['type'])?> <?php echo ($donnees['city'])?>">
  		<div class="container">


  			 <div class="row">
                <div class="col-md-6 col-xl-6 col-xs-6 col-lg-6 ">
                 <img class=" img img-fluid" alt="photo_annonce" src="img/<?php echo ($donnees['photo'])?>" onclick="zoom(this)">
                    
               </div>
  				<div class="col-md-6 col-xl-6 col-xs-6 col-lg-6 ">
  				  <img  src="img/<?php echo ($donnees['type'])?>.png" class="icon">
  					<h1><?php echo ($donnees['title'])?></h1>
  					<p><?php echo ($donnees['description'])?></p>


  				</div>
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
   <?php }}
   else {?>
   <div class="rechercher montrer">
    <p>la requete n'est pas passé</p>
  </div>
  <?php
  
}
require_once ('footer.php');
?>
