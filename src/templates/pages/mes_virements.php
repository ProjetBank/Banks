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

                if(isset($_POST['deposite_name']) && $_POST['deposite_name'] == $_SESSION['user']['Full_Name']){
                    $virement_name = $_POST['deposite_name'];
                }else{
                    $error = true;
                }

                if(isset($_POST['deposite_password']) && hash('sha256', $_POST['deposite_password']) == $_SESSION['user']['password']){
                    $virement_password = $_POST['deposite_password'];
                }else{
                    $error = true;
                }
                          
                 if(!$error){
                    $deposite = $_POST['deposite_solde'];
                    $statement = $conn->prepare('INSERT INTO transactions (id_envoyeur, id_destinataire, montant, name_transaction, date, statut) VALUES (?, ?, ?, "deposit", NOW(), 0)');
                    $statement -> execute([$_SESSION['user']['id'],$_SESSION['user']['id'], $deposite]);
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
                        
                if(isset($_POST['withdraw_name']) && $_POST['withdraw_name'] == $_SESSION['user']['Full_Name']){
                    $virement_name = $_POST['withdraw_name'];
                }else{
                    $error = true;
                }

                if(isset($_POST['withdraw_password']) && hash('sha256', $_POST['withdraw_password']) == $_SESSION['user']['password']){
                    $virement_password = $_POST['withdraw_password'];
                }else{
                    $error = true;
                }



                if(!$error){

                    $withdraw = $_POST['withdraw_solde'];
                    $statement = $conn->prepare('INSERT INTO transactions (id_envoyeur, id_destinataire, montant, name_transaction, date, statut) VALUES (?, ?, ?, "withdraw", NOW(), 0)');
                    $statement -> execute([$_SESSION['user']['id'],$_SESSION['user']['id'], $withdraw]);
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
                    <input name="virement_IBAN" type="int" placeholder="IBAN du destinataire" required>
                </div>

                <div class="input-field">
                    <input name="virement_name" type="text" placeholder="Nom" required>
                </div>
                <div class="input-field">
                    <input name="virement_password" type="password" id="password" name="password" class="password" placeholder="Mot de passe" required>
                </div>
                <div class="input-field">
                    <input name="virement_text" type="text" placeholder="Sommes à virer" required>
                </div>
                <div class="input-field">
                    <input name="virement_solde" type="text" placeholder="Sommes à virer" required>
                </div>

        
                <div class="input-field button">
                    <input type="submit" value="Virement" name="Virement">

                </div>
            </div>
        </form>
             <?php 

            $error = false;
            if(isset($_POST['Virement'])){

                if(isset($_POST['virement_IBAN'])){
                    $virement_IBAN = $_POST['virement_IBAN'];
                }else{
                    $error = true;
                }

                if(isset($_POST['virement_password']) && hash('sha256', $_POST['virement_password']) == $_SESSION['user']['password']){
                    $virement_password = $_POST['virement_password'];
                }else{
                    $error = true;
                }

                if(isset($_POST['virement_name']) && $_POST['virement_name'] == $_SESSION['user']['Full_Name']){
                    $virement_name = $_POST['virement_name'];
                }else{
                    $error = true;
                }

                if(isset($_POST['virement_solde'])){
                    $virement_solde= $_POST['virement_solde'];
                }else{
                    $error = true;
                }

                $iban = $_POST['virement_IBAN'];
                $transaction_name = $_POST['virement_text'];
                        
                if(!$error){
                    $statement = $conn->prepare('INSERT INTO transactions (id_envoyeur, id_destinataire, montant, name_transaction, date, statut) VALUES (?, ?, ?, ?, NOW(), 0)');
                    $statement -> execute([$_SESSION['user']['id'], $virement_IBAN, $virement_solde, $transaction_name]);
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

<?php


?>


<?php
$page_content = ob_get_clean();

?>
