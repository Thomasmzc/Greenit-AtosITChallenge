<?php
include('connexion.php');

$getnb = $bdd->prepare('SELECT COUNT(ID) AS nbuser FROM members');
$getnb->execute();
$nb = $getnb->fetch();

$json['200'] = $nb['nbuser'];

echo json_encode($json);
