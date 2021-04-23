<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connexion.php");
require_once('../phpmailer/src/Exception.php');
require_once('../phpmailer/src/PHPMailer.php');
require_once('../phpmailer/src/SMTP.php');
include("mails_account.php");
session_start();
if(isset($_SESSION['id']) && isset($_POST['msg'])){
	// Company

	$getemail = $bdd->prepare("SELECT fname, lname, email FROM team WHERE ID = ?");
	$getemail->execute(array($_SESSION['id']));

	$infosuser = $getemail->fetch();

	$email = $infosuser['email'];
	$prenom_ac = str_replace("é","&eacute;", $infosuser['fname']);
	$nom_ac = str_replace("é","&eacute;",  $infosuser['lname']);

	$msg = htmlspecialchars($_POST['msg']);
	// envoi email
	$maila->Subject = utf8_decode("green it - Message to client service" );
	$maila->Body = "<html><body><header><img src='".$link."assets/img/logo_black.png' style='width: 100px;'/></header><p style='font-size: 16px;'>Nouveau message de ".$prenom_ac." ".$nom_ac."</p><p>From : ".$email."</p><p style='font-size: 14px;'>Message : </p><p>".$msg."</p><p style='font-size: 14px;'>Cordialement,</p></br><small style='font-size: 10px;'>Si vous n'&ecirc;tes pas concern&eacute; par cette demande, vous pouvez ignorer cet email.</small></body></html>";
			
	$maila->AddAddress("thomas@greenit.co");
	$maila->Send();

	$json['200'] = "send";

	echo json_encode($json);

}