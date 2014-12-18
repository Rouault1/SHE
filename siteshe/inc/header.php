<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="css/style_site_she.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <title>Sweet Home Exchange : échangez vos propriétés en toute sûreté !</title>
    </head>
    <body>
        <div id="header">
            <a  class="logo" href="index.php"><img src="img/logo_shev3d_mini.png" /></a>
            <ul id="menu1">
                <li class="bouton_1"><a href="index.php">Accueil</a></li>
                <li class="bouton_1"><a href="recherchem.php">Voir les offres</a></li>
                <li class="bouton_1"><a href="blog.php">Blog</a></li>
                <li class="bouton_1"><a href="modif.php">Modifier son profil</a>
                <li class="bouton_1"><a href="deconnexion.php" id="deco" onclick='logout()'>Se déconnecter</a></li>
            </ul>
            <div style="clear:both;"></div>
        </div>

        <!-- Scripts à mettre dans le footer juste avant de fermer le body -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.montage.min.js"></script>
        <script type="text/javascript">
            function slideSwitch() {
                var $active = $('#slideshow IMG.active');

                if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

                // use this to pull the images in the order they appear in the markup
                var $next =  $active.next().length ? $active.next() : $('#slideshow IMG:first');

                // uncomment the 3 lines below to pull the images in random order

                // var $sibs  = $active.siblings();
                // var rndNum = Math.floor(Math.random() * $sibs.length );
                // var $next  = $( $sibs[ rndNum ] );

                $active.addClass('last-active');

                $next
                    .css({opacity: 0.0})
                    .addClass('active')
                    .animate({opacity: 1.0}, 1000, function() {
                        $active.removeClass('active last-active');
                    });
            }
              
            $(function() {
                setInterval( "slideSwitch()", 5000 );
            });
        </script>
        <script>
            function logout () {
                // document.getElementByID("deco").onclick
                // alert('Vous êtes sur le point de vous déconnecter.')
            }
        </script>