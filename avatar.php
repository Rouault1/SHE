<?php
phpinfo();
function error ($nom) {
  global $errors;
  echo (isset($errors[$nom]) ? $errors[$nom] : '');
}

function message ($message, $type = null) {
    $color = $type === 'error' ? '#ff0000' : '#1E824c';
    return '<div style="font-size:16px;color:' . $color . ';">' . $message . '</div>';
}
//if(!empty($_FILES['avatar'])) {
//	$errors = array();
//	if($_FILES['avatar']['type'] === "image/gif") {
//		if($_FILES['avatar']['size'] <= 2000) {
			$uploaddir='/inc/uploads';
			$uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
//			if(move_uploaded_file($_FILES['avatar']['name'], $uploadfile)) {
//				$errors['global'] = message('Votre fichier a bien été téléchargé');
//			}
//			else {
//				$errors['upload'] = message('Votre fichier n\'a pas été téléchargé.', 'error');
//			}	
//		}
//		else{
//			$errors['size'] = message('Votre fichier est trop volumineux. (max 2Mo)', 'error');
//		}
//	}	
//	else {
//		$errors['type'] = message('Votre fichier doit être une image au format .gif', 'error');
//	}	
//}
include('inc/header.php');
include('inc/slider.php');
?>
<h1 class='titre_verif'>Ajouter un avatar</h1>
<form enctype='multipart/form-data' method='post' action=''>
	<input type='hidden' name='MAX_FILE_SIZE' value='2000'>
	<input type='file' name='avatar' id='avatar'>
	<input type='submit' value='ajouter'>
	<?php error('type'); error('size'); error('upload'); error('global'); ?>
	</form>
	<pre>
	<?php print_r($_FILES) ?>
</pre>
<?php include('inc/footer.php'); ?>	