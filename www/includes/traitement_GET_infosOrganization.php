<?php
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){
	
	$getinfo = $bdd->prepare("SELECT raison, secteur, description, type, email, logo, location, keywords, website, linkedin, instagram, facebook FROM companies WHERE ID = ?");
	$getinfo->execute(array($_SESSION['orga']));

	$infouser = $getinfo->fetch();

	//$text = nl2br(htmlentities($infouser['description'], ENT_QUOTES, 'UTF-8'));
	//echo $text;


	$json['200'] = array($infouser['raison'], $infouser['secteur'],$infouser['description'],$infouser['type'],$infouser['email'],$infouser['logo'], $infouser['location'], $infouser['keywords'], $infouser['website'], $infouser['linkedin'], $infouser['instagram'], $infouser['facebook']);

	echo json_encode($json);

}
?>