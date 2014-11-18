<?php include('inc/header.php'); ?>

<?php
  if (isset($_POST['code_postal'])
{
  $_POST['code_postal'] = htmlspecialchars($_POST['code_postal'])
    if(preg_match("#^([0-9]){5}", $_POST['code_postal']))
      {
        echo'Le code postal'. $_POST['code_postal'] . 'est valide';
      }
    else  

      echo'Le code postal' . $_POST['code_postal'] . 'n\'est pas valide';
}
?>
</br>
<?php
   if(isset($_POST['ville']))
   {
    $_POST['ville'] = htmlspecialchars($_POST['ville'])
     if(preg_match("#^[a-z -\\/'éàè^¨]?#i$", $_POST['ville']))
     {
      echo'La ville'. $_POST['ville'] . 'est valide'; 
     }
     else
     {
      echo'La ville' . $_POST['ville'] . 'n\'est pas valide';
     }

   }
?>   
</br>
<?php
   if(isset($_POST[['']]))
   {
    $_POST[''] = htmlspecialchars($_POST[''])
    if(preg_match("#^[]$",$_POST['']))
    {
     echo'' . $_POST[''] . 'est valide';
    }
    else
    {
      echo'' . $_POST[''] . 'n\'est pas valide'
    }
   }
?>

<?php
if (isset($_POST['tel2']))
{
    $_POST['tel2'] = htmlspecialchars($_POST['tel2']); // On rend inoffensives les balises HTML que le visiteur a pu entrer

   if (preg_match("#^0[1-59]([-. ]?[0-9]{2}){4}$#", $_POST['tel2']))
   {
       echo 'Le ' . $_POST['tel2'] . ' est un numéro <strong>valide</strong> !';
    }
   else
   {
        echo 'Le ' . $_POST['tel2'] . ' n\'est pas valide, recommencez !';
   }
} ?> <br/>
<?php if (isset($_POST['tel1']))
{
    $_POST['tel1'] = htmlspecialchars($_POST['tel1']); // On rend inoffensives les balises HTML que le visiteur a pu entrer

   if (preg_match("#^0[67]([-. ]?[0-9]{2}){4}$#", $_POST['tel1']))
   {
       echo 'Le ' . $_POST['tel1'] . ' est un numéro <strong>valide</strong> !';
    }
   else
   {
        echo 'Le ' . $_POST['tel1'] . ' n\'est pas valide, recommencez !';
   }
} ?> <br/>
<?php if (isset($_POST['mail']))
{
    $_POST['mail'] = htmlspecialchars($_POST['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

   if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' est <strong>valide</strong> !';
   }
    else
    {
       echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
    }
}
?><br/>
<?php if (isset($_POST['nom']))
{
    $_POST['nom'] = htmlspecialchars($_POST['nom']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

   if (preg_match("#^[a-z '-]+([a-z '-]?){2,}$#i", $_POST['nom']))
    {
        echo 'Le nom ' . $_POST['nom'] . ' est <strong>valide</strong> !';
   }
    else
    {
       echo 'Le nom ' . $_POST['nom'] . ' n\'est pas valide, recommencez !';
    }
}
?><br/>
<?php if (isset($_POST['prenom']))
{
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

   if (preg_match("#^[a-z -]+([a-z -]?){2,}$#i", $_POST['prenom']))
    {
        echo 'Le prenom ' . $_POST['prenom'] . ' est <strong>valide</strong> !';
   }
    else
    {
       echo 'Le prenom ' . $_POST['prenom'] . ' n\'est pas valide, recommencez !';
    }
} ?><br/>
<?php if (isset($_POST['adresse1']))
{
    $_POST['adresse1'] = htmlspecialchars($_POST['adresse1']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

   if (preg_match("#^[1-9]([0-9]?){2,5}[a-z ,.'-]+([a-z ,.'-]?){2,}$#i", $_POST['adresse1']))
    {
        echo 'L\' adresse ' . $_POST['adresse1'] . ' est <strong>valide</strong> !';
   }
    else
    {
       echo 'L\' adresse ' . $_POST['adresse1'] . ' n\'est pas valide, recommencez !';
    }
} ?><br/>
<?php if (isset($_POST['adresse2']))
{
    $_POST['adresse2'] = htmlspecialchars($_POST['adresse2']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

   if (preg_match("#^[1-9]([0-9]?){2,5}[a-z ,.'-]+([a-z ,.'-]?){2,}$#i", $_POST['adresse1']))
    {
        echo 'L\' adresse ' . $_POST['adresse2'] . ' est <strong>valide</strong> !';
   }
    else
    {
       echo 'L\' adresse ' . $_POST['adresse2'] . ' n\'est pas valide, recommencez !';
    }
} ?><br/>
<div id="slideshow">
    <img class="active" src="http://www.hiphoprepublican.com/wp-content/uploads/2013/06/New-York-City-Sun.jpg" alt="Slideshow Image 1" />
    <img src="img/image1.jpg" alt="Slideshow Image 2" />
    <img src="img/image2.jpg" alt="Slideshow Image 3" />
    <img src="img/image3.jpg" alt="Slideshow Image 4" />
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>  
<script src="js/custom.js" type="text/javascript"></script>





<?php include('inc/footer.php'); ?>
