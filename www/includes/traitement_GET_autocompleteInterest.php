<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("connexion.php");
if(isset($_SESSION['id'])){

$term = htmlspecialchars($_POST['term']);
$toavoid = $_POST['arr'];


$exclude = $_SESSION['id'];

$requete = $bdd->prepare("SELECT * FROM persoInterest_lists WHERE interest LIKE :term AND ID NOT IN ( '" . implode( "', '" , $toavoid ) . "' )"); 
$requete->execute(array('term' => '%'.$term.'%'));

$nbfound = $requete->rowCount();
if($nbfound > 0){
	$e = 0;
	while($donnee = $requete->fetch()) 
	{
			$json[$e] = array($donnee['ID'], $donnee['interest']);
			$e++;
	}
}
else{
	$json['10000'] = "Aucun résultats";
}


echo json_encode($json);
}