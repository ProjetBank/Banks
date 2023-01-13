<?php

session_start();
require_once __DIR__ . '../../../src/includes/db.database.php';
//register
$error = false;

if(isset($_POST['Inscription'])){   

    if(isset($_POST['emailInscription'])){
        if(filter_var($_POST['emailInscription'], FILTER_VALIDATE_EMAIL)){
            $emailInscription = $_POST['emailInscription'];
        }else{
            $error = true;
        }
    }else{
        $error = true;
    }


    $pseudo = $_POST['fullName'];


    if(isset($_POST['passwordInscription'])){
        $passwordInscription = $_POST['passwordInscription'];

        $uppercase = preg_match('@[A-Z]@', $passwordInscription);
        $lowercase = preg_match('@[a-z]@', $passwordInscription);
        $number    = preg_match('@[0-9]@', $passwordInscription);
        $specialChars = preg_match('@[^\w]@', $passwordInscription);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || mb_strlen($passwordInscription) < 8) {
            $error = true;
        }
        
    }else{
        $error = true;
    }

    if(strlen($_POST['phoneNumber']) == 10){
        $phone = $_POST['phoneNumber'];
    }else{
        $error = true;
    }

    if(isset($_POST['passwordInscription']) && isset($_POST['confirmationPassword'])){
        if($_POST['passwordInscription'] != $_POST['confirmationPassword']){
            $error = true;
        }
    }else{
        $error = true;
    }

    if(!$error){
        $new_mdp= hash('sha256',$passwordInscription);

        $statement = $conn->prepare('INSERT INTO users (Full_Name, phone, email, password, role) VALUES (?, ?, ?, ?, 1000)');
        $statement->execute([$pseudo, $phone, $emailInscription, $new_mdp]);

        header('Location: /?page=espaceFondateur');
        exit();
    }else{
        header('Location: /?page=espaceFondateur');
        exit();
    }
}
?>