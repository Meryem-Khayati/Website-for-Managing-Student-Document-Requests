<?php
/* Template Name: Inscription */
get_header();


?>
<style>
     
     


    /* Container Styling */
    .login-signin-container {
        display: flex;
        justify-content: center;  /* Centre horizontalement */
        align-items: center;      /* Centre verticalement */
        min-height: 80vh;         /* Prend toute la hauteur de la page */
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

    .form-container input {
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

    /* Hide the SignIn form initially */
    .signin-form {
        display: none;
    }

    /* Switch buttons */
    .switch-btn {
        border: none;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background 0.3s ease;
        margin-left:35px;
        margin-top:20px;
    }

</style>

<!-- Main Container -->
<div class="login-signin-container">
    <!-- Formulaire de Connexion (Login) -->
    <div class="form-container login-form">
        <h2>Connexion</h2>
        <!-- Afficher le message d'erreur s'il y a un problème avec les identifiants -->
        <?php
        if (isset($_GET['login_error']) && $_GET['login_error'] == '1') {
            echo '<p style="color: red;">Email ou mot de passe incorrect.</p>';
        }
        ?>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
    <input type="hidden" name="action" value="custom_login_check">
    
    <label for="login-email">Email</label>
    <input type="email" id="login-email" name="email" placeholder="Entrez votre email" required>
    
    <label for="login-password">Mot de passe</label>
    <input type="password" id="login-password" name="password" placeholder="Entrez votre mot de passe" required>
    
    <button type="submit">Se connecter</button>
</form>
        <p class="switch-btn">Si vous n'avez pas un compte, <a href="#" id="create-account-btn">Créez-en un</a></p>
    </div>

    <!-- Formulaire d'Inscription (Sign In) -->
    <div class="form-container signin-form">
        <h2>Inscription</h2>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
    <input type="hidden" name="action" value="register_etudiant">

    <label for="signup-first-name">Prénom</label>
    <input type="text" id="signup-first-name" name="first_name" placeholder="Entrez votre prénom" required>

    <label for="signup-last-name">Nom</label>
    <input type="text" id="signup-last-name" name="last_name" placeholder="Entrez votre nom" required>

    <label for="signup-cin">CIN</label>
    <input type="text" id="signup-cin" name="cin" placeholder="Entrez votre CIN" required>

    <label for="signup-apogee">Code apogée</label>
    <input type="text" id="signup-apogee" name="apogee_code" placeholder="Entrez votre Code apogée" required>

    <label for="signup-email">Email</label>
    <input type="email" id="signup-email" name="email" placeholder="Entrez votre email" required>

    <label for="signup-password">Mot de passe</label>
    <input type="password" id="signup-password" name="password" placeholder="Créez un mot de passe" required>

    <button type="submit">S'inscrire</button>
</form>
        <p class="switch-btn">Si vous avez déjà un compte,<a id="back-to-login-btn" >Connectez-vous ici</a></p>


    </div>
</div>

<?php get_footer(); ?>

<script>
// JavaScript pour basculer entre les formulaires de connexion et d'inscription
document.getElementById('create-account-btn').addEventListener('click', function() {
    document.querySelector('.login-form').style.display = 'none';
    document.querySelector('.signin-form').style.display = 'block';
});

document.getElementById('back-to-login-btn').addEventListener('click', function() {
    document.querySelector('.signin-form').style.display = 'none';
    document.querySelector('.login-form').style.display = 'block';
});
</script>
