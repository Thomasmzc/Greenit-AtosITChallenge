<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['id'])){
	include("connexion.php");


	$id = htmlspecialchars($_POST['id']);

	$e = 0;
	$getinterest = $bdd->prepare("SELECT persointerest FROM members WHERE ID = ?");
	$getinterest->execute(array($_SESSION['id']));
	$interest = $getinterest->fetch();

	$interest_decode = json_decode($interest['persointerest'], true);

	if($interest_decode != null){
		if (($key = array_search($id, $interest_decode)) !== false) {
		}
		else{
			end($interest_decode);         // move the internal pointer to the end of the array
			$key = key($interest_decode) + 1;
			$interest_decode[$key] = $id;
		}
	}
	else{
		$interest_decode = array($id);
	}
	

	$interest_recoded = json_encode($interest_decode);

	$postinterest = $bdd->prepare("UPDATE members SET persointerest = ? WHERE ID = ?");
	$postinterest->execute(array($interest_recoded, $_SESSION['id']));

	echo $id;
}