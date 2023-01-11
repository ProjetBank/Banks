<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace-client</title>
</head>
<body>

    <main>
        <div class="soldeCompte">
        <?php 
        include "../../includes/db.database.php";

        $requestSolde = $conn -> prepare("SELECT solde FROM Bankaccounts WHERE id_user = 1");
        $requestSolde -> execute();
        $solde = $requestSolde -> fetch();

        echo $solde[0];
        ?>

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
                <p><?= $allTransaction['name_transaction'];  ?></p>
                <p><?= $allTransaction['montant'];  ?></p>
                <p><?= date_create($allTransaction['date'])->format('d/m/Y');  ?></p>
                <?php
            }
            
            
            
            ?>
        </div>
    </main>
    
</body>
</html>