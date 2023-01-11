<?php
require_once __DIR__ . '../../../src/includes/db.database.php';

$error = false;

if(isset($_POST['Connexion'])) {

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
        $email = $_POST['email'];

    }else{
        echo 'Email invalide';
        $error = true;
    }

    $password = $_POST['password'];

    if(!$error){
        $requeteLogin = 'SELECT * FROM users WHERE email = ? AND password = ?';
        $requeteStatment = $conn->prepare($requeteLogin);
        $requeteStatment->execute([$email, hash('sha256',$password)]);
        $requete = $requeteStatment->fetch();

        
        if(!empty($requete)){
            $_SESSION['user'] = $requete;
            header('Location: http://localhost:8888/?page=espaceClient');
            exit();   
        }else{
            echo 'Email ou mot de passe invalide';
        } 
    
    }
}













?>