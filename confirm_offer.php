<?php
require_once ('header.php');
require_once 'connect.php';
$firstName= $_POST['firstname'];
$lastName = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$zipCode = $_POST['zipcode'];
$email = $_POST['email'];
$title = $_POST['title'];
$description = $_POST['description'];
$photo = $_POST['photo'];
$categorie = $_POST['category'];
$type = $_POST['type'];


if (empty($photo && $description)) {

  /*header('Location: http://localhost/trukngo/form_offers.php');
  exit();*/
}
/* test query insert sans prepare*/
$reqPrepare = mysqli_prepare($dbconnect, 'insert into offers (firstname,lastname,address,city,zipcode,email,title,description,photo,category,type) values(?,?,?,?,?,?,?,?,?,?,?)');
if ($reqPrepare) {
  echo "passe ";
}else {
  echo "passe pas ";
}
if(mysqli_stmt_bind_param($reqPrepare, "ssssissssss", $firstName,$lastName,$address,$city,$zipCode,$email,$title,$description,$photo,$categorie,$type)){
	echo "bind param passe ";
}else{
	echo "bind param passe  pas ";
}
//execute la requete prepare
if(mysqli_stmt_execute($reqPrepare)){
	echo "execute passe ";
}else{
	echo "execute passe pas";
}

require_once ('header.php');
?>
