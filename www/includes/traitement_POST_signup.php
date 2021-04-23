<?php
include("connexion.php");
if(isset($_POST['email']) && isset($_POST['password'])){
	$email = htmlspecialchars($_POST['email']);
	$fname = htmlspecialchars($_POST['fname']);
	$lname = htmlspecialchars($_POST['lname']);
	$password = htmlspecialchars($_POST['password']);
	$link = htmlspecialchars($_POST['link']);

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
    $getmbr = $bdd->prepare("SELECT * FROM  members WHERE email = ?");
    $getmbr->execute(array(strtolower($email)));
	$nbmbr = $getmbr->rowCount();
	if($nbmbr > 0 ){

		$json['401'] = 'email already signed';
	}
    else{
    	$postmbr = $bdd->prepare("INSERT INTO members(fname, lname, email, password) VALUES(?,?,?,?)");
	    if($postmbr->execute(array(ucfirst($fname), ucfirst($lname), strtolower($email), $final))){
	    	$id = $bdd->lastInsertID();
	    	if($link != "0"){
				$getid = $bdd->lastInsertID();
				$int = (int) filter_var($link, FILTER_SANITIZE_NUMBER_INT);
				$nwsponsor = $bdd->prepare("INSERT INTO sponsormember(sponsor, newsigned) VALUES(?,?)");
				$nwsponsor->execute(array($int, $id));
			}
	    	session_start();
			$_SESSION['id'] = $id;
			$_SESSION['type'] = "perso";
	    	$json['200'] = 'success';
	    }
	    else{
	    	$json['400'] = 'internal error';
	    }
    }

    
    echo json_encode($json);
}



?>