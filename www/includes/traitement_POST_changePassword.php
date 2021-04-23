<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['id'])){
	include("connexion.php");
	$lastpass = htmlspecialchars($_POST['last']);
	$newpass = htmlspecialchars($_POST['new']);


	$code = strlen($lastpass);
    $code = ($code*4)*($code/3);
    $sel = strlen($lastpass);
    $sel2 = strlen($code.$lastpass);
    $texte_hash = sha1($sel.$lastpass.$sel2);
    $texte_hash_2 = md5($texte_hash.$sel2);
    $final = $texte_hash.$texte_hash_2;
    substr($final, 7, 8);
    $final = strtoupper($final);

    $code = strlen($newpass);
    $code = ($code*4)*($code/3);
    $sel = strlen($newpass);
    $sel2 = strlen($code.$newpass);
    $texte_hash = sha1($sel.$newpass.$sel2);
    $texte_hash_2 = md5($texte_hash.$sel2);
    $final2 = $texte_hash.$texte_hash_2;
    substr($final2, 7, 8);
    $final2 = strtoupper($final2);
	// Detect if company or user
	if($_SESSION['type'] == "perso"){
		$getpass = $bdd->prepare("SELECT password FROM members WHERE ID = ?");
		$getpass->execute(array($_SESSION['id']));

		$infopass = $getpass->fetch();
		// Check current password
		if($infopass['password'] == $final){
			// Change password if everything is ok 
			$uppass = $bdd->prepare("UPDATE members SET password = ? WHERE ID = ?");
			$uppass->execute(array($final2, $_SESSION['id']));
			$json['200'] = "changed";
		}
		else{
			$json['401'] = "error wrong password";
		}
	}
	else{
		$getpass = $bdd->prepare("SELECT password FROM team WHERE ID = ?");
		$getpass->execute(array($_SESSION['id']));

		$infopass = $getpass->fetch();
		// Check current password
		if($infopass['password'] == $final){
			// Change password if everything is ok 
			$uppass = $bdd->prepare("UPDATE team SET password = ? WHERE ID = ?");
			$uppass->execute(array($final2, $_SESSION['id']));
			$json['200'] = "changed";
		}
		else{
			$json['401'] = "error wrong password";
		}
	}

	
echo json_encode($json);

	
}