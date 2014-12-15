<div id="blank"></div>
<div id="cadre_1">
	<h1 class="titre_fiche">Registration</h1>

	<form id="inscrip" method="post" action="">
		<h2>Contact information</h2>

		<label>Gender:*</label>
		<input type="radio" name="genre" value="homme" id="homme"<?= (isset($_POST['genre']) && $_POST['genre'] === 'homme' ? ' checked' : ''); ?>>
		<label for="homme" class="inline">Man</label>
		<input type="radio" name="genre" value="femme" id="femme"<?= (isset($_POST['genre']) && $_POST['genre'] === 'femme' ? ' checked' : ''); ?>>
		<label for="femme" class="inline">Woman</label>
		<?php error('genre'); ?>

		<label>Name:*</label>
		<input type="text" name="nom" id="nom" value="<?= (isset($_POST['nom']) ? $_POST['nom'] : ''); ?>">
		<?php error('nom'); ?>

		<label>Surname:*</label>
		<input type="text" name="prenom" id="prenom" value="<?= (isset($_POST['prenom']) ? $_POST['prenom'] : ''); ?>">
		<?php error('prenom'); ?>

		<label>Password:*</label>
		<input type="password" name="password" id="password" value="<?= (isset($_POST['password']) ? $_POST['password'] : ''); ?>">
		<?php error('password'); ?>

		<label>Confirm password:*</label>
		<input type="password" name="password_2" id="password_2" value="<?= (isset($_POST['password_2']) ? $_POST['password_2'] : ''); ?>">
		<?php error('password_2'); ?>

		<label>Date of birth:*</label>
		<input type="date" name="date_naissance" id="date_naissance"placeholder="jj/mm/aaaa" class="date_naiss" value="<?= (isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ''); ?>">
		<?php error('date_naissance'); ?>

		<label>Email adress:*</label>
		<input type="email" name="mail" id="mail" value="<?= (isset($_POST['mail']) ? $_POST['mail'] : ''); ?>">
		<?php error('mail'); ?>

		<label>Confirm email adress:*</label>
		<input type="email" name="mail_2" id="mail_2" value="<?= (isset($_POST['mail_2']) ? $_POST['mail_2'] : ''); ?>">
		<?php error('mail_2'); ?>

		<label>Phone number:*</label>
		<input type="tel" name="tel1" id="tel1" value="<?= (isset($_POST['tel1']) ? $_POST['tel1'] : ''); ?>" >
		<?php error('tel1'); ?>

		<label>Cellphone number:</label>
		<input type="tel" name="tel2" id="tel2" value="<?= (isset($_POST['tel2']) ? $_POST['tel2'] : ''); ?>" >
		<?php error('tel2'); ?>

		<!--<label>Photo d'identité:*</label>
		<input class="photo_id" type="file" name="photo_id" id="photo_id" value="Ajouter une photo"> -->

		<h2>Your adress</h2>

		<label>Adress:*</label>
		<input type="text" name="adresse" id="adresse" value="<?= (isset($_POST['adresse']) ? $_POST['adresse'] : ''); ?>">
		<?php error('adresse'); ?>

		<label>Zip code:*</label>
		<input type="text" name="code_postal" id="code_postal" maxlength="5" value="<?= (isset($_POST['code_postal']) ? $_POST['code_postal'] : ''); ?>">
		<?php error('code_postal') ?>

		<label>City:*</label>
		<input type="text" name="ville" id="ville" value="<?= (isset($_POST['ville']) ? $_POST['ville'] : ''); ?>">
		<?php error('ville'); ?>

		<label for="pays">Country:*</label>
		<select name="pays" id="pays" value="<?= (isset($_POST['pays']) ? $_POST['pays'] : ''); ?>">
			<optgroup label="Europe">
				<option value="France" selected>France</option>
				<option value="Allemagne">Germany</option>
				<option value="Royaumes_Unis">United Kingdom</option>
				<option value="Italie">Italy</option>
				<option value="Espagne">Spain</option>
			</optgroup>
			<optgroup label="North America">
				<option value="Etats_Unis">USA</option>
				<option value="Canada">Canada</option>
			</optgroup>
			<optgroup label="Asia">
				<option value="Chine">China</option>
				<option value="Japon">Japan</option>
				<option value="Corée_du_sud">South Korea</option>
			</optgroup>
			<optgroup label="Africa">
				<option value="Maroc">Morocco</option>
				<option value="Algérie">Algeria</option>
				<option value="Afrique_du_Sud">South Africa</option>
			</optgroup>
		</select>
		<?php error('pays'); ?>

		<label>Region/State:* </label>
		<input type="text" name="region" id="region" value="<?= (isset($_POST['region']) ? $_POST['region'] : ''); ?>">
		<?php error('region'); ?>

		<br>
		<div>
			<input type="checkbox" name="cond" id="cond" >
			<label for="cond" class="inline2">I certify that I have read and accepted the website's General Conditions of Use*</label>
			<?php error('cond'); ?>
		</div>
		<br>

		<input type="submit" value="Validate">
		<span class="chp">*Required fields</span>
	</form>
</div> 
