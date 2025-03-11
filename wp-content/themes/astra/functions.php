<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.8.8' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.8.4' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( 'https://wpastra.com/pricing/', 'dashboard', 'free-theme', 'dashboard' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( 'https://wpastra.com/pricing/', 'customizer', 'free-theme', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
function my_theme_enqueue_styles() {
    // Ajouter Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';






// -------------------------------- ETD -------------------------------- //

// Fonction pour créer la table des étudiants
function create_etudiants_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'etudiants'; // Nom de la table avec préfixe
    $charset_collate = $wpdb->get_charset_collate();

    // SQL pour créer la table
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nom varchar(255) NOT NULL,
        prenom varchar(255) NOT NULL,
        email varchar(255) NOT NULL UNIQUE,
        cin varchar(255) NOT NULL UNIQUE,
        apogee varchar(255) NOT NULL UNIQUE,
        password varchar(255) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    // Inclure la bibliothèque dbDelta pour exécuter la requête
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Hook pour créer la table après activation du thème
add_action('after_switch_theme', 'create_etudiants_table');


function register_etudiant_handler() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'etudiants';

    // Récupérer les données du formulaire
    $nom = sanitize_text_field($_POST['first_name']);
    $prenom = sanitize_text_field($_POST['last_name']);
    $cin = sanitize_text_field($_POST['cin']);
    $apogee = sanitize_text_field($_POST['apogee_code']);
    $email = sanitize_email($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Vérifier si l'utilisateur existe déjà
    $existing_user = $wpdb->get_var($wpdb->prepare(
        "SELECT id FROM $table_name WHERE email = %s OR cin = %s",
        $email,
        $cin
    ));

    if ($existing_user) {
        // Stocker un message d'erreur dans la session
        session_start();
        $_SESSION['register_message'] = 'Cet utilisateur existe déjà.';
        wp_safe_redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    // Insérer les données dans la table
    $wpdb->insert($table_name, [
        'nom' => $nom,
        'prenom' => $prenom,
        'cin' => $cin,
        'apogee' => $apogee,
        'email' => $email,
        'password' => $password,
        'created_at' => current_time('mysql')
    ]);

    // Stocker un message de succès dans la session
    session_start();
    $_SESSION['register_message'] = 'Inscription réussie ! Vous pouvez maintenant vous connecter.';
    wp_safe_redirect($_SERVER['HTTP_REFERER']);
    exit;
}
add_action('admin_post_nopriv_register_etudiant', 'register_etudiant_handler');
add_action('admin_post_register_etudiant', 'register_etudiant_handler');

//-------------------------------login---------------------------------------------------

function custom_login_check() {
    global $wpdb;
    $students_table = $wpdb->prefix . 'etudiants';

    // Récupérer les données du formulaire
    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);

    // Vérifier si l'utilisateur existe dans la base de données
    $student = $wpdb->get_row($wpdb->prepare(
        "SELECT id, email, password FROM $students_table WHERE email = %s",
        $email
    ));

    if ($student && password_verify($password, $student->password)) {
        // Vérifier si l'utilisateur est un administrateur
        if ($student->email === 'admin@gmail.com') {
            // Rediriger l'administrateur vers une page spécifique
            wp_redirect(home_url('/index.php/demandes/')); // URL de la page spécifique pour l'admin
            exit;
        } else {
            // Si l'utilisateur est un étudiant, rediriger vers la page de demande
            wp_redirect(home_url('/index.php/espace-demandes/?id=' . $student->id)); // Ajouter l'ID de l'étudiant dans l'URL
            exit;
        }
    } else {
        // Si l'utilisateur n'existe pas ou si le mot de passe est incorrect
        wp_redirect(home_url('/connexion?login_error=1')); // Ajouter un paramètre d'erreur pour afficher le message
        exit;
    }
}

add_action('admin_post_nopriv_custom_login_check', 'custom_login_check');
add_action('admin_post_custom_login_check', 'custom_login_check');






//-------------------------------------demandes-----------------------------------------//


// Créer la table des demandes de documents

function create_document_requests_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'document_requests'; // Nom de la table
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        student_id mediumint(9) NOT NULL,
        titre varchar(500) NOT NULL,
        demande_type varchar(50) NOT NULL,  
        description varchar(50) NOT NULL,  
        additional_data text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (student_id) REFERENCES {$wpdb->prefix}etudiants(id) ON DELETE CASCADE
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'create_document_requests_table');







global $student_id;

function submit_document_request() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'document_requests';

    // Récupérer l'ID de l'étudiant depuis le formulaire
    $student_id = isset($_POST['student_id']) ? intval($_POST['student_id']) : 0;

    if (!$student_id) {
        // Gérer l'erreur si l'ID est manquant
        wp_redirect(home_url('/erreur-non-inscrit'));
        exit;
    }

    // Récupérer les données de la demande
    $titre = isset($_POST['titre']) ? sanitize_text_field($_POST['titre']) : '';
    $demande_type = isset($_POST['demande_type']) ? sanitize_text_field($_POST['demande_type']) : ''; // Type de demande
    $other = isset($_POST['other']) ? sanitize_text_field($_POST['other']) : ''; // Autre type de demande
    $description = isset($_POST['description']) ? sanitize_textarea_field($_POST['description']) : ''; // Description
    $additional_data = 'en attente';
    // En fonction de la sélection "autres", on peut mettre à jour le type de demande
    if ($demande_type === 'autres' && !empty($other)) {
        $demande_type = $other;
    }

    // Insérer la demande dans la base de données
    $wpdb->insert($table_name, [
        'student_id' => $student_id,
        'titre' => $titre,
        'demande_type' => $demande_type,
        'description' => $description,
        'additional_data' => $additional_data,
    ]);

    // Rediriger vers la page de succès
    wp_redirect(home_url('/index.php/espace-demandes/'));
    exit;
}
add_action('admin_post_nopriv_submit_document_request', 'submit_document_request');
add_action('admin_post_submit_document_request', 'submit_document_request');






// add_action('admin_post_nopriv_submit_document_request', 'submit_document_request');
// add_action('admin_post_submit_document_request', 'submit_document_request');


function create_demandes_post_type() {
    register_post_type('demande',
        array(
            'labels' => array(
                'name' => 'Demandes',
                'singular_name' => 'Demande',
                'add_new' => 'Ajouter une Demande',
                'add_new_item' => 'Ajouter une nouvelle Demande',
                'edit_item' => 'Éditer la Demande',
                'new_item' => 'Nouvelle Demande',
                'view_item' => 'Voir la Demande',
                'search_items' => 'Rechercher des Demandes',
                'not_found' => 'Aucune demande trouvée',
                'not_found_in_trash' => 'Aucune demande dans la corbeille',
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'custom-fields'),
            'show_in_rest' => true, // Pour utiliser avec l'éditeur Gutenberg
        )
    );
}
add_action('init', 'create_demandes_post_type');


add_action('wp_ajax_changer_statut_demande', 'changer_statut_demande');

function changer_statut_demande() {
    if (isset($_POST['demande_id']) && isset($_POST['statut'])) {
        $demande_id = $_POST['demande_id'];
        $statut = $_POST['statut'];

        // Mettre à jour le statut dans la base de données
        update_post_meta($demande_id, 'status', $statut);

        wp_send_json_success(); // Réponse AJAX
    }

    wp_send_json_error(); // Si la demande échoue
}



// Fonction pour récupérer la liste des demandes
function get_all_demands() {
    // Argument pour la requête WP_Query
    $args = array(
        'post_type' => 'demande', // CPT "demande"
        'posts_per_page' => -1,   // Récupérer toutes les demandes
    );

    $query = new WP_Query($args);

    // Vérifier s'il y a des demandes et les retourner
    if ($query->have_posts()) {
        $demands = array();

        // Récupérer les données de chaque demande
        while ($query->have_posts()) {
            $query->the_post();
            
            $demands[] = array(
                'id' => get_the_ID(),
                'apogee' => get_post_meta(get_the_ID(), 'apogee', true),
                'email' => get_post_meta(get_the_ID(), 'email', true),
                'type_demande' => get_post_meta(get_the_ID(), 'type_demande', true),
                'date' => get_the_date('Y-m-d'),
                'status' => get_post_meta(get_the_ID(), 'status', true),
            );
        }

        wp_reset_postdata();
        return $demands;
    }

    // Retourner un tableau vide si aucune demande n'est trouvée
    return array();
}

//-------------------------------------------ACCEPT--------------------------------------------------------------

// Créer la table etudiants
// require_once _DIR_ . '/vendor/autoload.php'; // Inclure l'autoloader de Composer

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
function configure_phpmailer_smtp($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = 'marykhayati72@gmail.com'; // Remplacez par votre adresse Gmail
    $phpmailer->Password = 'nfvk rwli xplw pzfe';   // Mot de passe d'application Gmail
    $phpmailer->SMTPSecure = 'tls'; // Utilisez 'tls' ou 'ssl' selon votre configuration
    $phpmailer->Port = 587; // Port SMTP
    $phpmailer->From = 'marykhayati72@gmail.com';
    $phpmailer->FromName = 'Scolarite Ensa Safi'; // Nom de l'expéditeur
}

add_action('phpmailer_init', 'configure_phpmailer_smtp');

function accept_document_request() {
    global $wpdb;

    $request_id = intval($_POST['request_id']);
    $email = sanitize_email($_POST['email']);

    $table_name = $wpdb->prefix . 'document_requests';
    $request = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $request_id));

    if (!$request) {
        wp_die('Demande introuvable.');
    }

    // Préparer l'email
    $subject = 'Information sur la demande';
    $message = '<p>Votre demande a été acceptée.</p>';
    $headers = ['Content-Type: text/html; charset=UTF-8'];

    // Envoyer l'email
    if (wp_mail($email, $subject, $message, $headers)) {
        // Mettre à jour le statut dans la base de données
        $wpdb->update(
            $table_name,
            ['additional_data' => 'accepted'], // Ajouter une colonne status si nécessaire
            ['id' => $request_id]
        );

        // Rediriger vers la page précédente
        wp_redirect($_SERVER['HTTP_REFERER']);
        exit;
    } else {
        wp_die('Erreur lors de l\'envoi de l\'email.');
    }
}
add_action('admin_post_accept_document_request', 'accept_document_request');


####################  Refuser 


function refuse_document_request() {
    global $wpdb;

    $request_id = intval($_POST['request_id']);
    $email = sanitize_email($_POST['email']);

    $table_name = $wpdb->prefix . 'document_requests';
    $request = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $request_id));

    if (!$request) {
        wp_die('Demande introuvable.');
    }

    // Préparer l'email
    $subject = 'Information sur la demande';
    $message = '<p>Votre demande a été refusée. Veuillez contacter l\'administration pour plus d\'informations.</p>';
    $headers = ['Content-Type: text/html; charset=UTF-8'];

    // Envoyer l'email
    if (wp_mail($email, $subject, $message, $headers)) {
        // Mettre à jour le statut dans la base de données
        $wpdb->update(
            $table_name,
            ['additional_data' => 'refused'], // Ajouter une colonne status si nécessaire
            ['id' => $request_id]
        );

        // Rediriger vers la page d'accueil
        wp_redirect($_SERVER['HTTP_REFERER']);
                exit;
    } else {
        wp_die('Erreur lors de l\'envoi de l\'email.');
    }
}
add_action('admin_post_refuse_document_request', 'refuse_document_request');
