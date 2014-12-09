
   <?php
  			
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
          $req=$db->prepare('SELECT id_user, email, password FROM user WHERE email = :email');
          try{
            $req->execute($form);
            $res=$req->fetch();
          }
          catch(Exception $e){
              die("Erreur:". $e->getMessage());
            }
          if(isset($res) && (!empty($res))){
              $errors['global']=message('Vous allez recevoir un mail pour réinitialiser votre mot de passe.');

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
<form method="post" action="">
   <label>Votre Adresse Email Trop Fun:</label>
    <input type="email" name="mail" id="mail" value="<?= (isset($_POST['mail']) ? $_POST['mail'] : ''); ?>">
    <?php error('mail'); ?> 
    <?php echo isset($errors['login']) ? $errors['login']: '' ;
          echo isset($errors['global']) ? $errors['global']: '' ;
    ?>
   <input type SUBMIT value="envoyer">
</form>
<?php include('inc/footer.php');?>
