<?php
require_once('../phpmailer/src/Exception.php');
require_once('../phpmailer/src/PHPMailer.php');
require_once('../phpmailer/src/SMTP.php');
include("mails_account.php");
session_start();
if(isset($_SESSION['id']) && isset($_POST['email'])){
	include('connexion.php');
	$email = htmlspecialchars($_POST['email']);
	// On génère une chaine aléatoire 
	function generateRandomString($length = 6) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	// Get informations on the organization
	$getinfo = $bdd->prepare("SELECT raison FROM companies WHERE ID = ?");
	$getinfo->execute(array($_SESSION['orga']));
	$namefirm = $getinfo->fetch();
	
	// Verifier que email pas déjà inscrit
	$verifmail = $bdd->prepare("SELECT email FROM team WHERE email = ? AND id_company != ?");
	$verifmail->execute(array($email, 0));
	$resultmail = $verifmail->rowCount();
	if($resultmail == 0){
		$ip_unique = generateRandomString();
		$nwbased = $bdd->prepare("INSERT INTO invitations(author, email, code) VALUES(?,?,?)");
		$nwbased->execute(array($_SESSION['id'], $email, $ip_unique));
		// envoi email
	    $maila->Subject = utf8_decode("green it - Join ".$namefirm['raison'] );
		$maila->Body = "<html><body><header><img src='".$link."assets/img/logoB.png' style='width: 100px;'/></header><p style='font-size: 16px;'>Hello,</p><p style='font-size: 14px;'>You have been invited to be part of a team in green'it.</br></br></br>Join your colleagues by using the code and link below.</p><p>Your secret code : <p style='font-size: 30px; color: blue;'>".$ip_unique."</p><a href='".$link."signupcompany.php' style='font-size: 14px; color: #00A1E8;'>Sign up in seconds</a></br></br><p style='font-size: 14px;'>Best regards,</p><p style='font-size: 14px;'>The green'it team.</p></br><small style='font-size: 10px;'>If you are not concerned by this demand, please ignore this email.</small></body></html>";
		
		$maila->AddAddress($email);
		if($maila->Send()){
			$json['200'] = "success";
		}
		else{
			$json['400'] = "server error";
		}
	}
	else{
		$json['401'] = "This email is already associated with an organization.";
	}

	echo json_encode($json);
	
}