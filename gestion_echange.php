<?php include('inc/header.php');?>
			
<?php include('inc/esp_membre.php');?>
	<section id="gestion_ech" style="margin-left:20%;">
		 	<h1 class="titre_gestion">Gestion des Echanges</h1>
		 	<div id="part">
		 		<div class="sous_part">
		 			<h2 class="titre1">Annonces en cours</h2>
		 				<a class="annonce" href="#">annonce1</a>
		 				 <p class="date1">Date de création</p>
		 					<input id="input_gest1" type="submit" value="Modifier"/>
		 					<input id="input_gest1" type="submit" value="Supprimer"/>
		 				</br>
		 			     <a class="annonce" href="#">annonce2</a>
		 				 <p class="date1">Date de création</p>
		 				    <input id="input_gest1" type="submit" value="Modifier"/>
		 					<input id="input_gest1" type="submit" value="Supprimer"/>
		 		</div>
		 		<div class="sous_part">
		 		    <h2 class="titre2">Propositions d'échanges</h2> 	
		                <a class="annonce" href="#">membre1</a>
		                <p class="txt">/</p>
		                <a class=" annonce" href="#">bien1</a>
		                <p class="txt">veut faire un échange avec vous du (date de début) au (date de fin) pour</p>
		                <a class="annonce" href="#">bien1</a>
		                <input id="input_gest2" type="submit" value="Accepter"/>
		                <input id="input_gest2" type="submit" value="Refuser"/></br>
		                <a class="annonce" href="#">membre1</a>
		                <p class="txt">/</p>
		                <a  class="annonce" href="#">bien2</a>
		                <p class="txt">veut faire un échange avec vous du (date de début) au (date de fin) pour</p>
		                <a class="annonce" href="#">bien1</a>
		                <input id="input_gest2" type="submit" value="Accepter"/>
		                <input id="input_gest2" type="submit" value="Refuser"/>
		        </div>
		        <div class="sous_part">
		         <h2 class="titre3">Vos Demandes</h2>
		        	<p class="txt">Vous avez demandé à faire un échange avec </p>
		        	<a class="annonce" href="#">membre3</a>
		        	<p class="txt">/</p>
		        	<a class="annonce" href="#">bien3</a>
		        	<p class="txt">(Date demandée)</p>
		        	<input id="input_gest3" type="submit" value="Supprimer"/>
		          </br>
		            <p class="txt">Vous avez demandé à faire un échange avec </p>
		        	<a class="annonce" href="#">membre4</a>
		        	<p class="txt">/</p>
		        	<a  class="annonce" href="#">bien4</a>
		        	<p class="txt">(Date demandée)</p>
		        	<input id="input_gest3" type="submit" value="Supprimer"/>

		        </div>	
		    </div>    
		 </section>	
<?php include('inc/slider.php');?>		 
<?php include('inc/footer.php');?>