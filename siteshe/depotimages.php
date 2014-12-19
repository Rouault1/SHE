
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php
try {
	$db=new PDO("mysql:host=localhost;dbname=mydb", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
	die("Erreur:". $e->getMessage());
}
?>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style_site_she.css" />
		<title>Deposer une annonce</title>
	</head>

	<body>
		<?php include('inc/header.php'); ?>
	
		<?php include('inc/esp_membre.php');?>
	
	
	<section><div class="corps_deposeruneannonce">
	<h2>Vous êtes sur la page vous permettant de déposer vos images</h2>
	<?php 
		if(isset($_POST)){
			echo '<form method="post" action="depotimages.php" enctype="multipart/form-data">
	<h3>Acte de propriété</h3>
     <label for="icone">Format du fichier (JPG, PNG ou GIF | max. 1500 Ko) :</label><br />
     <input type="file" name="icone" id="icone" /><br />
     <h3>Image de la propriété</h3>
     <label for="photo1">Photo 1 (tous formats | max. 1 Mo) :</label><br />
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="photo1" id="photo1" /><br />
 	<label for="photo2">Photo 2 (tous formats | max. 1 Mo) :</label><br />
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="photo2" id="photo2" /><br />
     <label for="photo3">Photo 3 (tous formats | max. 1 Mo) :</label><br />
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="photo3" id="photo3" /><br />
     <div>
     <input type="submit" name="submit" value="Envoyer" style="margin-top:5%; margin-left:45%;"/>
     </div>
</form>';



// Example of accessing data for a newly uploaded file
$fileName = $_FILES["icone"]["name"]; 
$fileTmpLoc = $_FILES["icone"]["tmp_name"];
// Path and file name
$pathAndName = "uploads/".$fileName;
// Run the move_uploaded_file() function here
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
// Evaluate the value returned from the function if needed
//if ($moveResult == true) {
   // echo "File has been moved from " . $fileTmpLoc . " to" . $pathAndName;
//} else {
    // echo "ERROR: File not moved correctly";
//}



// Example of accessing data for a newly uploaded file
$fileName = $_FILES["photo1"]["name"]; 
$fileTmpLoc = $_FILES["photo1"]["tmp_name"];
// Path and file name
$pathAndName = "uploads/".$fileName;
// Run the move_uploaded_file() function here
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
// Evaluate the value returned from the function if needed
//if ($moveResult == true) {
   // echo "File has been moved from " . $fileTmpLoc . " to" . $pathAndName;
//} else {
    // echo "ERROR: File not moved correctly";
//}


// Example of accessing data for a newly uploaded file
$fileName = $_FILES["photo2"]["name"]; 
$fileTmpLoc = $_FILES["photo2"]["tmp_name"];
// Path and file name
$pathAndName = "uploads/".$fileName;
// Run the move_uploaded_file() function here
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
// Evaluate the value returned from the function if needed
//if ($moveResult == true) {
   // echo "File has been moved from " . $fileTmpLoc . " to" . $pathAndName;
//} else {
    // echo "ERROR: File not moved correctly";
//}



// Example of accessing data for a newly uploaded file
$fileName = $_FILES["photo3"]["name"]; 
$fileTmpLoc = $_FILES["photo3"]["tmp_name"];
// Path and file name
$pathAndName = "uploads/".$fileName;
// Run the move_uploaded_file() function here
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
// Evaluate the value returned from the function if needed
//if ($moveResult == true) {
   // echo "File has been moved from " . $fileTmpLoc . " to" . $pathAndName;
//} else {
    // echo "ERROR: File not moved correctly";
//}
}
?>
		
		</section>
		<?php include('inc/slider.php');?>
	   <?php include('inc/footer.php');?>


			</body>
