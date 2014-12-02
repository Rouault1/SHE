<?php
//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
$titre = "Index du forum";
include("includes/identifiants.php");
include("includes/debut.php");
include("includes/menu.php");

<?php
echo'<i>Vous êtes ici : </i><a href ="./index.php">Index du forum</a>';
?>
<h1>Mon super forum</h1>

<?php
//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;
?>