<!DOCTYPE html>
<html>
<?php include("inc/header.php"); ?>
        
    <body class="commentairebody">
        <p><a href="index.php">Retour à la liste des billets</a></p>
<div class="titre_billet_commentaire"> 
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

// Récupération du billet
$req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>


    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>
<div class="commentaire_paragraphe">
<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $db->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
</div>
<?php include("projet_informatique_code/inc/footer.php"); ?>
</body>
</html>