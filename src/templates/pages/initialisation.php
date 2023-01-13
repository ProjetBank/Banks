<?php

$page_title = "Login - Bank-JLF.com";


// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>

<!-- ===== Iconscout CSS ===== -->
<!--  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
-->
<!-- ==== Emoji tkt ==== -->

<div class="container">
<div id="accueil_title">
        <h1> BANQUE JLF | Initaliser un compte Administrateur </h1>
    </div>
 <div class="forms">

     <!-- Registration Form -->
     <div class="form signup">
         <span class="title">Inscription</span>

         <form action="actions/initialisation.php" method="POST">
             <div class="input-field">
                 <input name="fullName" type="text" placeholder="Entrer votre Nom" required>
                 <i class="uil uil-user"></i>
             </div>
             <div class="input-field">
                 <input name="emailInscription" type="text" placeholder="Entrer votre email" required>
                 <i class="uil uil-envelope icon"></i>
             </div>
             <div class="input-field">
                <input name="phoneNumber" type="text" placeholder="Entrer votre numero de téléphone" required>
                <i class="uil uil-user"></i>
             </div>
             <div class="input-field">
                 <input name="passwordInscription" type="password" id="password" name="password" class="password" placeholder="Mot de passe" required>
                 <i class="fa-solid fa-lock"></i>
             </div>
             <div class="input-field">
                 <input name="confirmationPassword" type="password" id="cpassword" name="cpassword" class="password" placeholder="Confirmer le mot de passe" required>

                 <i class="fa-solid fa-lock"></i>
                 <i class="fa-regular fa-eye-slash showHidePw"></i>
             </div>

             

             <div class="input-field button">
                 <input type="submit" value="Inscription" name="Inscription">

             </div>
         </form>
     </div>
 </div>
</div>

<script src="../../assets/js/login.js"></script>

<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();
?>
