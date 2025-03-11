<?php
/* Template Name: Admin Dashboard */

// Vérification de la connexion de l'utilisateur (si l'utilisateur est un admin)
if (is_user_logged_in() && current_user_can('administrator')) :
?>

<style>
    /* Conteneur Principal */
.dashboard-container {
    display: flex;
    height: 100vh;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    box-sizing: border-box;
}

.sidebar-header h2 {
    text-align: center;
    margin-bottom: 20px;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
}

.sidebar-menu li {
    margin: 15px 0;
}

.sidebar-menu li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    display: block;
}

.sidebar-menu li a:hover {
    background-color: #34495e;
    padding: 10px;
}

/* Contenu Principal */
.main-content {
    flex-grow: 1;
    padding: 30px;
    box-sizing: border-box;
}

.main-content h1 {
    color: #17657D;
}

.dashboard-stats, .recent-requests {
    margin-bottom: 30px;
}

.dashboard-stats p, .recent-requests h2 {
    font-size: 18px;
    color: #333;
}

.recent-requests ul {
    list-style: none;
    padding: 0;
}

.recent-requests li {
    background-color: #f4f4f4;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
}
</style>

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Dashboard</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="?page=dashboard">Tableau de Bord</a></li>
            <li><a href="?/index.php/dashdemandes/">Demandes</a></li>
            <li><a href="?page=utilisateurs">Utilisateurs</a></li>
            <li><a href="?page=parametres">Paramètres</a></li>
            <li><a href="<?php echo wp_logout_url(home_url()); ?>">Se Déconnecter</a></li>
        </ul>
    </div>

    <!-- Contenu Principal -->
    <div class="main-content">
        <?php
        // Charge la page dynamique en fonction de la query string
        $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
        
        if ($page == 'demandes') {
            // Inclure la page des demandes
            include 'admin-demandes.php'; // Un fichier PHP spécifique pour afficher les demandes
        } elseif ($page == 'utilisateurs') {
            // Inclure la page des utilisateurs
            include 'admin-utilisateurs.php'; // Un fichier PHP spécifique pour afficher les utilisateurs
        } elseif ($page == 'parametres') {
            // Inclure la page des paramètres
            include 'admin-parametres.php'; // Un fichier PHP spécifique pour afficher les paramètres
        } else {
            // Par défaut afficher tableau de bord
            echo '<h1>Bienvenue dans le Dashboard Admin</h1>';
            echo '<div class="dashboard-stats"><p>Statistiques des demandes en attente...</p></div>';
            echo '<div class="recent-requests"><h2>Demandes récentes</h2><ul><li>Demande 1 - Type : Attestation de réussite</li><li>Demande 2 - Type : Convention de stage</li><li>Demande 3 - Type : Relevé de notes</li></ul></div>';
        }
        ?>
    </div>
</div>

<?php else : ?>
    <!-- Si l'utilisateur n'est pas connecté ou n'est pas admin -->
    <p style="color:red;">Vous devez être connecté en tant qu'administrateur pour accéder à cette page.</p>
    <?php wp_redirect(home_url('/login')); exit; ?>
<?php endif; ?>
