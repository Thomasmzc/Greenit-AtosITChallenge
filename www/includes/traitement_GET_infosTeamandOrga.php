<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){
	
	$getinfo = $bdd->prepare("SELECT fname, lname FROM team WHERE ID = ?");
	$getinfo->execute(array($_SESSION['id']));

	$infouser = $getinfo->fetch();
	
	$getinfoorga = $bdd->prepare("SELECT raison, logo FROM companies WHERE ID = ?");
	$getinfoorga->execute(array($_SESSION['orga']));

	$infoorga = $getinfoorga->fetch();

	$json['200'] = array($infouser['fname'], $infouser['lname'], $infoorga['logo'], $infoorga['raison']);

	echo json_encode($json);

}
?>