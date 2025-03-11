<?php
/*
Plugin Name: Document Management
Description: Plugin pour la gestion de documents en ligne.
Version: 1.0
Author: Votre Nom
*/

// Créer la table etudiants
register_activation_hook(_FILE_, 'create_etudiants_table');

function create_etudiants_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'etudiants'; // Nom de la table
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
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

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Afficher le formulaire d'inscription
function display_etudiant_registration_form() {
    return '
    <form action="' . esc_url(admin_url('admin-post.php')) . '" method="POST">
        <input type="hidden" name="action" value="register_etudiant">
        
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required><br>

        <button type="submit">S\'inscrire</button>
    </form>';
}
add_shortcode('etudiant_registration', 'display_etudiant_registration_form');

// Gérer l'inscription
add_action('admin_post_nopriv_register_etudiant', 'register_etudiant');
add_action('admin_post_register_etudiant', 'register_etudiant');

function register_etudiant() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'etudiants';

    $nom = sanitize_text_field($_POST['nom']);
    $prenom = sanitize_text_field($_POST['prenom']);
    $cin = sanitize_text_field($_POST['cin']);
    $apogee = sanitize_text_field($_POST['apogee']);
    $email = sanitize_email($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Vérifier si l'email existe déjà
    $existing_user = $wpdb->get_var($wpdb->prepare(
        "SELECT id FROM $table_name WHERE email = %s",
        $email
    ));

    if ($existing_user) {
        wp_redirect(home_url('/inscription-existante'));
        exit;
    }

    // Insérer l'étudiant
    $wpdb->insert($table_name, [
        'nom' => $nom,
        'prenom' => $prenom,
        'cin' => $cin,
        'apogee' => $apogee,
        'email' => $email,
        'password' => $password
    ]);

    wp_redirect(home_url('/connexion'));
    exit;
}
// """""""""""""""""""" table demande """""""""""""""



// Créer la table des demandes de documents
register_activation_hook(_FILE_, 'create_document_requests_table');

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






// """"""""""""""""""""login""""""""""



function custom_login_form() {
    ob_start();
    // Afficher le message d'erreur si disponible
    if (isset($_GET['login_error']) && $_GET['login_error'] == '1') {
        echo '<p style="color: red;">Email ou mot de passe incorrect.</p>';
    }
    ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
        <input type="hidden" name="action" value="custom_login_check">
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Se connecter</button>
    </form>
    <?php
    return ob_get_clean();
}

add_shortcode('custom_login_form', 'custom_login_form');
add_action('admin_post_nopriv_custom_login_check', 'custom_login_check');
add_action('admin_post_custom_login_check', 'custom_login_check');

function custom_login_check() {
    global $wpdb;
    $students_table = $wpdb->prefix . 'etudiants';

    // Récupérer les données du formulaire
    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);

    // Vérifier si l'utilisateur existe dans la base de données
    $student = $wpdb->get_row($wpdb->prepare(
        "SELECT id, password FROM $students_table WHERE email = %s",
        $email
    ));

    if ($student && password_verify($password, $student->password)) {
        // Si l'email et le mot de passe sont corrects, rediriger vers la page de demande avec l'ID de l'étudiant
        wp_redirect(home_url('/forme-demande?id=' . $student->id)); // Ajouter l'ID de l'étudiant dans l'URL
        exit;
    } else {
        // Si l'utilisateur n'existe pas ou si le mot de passe est incorrect
        wp_redirect(home_url('/connexion?login_error=1')); // Ajouter un paramètre d'erreur pour afficher le message
        exit;
    }
}






global $student_id;

