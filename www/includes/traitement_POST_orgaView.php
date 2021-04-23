<?php
session_start();
if(isset($_SESSION['id'])){
	include("connexion.php");

	$orga = htmlspecialchars($_POST['orga']);
	$postview = $bdd->prepare("INSERT INTO companyview(company, viewer) VALUES(?,?)");
	$postview->execute(array($orga, $_SESSION['id']));

	$json['200'] = "ok";

	echo json_encode($json);
}