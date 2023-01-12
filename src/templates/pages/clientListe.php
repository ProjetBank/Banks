<?php
$page_title = "Espace Validation - Bank-JLF.com";


// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();


function NameExiste($conn, $pseudo){
    $functionPseudo = $conn -> prepare('SELECT users.* FROM users WHERE users.Full_Name = ?');
    $functionPseudo -> execute([$pseudo]);
    $functionPseudoExiste = $functionPseudo-> fetch();
    
    if(empty($functionPseudoExiste)){
        return false;
    }else{
        return true;
    }
}

?>

<main>
    <div id="accueil_body1">
        <div id="accueil_title">
            <h1> BANQUE JLF | Compte en attente de validation. </h1>
        </div>
    </div>
    <form method="POST">
        <div class="SearchBarScores">
            <label for="searchScores">
                <img src="#" class="iconSearchBar">
            </label>
            <input name="search" type="text" id="searchScores" placeholder="Search for a player">
        </div>
    </form>

    <div class="TableUsers">
        <h3 class="tableTitleScores">ID</h3>
        <h3 class="tableTitleScores">Full Name</h3>
        <h3 class="tableTitleScores">Phone number</h3>
        <h3 class="tableTitleScores">Email</h3>
    </div>


    <div class="resultUsers">
        <div class="container-itemScore">
            <?php
                if(isset($_POST['search'])){
                    if(NameExiste($conn, $_POST['search'])){

                        $requeteValidationUser= 'SELECT * FROM users WHERE role = 10 AND Full_Name = ?';

                        $Validation = $conn -> prepare($requeteValidationUser);
                        $Validation -> execute([$_POST['search']]);

                        while($AllValidation = $Validation -> fetch()){
                        ?>
                            <p><?= $AllValidation['id'];  ?></p>
                            <p><?= $AllValidation['Full_Name']; ?></p>
                            <p><?= $AllValidation['phone'];  ?></p>
                            <p><?= $AllValidation['email'];  ?></p>
                            <form method="post" action="">
                                <input type="hidden" name="idUser" value="<?php $AllValidation['id'];  ?>">
                                <input type="submit" name="buttonBan" value="Ban">
                            </form>
                            
                        <?php
                        }
                    }else{

                        $requeteValidationUser= 'SELECT * FROM users WHERE role = 10';

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
                                <input type="hidden" name="idUser" value="<?php $AllValidation['id'];  ?>">
                                <input type="submit" name="buttonBan" value="Ban">
                            </form>
                        </div>
                        <?php
                        }
                    }

                }else{
                    $requeteValidationUser= 'SELECT * FROM users WHERE role = 10';

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
                            <input type="hidden" name="idUser" value="<?=$AllValidation['id']  ?>">
                            <input type="submit" name="buttonBan" value="Ban">
                        </form>
                    </div>
                    <?php
                    }
                }
                ?>
        </div>
    </div>


</main>

<?php
if(isset($_POST['buttonBan'])){
    $update = 'UPDATE users
    SET role = 0
    WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser']]);

    header('Location: /?page=clientListe');
    exit();
}



// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();
?>