<?php
session_start();
include('connexion.php');
if(isset($_POST['choice']) && isset($_SESSION['id'])){
	
	$choice = htmlspecialchars($_POST['choice']);
	$upmembers = $bdd->prepare('UPDATE members SET envies = ?, state = ? WHERE ID = ?');
	if($upmembers->execute(array($choice, 2, $_SESSION['id']))){
		$json['200'] = "success";
	}
	else{
		$json['400'] = "error";
	}
	echo json_encode($json);
}
?>