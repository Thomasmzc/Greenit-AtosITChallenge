<?php
session_start();
if(isset($_SESSION['id'])){
	include("connexion.php");

	$duration = htmlspecialchars($_POST['duration']);
	$dating = htmlspecialchars($_POST['dating']);
	$physical = htmlspecialchars($_POST['physical']);
	$timing = htmlspecialchars($_POST['timing']);
	$payment = htmlspecialchars($_POST['payment']);
	$openness = htmlspecialchars($_POST['openness']);

	$_SESSION['fduration'] = $duration;
	$_SESSION['fdating'] = $dating;
	$_SESSION['fphysical'] = $physical;
	$_SESSION['ftiming'] = $timing;
	$_SESSION['fpayment'] = $payment;
	$_SESSION['fopenness'] = $openness;

	$json['200'] = "created";

	echo json_encode($json);
}
?>