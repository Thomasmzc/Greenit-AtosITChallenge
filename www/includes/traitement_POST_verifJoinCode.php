<?php
date_default_timezone_set('Europe/Paris');
include("connexion.php");
if(isset($_POST['email']) && isset($_POST['code'])){
	$email = htmlspecialchars($_POST['email']);
	$code = htmlspecialchars($_POST['code']);
	$getinvit = $bdd->prepare("SELECT * FROM invitations WHERE email = ? AND state = ?");
	$getinvit->execute(array($email, 0));
	$nbinvit = $getinvit->rowCount();
	if($nbinvit > 0){
		$infoinvit = $getinvit->fetch();
		if($infoinvit['code'] == $code){
			$from = strtotime($infoinvit['date_send']);
			$today = time();
			$difference = $today - $from;
			$difff = floor($difference / 3600);  // (60 * 60 * 24)
			if($difff < 49){
				$json['200'] = $difff;
			}
			else{
				$json['402'] = "Invitation has expired;";
			}
		}
		else{
			$json['402'] = "Wrong code";
		}
	}
	else{
		$json['401'] = "No invitation linked with this email";
	}

	echo json_encode($json);
}