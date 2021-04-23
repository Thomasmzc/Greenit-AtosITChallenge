<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == 'perso'){
	include("connexion.php");

	$checkint = $bdd->prepare("SELECT interest FROM members WHERE ID = ?");
	$checkint->execute(array($_SESSION['id']));
	$interest = $checkint->fetch();

	if($interest['interest'] != null){
		$interest_decode = json_decode($interest['interest'], true);
		$nbentry = count($interest_decode);
		if($nbentry > 0){
			$json['200'] = "full";
		}
		else{
			$json['400'] = "empty";
		}
	}
	else{
		$json['400'] = "empty";
	}
	echo json_encode($json);

}