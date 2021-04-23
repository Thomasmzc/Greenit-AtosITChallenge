<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){
	
	$json = array();
	$arrindus = array();
	$category = htmlspecialchars($_POST['term']);
	// Get industry names
	$getindus = $bdd->prepare("SELECT name FROM industries WHERE category = ? ");
    $getindus->execute(array($category));
    while($indus = $getindus->fetch()){
    	array_push($arrindus, $indus['name']);
    }
    $in = join("','",$arrindus);   
    $getcompany = $bdd->query("SELECT type, ID, raison, secteur, logo, description FROM companies WHERE secteur IN ('$in') ORDER BY RAND() LIMIT 3");

    $e=0;
    while($result = $getcompany->fetch()){
   		$json[$e] = array($result['type'],$result['ID'], $result['raison'],$result['logo'], $result['secteur'], mb_substr($result['description'],0, 120)." ...");
		$e ++;
	}

	shuffle($json);

	echo json_encode($json);

}
