<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

// fonctions utilitaires

// pages existantes sur notre site internet
$pages = ['login'];

// init variables vides pour le template
$page_scripts = "";
$head_metas = "";

