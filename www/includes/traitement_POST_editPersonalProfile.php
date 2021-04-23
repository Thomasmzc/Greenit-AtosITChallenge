<?php
session_start();
if(isset($_SESSION['id']) && isset($_POST['fname']) && $_SESSION['type'] == "perso"){
	include("connexion.php");

	$age = htmlspecialchars($_POST['age']);
	$country = htmlspecialchars($_POST['country']);
	$location = htmlspecialchars($_POST['location']);
	$fname = htmlspecialchars($_POST['fname']);
	$lname = htmlspecialchars($_POST['lname']);

	$editprofile = $bdd->prepare("UPDATE members SET fname = ?, lname = ?, age = ?, location = ?, country = ? WHERE ID = ?");
	$editprofile->execute(array($fname, $lname, $age, $location, $country, $_SESSION['id']));

	$json['200'] = 'done';

	echo json_encode($json);

}
?>