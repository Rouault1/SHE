<?php error_reporting(-1); ?>
<!DOCTYPE html>
<?php include("inc/header.php"); ?>
        
    <body class="blogbody">
        <h1 class="titreblog">BLOG SHE</h1>
        <div class="dernierbillet">
        <p><strong>DERNIERS BILLETS :</strong></p>
    </div>
 
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

// On récupère les 5 derniers billets
$req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{

?>
<div class="news">
    <h3>
        <?php echo $donnees['titre']; ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>

<?php include("inc/footer.php"); ?>

</body>
</html>