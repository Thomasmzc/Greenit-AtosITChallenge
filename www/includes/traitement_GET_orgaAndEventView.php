<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include("connexion.php");

	$getorgav = $bdd->prepare("SELECT ID FROM companyview WHERE company = ?");
	$getorgav->execute(array($_SESSION['orga']));
	$nborgav = $getorgav->rowCount();

	$getevent = $bdd->prepare("SELECT ID FROM event WHERE organization = ?");
	$getevent->execute(array($_SESSION['orga']));
	$nbevent = $getevent->rowCount();
	$nbeventview = 0;
	if($nbevent > 0){
		while($event = $getevent->fetch()){
			$geteventv = $bdd->prepare("SELECT ID FROM eventviews WHERE event = ?");
			$geteventv->execute(array($event['ID']));
			$nbeventview += $geteventv->rowCount();
		}
	}

	$json['200'] = array($nborgav, $nbeventview);

	echo json_encode($json);
}