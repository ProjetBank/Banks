
    

<?php

$page_title =" Mes Comptes - JLF.com";

ob_start()
?>
<div id="accueil_body1">
    <div id="accueil_title">
            <h1> BANQUE JLF | Mes Comptes </h1>
        </div>
        <div class="soldeCompte">
        <?php 

        $requestSolde = $conn -> prepare("SELECT solde, currencies.symbole FROM Bankaccounts INNER JOIN currencies ON bankaccounts.currencies = currencies.id  WHERE id_user = ?");
        $requestSolde -> execute([$_SESSION['user']['id']]);
        $solde = $requestSolde -> fetch();

        ?>
        <p><?= $solde[0];?><?= $solde[1];?></p>

        </div>
    </div>



    


</div>




<?php
$page_content = ob_get_clean();

?>

