<?php
session_start();
if(isset($_SESSION['id']) && isset($_POST['fav'])){
	include('connexion.php');

	$fav = htmlspecialchars($_POST['fav']);
	
	$delevent = $bdd->prepare("DELETE FROM savedOrga WHERE ID = ?");
	if($delevent->execute(array($fav))){
		$json['200'] = "deleted";
	}

    echo json_encode($json);
}
?>