<?php
session_start();
if(isset($_SESSION['id'])){
	include('connexion.php');

	$getfav = $bdd->prepare("SELECT ID, organization FROM savedOrga WHERE user = ?");
	$getfav->execute(array($_SESSION['id']));
	$nbfav = $getfav->rowCount();
	if($nbfav == 0){
		$json['0'] = "no fav"; 
	}
	else{
		while($fav = $getfav->fetch()){
			$getorga = $bdd->prepare("SELECT raison, logo, secteur FROM companies WHERE ID = ?");
			$getorga->execute(array($fav['organization']));
			$orga = $getorga->fetch();


			$json[$fav['organization']] = array($orga['raison'], $orga['logo'], $orga['secteur']);
		}
	}

    echo json_encode($json);
}
?>