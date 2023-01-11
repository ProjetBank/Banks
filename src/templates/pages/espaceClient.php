<?php
$page_title = "Espace Client - Bank-JLF.com";

// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>


<main>
    <div class="soldeCompte">
    <?php 

    $requestSolde = $conn -> prepare("SELECT solde, currencies.symbole FROM Bankaccounts INNER JOIN currencies ON bankaccounts.currencies = currencies.id  WHERE id_user = 1");
    $requestSolde -> execute();
    $solde = $requestSolde -> fetch();
    ?>
    <p><?= $solde[0];?><?= $solde[1];?></p>

    </div>
    <div class="listeTransaction">
        <?php 
        $requestAllTransaction= 'SELECT name_transaction, montant, date
        FROM transactions
        WHERE id_client = 1';

        $transaction = $conn -> prepare($requestAllTransaction);
        $transaction -> execute();

        while($allTransaction = $transaction -> fetch()){
            ?>
            <div class="transactionDate">
                <p><?= date_create($allTransaction['date'])->format('d/m/Y');  ?></p>
            </div>
            <div class="transactionInfos">
                <p><?= $allTransaction['name_transaction'];  ?></p>
                <p><?= $allTransaction['montant'];  ?></p>
            </div>
            <?php
        }
        
        
        
        ?>
    </div>
</main>


<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();
?>