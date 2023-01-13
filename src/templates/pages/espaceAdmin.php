<?php
$page_title = "Espace Client - Bank-JLF.com";

// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
$requestSolde = $conn -> prepare("SELECT role FROM users WHERE id = 8");
$requestSolde -> execute();
$roleadmin = $requestSolde -> fetch();

//if($_SERVER['PHP_SELF'] )
?>
<?= $_SESSION['user']['id'] ?>





<div id="accueil_body1">
<div id="accueil_title">
        <h1> BANQUE JLF | Espace Admins </h1>
    </div>
    <div id="accueil_image1">
        <img src="../assets/imgs/accueil_1.jpg" id="image1">
    </div>
</div>









<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();
?>