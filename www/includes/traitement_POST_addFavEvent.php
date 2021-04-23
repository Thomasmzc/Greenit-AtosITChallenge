<?php
session_start();
if(isset($_SESSION['id']) && isset($_POST['event'])){
	include('connexion.php');

	$event = htmlspecialchars($_POST['event']);
	
	$delevent = $bdd->prepare("INSERT INTO savedEvents(user, event) VALUES(?,?)");
	if($delevent->execute(array($_SESSION['id'], $event))){
		$json['200'] = "added";
	}

    echo json_encode($json);
}
?>