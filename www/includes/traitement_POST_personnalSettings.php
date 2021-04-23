<?php
session_start();
include('connexion.php');
if(isset($_POST['country']) && isset($_SESSION['id'])){
	
	$country = htmlspecialchars($_POST['country']);
	$age = htmlspecialchars($_POST['age']);
	$city = htmlspecialchars($_POST['location']);

	$upmembers = $bdd->prepare('UPDATE members SET age = ?, location = ?, country = ?, state = ? WHERE ID = ?');
	if($upmembers->execute(array($age,$city, $country,3, $_SESSION['id']))){
		$json['200'] = "success";
	}
	else{
		$json['400'] = "error";
	}
	echo json_encode($json);
}
?>