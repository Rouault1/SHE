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
        $errors[$cle] = message('The ' . $nom . ' ' . $valeur . ' is not valid.', 'error');
      }
    } else {
      $errors[$cle] = message('The ' . $nom . ' field must be completed.', 'error');
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
  verif("#^.+$#", 'Password', 'password');
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
          $errors['global'] = message('You are connected.');
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
              $errors['login'] = message('Wrong login or password.','error');
          }  
      }    
} 
if (!$_SESSION)
  {
  include ('inc/header_inv_eng.php');
  ?><ul class='flags'><li><a href="index.php"><img src="img/drapeaufrancais.png"/></a></li><li><a href="index_eng.php"><img  class="flagb" src="img/flag_en.png"/></a></li></ul>
  <?php echo '<div id="barre_connect">';
  echo '<form method="post" action="index.php" >
  <legend>Connection</legend> 
  <input type="text" name="email" id="email" class="connect1" placeholder="Email" required/>
  <input type="password" name="password" class="connect2" id="password" placeholder="Password" required/>
  <input type="submit" value="Log in" id="connection"/>
</form>
</div>
<div id="lien_inscr">
  <a href="mdp_oublie.php">Forgot you password ?</a>
  <a href="register_eng.php">Suscribe</a>';
echo '</div>';
} 
else {
  include ('inc/header_eng.php');
  include('inc/esp_membre_eng.php');
  ?>
  <?php echo '<div class="msg_bvn">Welcome, '.$_SESSION['prenom'].'</div> ';
  echo '<div class="barre_recherche">';
  echo '<form method="post" action="resultats_recherchem.php">
  <legend>Search for an housing</legend>
  <input type="text" name="recherche" class="recherche" placeholder="Key words" required />
  <input type="submit" value="Search" class="rechercher"/>;';
  echo '</div>';
  echo '<div class="lien_recherche">
      <a href="recherchem.php">Advanced search</a>';
  echo '</div>';   
} 
include ('inc/slider.php');     
?>
<?php error('email');
      error('password'); ?>
<?php echo isset($errors['login']) ? $errors['login'] : ''; ?>


<div id="mosaic">
  <h2 id="titre_mos">Best of housing</h2>
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
<?php include('inc/footer_eng.php'); ?>