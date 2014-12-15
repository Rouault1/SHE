<?php
session_start();
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
  verif("#^.+$#", 'Mot de passe', 'password');
    if(empty($errors))
      {
        // Cryptage du mot de passe
        $form['password'] = sha1($form['password']);
        // Initialisation de l'objet PDO
        try {
            $db = new PDO("mysql:host=localhost;dbname=mydb", "root", "root");
            // Permet d'afficher les erreurs envoyées par SQL
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (Exception $e) {
            die("Erreur:". $e->getMessage());
          }
        // Génération de la requête SQL
        try {
          $req =$db->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
          $req->execute($form);
        } catch (Exception $e) {
          die ("Erreur :" .$e->getMessage());
        }
        // On essaie d'exécuter la requête
        $res = $req->fetch();
          //echo '<pre>';
          //print_r($res);
          //echo '</pre>';
          if (isset($res) && (!empty($res))) {
          $errors['global'] = message('Vous êtes connecté.');
          session_start();
          $_SESSION['id'] = $res[0];
          $_SESSION['prenom'] = $res[1];
          $_SESSION['nom'] = $res[2]; 
          $_SESSION['adresse'] = $res[3];
          $_SESSION['city'] = $res[4];
          $_SESSION['pays'] = $res[5];
          $_SESSION['n_port'] = $res[6];
          $_SESSION['email'] = $res[7];
          $_SESSION['mdp'] = $res[8];
          $_SESSION['code_p'] = $res[9];
          $_SESSION['n_fixe'] = $res[10];
          $_SESSION['genre'] = $res[12];
          $_SESSION['date_naiss'] = $res[13];
          $_SESSION['date_inscr'] = $res[14];
          $_SESSION['region'] = $res[15];

          }   
          elseif(isset($res) && (empty($res))){
              $errors['login'] = message('Mauvais identifiant ou mot de passe.','error');
          }  
      }    
} 
if (!$_SESSION)
  {
  include ('inc/header_inv.php');
  echo '<div id="barre_connect">';
  echo '<form method="post" action="index.php" >
  <legend>Connectez-vous</legend> 
  <input type="text" name="email" id="email" class="connect1" placeholder="Adresse mail" required/>
  <input type="password" name="password" class="connect2" id="password" placeholder="Mot de Passe" required/>
  <input type="submit" value="Connexion" id="connection"/>
</form>
</div>
<div id="lien_inscr">
  <a href="oublie_mdp.php">Mot de passe oublié ?</a>
  <a href="register.php">S\'inscrire</a>';
echo '</div>';
} 
else {
  include ('inc/header.php');
  include('inc/esp_membre.php');
  echo '<div class="msg_bvn">Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</div> ';
  echo '<div class="barre_recherche">';
  echo '<form method="post" action="resultats_recherchem.php">
  <legend>Recherchez une annonce</legend>
  <input type="text" name="recherche" class="recherche" placeholder="Mot-clé" required />
  <input type="submit" value="Rechercher" class="rechercher"/>;';
  echo '</div>';
  echo '<div class="lien_recherche">
      <a href="recherchem.php">Recherche avancée</a>';
  echo '</div>';   
} 
include ('inc/slider.php');     
?>
<?php error('email');
      error('password'); ?>
<?php echo isset($errors['login']) ? $errors['login'] : ''; ?>


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
</div>
<?php include('inc/footer.php'); ?>