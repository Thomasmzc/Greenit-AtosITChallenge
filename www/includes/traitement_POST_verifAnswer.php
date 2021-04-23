<?php
include("connexion.php");
require_once('../phpmailer/src/Exception.php');
require_once('../phpmailer/src/PHPMailer.php');
require_once('../phpmailer/src/SMTP.php');
include("mails_account.php");
// On génère une chaine aléatoire 

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if(isset($_POST['ip'])){
	$ip = htmlspecialchars($_POST['ip']);
	$getrep = $bdd->prepare("SELECT * FROM refined WHERE ip = ? AND state = ?");
	$getrep->execute(array($ip, "0"));
	$nbrep = $getrep->rowCount();
	if($nbrep > 0){
		$inforep = $getrep->fetch();
		// Verification date
		$from = strtotime($inforep['date_submit']);
		$today = time();
		$difference = $today - $from;
		$difff = floor($difference / 3600);  // (60 * 60 * 24)
		if($difff < 25){
			if($inforep['type'] == "orga"){
				$getmbr = $bdd->prepare("SELECT * FROM team WHERE email = ?");
				$getmbr->execute(array($inforep['email']));
				$infombr = $getmbr->fetch();
				// On régénère un mdp
				$nwpassword = generateRandomString();

				$code = strlen($nwpassword);
			    $code = ($code*4)*($code/3);
			    $sel = strlen($nwpassword);
			    $sel2 = strlen($code.$nwpassword);
			    $texte_hash = sha1($sel.$nwpassword.$sel2);
			    $texte_hash_2 = md5($texte_hash.$sel2);
			    $final = $texte_hash.$texte_hash_2;
			    substr($final, 7, 8);
			    $final = strtoupper($final);
				$ippass = $bdd->prepare("UPDATE team SET password = ?WHERE ID = ? ");
				$ippass->execute(array($final, $infombr['ID']));
				$ippass = $bdd->prepare("UPDATE refined SET state = ? WHERE email = ? ");
				$ippass->execute(array(1,$inforep['email']));
				// On envoit direct credentials
				$prenom_ac = str_replace("é","&eacute;", $infombr['fname']);
				$nom_ac = str_replace("é","&eacute;",  $infombr['lname']);
				// envoi email
			    $maila->Subject = utf8_decode("green it - Recover your password" );

				$maila->Body = "<html><body><header><img src='".$link."assets/img/logo_black.png' style='width: 100px;'/></header><p style='font-size: 16px;'>Hello, ".$prenom_ac." ".$nom_ac."</p><p style='font-size: 14px;'>You have requested a new  password.</br></p><p style='font-size: 13px;'>Temporary password: <b>".$nwpassword."</b></p></br></br></br><p style='font-size: 13px;'>To log in, please use the link below:</p><a href='".$link."changepass.php?type=orga' style='font-size: 14px; color: #00A1E8;'>".$link."changepass.php</a></br></br><p style='font-size: 14px;'>Sincerely,</p><p style='font-size: 14px;'>The green'it team.</p></br><small style='font-size: 10px;'>If you are not concerned by this request, you can ignore this email.</small></body></html>";

				$maila->AddAddress($inforep['email']);
				if($maila->Send()){
					$json['200'] = "You will receive an email with your new password.";
				}
				else{
					$json['400'] = "Server error.";
				}
			}
			else{
				$getmbr = $bdd->prepare("SELECT * FROM members WHERE email = ?");
				$getmbr->execute(array($inforep['email']));
				$infombr = $getmbr->fetch();
				// On régénère un mdp
				$nwpassword = generateRandomString();

				$code = strlen($nwpassword);
			    $code = ($code*4)*($code/3);
			    $sel = strlen($nwpassword);
			    $sel2 = strlen($code.$nwpassword);
			    $texte_hash = sha1($sel.$nwpassword.$sel2);
			    $texte_hash_2 = md5($texte_hash.$sel2);
			    $final = $texte_hash.$texte_hash_2;
			    substr($final, 7, 8);
			    $final = strtoupper($final);
				$ippass = $bdd->prepare("UPDATE members SET password = ?WHERE ID = ? ");
				$ippass->execute(array($final, $infombr['ID']));
				$ippass = $bdd->prepare("UPDATE refined SET state = ? WHERE email = ? ");
				$ippass->execute(array(1,$inforep['email']));
				// On envoit direct credentials
				$prenom_ac = str_replace("é","&eacute;", $infombr['fname']);
				$nom_ac = str_replace("é","&eacute;",  $infombr['lname']);
				// envoi email
			    $maila->Subject = utf8_decode("green it - Recover your password" );

				$maila->Body = "<html><body><header><img src='".$link."assets/img/logo_black.png' style='width: 100px;'/></header><p style='font-size: 16px;'>Hello, ".$prenom_ac." ".$nom_ac."</p><p style='font-size: 14px;'>You have requested a new  password.</br></p><p style='font-size: 13px;'>Temporary password: <b>".$nwpassword."</b></p></br></br></br><p style='font-size: 13px;'>To log in, please use the link below:</p><a href='".$link."changepass.php?type=user' style='font-size: 14px; color: #00A1E8;'>".$link."changepass.php</a></br></br><p style='font-size: 14px;'>Sincerely,</p><p style='font-size: 14px;'>The green'it team.</p></br><small style='font-size: 10px;'>If you are not concerned by this request, you can ignore this email.</small></body></html>";

				$maila->AddAddress($inforep['email']);
				if($maila->Send()){
					$json['200'] = "You will receive an email with your new password.";
				}
				else{
					$json['400'] = "Server error.";
				}
			}
			
		}
		else{
			$json['402'] = "Link is out of date.";
		}
	}
	else{
		$json['401'] = "Authentication error, please retry.";
	}
	echo json_encode($json);
}

?>