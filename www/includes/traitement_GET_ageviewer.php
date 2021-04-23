<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include("connexion.php");

	$age["- 16"]= 0;
	$age["16 - 25"]= 0;
	$age["25 - 35"]= 0;
	$age["35 - 45"]= 0;
	$age["45 - 55"]= 0;
	$age["55 - 65"]= 0;
	$age["65 +"]= 0;
	$getorga = $bdd->prepare("SELECT viewer FROM companyview WHERE company = ?");
	$getorga->execute(array($_SESSION['orga']));
	$nborga = $getorga->rowCount();
	if($nborga > 0){
		while($viewer = $getorga->fetch()){
			$getage = $bdd->prepare("SELECT age FROM members WHERE ID = ?");
			$getage->execute(array($viewer['viewer']));
			$ageinfo = $getage->fetch();
			if($ageinfo['age'] < 16){
				$age["- 16"] ++;
			}
			elseif($ageinfo['age'] < 25){
				$age["16 - 25"] ++;
			}
			elseif($ageinfo['age'] < 35){
				$age["25 - 35"] ++;
			}
			elseif($ageinfo['age'] < 45){
				$age["35 - 45"] ++;
			}
			elseif($ageinfo['age'] < 55){
				$age["45 - 55"] ++;
			}
			elseif($ageinfo['age'] < 65){
				$age["55 - 65"] ++;
			}
			elseif($ageinfo['age'] >= 65){
				$age["65 +"] ++;
			}
		}
	}

	$getevent = $bdd->prepare("SELECT ID FROM event WHERE organization = ?");
	$getevent->execute(array($_SESSION['orga']));
	$nbevent = $getevent->rowCount();
	if($nbevent > 0){
		while($event = $getevent->fetch()){
			$geteventv = $bdd->prepare("SELECT viewer FROM eventviews WHERE event = ?");
			$geteventv->execute(array($event['ID']));
			$nbeventv = $geteventv->rowCount();
			if($nbeventv > 0){
				while($viewer = $geteventv->fetch()){
					$getage = $bdd->prepare("SELECT age FROM members WHERE ID = ?");
					$getage->execute(array($viewer['viewer']));
					$ageinfo = $getage->fetch();
					if($ageinfo['age'] < 16){
						$age["- 16"] ++;
					}
					elseif($ageinfo['age'] < 25){
						$age["16 - 25"] ++;
					}
					elseif($ageinfo['age'] < 35){
						$age["25 - 35"] ++;
					}
					elseif($ageinfo['age'] < 45){
						$age["35 - 45"] ++;
					}
					elseif($ageinfo['age'] < 55){
						$age["45 - 55"] ++;
					}
					elseif($ageinfo['age'] < 65){
						$age["55 - 65"] ++;
					}
					elseif($ageinfo['age'] >= 65){
						$age["65 +"] ++;
					}
				}
			}
		}
	}

	$labels = array("- 16", "16 - 25", "25 - 35", "35 - 45", "45 - 55", "55 - 65", "65 +");
	$quantity = array($age["- 16"], $age["16 - 25"], $age["25 - 35"], $age["35 - 45"], $age["45 - 55"], $age["55 - 65"], $age["65 +"]);
	$json = array($labels, $quantity);
	echo json_encode($json);
}