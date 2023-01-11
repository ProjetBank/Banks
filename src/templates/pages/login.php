<?php
    $page_title = "Login - MonSite.com";

    // ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
    ob_start();
    ?>

 <!-- ===== Iconscout CSS ===== -->
 <!--  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
 -->
 <!-- ==== Emoji tkt ==== -->


 <!--<title>Login & Registration Form</title>-->

 <div class="container">
     <div class="forms">
         <div class="form login">
             <span class="title">Connexion</span>

             <form action="/?page=mon_espace" method="POST">
                 <div class="input-field">
                     <input type="text" placeholder="Entrer votre email" required>
                     <i class="fa-regular fa-envelope"></i>
                 </div>
                 <div class="input-field">
                     <input type="password" id="password" name="password" class="password" placeholder="Entrer votre passe" required>
                     <i class="fa-solid fa-lock"></i>
                     <i class="fa-regular fa-eye-slash showHidePw"></i>
                 </div>

                 <div class="checkbox-text">
                     <div class="checkbox-content">
                         <input type="checkbox" id="logCheck">
                         <label for="logCheck" class="text">Souviens-toi de moi</label>
                     </div>

                     <a href="#" class="text">Mot de passe oublié?</a>
                 </div>

                 <div class="input-field button">
                     <input type="submit" type="button" value="Connexion">
                 </div>
             </form>

             <div class="login-signup">
                 <span class="text">Pas membre?
                     <a href="#" class="text signup-link">S'inscrire maintenant</a>
                 </span>
             </div>
         </div>

         <!-- Registration Form -->
         <div class="form signup">
             <span class="title">Inscription</span>

             <form action="#">
                 <div class="input-field">
                     <input type="text" placeholder="Entrer votre Nom" required>
                     <i class="uil uil-user"></i>
                 </div>
                 <div class="input-field">
                     <input type="text" placeholder="Entrer votre email" required>
                     <i class="uil uil-envelope icon"></i>
                 </div>
                 <div class="input-field">
                     <input type="password" id="password" name="password" class="password" placeholder="Mot de passe" required>
                     <i class="fa-solid fa-lock"></i>
                 </div>
                 <div class="input-field">
                     <input type="password" id="cpassword" name="cpassword" class="password" placeholder="Confirmer le mot de passe" required>
                     <i class="fa-solid fa-lock"></i>
                     <i class="fa-regular fa-eye-slash showHidePw"></i>
                 </div>

                 <div class="checkbox-text">
                     <div class="checkbox-content">
                         <input type="checkbox" id="termCon">
                         <label for="termCon" class="text">j'ai accepté tous les termes et conditions</label>
                     </div>
                 </div>

                 <div class="input-field button">
                     <input type="button" value="Inscription">
                 </div>
             </form>

             <div class="login-signup">
                 <span class="text">Déjà membre?
                     <a href="#" class="text login-link">Connecte-toi maintenant</a>
                 </span>
             </div>
         </div>
     </div>
 </div>

 <script src="../../assets/js/login.js"></script>

 <?php
    // ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
    $page_content = ob_get_clean();