<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == 'perso'){
	include("connexion.php");

	$e = 0;
	$getinterest = $bdd->query("SELECT * FROM persoInterest_lists");
	while($interet = $getinterest->fetch()){
		// Check if it's selected
		$checkinteret = $bdd->prepare("SELECT persointerest FROM members WHERE ID = ?");
		$checkinteret->execute(array($_SESSION['id']));

		$result = $checkinteret->fetch();

		$myinterest = $result['persointerest'];

		$myinterest = json_decode($myinterest, true);

		$gotit = 0;
		foreach($myinterest as $oneofmy){
			if($oneofmy == $interet['ID']){
				$gotit = 1;
			}
		}
		if($gotit == 1){
			$json[$e] = array($interet['interest'], $interet['ID'], "selectedinterest");
		}
		else{
			$json[$e] = array($interet['interest'], $interet['ID'], "noselectinterest");
		}
		$e++;
	}
	echo json_encode($json);

}