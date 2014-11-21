<?php include('inc/header.php'); ?>
<?php session_start();?>

 <!--<div id="esp_profil">
    <img  id="grp" class="photo_profil" src="images/image_profil.png" alt="photo_profil">
    <ul id="grp" class="nav">
      <li>
        <a href="#">Paramètres</a>
        <ul>
          <li><a href="#">Modifier son profil</a></li>
          <li><a href="#">Se déconnecter</a></li>
        </ul>
      </li>
    </ul>
  </div> -->
    <div id="msg_bvn">
 <!--   <?php echo 'Bonjour M. '.$SESSION['name'].' !' ?> -->
  </div>
		<div id="esp_membre">
  <label class="esp_membre">Espace membre</label>
  <img class="photo_de_profil" src="img/bonhomme-blanc.png" alt="bonhomme blanc"/>
	<ul>
      <li><a href="gestion_echange.html">Gérer ses échanges</a></li>
      <li><a href="#">Déposer une annonce</a></li>
      <li><a href="#">Gérer ses annonces</a></li>
      <li><a href="#">Derniers biens regardés</a></li>
      <li><a href="#">Messagerie</a></li>
  </ul>
</div>
<div id="barre_recherche">
<form method="post" action="recherche_result.php" >
  <input type="text" name="recherche" id="recherche" placeholder="Rechercher une Annonce" required/>
  <input type="submit" value="Rechercher" id="rechercher"/>
</form>
</div>
</br>
<div id="lien_recherche">
  <a href="#">Recherche avancée</a>
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
<div id="slideshow">
    <img class="active" src="http://www.hiphoprepublican.com/wp-content/uploads/2013/06/New-York-City-Sun.jpg" alt="Slideshow Image 1" />
    <img src="img/image1.jpg" alt="Slideshow Image 2" />
    <img src="img/image2.jpg" alt="Slideshow Image 3" />
    <img src="img/image3.jpg" alt="Slideshow Image 4" />
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>  
<script src="js/custom.js" type="text/javascript"></script>

 </div>    


<?php include('inc/footer.php'); ?>
