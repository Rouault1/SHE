<?php include('inc/header_inv.php'); ?>

        <div> 
      		<div id="cadre_contact">
       			<article id="contact">
       				<form method="post" action="traitement.php">

       				<legend>Contactez nous</legend>
       				<label for="input-name" id="titre_contact">Nom</label>
       				<input type="text" name="input-name" id="input_name" required/></br>
              <label for="input-email" id="titre_contact">Email</label>
              <input type="email" name="input-email" id="input_email" required /></br>
							<label  for="sujet" id="titre_contact">Sujet</label>
       				<select name="sujet" id="sujet">
          			<option value="problèmes de comptes">Problèmes de compte</option>
           			<option value="suggestion">Suggestion</option>
           			<option value="détails pratique">Détails pratiques</option>
           			<option value="réclamations">Réclamations</option>
           			<option value="autre">Autre</option>
        			</select> 
              </br>  
        			<textarea id="input_message" name="textarea" rows="10" cols="50" placeholder="Votre message"></textarea>
              </br>	
						 	<input type="submit" value="Envoyer" id="envoyer">
						  
					</form>	
				</article>		
      </div>
<?php include('inc/slider.php');?>
   </div>  

<?php include('inc/footer.php'); ?>
       			