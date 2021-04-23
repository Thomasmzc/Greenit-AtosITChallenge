<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include('connexion.php');

	$password = htmlspecialchars($_POST['password']);
	$idevent = htmlspecialchars($_POST['id']);

	$verifpass = $bdd->prepare("SELECT password FROM team WHERE ID = ?");
	$verifpass->execute(array($_SESSION['id']));

	$getpass = $verifpass->fetch();

	$code = strlen($password);
    $code = ($code*4)*($code/3);
    $sel = strlen($password);
    $sel2 = strlen($code.$password);
    $texte_hash = sha1($sel.$password.$sel2);
    $texte_hash_2 = md5($texte_hash.$sel2);
    $final = $texte_hash.$texte_hash_2;
    substr($final, 7, 8);
    $final = strtoupper($final);

    if($final == $getpass['password']){
    	$delevent = $bdd->prepare("DELETE FROM event WHERE ID = ?");
		if($delevent->execute(array($idevent))){
			$json['200'] = "deleted";
		}
    }
    else{
    	$json['400'] = "Wrong password";
    }

    echo json_encode($json);
}
?>