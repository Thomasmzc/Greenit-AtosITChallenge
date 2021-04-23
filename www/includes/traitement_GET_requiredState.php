<?php
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){

	$upmembers = $bdd->prepare('SELECT state FROM members WHERE ID = ?');
	$upmembers->execute(array($_SESSION['id']));
	if($result = $upmembers->fetch()){
		$json['200'] = $result['state'];
	}
	else{
		$json['400'] = "error";
	}
	echo json_encode($json);
}
?>