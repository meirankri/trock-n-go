<?php require_once 'connect_truc-go.php';
$firstName= htmlspecialchars($_POST['firstname']);
$lastName = htmlspecialchars($_POST['lastname']);
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
if (empty($title && $address && $city && $zipCode && $email )) {
  echo "Vous avez des champs non rempli";
  header('Refresh:5; url=http://localhost/trukngo/form_offers.php');
  exit();
}

//test si il n'y a pas de photo le nom de la photo est $photoName
if (empty($photo)) {
  $photoName = "pasPhoto.png";
  $photo = $photoName;
  }

/* test query insert sans prepare*/
$reqPrepare = mysqli_prepare($dbconnect, 'insert into offers (firstname,lastname,address,city,zipcode,email,title,description,photo,category,type) values(?,?,?,?,?,?,?,?,?,?,?)');
if ($reqPrepare) {
  $pre = 1;
}else {
  $pre = 0;
}
if(mysqli_stmt_bind_param($reqPrepare, "ssssissssss", $firstName,$lastName,$address,$city,$zipCode,$email,$title,$description,$photo,$categorie,$type)){
	$par = 1;
}else{
	$par = 0;
}
//execute la requete prepare
if(mysqli_stmt_execute($reqPrepare)){
	$exec = 1;
}else{
	$exec = 0;
}
if(mysqli_insert_id($dbconnect)){
	$lastId = mysqli_insert_id($dbconnect);
	$lid = 1;
}else{
	$lid = 0;
}



/*envoie de fichier avec upload dans un repertoire, en utilisant le derniere id entré comme nom*/
$photo = $_FILES['photo']['name'];
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

if ($pre = 1 && $par = 1 && $exec = 1 && $li = 1 && $pho = 1) {
  // affichage de message de confirmation
  echo "merci d'avoir posté cette annonce";
}
