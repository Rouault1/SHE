<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog SHE</title>
	<link href="style_site_she.css" rel="stylesheet" /> 
    </head>
        
    <body>
<?php
include("inc/header_eng.php");
?>
<div class="intro">
        <h1>SHE Blog</h1>

        <p>Here are the latest posts:</p>
 
<?php
// Connexion à la base de données
try
{
	$db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les 10 derniers billets
$req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 10');

while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu'])); //convertit les retours à la ligne en balise html <br/>
    ?>
    <br />
    <em><a href="commentairesanglais.php?billet=<?php echo $donnees['id']; ?>">Comments:</a></em>
    </p>
</div>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
<?php include("inc/footer_eng.php"); ?>
</body>
</html>