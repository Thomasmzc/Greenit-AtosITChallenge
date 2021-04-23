<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include('connexion.php');

	$getevent = $bdd->prepare("SELECT * FROM event WHERE ID = ? AND organization = ?");
	$getevent->execute(array($_POST['idevent'], $_SESSION['orga']));
	$infoevent = $getevent->fetch();
	
	$json[$infoevent['ID']] = array($infoevent['physical'],$infoevent['timing'],$infoevent['payment'],$infoevent['openness']);


	echo json_encode($json);
}

?>