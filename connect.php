<?php
if($dbconnect = new mysqli('localhost', 'root', 'root', 'troc_go'))
{
    // Si la connexion a réussi, rien ne se passe.

}
else // Mais si elle rate…
{
    echo 'Erreur'; // On affiche un message d'erreur.
}
mysqli_set_charset($dbconnect, "utf8")
?>
