<?php

$page_title =" Mes Transactions - JLF.com";

ob_start()
?>

<div id="accueil_body1">
    <div id="accueil_title">
        <h1> BANQUE JLF | Mes Virements </h1>
    </div>
    <div id="virements_body">
        <div id="deposer">
            <h2>Déposer une somme</h2>
        </div>
        <div id="deposerOnClick">
            <h2>Déposer une somme</h2>
        </div>
        <div id="retirer">
            <h2>Retirer une somme</h2>
        </div>
        <div id="retirerOnClick">
            <h2>Retirer une somme</h2>
        </div>
        <div id="virement">
            <h2>Faire un virement</h2>
        </div>
        <div id="virementOnClick">
            <h2>Faire un virement</h2>
        </div>
    </div>

    <div id="div_form_deposer">
    <form action="#" id="deposer_form" method="POST">
                 <div class="input-field">
                     <input name="deposite_cb" type="text" placeholder="Numéro de Carte Bleue" required>
                 </div>
                 <div class="input-field">
                     <input name="deposite_crypt" type="text" placeholder="Cryptogram" required>
                 </div>
                 <div class="input-field">
                     <input name="deposite_date" type="text" placeholder="Date d'expiration" required>
                 </div>
                 
                 <div class="input-field">
                     <input name="deposite_name" type="text" placeholder="Nom" required>
                 </div>
                 <div class="input-field">
                     <input name="deposite_password" type="password" id="password" name="password" class="password" placeholder="Mot de passe" required>
                 </div>
                 <div class="input-field">
                     <input value="0" name="deposite_solde" type="text" placeholder="Sommes à deposer" required>
                 </div>
                 
            
                 <div class="input-field button">
                     <input type="submit" value="Deposer" name="Deposer">

                 </div>
             </form>
             <?php 

             $error = false;

             if(isset($_POST['Deposer'])) {
                          
                 if(!$error){
                    $deposite = $_POST['deposite_solde'];
                    
                    $requestSolde = $conn -> prepare("UPDATE bankaccounts SET solde = solde + $deposite WHERE id_user = ?");
                    $requestSolde -> execute([$_SESSION['user']['id']]);
                    $solde = $requestSolde -> fetch();
                 }
             }

                $requestDeposite = $conn -> prepare("SELECT solde, currencies.symbole FROM Bankaccounts INNER JOIN currencies ON bankaccounts.currencies = currencies.id  WHERE id_user = ?");
                $requestDeposite -> execute([$_SESSION['user']['id']]);
                $soldeDeposite = $requestDeposite -> fetch();

                ?>


    </div>
    <div id="div_form_retirer">
    <form action="#" id="retirer_form" method="POST">
                 <div class="input-field">
                     <input name="withdraw_name" type="text" placeholder="Nom" required>
                 </div>
                 <div class="input-field">
                     <input name="withdraw_password" type="password" id="password" name="password" class="password" placeholder="Mot de passe" required>
                 </div>
                 <div class="input-field">
                     <input name="withdraw_solde" type="text" placeholder="Sommes à retirer" required>
                 </div>
            
                 <div class="input-field button">
                     <input type="submit" value="Retirer" name="Retirer">
                 </div>
             </form>
             <?php 

            $error = false;

            if(isset($_POST['Retirer'])) {
                        
                if(!$error){

                $withdraw = $_POST['withdraw_solde'];
                $requestSolde = $conn -> prepare("UPDATE bankaccounts SET solde = solde - $withdraw WHERE id_user = ?");
                $requestSolde -> execute([$_SESSION['user']['id']]);
                $solde = $requestSolde -> fetch();
                }
            }

            $requestWithdraw = $conn -> prepare("SELECT solde, currencies.symbole FROM Bankaccounts INNER JOIN currencies ON bankaccounts.currencies = currencies.id  WHERE id_user = ?");
            $requestWithdraw -> execute([$_SESSION['user']['id']]);
            $soldeDeposite = $requestWithdraw -> fetch();

            ?>
    </div>
    <div id="div_form_virement">
    <form action="#" id="virement_form" method="POST">
                <div class="input-field">
                     <input name="virement_IBAN" type="text" placeholder="IBAN du destinataire" required>
                 </div>

                 <div class="input-field">
                     <input name="virement_name" type="text" placeholder="Nom" required>
                 </div>
                 <div class="input-field">
                     <input name="virement_password" type="password" id="password" name="password" class="password" placeholder="Mot de passe" required>
                 </div>
                 <div class="input-field">
                     <input name="virement_solde" type="text" placeholder="Sommes à virer" required>
                 </div>
            
                 <div class="input-field button">
                     <input type="submit" value="Virement" name="Virement">

                 </div>
             </form>
             <?php 

            $error = false;

            if(isset($_POST['Virement'])) {

                $iban = $_POST['virement_IBAN'];
                        
                if(!$error){
                    
                $virement = $_POST['virement_solde'];
                $requestSolde1 = $conn -> prepare("UPDATE bankaccounts SET solde = solde - $virement WHERE id_user = ?");
                $requestSolde1 -> execute([$_SESSION['user']['id']]);
                $solde1 = $requestSolde1 -> fetch();

                $requestSolde2 = $conn -> prepare("UPDATE bankaccounts SET solde = solde + $virement WHERE id_user = $iban");
                $requestSolde2 -> execute([$_SESSION['user']['1']]);
                $solde2 = $requestSolde2 -> fetch();
                }
            }

            $requestVirement = $conn -> prepare("SELECT solde, currencies.symbole FROM Bankaccounts INNER JOIN currencies ON bankaccounts.currencies = currencies.id  WHERE id_user = ?");
            $requestVirement -> execute([$_SESSION['user']['id']]);
            $soldeDeposite = $requestVirement -> fetch();

            ?>
             <div id="compte">
                <div class="soldeCompte">
                    <p id="deposite" ><?=$soldeDeposite["solde"];?><?= $soldeDeposite[1];?></p>
                </div>
            </div>
    </div>

</div>

<?php


?>


<?php
$page_content = ob_get_clean();

?>
