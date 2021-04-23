<?php
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){
	
	$getinfo = $bdd->prepare("SELECT id_company, fname, lname, email, photo FROM team WHERE ID = ?");
	$getinfo->execute(array($_SESSION['id']));

	$infouser = $getinfo->fetch();

	// Get company

	$getcomp = $bdd->prepare("SELECT raison FROM companies WHERE ID = ?");
	$getcomp->execute(array($infouser['id_company']));
	$infocomp = $getcomp->fetch();

	$json['200'] = array($infouser['fname'], $infouser['lname'], $infouser['photo'], $infouser['email'], $infocomp['raison']);

	echo json_encode($json);

}
?>