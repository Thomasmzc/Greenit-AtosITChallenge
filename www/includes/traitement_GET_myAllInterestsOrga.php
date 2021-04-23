<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == 'pro'){
	include("connexion.php");

	$e = 0;
	$getinterest = $bdd->query("SELECT * FROM keywords_list");
	while($interet = $getinterest->fetch()){
		// Check if it's selected
		$checkinteret = $bdd->prepare("SELECT interest FROM companies WHERE ID = ?");
		$checkinteret->execute(array($_SESSION['orga']));

		$result = $checkinteret->fetch();

		$myinterest = $result['interest'];

		$myinterest = json_decode($myinterest, true);

		$gotit = 0;
		foreach($myinterest as $oneofmy){
			if($oneofmy == $interet['interest']){
				$gotit = 1;
			}
		}
		if($gotit == 1){
			$json[$e] = array($interet['interest'], $interet['color'], "selectedinterest");
		}
		else{
			$json[$e] = array($interet['interest'], $interet['color'], "noselectinterest");
		}
		$e++;
	}
	echo json_encode($json);

}