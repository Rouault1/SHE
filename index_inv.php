<?php include('inc/header_inv.php'); ?>
<?php  session_destroy();            ?>
<div id="msg_bvn">
 </div>
		
<div id="barre_connect">
<form method="post" action="index.php" >
  <legend>Connectez-vous</legend>	
  <input type="text" name="pseudo" id="connect1" placeholder="Adresse mail" required/>
  <input type="password" name="password1" id="connect2" placeholder="Mot de Passe" required/>
  <input type="submit" value="Connexion" id="connection"/>
</form>
</div>
</br>
<div id="lien_inscr">
  <a href="oublie_mdp.php">Mot de passe oublié ?</a>
  <a href="inscription.php">Inscrivez vous</a>
</div>
<div id="mosaic">
  <h2 id="titre_mos">Les Mieux Notés</h2>
<table id="mos" border="0" callpadding="0" cellspacing="0">
  <tr>
    <td><a href="#"><img id="mos_img" src="img/Maison1.jpg" width="500px" height="300px"></a></td>
    <td><a href="#"><img id="mos_img" src="img/Maisonblabla.jpg" width="500px" height="300px"></a></td>
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
<?php include('inc/slider.php');?>
 </div>    


<?php include('inc/footer.php'); ?>
