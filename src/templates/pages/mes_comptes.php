
    

<?php

$page_title =" Mes Comptes - JLF.com";

ob_start()
?>
<div id="accueil_body1">
    <div id="accueil_title">
            <h1> BANQUE JLF | Mes Comptes </h1>
        </div>
        <div id="compte">
            <div class="soldeCompte">
            <?php 

            $requestSolde = $conn -> prepare("SELECT solde, currencies.symbole FROM Bankaccounts INNER JOIN currencies ON bankaccounts.currencies = currencies.id  WHERE id_user = ?");
            $requestSolde -> execute([$_SESSION['user']['id']]);
            $solde = $requestSolde -> fetch();
    
            ?>
            <p><?= $solde[0];?><?= $solde[1];?></p>

            </div>
        </div>

        <div class="currencieChanger">
            <?php

            $listeCurrencie = $conn -> prepare('SELECT * FROM currencies');
            $listeCurrencie -> execute();


            while($curr = $listeCurrencie->fetch()){
                ?>
                    <form method="POST" action="">
                        <input type="hidden" name="value" id="idUser1" value="<?= $curr['value'] ?>">
                        <input type="hidden" name="id3" id="idUser1" value="<?= $curr['id'] ?>">
                        <input type="submit" name="buttonCurrencie" id="idUser1" value="<?= $curr['name'].'  :  '.$curr['symbole'] ?>">
                    </form>

                <?php
            }
            ?>
        </div>
    </div>
</div>




<?php
if(isset($_POST['buttonCurrencie'])){

    $requeteGetCurrencie = $conn -> prepare('SELECT currencies FROM bankaccounts WHERE id_user = ?');
    $requeteGetCurrencie -> execute([$_SESSION['user']['id']]);
    $userCurrentCurrencie = $requeteGetCurrencie -> fetch();

    if($_POST['id3'] != $userCurrentCurrencie[0]){

        
        $listeCurrencie = $conn -> prepare('SELECT value FROM currencies WHERE id = ?');
        $listeCurrencie -> execute([$_POST['id3']]);
        $valeur = $listeCurrencie->fetch();


        $setCurrencie = $conn -> prepare('UPDATE bankaccounts SET solde = solde / ? WHERE id_user = ?');
        $setCurrencie -> execute([$_POST['value'], $_SESSION['user']['id']]);

        $setCurrencie = $conn -> prepare('UPDATE bankaccounts SET solde = solde * ? WHERE id_user = ?');
        $setCurrencie -> execute([$valeur[0], $_SESSION['user']['id']]);

        $setCurrencie = $conn -> prepare('UPDATE bankaccounts SET currencies = ? WHERE id_user = ?');
        $setCurrencie -> execute([$_POST['id3'], $_SESSION['user']['id']]);
    
        
    
        
        

        
    }

    header('Location: /?page=mes_comptes');
    exit();

}




$page_content = ob_get_clean();

?>

