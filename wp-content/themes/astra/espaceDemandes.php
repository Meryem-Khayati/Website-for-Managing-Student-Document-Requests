<?php
/* Template Name: Soumettre une Demande */
get_header();

$student_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>

<style>
    /* Container Styling */
    .login-signin-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 20px;
        box-sizing: border-box;
        width: 100%;
    }

    /* Form Styling */
    .form-container {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 500px;
        box-sizing: border-box;
    }

    .form-container h2 {
        text-align: center;
        color: #17657D;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }

    .form-container label {
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
        display: block;
    }

    .form-container input,
    .form-container textarea,
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
    }

    .form-container button {
        width: 100%;
        background: #17657D;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background 0.3s ease;
    }

    .form-container button:hover {
        background: #0d4d5e;
    }

    .additional-field {
        display: none;
    }
</style>

<div class="login-signin-container">
    <div class="form-container">
        <h2>Soumettre une Demande</h2>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
            <input type="hidden" name="action" value="submit_document_request">
            <input type="hidden" name="student_id" value="<?php echo esc_attr($student_id); ?>">

            <label for="demande-title">Titre de la demande</label>
            <input type="text" id="demande-title" name="titre" placeholder="Entrez le titre de votre demande" required>

            <label for="demande-type">Type de demande</label>
            <select id="demande-type" name="demande_type" required>
                <option value="">Sélectionnez le type de demande</option>
                <option value="Attestation d'inscription">Attestation d'inscription</option>
                <option value="Attestation de réussite">Attestation de réussite</option>
                <option value="Convention de stage">Convention de stage</option>
                <option value="Réclamation">Réclamation</option>
                <option value="Relevés de notes">Relevés de notes</option>
                <option value="autres">Autres</option>
            </select>

            <div id="autres-field" class="additional-field">
                <label for="demande-other">Précisez le type de votre demande</label>
                <input type="text" id="demande-other" name="other" placeholder="Type de demande">
            </div>

            <label for="demande-description">Description</label>
            <textarea id="demande-description" name="description" placeholder="Entrez la description de votre demande" required></textarea>

            <button type="submit">Soumettre la demande</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>

<script>
// JavaScript pour afficher dynamiquement le champ "Autres" si sélectionné
document.getElementById('demande-type').addEventListener('change', function() {
    var otherField = document.getElementById('autres-field');
    if (this.value === 'autres') {
        otherField.style.display = 'block';
    } else {
        otherField.style.display = 'none';
    }
});
</script>
