<?php
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){
	
	$getinfo = $bdd->prepare("SELECT fname, lname, age, location, country, photo, profil FROM members WHERE ID = ?");
	$getinfo->execute(array($_SESSION['id']));

	$infouser = $getinfo->fetch();

	$json['200'] = array($infouser['fname'], $infouser['lname'],$infouser['age'],$infouser['location'],$infouser['country'],$infouser['photo'], $infouser['profil'],$_SESSION['id']);

	echo json_encode($json);

}