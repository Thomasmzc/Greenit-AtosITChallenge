<?php
session_start();
if(isset($_SESSION['id'])){
	include("connexion.php");

	$event = htmlspecialchars($_POST['event']);
	$postview = $bdd->prepare("INSERT INTO eventclick(event, clicker) VALUES(?,?)");
	$postview->execute(array($event, $_SESSION['id']));

	$json['200'] = "ok";

	echo json_encode($json);
}