<?php include('inc/header_inv.php'); ?>
	
<div id="barre_connect">
<form method="post" action="index.php" >
  <legend>Connectez-vous</legend>	
  <input type="text" name="pseudo" class="connect1" placeholder="Adresse mail" required/>
  <input type="password" name="password1" class="connect2" placeholder="Mot de Passe" required/>
  <input type="submit" value="Connexion" id="connection"/>
</form>
</div>
</br>
<div id="lien_inscr">
  <a href="oublie_mdp.php">Mot de passe oublié ?</a>
  <a href="inscription.php">Inscrivez vous</a>
</div>
<?php include('inc/slider.php');?>