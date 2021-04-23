<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == 'perso'){
	include("connexion.php");

	$name = $_POST['name'];

	$e = 0;
	$getinterest = $bdd->prepare("SELECT interest FROM members WHERE ID = ?");
	$getinterest->execute(array($_SESSION['id']));
	$interest = $getinterest->fetch();

	$interest_decode = json_decode($interest['interest'], true);

	if($interest_decode != null){
		if (($key = array_search($name, $interest_decode)) !== false) {
		}
		else{
			end($interest_decode);         // move the internal pointer to the end of the array
			$key = key($interest_decode) + 1;
			$interest_decode[$key] = $name;
		}
	}
	else{
		$interest_decode = array($name);
	}
	

	$interest_recoded = json_encode($interest_decode);

	$postinterest = $bdd->prepare("UPDATE members SET interest = ? WHERE ID = ?");
	$postinterest->execute(array($interest_recoded, $_SESSION['id']));
	
	echo $name;

}