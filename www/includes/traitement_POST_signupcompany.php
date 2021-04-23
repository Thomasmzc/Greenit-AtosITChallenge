<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connexion.php");
if(isset($_POST['email']) && isset($_POST['password'])){
	$email = htmlspecialchars($_POST['email']);
	$rsociale = htmlspecialchars($_POST['raison']);
	$type = htmlspecialchars($_POST['type']);
	$siret = htmlspecialchars($_POST['siret']);
	$fname = htmlspecialchars($_POST['fname']);
	$lname = htmlspecialchars($_POST['lname']);
	$phone = htmlspecialchars($_POST['phone']);
	$password = htmlspecialchars($_POST['password']);
	$activity = htmlspecialchars($_POST['activity']);
	$effectif = htmlspecialchars($_POST['effectif']);
	$address = htmlspecialchars($_POST['address']);
	$cityzip = htmlspecialchars($_POST['cityzip']);
	$longitud = htmlspecialchars($_POST['longitud']);
	$latitud = htmlspecialchars($_POST['latitud']);

	$code = strlen($password);
    $code = ($code*4)*($code/3);
    $sel = strlen($password);
    $sel2 = strlen($code.$password);
    $texte_hash = sha1($sel.$password.$sel2);
    $texte_hash_2 = md5($texte_hash.$sel2);
    $final = $texte_hash.$texte_hash_2;
    substr($final, 7, 8);
    $final = strtoupper($final);

    if($longitud == "" || $longitud == null){
    	// GET ADRESS DETAILS
	    $prepAddr = str_replace(' ','+',$address);
	    $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyDA5lNrENXKxZeyY1UH2-o31NYTOC7NUwM');
	    $output= json_decode($geocode);
	    $latitud = $output->results[0]->geometry->location->lat;
	    $longitud = $output->results[0]->geometry->location->lng;
    }
    



    // On vérifie qu'il y a pas deja du monde inscrit avec cet email
    $getmbr = $bdd->prepare("SELECT * FROM team WHERE email = ?");
    $getmbr->execute(array(strtolower($email)));
	$nbmbr = $getmbr->rowCount();
	if($nbmbr > 0 ){
		$json['401'] = 'email already signed';
	}
    else{
    	$letter = substr($rsociale, 0, 1);
    	$logo = $letter.".png";
    	$postmbr = $bdd->prepare("INSERT INTO companies(raison, siret,logo, type, activity, staff_nbr, adresse, city_zipcode, longitude, latitude) VALUES(?,?,?,?,?,?,?,?,?,?)");
	    if($postmbr->execute(array($rsociale, $siret, $logo, $type, $activity, $effectif, $address, $cityzip, $longitud, $latitud))){
	    	$id = $bdd->lastInsertID();
	    	$postteam = $bdd->prepare("INSERT INTO team(id_company, fname, lname, password, email, droit) VALUES(?,?,?,?,?,?)");
	    	$postteam->execute(array($id, $fname, $lname, $final, strtolower($email),1));
	    	$id_team = $bdd->lastInsertID();
	    	session_start();
			$_SESSION['id'] = $id_team;
			$_SESSION['orga'] = $id;
			$_SESSION['type'] = "pro";
	    	$json['200'] = 'success';
	    }
	    else{
	    	$json['400'] = 'internal error';
	    }
    }

    
    echo json_encode($json);
}



?>