function display_document_request_form() {
    if (!is_user_logged_in()) {
        return '<p>Veuillez vous connecter pour soumettre une demande.</p>';
    }

    // Récupérer l'ID de l'étudiant depuis l'URL
    $student_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    return '
    <form action="' . esc_url(admin_url('admin-post.php')) . '" method="POST">
        <input type="hidden" name="action" value="submit_document_request">
        <input type="hidden" name="student_id" value="' . esc_attr($student_id) . '">
        
        <label for="document_type">Type de Document:</label>
        <select name="document_type" required>
            <option value="Attestation">Attestation</option>
            <option value="Relevé de Notes">Relevé de Notes</option>
            <option value="Certificat de Scolarité">Certificat de Scolarité</option>
        </select><br>

        <label for="demande_type">Type de Demande:</label>
        <select name="demande_type" required>
            <option value="Demande Urgente">Demande Urgente</option>
            <option value="Demande Normale">Demande Normale</option>
        </select><br>

        <label for="additional_data">Données Supplémentaires:</label>
        <textarea name="additional_data" rows="4"></textarea><br>

        <button type="submit">Soumettre la Demande</button>
    </form>';
}
add_shortcode('document_request_form', 'display_document_request_form');
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
    $document_type = sanitize_text_field($_POST['document_type']);
    $demande_type = sanitize_text_field($_POST['demande_type']); // Type de demande
    $additional_data = sanitize_textarea_field($_POST['additional_data']); // Données supplémentaires

    // Insérer la demande dans la base de données
    $wpdb->insert($table_name, [
        'student_id' => $student_id,
        'titre' => $titre,
        'demande_type' => $demande_type,
        'description' => $description,
        'additional_data' => $additional_data
    ]);

    // Rediriger vers la page de succès
    wp_redirect(home_url('/demande-reussie'));
    exit;
}
add_action('admin_post_nopriv_submit_document_request', 'submit_document_request');
add_action('admin_post_submit_document_request', 'submit_document_request');








//   partie admin 

function display_document_requests_page() {
    // Vérifier si l'utilisateur est administrateur
    if (!current_user_can('manage_options')) {
        return '<p>Vous n’avez pas les autorisations nécessaires pour voir cette page.</p>';
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'document_requests';
    $students_table = $wpdb->prefix . 'etudiants';

    // Récupérer toutes les demandes
    $requests = $wpdb->get_results("
        SELECT r.id, r.document_type, r.demande_type, r.additional_data, r.created_at, e.email,r.status
        FROM $table_name r
        INNER JOIN $students_table e ON r.student_id = e.id
        ORDER BY r.created_at DESC
    ");

    // Construire le tableau HTML
    ob_start();
    ?>
    <div class="document-requests">
        <h2>Liste des Demandes</h2>
        <table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email Étudiant</th>
                    <th>Type de Document</th>
                    <th>Type de Demande</th>
                    <th>Status</th>
                    <!-- <th>Données Supplémentaires</th>
                    <th>Date de Création</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($requests): ?>
                    <?php foreach ($requests as $request): ?>
                        <tr>
                            <td><?php echo esc_html($request->id); ?></td>
                            <td><?php echo esc_html($request->email); ?></td>
                            <td><?php echo esc_html($request->document_type); ?></td>
                            <td><?php echo esc_html($request->demande_type); ?></td>
                            <td><?php echo esc_html($request->status ); ?></td>
                            <!-- <td><?php echo esc_html($request->additional_data); ?></td>
                            <td><?php echo esc_html($request->created_at); ?></td> -->
                            <td>
                                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="accept_document_request">
                                    <input type="hidden" name="request_id" value="<?php echo esc_attr($request->id); ?>">
                                    <input type="hidden" name="email" value="<?php echo esc_attr($request->email); ?>">
                                    <button type="submit">Accepter</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Aucune demande trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('admin_document_requests', 'display_document_requests_page');



add_action('admin_post_accept_document_request', 'accept_document_request');

function accept_document_request() {
    // Vérifiez les permissions de l'utilisateur
    if (!current_user_can('manage_options')) {
        wp_die('Vous n’êtes pas autorisé à effectuer cette action.');
    }

    // Récupérer les données du formulaire
    $request_id = intval($_POST['request_id']);
    $email = sanitize_email($_POST['email']);

    // Ajouter une vérification pour confirmer que la demande existe
    global $wpdb;
    $table_name = $wpdb->prefix . 'document_requests';
    $request = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $request_id));

    if (!$request) {
        wp_die('Demande introuvable.');
    }

    // Envoyer l'email à l'étudiant
    $subject = 'Votre demande a été acceptée';
    $message = "Bonjour,\n\nVotre demande pour le document « {$request->document_type} » a été acceptée. Vous pouvez le récupérer ou consulter les prochaines étapes.\n\nCordialement,\nL'équipe administrative.";
    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    wp_mail($email, $subject, $message, $headers);

    // Mettre à jour le statut de la demande dans la base de données (facultatif)
    $wpdb->update(
        $table_name,
        ['status' => 'accepted'], // Ajoutez une colonne status dans votre table si nécessaire
        ['id' => $request_id]
    );

    // Rediriger vers la page de succès ou la liste des demandes
    wp_redirect($_SERVER['HTTP_REFERER']); // Retourner à la page précédente
    exit;
    
}