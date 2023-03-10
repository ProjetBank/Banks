<?php

$page_title =" Mes Transactions - JLF.com";

ob_start()
?>

<div id="accueil_body1">
    <div id="accueil_title">
        <h1> BANQUE JLF | Mes Transactions </h1>
    </div>


    <h2>Vos 10 dernières transactions approuvées</h2>

    <div class="listeTransaction">
        <?php 
        $requestAllTransaction= 'SELECT name_transaction, montant, date
        FROM transactions
        WHERE statut = 1
        LIMIT 10' ;
        
        $transaction = $conn -> prepare($requestAllTransaction);
        $transaction -> execute([$_SESSION['user']['id']]);

        $currencie = $conn -> prepare('SELECT currencies.symbole FROM Bankaccounts INNER JOIN currencies ON bankaccounts.currencies = currencies.id  WHERE id_user = ?');
        $currencie -> execute([$_SESSION['user']['id']]);
        $symbole= $currencie -> fetch();

        while($allTransaction = $transaction -> fetch()){
            ?>
            <div id="transactions">
                <div class="transactionDate">
                    <p><?= date_create($allTransaction['date'])->format('d/m/Y');  ?></p>
                </div>
                <div class="transactionInfos">
                    <p><?= $allTransaction['name_transaction'];  ?></p>
                </div>
                <div class="transactionInfos">
                    <p><?= $allTransaction['montant'].$symbole[0];  ?></p>
                
                </div>
            </div>
            <?php
        }
        ?>
    </div>









    <h2>En attente</h2>




    <div class="listeTransaction">
        <?php 
        $requestAllTransaction= 'SELECT name_transaction, montant, date
        FROM transactions
        WHERE id_envoyeur = ? AND statut = 0';
        
        $transaction = $conn -> prepare($requestAllTransaction);
        $transaction -> execute([$_SESSION['user']['id']]);

        $currencie = $conn -> prepare('SELECT currencies.symbole FROM Bankaccounts INNER JOIN currencies ON bankaccounts.currencies = currencies.id  WHERE id_user = ?');
        $currencie -> execute([$_SESSION['user']['id']]);
        $symbole= $currencie -> fetch();

        while($allTransaction = $transaction -> fetch()){
            ?>
            <div id="transactions">
                <div class="transactionDate">
                    <p><?= date_create($allTransaction['date'])->format('d/m/Y');  ?></p>
                </div>
                <div class="transactionInfos">
                    <p><?= $allTransaction['name_transaction'];  ?></p>
                </div>
                <div class="transactionInfos">
                    <p><?= $allTransaction['montant'].$symbole[0];  ?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>


<?php
$page_content = ob_get_clean();

?>
