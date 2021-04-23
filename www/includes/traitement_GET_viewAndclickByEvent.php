<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include("connexion.php");

	$getevent = $bdd->prepare("SELECT ID, title FROM event WHERE organization = ?");
	$getevent->execute(array($_SESSION['orga']));
	$nbevent = $getevent->rowCount();
	$nbeventview = 0;
	if($nbevent > 0){
		while($event = $getevent->fetch()){
			// Get views
			$geteventv = $bdd->prepare("SELECT ID FROM eventviews WHERE event = ?");
			$geteventv->execute(array($event['ID']));
			$nbeventview += $geteventv->rowCount();

			// Get click
			$geteventc = $bdd->prepare("SELECT DISTINCT(clicker) FROM eventclick WHERE event = ?");
			$geteventc->execute(array($event['ID']));
			$nbeventclick += $geteventc->rowCount();


			$json[$event['ID']] = array($event['title'], $nbeventview, $nbeventclick);
		}
	}

		

	echo json_encode($json);
}