<?php

function error ($nom) {
  global $errors;
  echo (isset($errors[$nom]) ? $errors[$nom] : '');
}

function message ($message, $type = null) {
    $color = $type === 'error' ? '#ff0000' : '#1E824c';
    return '<div style="font-size:16px;color:' . $color . ';">' . $message . '</div>';
  }

function verif ($motif, $nom, $cle) {
    global $form;
    global $errors;
    $valeur = isset($_POST[$cle]) ? $_POST[$cle] : null;
    if (!empty($valeur)) {
      $valeur = htmlspecialchars($valeur);
      if (preg_match($motif, $valeur)) {
        $form[$cle] = $valeur;
      } else {
        $errors[$cle] = message('Le ' . $nom . ' ' . $valeur . ' n\'est pas valide.', 'error');
      }
    } else {
      $errors[$cle] = message('Le champ ' . $nom . ' doit être rempli.', 'error');
    }
  }

// Contient les données vérifiées du formulaire
$form = array();
// Contient les erreurs du formulaire
$errors = array();

if(!empty($_POST))
{
  // Vérification des données entrées par l'utilisateur
  verif("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", 'Email', 'email');
  error('email');
  verif("#^.+$#", 'Mot de passe', 'password');
  error('password');
    if(empty($errors))
      {
        // Cryptage du mot de passe
        $form['password'] = sha1($form['password']);
        // Initialisation de l'objet PDO
        try {
            $db = new PDO("mysql:host=localhost;dbname=mydb", "root", "root");
            // Permet d'afficher les erreurs envoyées par SQL
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            die("Erreur:". $e->getMessage());
          }
        // Génération de la requête SQL
        $sql='SELECT id_user FROM user WHERE email = :email and password = :password';
        // On essaie d'exécuter la requête
        $req = $db->query($sql);
        $res = $req->fetch();
          if ($res) {
          $errors['global'] = message('Vous êtes connecté.');
          }   
        else {
              message('Mauvais identifiant ou mot de passe.','error');
          }  
      }    
}      

include ('inc/header_inv.php');
include ('inc/slider.php');
?>
<div id="barre_connect">
<form method="post" action="index.php" >
  <legend>Connectez-vous</legend> 
  <input type="text" name="email" id="email" class="connect1" placeholder="Adresse mail" required/>
  <input type="password" name="password" class="connect2" id="password" placeholder="Mot de Passe" required/>
  <input type="submit" value="Connexion" id="connection"/>
</form>
</div>
<div id="lien_inscr">
  <a href="oublie_mdp.php">Mot de passe oublié ?</a>
  <a href="inscription.php">S'inscrire</a>
</div>'
<div id="mosaic">
  <h2 id="titre_mos">Les Mieux Notés</h2>
<table id="mos" border="0" callpadding="0" cellspacing="0">
  <tr>
    <td><a href="#"><img id="mos_img" src="img/Maison1.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison8.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison333.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison8.jpg" width="500px" height="300px"></a></td>
  </tr>
  <tr>
    <td><a href="#"><img id="mos_img" src="img/Maison4.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison5.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison6.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison333.jpg" width="500px" height="300px"></a></td>
  </tr>
  <tr>
    <td><a href="#"><img id="mos_img" src="img/Maison6.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison8.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison8.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maison5.jpg" width="500px" height="300px"></a></td>
  </tr>
</table>
</div>
<?php include('inc/footer.php'); ?>