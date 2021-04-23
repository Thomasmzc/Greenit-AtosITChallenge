<?php
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){
	
	$json = array();
	$term = htmlspecialchars($_POST['term']);

    $getcompany = $bdd->prepare("SELECT type, ID, raison, secteur, logo, description FROM companies WHERE raison LIKE ? OR description LIKE ? OR interest LIKE ?");
    $getcompany->execute(array("%".$term."%","%".$term."%","%".$term."%"));

    $e=0;
    while($result = $getcompany->fetch()){
   		$json[$e] = array($result['type'],$result['ID'], $result['raison'],$result['logo'], $result['secteur'], mb_substr($result['description'],0, 120)." ...");
		$e ++;
	}

	shuffle($json);

	echo json_encode($json);

}
?>