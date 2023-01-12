<?php

$page_title =" Mes Transactions - JLF.com";

ob_start()
?>

<div id="accueil_body1">
    <div id="accueil_title">
        <h1> BANQUE JLF | Mes Transactions </h1>
    </div>


    <div class="listeTransaction">
        <?php 
        $requestAllTransaction= 'SELECT name_transaction, montant, date
        FROM transactions
        WHERE id_client = ?';

        $transaction = $conn -> prepare($requestAllTransaction);
        $transaction -> execute([$_SESSION['user']['id']]);

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
</div>


<?php
$page_content = ob_get_clean();

?>
