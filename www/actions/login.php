<?php
session_start();
require_once __DIR__ . '../../../src/includes/db.database.php';


//Login
$error = false;

if(isset($_POST['Connexion'])) {

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
        $email = $_POST['email'];

    }else{
        $error = true;
    }

    $password = $_POST['password'];

    if(!$error){
        $requeteLogin = 'SELECT * FROM users WHERE email = ? AND password = ?';

        $requeteStatment = $conn->prepare($requeteLogin);
        $requeteStatment->execute([$email, hash('sha256',$password)]);
        $requete = $requeteStatment->fetch();

        if(!empty($requete)){
            if($requete['role'] == 1000 || $requete['role'] == 200){
                $_SESSION['user'] = $requete;
                header('Location: /?page=espaceAdmin');
                exit(); 

            }else if($requete['role'] == 1 || $requete['role'] == 0){    
                $_SESSION['user'] = $requete;  
                header('Location: /?page=accueil');
                exit();
            }else if($requete['role'] == 10){
                $_SESSION['user'] = $requete;
                header('Location: /?page=espaceClient');
                exit();
            }else if($requete['role'] == 2000){
                $_SESSION['user'] = $requete;
                header('Location: /?page=espaceFondateur');
                exit();
            }
        }else{
            header('Location: /?page=login');
            exit();
        }
    }else{
        header('Location: /?page=login');
        exit();
    }
}


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

        $statement = $conn->prepare('INSERT INTO users (Full_Name, phone, email, password, role) VALUES (?, ?, ?, ?, 1)');
        $statement->execute([$pseudo, $phone, $emailInscription, $new_mdp]);

        header('Location: /?page=login');
        exit();
    }else{
        header('Location: /?page=login');
        exit();
    }
}
?>
