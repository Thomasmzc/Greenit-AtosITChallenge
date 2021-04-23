<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include('connexion.php');

	$lastupdate = $bdd->prepare("UPDATE team SET last_activity = now() WHERE ID = ?");
    $lastupdate->execute(array($_SESSION['id']));

    $json['200'] = "ok";

    echo json_encode($json);
}
?>