<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include("connexion.php");

	// Get labels 
	$arralabel = array();
	$getlabel = $bdd->query("SELECT interest FROM interests_list");
	$e = 0;
	while($labels = $getlabel->fetch()){
		array_push($arralabel, $labels['interest']);
		$arrvalue[$e] = 0;
		$e++;
	}




	$getorga = $bdd->prepare("SELECT viewer FROM companyview WHERE company = ?");
	$getorga->execute(array($_SESSION['orga']));
	$nborga = $getorga->rowCount();
	if($nborga > 0){
		while($viewer = $getorga->fetch()){
			$checkint = $bdd->prepare("SELECT interest FROM members WHERE ID = ?");
			$checkint->execute(array($viewer['viewer']));
			$interest = $checkint->fetch();

			if($interest['interest'] != null){
				$interest_decode = json_decode($interest['interest'], true);
				foreach($arralabel as $i => $onelabel) {
					if(in_array($onelabel, $interest_decode)){
						$arrvalue[$i] ++;
					}
				}
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
					$checkint = $bdd->prepare("SELECT interest FROM members WHERE ID = ?");
					$checkint->execute(array($viewer['viewer']));
					$interest = $checkint->fetch();

					if($interest['interest'] != null){
						$interest_decode = json_decode($interest['interest'], true);
						foreach($arralabel as $i => $onelabel) {
							if(in_array($onelabel, $interest_decode)){
								$arrvalue[$i] ++;
							}
						}
					}
				}
			}
		}
	}

	
	$json = array($arralabel, $arrvalue);
	echo json_encode($json);
}