<?php
$page_title = "Espace Admin - Bank-JLF.com";

// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();


//if($_SERVER['PHP_SELF'] )
?>


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