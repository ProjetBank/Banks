<?php
$page_title = "Espace Validation - Bank-JLF.com";


// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>

<main>
    <div id="accueil_body1">
        <div id="accueil_title">
            <h1> BANQUE JLF | Compte en attente de validation. </h1>
        </div>
    </div>

    <div class="TableUsers">
        <h3 class="tableTitleScores">ID</h3>
        <h3 class="tableTitleScores">Full Name</h3>
        <h3 class="tableTitleScores">Phone number</h3>
        <h3 class="tableTitleScores">Email</h3>
    </div>


    <div class="table-resultUsers">
        <?php

            $requeteValidationUser= 'SELECT * FROM users WHERE role = 1';

            $Validation = $conn -> prepare($requeteValidationUser);
            $Validation -> execute();

            while($AllValidation = $Validation -> fetch()){
            ?>
            <div>
                <p><?= $AllValidation['id'];  ?></p>
                <p><?= $AllValidation['Full_Name']; ?></p>
                <p><?= $AllValidation['phone'];  ?></p>
                <p><?= $AllValidation['email'];  ?></p>
                <form method="POST" action="">
                    <input type="hidden" name="idUser1" value="<?=$AllValidation['id']  ?>">
                    <input type="submit" name="buttonAcceptation" value="Autorisé">
                </form>
                <form method="POST" action="">
                    <input type="hidden" name="idUser2" value="<?=$AllValidation['id']  ?>">
                    <input type="submit" name="buttonRefus" value="Refusé">
                </form>
            </div>
            <?php
            }
            ?>
        
    </div>


</main>



<?php
if(isset($_POST['buttonAcceptation'])){
    $update = 'UPDATE users SET role = 10 WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser1']]);

    header('Location: /?page=validationUsers');
    exit();
}

if(isset($_POST['buttonRefus'])){
    $update = 'DELETE FROM users WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser2']]);

    header('Location: /?page=validationUsers');
    exit();
}



// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();
?>