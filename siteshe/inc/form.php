<div id="blank"></div>
<div id="cadre_1">
	<h1 class="titre_fiche">Inscription</h1>

	<form id="inscrip" method="post" action="">
		<h2>Vos Coordonnées</h2>

		<label>Genre:*</label>
		<input type="radio" name="genre" value="homme" id="homme"<?= (isset($_POST['genre']) && $_POST['genre'] === 'homme' ? ' checked' : ''); ?>>
		<label for="homme" class="inline">Homme</label>
		<input type="radio" name="genre" value="femme" id="femme"<?= (isset($_POST['genre']) && $_POST['genre'] === 'femme' ? ' checked' : ''); ?>>
		<label for="femme" class="inline">Femme</label>
		<?php error('genre'); ?>

		<label>Nom:*</label>
		<input type="text" name="nom" id="nom" value="<?= (isset($_POST['nom']) ? $_POST['nom'] : ''); ?>">
		<?php error('nom'); ?>

		<label>Prénom:*</label>
		<input type="text" name="prenom" id="prenom" value="<?= (isset($_POST['prenom']) ? $_POST['prenom'] : ''); ?>">
		<?php error('prenom'); ?>

		<label>Mot de Passe:*</label>
		<input type="password" name="password" id="password" value="<?= (isset($_POST['password']) ? $_POST['password'] : ''); ?>">
		<?php error('password'); ?>

		<label>Confirmer Mot de Passe:*</label>
		<input type="password" name="password_2" id="password_2" value="<?= (isset($_POST['password_2']) ? $_POST['password_2'] : ''); ?>">
		<?php error('password_2'); ?>

		<label>Date de naissance:*</label>
		<input type="date" name="date_naissance" id="date_naissance"placeholder="jj/mm/aaaa" class="date_naiss" value="<?= (isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ''); ?>">
		<?php error('date_naissance'); ?>

		<label>Adresse Email:*</label>
		<input type="email" name="mail" id="mail" value="<?= (isset($_POST['mail']) ? $_POST['mail'] : ''); ?>">
		<?php error('mail'); ?>

		<label>Confirmer Adresse Email:*</label>
		<input type="email" name="mail_2" id="mail_2" value="<?= (isset($_POST['mail_2']) ? $_POST['mail_2'] : ''); ?>">
		<?php error('mail_2'); ?>

		<label>Téléphone Fixe:*</label>
		<input type="tel" name="tel1" id="tel1" value="<?= (isset($_POST['tel1']) ? $_POST['tel1'] : ''); ?>" >
		<?php error('tel1'); ?>

		<label>Téléphone Mobile:*</label>
		<input type="tel" name="tel2" id="tel2" value="<?= (isset($_POST['tel2']) ? $_POST['tel2'] : ''); ?>" >
		<?php error('tel2'); ?>

		<!--<label>Photo d'identité:*</label>
		<input class="photo_id" type="file" name="photo_id" id="photo_id" value="Ajouter une photo"> -->

		<h2>Votre Adresse</h2>

		<label>Adresse:*</label>
		<input type="text" name="adresse" id="adresse" value="<?= (isset($_POST['adresse']) ? $_POST['adresse'] : ''); ?>">
		<?php error('adresse'); ?>

		<label>Code Postal:*</label>
		<input type="text" name="code_postal" id="code_postal" maxlength="5" value="<?= (isset($_POST['code_postal']) ? $_POST['code_postal'] : ''); ?>">
		<?php error('code_postal') ?>

		<label>Ville:*</label>
		<input type="text" name="ville" id="ville" value="<?= (isset($_POST['ville']) ? $_POST['ville'] : ''); ?>">
		<?php error('ville'); ?>

		<label for="pays">Pays:*</label>
		<select name="pays" id="pays" value="<?= (isset($_POST['pays']) ? $_POST['pays'] : ''); ?>">
			<optgroup label="Europe">
				<option value="France" selected>France</option>
				<option value="Allemagne">Allemagne</option>
				<option value="Royaumes_Unis">Royaumes-Unis</option>
				<option value="Italie">Italie</option>
				<option value="Espagne">Espagne</option>
			</optgroup>
			<optgroup label="Amerique du Nord">
				<option value="Etats_Unis">Etats-Unis</option>
				<option value="Canada">Canada</option>
			</optgroup>
			<optgroup label="Asie">
				<option value="Chine">Chine</option>
				<option value="Japon">Japon</option>
				<option value="Corée_du_sud">Corée du Sud</option>
			</optgroup>
			<optgroup label="Afrique">
				<option value="Maroc">Maroc</option>
				<option value="Algérie">Algérie</option>
				<option value="Afrique_du_Sud">Afrique du Sud</option>
			</optgroup>
		</select>
		<?php error('pays'); ?>

		<label>Région/Etat:* </label>
		<input type="text" name="region" id="region" value="<?= (isset($_POST['region']) ? $_POST['region'] : ''); ?>">
		<?php error('region'); ?>

		<br>
		<div>
			<input type="checkbox" name="cond" id="cond" >
			<label for="cond" class="inline2">Je certifie avoir lu et approuvé les conditions d'utilisation générale de ce site*</label>
			<?php error('cond'); ?>
		</div>
		<br>

		<input type="submit" value="Valider">
		<span class="chp">*Champs Obligatoires</span>
	</form>
</div>