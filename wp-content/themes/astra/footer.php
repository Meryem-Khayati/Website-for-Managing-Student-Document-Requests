<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php 
	astra_content_after();
		
	astra_footer_before();
		
	astra_footer();
		
	astra_footer_after(); 
?>

<!-- Début du Footer Personnalisé -->
 <div>
<div class="footer" id="footer">
    <div class="container">
        <div class="box">
            <ul class="links">
                <li> <i class="fas fa-long-arrow-alt-right" style="color: #ED7F10;"></i><a href="http://localhost/wordpress_giia/index.php/espace-demandes/">Etudiant</a></li>
                <li> <i class="fas fa-long-arrow-alt-right" style="color: #ED7F10;"></i><a href="http://localhost/wordpress_giia/index.php/inscription/">Admin</a></li>
                <li> <i class="fas fa-long-arrow-alt-right" style="color: #ED7F10;"></i><a href="http://localhost/wordpress_giia/">Home</a></li>
            </ul>
        </div>

        <div class="box">
            <div>
                <br>
                <br>
                <p class="text">
                    Demandez et recevez vos documents en quelques clics. Simplifiez vos formalités administratives avec nous !
                </p>
</div>
        </div>

        <div class="box">
            <br>
            <div class="line">
                <i class="fa-solid fa-location-dot" style="color: #030303;"></i>
                <div class="info">Route Sidi Bouzid BP 63 Rue Sidi M'Barek, Safi 46000</div>
            </div>

            <div class="line">
                <i class="fa-solid fa-phone" style="color: #000000;"></i>
                <div class="info">+212 656 200007</div>
            </div>

            <div class="line">
                <i class="fa-solid fa-envelope" style="color: #000000;"></i>
                <div class="info">ensas@uca.ac.ma</div>
            </div>
        </div>

    </div>
    <hr>
    <p class="copyright"> ServiceETUDIANT Copyright ©2024 | Tous droits réservés</p>
</div>
</div>
<!-- Fin du Footer Personnalisé -->

<?php 
	astra_body_bottom();    
	wp_footer(); 
?>
</body>
</html>

<!-- Ajout du CSS personnalisé directement dans le footer.php -->

<style>
/* Footer styles */
.footer {
  background-color:rgb(22, 107, 192); /* Couleur de fond du footer */
  color: white; /* Couleur du texte */
  padding: 40px 0;
  font-family: Arial, sans-serif;
  width: 100%;
  position: relative;
  /* left:40px; */

}

.footer .container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  max-width: 1200px;
  margin: 0 auto;
}

.footer .box {
  width: 30%; /* Chaque box occupe 30% de la largeur */
}

.footer .links {
  list-style-type: none; /* Supprime les puces des listes */
  padding: 0;
}

.footer .links li {
  margin-bottom: 15px; /* Espacement entre les éléments */
}

.footer .links a {
  text-decoration: none;
  color: white; /* Couleur du lien */
  font-size: 16px;
  transition: color 0.3s ease; /* Transition pour la couleur du lien */
}

.footer .links a:hover {
  color: #ED7F10; /* Couleur au survol */
}

.footer .text {
  font-size: 16px;
  text-align: center;
  margin-top: 20px;
  line-height: 1.5;
}

.footer .line {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.footer .line i {
  font-size: 20px;
  margin-right: 10px;
}

.footer .info {
  font-size: 16px;
  color: white;
}

.footer hr {
  border: 1px solid #34495e; /* Ligne de séparation */
  margin: 40px 0;
}

.footer .copyright {
  text-align: center;
  font-size: 14px;
  color: white;
  margin-top: 20px;
}

/* Responsive styles */
@media (max-width: 768px) {
  .footer .container {
    flex-direction: column;
    align-items: center;
  }

  .footer .box {
    width: 100%;
    margin-bottom: 30px;
  }

  .footer .text {
    font-size: 14px;
  }

  .footer .info {
    font-size: 14px;
  }
}
</style>

