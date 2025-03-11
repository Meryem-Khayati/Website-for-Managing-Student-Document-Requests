<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        header {
            padding: 0; 

        }
        nav ul {
            list-style-type: none;
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            padding: 10px 0;
        }
        nav ul li {
            margin: 0 70px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20px;
        }
        nav ul li img {
            font-size: 14px;
        }
        nav ul li a {
            color: #17657D; 
            text-decoration: none; 
            transition: color 0.3s ease; 
        }
        nav ul li a:hover {
            color: #333; 
            font-size: 25px;
            text-decoration: none;
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <header>
        <!-- Ajouter la barre de navigation (menu) -->
        <nav id="main-nav">
            <ul>
                <li><img src="http://localhost/wordpress_giia/wp-content/uploads/2024/12/favIcon.jpg" alt="Mon Logo"></li>
                <li class="li1"><a href="http://localhost/wordpress_giia/">Accueil</a></li>
                <li class="li1"><a href="http://localhost/wordpress_giia/index.php/espace-demandes/">Espace Demandes</a></li>
                <li class="li1"><a href="http://localhost/wordpress_giia/index.php/inscription/">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <div id="content" class="site-content">
        <div class="ast-container">
            <?php astra_content_top(); ?>
