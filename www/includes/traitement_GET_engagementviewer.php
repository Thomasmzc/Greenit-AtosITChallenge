<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include("connexion.php");

	$feuille= 0;
	$plant= 0;
	$arbre= 0;
	$getorga = $bdd->prepare("SELECT viewer FROM companyview WHERE company = ?");
	$getorga->execute(array($_SESSION['orga']));
	$nborga = $getorga->rowCount();
	if($nborga > 0){
		while($viewer = $getorga->fetch()){
			$getage = $bdd->prepare("SELECT profil FROM members WHERE ID = ?");
			$getage->execute(array($viewer['viewer']));
			$info = $getage->fetch();
			if($info['profil'] == "1"){
				$feuille ++ ;
			}
			elseif($info['profil'] == "2"){
				$plant ++ ;
			}
			elseif($info['profil'] == "3"){
				$arbre ++ ;
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
					$getage = $bdd->prepare("SELECT profil FROM members WHERE ID = ?");
					$getage->execute(array($viewer['viewer']));
					$info = $getage->fetch();
					if($info['profil'] == "1"){
						$feuille ++ ;
					}
					elseif($info['profil'] == "2"){
						$plant ++ ;
					}
					elseif($info['profil'] == "3"){
						$arbre ++ ;
					}
				}
			}
		}
	}

	$labels = array("leaf", "plant", "tree");
	$quantity = array($feuille, $plant, $arbre);
	$json = array($labels, $quantity);
	echo json_encode($json);
}