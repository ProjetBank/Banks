<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/includes/db.database.php';

$id = $_SESSION['user']['id'];
$requestSolde = $conn -> prepare("SELECT role FROM users WHERE id = $id");
$requestSolde -> execute();
$roleadmin = $requestSolde -> fetch();
echo $roleadmin['role'];
if($_GET['page'] != "accueil" && $_GET['page'] != "login" && $roleadmin['role'] == 1){
    header('Location: /?page=accueil');
    exit();
}
if($_GET['page'] != "accueil" && $_GET['page'] != "login" && $roleadmin['role'] == 0){
    header('Location: /?page=accueil');
    exit();
}
if($_GET['page'] != "accueil" && $_GET['page'] != "login"  && $_GET['page'] != "espaceClient" && $_GET['page'] != "mes_comptes" && $_GET['page'] != "mes_transactions" && $_GET['page'] != "mes_virements" && $roleadmin['role'] != 2000 && $roleadmin['role'] != 1000 && $roleadmin['role'] != 200 ){
    header('Location: /?page=accueil');
    exit();
}

// pages existantes sur notre site internet
$pages = ['login', 'espaceClient', 'espaceAdmin','validationUsers', 'clientListe', 'accueil', 'mon_espace', 'mes_comptes', 'mes_transactions','mes_virements','utilisateurs','validations','transactions','espaceFondateur','initialisation'];

// init variables vides pour le template
$page_scripts = "";
$head_metas = "";


