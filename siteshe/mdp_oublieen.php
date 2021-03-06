<?php
   session_start();
  			
   function error ($nom) {
  global $errors;
  echo (isset($errors[$nom]) ? $errors[$nom] : '');
}

if(!empty($_POST)) {


  // Contient les données vérifiées du formulaire
  $form = array();
  // Contient les erreurs du formulaire
  $errors = array();

  // Définition de quelques fonctions
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

verif("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", 'Email', 'mail');

if(empty($errors)){
   try {
            $db = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
            // Permet d'afficher les erreurs envoyés par SQL
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } 
          catch (PDOException $e) {
            die("Erreur:". $e->getMessage());
          }
          $req=$db->prepare('SELECT id_user, email, password FROM user WHERE email = :mail');
          try{
            $req->execute($form);
            $res=$req->fetch();

          }
          catch(Exception $e){
              die("Erreur:". $e->getMessage());
            }
          if(isset($res) && (!empty($res))){
              $errors['global']=message('Vous allez recevoir un email pour réinitialiser votre mot de passe.');
             
              $to=$_SESSION["email"];
             
              $sujet='Mot de passe oublié';
              
              $msg='Bonjour,'. "\r\n\r\n";
              $msg.='Vous avez oublié votre mot de passe. Cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe:' . "\r\n";
              $msg.="<a href='modif_mdp.php'>". "\r\n";
              $msg.="\r\n";
              $msg.="\r\n";
              $msg.='Merci de ne pas envoyer de mails à  cette adresse.'."\r\n";
              $msg.="\r\n";
              $msg.="L'équipe du site SHE";
              
              $header='From: contactshe@she.fr'."\r\n\r\n";
              try{
              mail($to,$sujet,$msg,$header);

                 }
              catch(Exception $e){
                die("Erreur:" .$e->getMessage());

              }
            }
            elseif(isset($res) && (empty($res))){
              $errors['login']=message('Ce compte n\'existe pas.', 'error');
            }
            }
}
?>
<?php include('inc/header.php');
      include('inc/slider.php');
?>
<h2 class='titre_mdp'>Forgotten password:</h2>
<div class="mdp" style="margin-left:20%; background-color:white; opacity:75%;">
<form class='form_mdp' method="post" action="">
   <label>Your e-mail adress:</label>
    <input class='email' type="email" name="mail" id="mail" value="<?= (isset($_POST['mail']) ? $_POST['mail'] : ''); ?>">
    <?php error('mail'); ?> 
    <?php echo isset($errors['login']) ? $errors['login'] : '' ;
          echo isset($errors['global']) ? $errors['global'] : '' ;
    ?>
   <input class='soumettreform' type="submit" value="submit">
</form>
</div>

<?php include('inc/footer.php');?>