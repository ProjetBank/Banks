<?php
$page_title = "Transactions - Bank-JLF.com";


// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();

?>
<div id="accueil_body1">
    <div id="accueil_title">
        <h1> BANQUE JLF | Transactions </h1>
    </div>
</div>




    <div class="listeTransaction">
        <?php 
        $requestAllTransaction= 'SELECT *
        FROM transactions
        WHERE statut = 0';
        
        $transaction = $conn -> prepare($requestAllTransaction);
        $transaction -> execute([$_SESSION['user']['id']]);

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
                    <p><?= $allTransaction['montant'];  ?></p>
                    <p><?= $allTransaction['id'];  ?></p>
                </div>
                <form method="POST" action="" id="operation_refu">
                    <input type="hidden" name="idUser1" id="idUser1" value="<?=$allTransaction['id'];?>">
                    <input type="submit" name="buttonAcceptation" id="idUser1" value="Accepté">
                </form>
                <form method="POST" action="" id="operation_refu">
                    <input type="hidden" name="idUser2" id="idUser2" value="<?=$allTransaction['id'];?>">
                    <input type="submit" name="buttonRefus" id="idUser2" value="Refusé">
                </form>
            </div>
            <?php
        }
        ?>
    </div>



<?php

if(isset($_POST['buttonAcceptation'])){
    $update = 'UPDATE transactions SET statut = 1 WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser1']]);

    header('Location: /?page=transactions');
    exit();
}

if(isset($_POST['buttonRefus'])){
    $update = 'DELETE FROM transactions WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser2']]);

    header('Location: /?page=transactions');
    exit();
}
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();
?>