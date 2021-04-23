<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == 'perso'){
	include("connexion.php");
	// Check not in favorites
	$getfav = $bdd->prepare("SELECT organization FROM savedOrga WHERE user = ?");
	$getfav->execute(array($_SESSION['id']));
	$arrayFav = array();

	while($fav = $getfav->fetch()){
		array_push($arrayFav, $fav['organization']);
	}
	$now = strtotime("now");
	// Verif more than 2 event 
	$checkorga = $bdd->prepare("SELECT ID FROM companies LIMIT 10");
	$checkorga->execute(array());
	$nbfound = 0;
	while($ckorga = $checkorga->fetch()){
		if(in_array($ckorga['ID'], $arrayFav)){
		}
		else{
			$nbfound ++;
		}
	}
	if($nbfound > 1){
		// Get interests 
		$getint = $bdd->prepare("SELECT interest FROM members WHERE ID = ? ");
		$getint->execute(array($_SESSION['id']));

		$totalmatch = 0;

		$interest = $getint->fetch();

		$interest_decode = json_decode($interest['interest'], true);

		


		
		// RUN
		if($interest_decode != null){
			$try = 0;
			while($totalmatch < 2 && $try < 20){
				$try ++;
				$randinterest = $interest_decode[array_rand($interest_decode)];
				$getorga = $bdd->prepare("SELECT ID FROM companies WHERE description LIKE ? OR interest like ? ORDER BY RAND() LIMIT 1");
				// ADD Order by for push payment
				$getorga->execute(array("%".$randinterest."%", "%".$randinterest."%"));
				$nbfound = $getorga->rowCount();
				if($nbfound > 0){
					while($orgadet = $getorga->fetch()){
						if(in_array($orgadet['ID'], $arrayFav)){

						}
						else{
							$getorgadet = $bdd->prepare("SELECT type, ID, raison, secteur, logo, description FROM companies WHERE ID = ?");
							// ADD Order by for push payment
							$getorgadet->execute(array($orgadet['ID']));
							$result = $getorgadet->fetch();
							$json[$result['ID']] = array($result['type'],$result['ID'], $result['raison'],$result['logo'], $result['secteur'], mb_substr($result['description'],0, 120)." ...");
							array_push($arrayFav, $result['ID']);
							$totalmatch ++;
							
						}
					}
				}
			}

		}
		if($totalmatch < 2){
			while($totalmatch < 2){
				$getorgadet = $bdd->prepare("SELECT type, ID, raison, secteur, logo, description FROM companies ORDER BY RAND() LIMIT 1");
				// ADD Order by for push payment
				$getorgadet->execute();
				while($result = $getorgadet->fetch()){
					// mise en forme date
					if(in_array($result['ID'], $arrayFav)){

					}
					else{
						$json[$result['ID']] = array($result['type'],$result['ID'], $result['raison'],$result['logo'], $result['secteur'], mb_substr($result['description'],0, 120)." ...");
						array_push($arrayFav, $result['ID']);
						$totalmatch ++;
					}
				}
			}
		}
	}
	echo json_encode($json);


	

}