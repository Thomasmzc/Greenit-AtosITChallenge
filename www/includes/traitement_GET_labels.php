<?php
include("connexion.php");

$getlabel = $bdd->query("SELECT * FROM labels");
while($label = $getlabel->fetch()){
	$json[$label['ID']] = array($label['category'], $label['name'], $label['imglabel']);
}

echo json_encode($json);
