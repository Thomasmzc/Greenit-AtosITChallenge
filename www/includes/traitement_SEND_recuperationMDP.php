<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connexion.php");
require_once('../phpmailer/src/Exception.php');
require_once('../phpmailer/src/PHPMailer.php');
require_once('../phpmailer/src/SMTP.php');
include("mails_account.php");
if(isset($_POST['email'])){
	$email = htmlspecialchars($_POST['email']);
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

	// On vérifie que email est bien dans membre 
	if($_POST['type'] == "orga"){
		$req = $bdd->prepare("SELECT ID,fname, lname, email FROM team WHERE email = ?");
		$req->execute(array(strtolower($email)));
		$nbreq = $req->rowCount();
		if($nbreq > 0){
			$datas = $req->fetch();
			// On fait process normal 
			$ip_unique = generateRandomString();
			$del = $bdd->prepare("DELETE FROM refined WHERE email = ?");
			$del->execute(array(strtolower($email)));
			$nwbased = $bdd->prepare("INSERT INTO refined(email,ip, type) VALUES(?,?,?)");
			$nwbased->execute(array(strtolower($email), $ip_unique, "orga"));
			$prenom_ac = str_replace("é","&eacute;", $datas['fname']);
			$nom_ac = str_replace("é","&eacute;",  $datas['lname']);
			// envoi email
		    $maila->Subject = utf8_decode("green'it - Recover your password" );
			$maila->Body = "<html><body><header><img src='".$link."assets/img/logo_black.png' style='width: 100px;'/></header><p style='font-size: 16px;'>Hello, ".$prenom_ac." ".$nom_ac."</p><p style='font-size: 14px;'>You have requested to recover your password.</br></br>To receive a new password, use the link below:</p><a href='".$link."gemeback.php?ip=".$ip_unique."' style='font-size: 14px; color: #00A1E8;'>".$link."gemeback?ip=".$ip_unique."</a></br></br><p style='font-size: 14px;'>Sincerely,</p><p style='font-size: 14px;'>The green'it team.</p></br><small style='font-size: 10px;'>If you are not concerned by this request, you can ignore this email.</small></body></html>";
			
			$maila->AddAddress($email);
			$maila->Send();
			$json['200'] = "success";
			
		}
		else{
			$json['401'] = "email doesn't exist";
		}
	}
	else{
		$req = $bdd->prepare("SELECT ID,fname, lname, email FROM members WHERE email = ?");
		$req->execute(array(strtolower($email)));
		$nbreq = $req->rowCount();
		if($nbreq > 0){
			$datas = $req->fetch();
			// On fait process normal 
			$ip_unique = generateRandomString();
			$del = $bdd->prepare("DELETE FROM refined WHERE email = ?");
			$del->execute(array(strtolower($email)));
			$nwbased = $bdd->prepare("INSERT INTO refined(email,ip, type) VALUES(?,?,?)");
			$nwbased->execute(array(strtolower($email), $ip_unique, "perso"));
			$prenom_ac = str_replace("é","&eacute;", $datas['fname']);
			$nom_ac = str_replace("é","&eacute;",  $datas['lname']);
			// envoi email
		    $maila->Subject = utf8_decode("green it - Recover your password" );
			$maila->Body = "<html><body><header><img src='".$link."assets/img/logo_black.png' style='width: 100px;'/></header><p style='font-size: 16px;'>Hello, ".$prenom_ac." ".$nom_ac."</p><p style='font-size: 14px;'>You have requested to recover your password.</br></br>To receive a new password, use the link below: </p><a href='".$link."gemeback.php?ip=".$ip_unique."' style='font-size: 14px; color: #00A1E8;'>".$link."gemeback?ip=".$ip_unique."</a></br></br><p style='font-size: 14px;'>Sincerely,</p><p style='font-size: 14px;'>The green'it team.</p></br><small style='font-size: 10px;'>If you are not concerned by this request, you can ignore this email.</small></body></html>";
			
			$maila->AddAddress($email);
			$maila->Send();
			$json['200'] = "success";
		}
		else{
			$json['401'] = "email doesn't exist";
		}
	}
	
	echo json_encode($json);
}

?>