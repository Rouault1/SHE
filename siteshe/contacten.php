<?php

 function error ($nom) {
  global $errors;
  echo (isset($errors[$nom]) ? $errors[$nom] : '');
}

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
        $errors[$cle] = message('Le champ ' . $nom . ' ' . $valeur . ' n\'est pas valide.', 'error');
      }
    } else {
      $errors[$cle] = message('Le champ ' . $nom . ' doit être rempli.', 'error');
    }
  }
 if(!empty($_POST))
    {
    // Contient les données vérifiées du formulaire
    $form = array();
    // Contient les erreurs du formulaire
    $errors = array();
    // Verification des données enregistrées par l'utilisateur
      verif("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", 'Email', 'email');
      verif("#^[a-zàéèëïÖü -]+$#i", 'Nom', 'name');
      verif("#^.+$#s", "Message", 'message');
      $form['sujet'] = $_POST['sujet'];


    // Initialisation de l'objet PDO
      try {
        $db = new PDO("mysql:host=localhost;dbname=mydb;", "root", "root");
        // Permet d'afficher les erreurs envoyés par SQL
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die("Erreur:". $e->getMessage());
      }
       if (empty($errors)) {
        // Envoi données dans la bdd
        $req = $db->prepare('INSERT INTO Support (email, nom, sujet, msg, date_msg) VALUES (:email, :name, :sujet, :message, NOW())');
        try {
               $req->execute($form);
                } catch (Exception $e) {
        die("Erreur:". $e->getMessage());
      } 
        $res = $db->lastInsertId();
        if($res) {
          echo '<script>confirm("Your message has been sent.")</script>';
        }
     }
    }
 include('inc/header_eng.php'); 
 include('inc/esp_membre_eng.php'); ?>
        <div> 
      		<div id="cadre_contact">
       			<article id="contact">
       				<form class="ctc" method="post" action="">

       				<legend>Contact us!</legend>
       				<label class="titre_contact" for="name">Name</label>
       				<input type="text" name="name" id="name" class="contact_input" value="<?= (isset($_POST['name']) ? $_POST['name'] : ''); ?>" required/>
              <?php error('name'); ?>
              <label for="email" class="titre_contact">Email</label>
              <input type="email" name="email" id="email" class="contact_input" value="<?= (isset($_POST['email']) ? $_POST['email'] : ''); ?>" required />
              <?php error('email'); ?>
							<label  class="titre_contact" for="sujet">Subject</label>
       				<select name="sujet" id="sujet" class="contact_sujet" value="<?= (isset($_POST['sujet']) ? $_POST['sujet'] : ''); ?>" >
          			<option value="problèmes de comptes">Problems with your count</option>
           			<option value="suggestion">Suggestions</option>
           			<option value="détails pratique">Practicalities</option>
           			<option value="réclamations">Reclamations</option>
           			<option value="autre">Other</option>
        			</select> 
              <?php error('sujet'); ?>
              </br>  
        			<textarea id="message" name="message" class="contact_message" placeholder="Votre message"></textarea>
              <?php error('message'); ?>
              </br>	
						 	<input type="submit" value="Submit" id="envoyer">
						  
					</form>	
				</article>		
      </div>
<?php include('inc/slider.php');?>
   </div>  

<?php include('inc/footer_eng.php'); ?>