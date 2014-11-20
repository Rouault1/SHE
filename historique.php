<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style-historique.css" />
		<title>Derniers biens visités</title>
	</head>

	<body>
	<div class="tout">

		<?php include("menu.php") ; ?>
	
		<nav class="membre">
			<ul class="menumembre">
				<img class="photo_de_profil" src="image/bonhomme-blanc.png" alt="bonhomme blanc"/>
				<h4>Espace membre</h4>
				<h5>Bienvenue M.Dupont</h5>
				<li><a href="#">Gérer ses échanges</a></li>
				<li><a href="#">Déposer une annonce</a></li>
				<li><a href="#">Gérer ses annonces</a></li>
				<li><a href="#">Modifier son profil</a></li>
				<li><a href="#">Derniers biens regardés</a></li>
				<li><a href="#">Messagerie</a></li>
				<li><a href="#">Se déconnecter</a></li>
			</ul>
		</nav>

		<section>
			<h2>Derniers biens visités :</h2>
				<div class="maison1">
					<aside>
						<img src="image/maison-eco.jpg"/>
					</aside>
				</div>	
				<div class="description1">
					<article>
						<h3>Régions, caractéristiques, avis, phrase d'accroche</h3> </br>
						<ul class="notes-echelle">
							<li>
								<label for="note01" title="Note&nbsp;: 1 sur 5">1</label>
								<input type="radio" name="notesA" id="note01" value="1" />
							</li>
							<li>
								<label for="note02" title="Note&nbsp;: 2 sur 5">2</label>
								<input type="radio" name="notesA" id="note02" value="2" />
							</li>
							<li>
								<label for="note03" title="Note&nbsp;: 3 sur 5">3</label>
								<input type="radio" name="notesA" id="note03" value="3" />
							</li>
							<li>
								<label for="note04" title="Note&nbsp;: 4 sur 5">4</label>
								<input type="radio" name="notesA" id="note04" value="4" />
							</li>
							<li>
								<label for="note05" title="Note&nbsp;: 5 sur 5">5</label>
								<input type="radio" name="notesA" id="note05" value="5" />
							</li>
						</ul>
					</article>
				</div> </br>

					<div class="maison2">
					<aside>
						<img src="image/maison-eco.jpg"/>
					</aside>
				</div>	
				<div class="description2">
					<article>
						<h3>Régions, caractéristiques, avis, phrase d'accroche</h3> </br>
						<ul class="notes-echelle">
							<li>
								<label for="note01" title="Note&nbsp;: 1 sur 5">1</label>
								<input type="radio" name="notesA" id="note01" value="1" />
							</li>
							<li>
								<label for="note02" title="Note&nbsp;: 2 sur 5">2</label>
								<input type="radio" name="notesA" id="note02" value="2" />
							</li>
							<li>
								<label for="note03" title="Note&nbsp;: 3 sur 5">3</label>
								<input type="radio" name="notesA" id="note03" value="3" />
							</li>
							<li>
								<label for="note04" title="Note&nbsp;: 4 sur 5">4</label>
								<input type="radio" name="notesA" id="note04" value="4" />
							</li>
							<li>
								<label for="note05" title="Note&nbsp;: 5 sur 5">5</label>
								<input type="radio" name="notesA" id="note05" value="5" />
							</li>
						</ul>
					</article>
				</div>
		</section>
					

		<div id="footer">
		<ul>
			<li classe="lien_1" style="margin-left: 355px;"><a href="faq.php">F.A.Q</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="cgu.php">Mentions légales</a></li>
			<li classe="lien_4"><a href="a_propos.php">A propos</a></li>
		</ul>
		</div>
	</div>
	</body>
</html>	
