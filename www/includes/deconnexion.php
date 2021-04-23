<?php 
session_start();
include("connexion.php");

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
header('Location: ../index.html');

?>