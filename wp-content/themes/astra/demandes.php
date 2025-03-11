<?php
/* Template Name: Page des Demandes */

// Appel à la fonction de récupération des demandes
global $wpdb;
$table_name = $wpdb->prefix . 'document_requests';
$students_table = $wpdb->prefix . 'etudiants';

// Récupérer toutes les demandes
$requests = $wpdb->get_results("
    SELECT r.id, r.titre, r.demande_type, r.additional_data, r.description, e.email,e.apogee
    FROM $table_name r
    INNER JOIN $students_table e ON r.student_id = e.id
    ORDER BY r.created_at DESC
");

?>

<style>
/* Conteneur principal */
.dashboard-container {
    display: flex;
    min-height: 100vh;
    width: 100vw;
}

/* Sidebar Styling */
.sidebar {
    width: 250px;
    background-color: #17657D;
    color: #fff;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
    color: #fff;
    text-align: center;
    margin-bottom: 20px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 15px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 1rem;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.sidebar ul li a:hover {
    background-color: #0d4d5e;
}

/* Contenu principal */
.requests-container {
    flex-grow: 1;
    padding: 20px;
    background-color: #f4f4f4;
}

.requests-container h1 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 20px;
}

/* Tableau des demandes */
.requests-table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.requests-table th, .requests-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.requests-table th {
    background-color: #17657D;
    color: white;
}

.requests-table td {
    color: #333;
}

.requests-table .actions a {
    display: inline-block;
    padding: 8px 15px;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    margin-right: 5px;
}

.requests-table .actions .accept-btn {
    background-color: #28a745;
}

.requests-table .actions .reject-btn {
    background-color: #dc3545;
}
</style>

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#">Tableau de bord</a></li>
            <li><a href="#">Demandes</a></li>
            <li><a href="#">Déconnexion</a></li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div class="requests-container">
        <h1>Liste des Demandes</h1>
        <table class="requests-table">
            <thead>
                <tr>
                    <th>Email Étudiant</th>
                    <th>Apogee</th>
                    <th>Type de Demande</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($requests): ?>
                    <?php foreach ($requests as $request): ?>
                        <tr>
                            <td><?php echo esc_html($request->email); ?></td>
                            <td><?php echo esc_html($request->apogee); ?></td>
                            <td><?php echo esc_html($request->demande_type); ?></td>
                            <td><?php echo esc_html($request->description); ?></td>
                            <td><?php echo esc_html($request->additional_data); ?></td>
                            <td class="actions">
                                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="accept_document_request">
                                    <input type="hidden" name="request_id" value="<?php echo esc_attr($request->id); ?>">
                                    <input type="hidden" name="email" value="<?php echo esc_attr($request->email); ?>">
                                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" style="display:inline;">
                                     <input type="hidden" name="action" value="accept_document_request">
                                    <input type="hidden" name="request_id" value="<?php echo esc_attr($request->id); ?>">
                                    <input type="hidden" name="email" value="<?php echo esc_attr($request->email); ?>">
                                    

                                    <button type="submit">Accepter</button>
                                    </form>
                                </form>
                                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="refuse_document_request">
                                    <input type="hidden" name="request_id" value="<?php echo esc_attr($request->id); ?>">
                                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" style="display:inline;">
                                 <input type="hidden" name="action" value="refuse_document_request"> <!-- Action pour refuser -->
                                 <input type="hidden" name="request_id" value="<?php echo esc_attr($request->id); ?>"> <!-- ID de la demande -->
                                 <input type="hidden" name="email" value="<?php echo esc_attr($request->email); ?>">
                                    <button type="submit">Refuser</button>
                    </form>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucune demande trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
