<?php
$page_title = "Espace Validation - Bank-JLF.com";


// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();


function ban($conn, $valeur){
    $update = 'UPDATE users
    SET role = 0
    WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$valeur]);
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


    <div class="table-resultUsers">
        <?php
            if(isset($_POST['search'])){
                $requeteValidationUser= 'SELECT * FROM users WHERE role = 10 AND Full_Name = ?';

                $Validation = $conn -> prepare($requeteValidationUser);
                $Validation -> execute([$_POST['search']]);

                while($AllValidation = $Validation -> fetch()){
                ?>
                <div>
                    <p><?= $AllValidation['id'];  ?></p>
                    <p><?= $AllValidation['Full_Name']; ?></p>
                    <p><?= $AllValidation['phone'];  ?></p>
                    <p><?= $AllValidation['email'];  ?></p>
                    <p><button>Bannir</button></p>
                </div>
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
                    <p><button><?= $AllValidation['id']; ?></button></p>
                </div>
                <?php
                }
            }
            ?>
        
    </div>


</main>

<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();
?>