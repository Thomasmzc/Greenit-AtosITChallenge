<?php
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
		    unset($interest_decode[$key]);
		}
	}
	else{
	}
	$interest_recoded = json_encode($interest_decode);

	$postinterest = $bdd->prepare("UPDATE members SET interest = ? WHERE ID = ?");
	$postinterest->execute(array($interest_recoded, $_SESSION['id']));
	
	echo $name;

}