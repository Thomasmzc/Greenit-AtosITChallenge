<?php

include("connexion.php");
if(isset($_POST['email']) && isset($_POST['password'])){
	$email = htmlspecialchars($_POST['email']);
	$fname = htmlspecialchars($_POST['fname']);
	$lname = htmlspecialchars($_POST['lname']);
	$phone = htmlspecialchars($_POST['phone']);
	$password = htmlspecialchars($_POST['password']);

	$code = strlen($password);
    $code = ($code*4)*($code/3);
    $sel = strlen($password);
    $sel2 = strlen($code.$password);
    $texte_hash = sha1($sel.$password.$sel2);
    $texte_hash_2 = md5($texte_hash.$sel2);
    $final = $texte_hash.$texte_hash_2;
    substr($final, 7, 8);
    $final = strtoupper($final);

    // On vérifie qu'il y a pas deja du monde inscrit avec cet email
    $getmbr = $bdd->prepare("SELECT * FROM team WHERE email = ?");
    $getmbr->execute(array(strtolower($email)));
	$nbmbr = $getmbr->rowCount();
	if($nbmbr > 0 ){
		$json['401'] = 'email already signed';
	}
    else{
    	// GET cmpany id
    	$getauthor = $bdd->prepare("SELECT * FROM invitations WHERE email = ? AND state = ?");
    	$getauthor->execute(array($email, 0));
    	$author = $getauthor->fetch();

    	$getcomp = $bdd->prepare("SELECT id_company FROM team WHERE ID = ?");
    	$getcomp->execute(array($author['author']));
    	$compinfo = $getcomp->fetch();
    	
    	$postteam = $bdd->prepare("INSERT INTO team(id_company, fname, lname, password, email, droit) VALUES(?,?,?,?,?,?)");
    	$postteam->execute(array($compinfo['id_company'], $fname, $lname, $final, strtolower($email),0));
    	$id_team = $bdd->lastInsertID();

    	// Edit invitation 
    	$editinvit = $bdd->prepare("UPDATE invitations SET state = ? WHERE email = ?");
    	$editinvit->execute(array(1, $email));
    	
    	session_start();
		$_SESSION['id'] = $id_team;
		$_SESSION['orga'] = $compinfo['id_company'];
		$_SESSION['type'] = "pro";
    	$json['200'] = 'success';

    }

    
    echo json_encode($json);
}



?>