<?php
session_start();
include('connexion.php');
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){

	$location = htmlspecialchars($_POST['location']);
	$secteur = htmlspecialchars($_POST['secteur']);
	$description = htmlspecialchars($_POST['description']);
	$email = htmlspecialchars($_POST['email']);
	$website = htmlspecialchars($_POST['website']);
	$linkedin = htmlspecialchars($_POST['linkedin']);
	$instagram = htmlspecialchars($_POST['instagram']);
	$facebook = htmlspecialchars($_POST['facebook']);


	$postinfo = $bdd->prepare("UPDATE companies SET location =?, secteur = ?, description = ?, email = ?, website = ?, linkedin = ?, instagram = ?, facebook = ? WHERE ID = ?");
	$postinfo->execute(array($location, $secteur, $description, $email, $website, $linkedin, $instagram, $facebook, $_SESSION['orga']));

	$json['200'] = "success";

	echo json_encode($json);

}
?>