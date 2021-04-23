<?php
include("connexion.php");

$getfact = $bdd->prepare("SELECT * FROM facts ORDER BY RAND() LIMIT 1");
if($getfact->execute(array())){
	$fact = $getfact->fetch();
	$json['200'] = $fact['text'];
}
else{
	$json['400'] = "";
}
echo json_encode($json);




?>