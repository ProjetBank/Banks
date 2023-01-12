<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/includes/db.database.php';

// pages existantes sur notre site internet
$pages = ['accueil','login', 'mon_espace',''];