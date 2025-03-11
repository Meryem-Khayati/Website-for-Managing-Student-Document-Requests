<?php
/* Template Name: Login and Sign In */
get_header();
?>
<style>
    /* Container Styling */
.login-signin-container {
    display: flex;
    justify-content: center;  /* Centre horizontalement */
    align-items: center;      /* Centre verticalement */
    min-height: 80vh;        /* Prend toute la hauteur de la page */
    padding: 20px;
    box-sizing: border-box;
    /* background-color:red; */
    width:100%;
  
}

/* Form Styling */
.form-container {
    background:#fff;
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
    margin-left:50px;

}



    </style>

<div class="login-signin-container">
    <!-- Formulaire de Connexion (Login) -->
    <div class="form-container login-form">
        <h2>Connexion</h2>
        <form action="#" method="POST">
            <label for="login-email">Email</label>
            <input type="email" id="login-email" name="email" placeholder="Entrez votre email" required>
            
            <label for="login-password">Mot de passe</label>
            <input type="password" id="login-password" name="password" placeholder="Entrez votre mot de passe" required>
            
            <button type="submit">Se connecter</button>
        </form>
       <p class="switch-btn">Si vous n'avez pas un compte, <a href="<?php echo site_url('/inscription'); ?>" id="create-account-btn">créez-en un</a>

       </p>

    </div>

   
<?php get_footer(); ?>

<script>
// JavaScript pour basculer entre le formulaire de connexion et d'inscription

// Attendre que le DOM soit entièrement chargé avant d'ajouter les événements
document.addEventListener('DOMContentLoaded', function() {
    // Bascule vers le formulaire d'inscription
    document.getElementById('create-account-btn').addEventListener('click', function() {
        document.querySelector('.login-form').style.display = 'none';  // Masquer le formulaire de connexion
        document.querySelector('.signin-form').style.display = 'block';  // Afficher le formulaire d'inscription
    });

    // Retour au formulaire de connexion
    document.getElementById('back-to-login-btn').addEventListener('click', function() {
        document.querySelector('.signin-form').style.display = 'none';  // Masquer le formulaire d'inscription
        document.querySelector('.login-form').style.display = 'block';  // Afficher le formulaire de connexion
    });
});

</script>
