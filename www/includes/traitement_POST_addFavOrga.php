<?php
session_start();
if(isset($_SESSION['id']) && isset($_POST['orga'])){
	include('connexion.php');

	$orga = htmlspecialchars($_POST['orga']);
	
	$delevent = $bdd->prepare("INSERT INTO savedOrga(user, organization) VALUES(?,?)");
	if($delevent->execute(array($_SESSION['id'], $orga))){
		$json['200'] = "added";
	}

    echo json_encode($json);
}
?>