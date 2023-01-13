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

if($roleadmin['role'] == 2000){
    $pages = ['login', 'espaceClient', 'espaceAdmin','validationUsers', 'clientListe', 'accueil', 'mon_espace', 'mes_comptes', 'mes_transactions','mes_virements','utilisateurs','validations','transactions','espaceFondateur','initialisation'];
} else if ($roleadmin['role'] == 1000 || $roleadmin['role'] == 200){
    $pages = ['login', 'espaceClient', 'espaceAdmin','validationUsers', 'clientListe', 'accueil', 'mon_espace', 'mes_comptes', 'mes_transactions','mes_virements','utilisateurs','validations','transactions'];
} else if ($roleadmin['role'] == 1 || $roleadmin['role'] == 0){
    $pages = ['login', 'accueil'];
}else if ($roleadmin['role'] == 10){
    $pages = ['login', 'espaceClient','accueil', 'mon_espace', 'mes_comptes', 'mes_transactions','mes_virements','utilisateurs','validations','transactions'];
}

// pages existantes sur notre site internet

// init variables vides pour le template
$page_scripts = "";
$head_metas = "";


