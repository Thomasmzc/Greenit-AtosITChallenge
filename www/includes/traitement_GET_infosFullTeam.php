<?php
session_start();
include('connexion.php');
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){

	$getteam = $bdd->prepare("SELECT * FROM team WHERE id_company = ? AND ID != ?");
	$getteam->execute(array($_SESSION['orga'], $_SESSION['id']));
	$nbteam = $getteam->rowCount();
	if($nbteam > 0){
		while($infoteam = $getteam->fetch()){
			$lastact = strtotime($infoteam['last_activity']);
			$now = strtotime("now");
			$diff = $now - $lastact;
			if($diff > 300){
				$state = "offline";
			}
			else{
				$state = "online";
			}
			$json[$infoteam['ID']] = array($infoteam['fname'],$infoteam['lname'],$infoteam['photo'], $state);
		}
	}
	else{
		$json['0'] = "No other team member";
	}
	echo json_encode($json);
}

?>