<?php
include('connexion.php');
if(isset($_POST['email']) && isset($_POST['password'])){
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);

	$req = $bdd->prepare('SELECT * FROM members WHERE email = ?');
	$req->execute(array($email));
	$nbresult = $req->rowCount();
	if($nbresult > 0){
		$resultat = $req->fetch();

		$code = strlen($password);
		$code = ($code*4)*($code/3);
		$sel = strlen($password);
		$sel2 = strlen($code.$password);
		$texte_hash = sha1($sel.$password.$sel2);
		$texte_hash_2 = md5($texte_hash.$sel2);
		$final = $texte_hash.$texte_hash_2;
		substr($final, 7, 8);
		$final = strtoupper($final);

		if($final === $resultat['password']){
			session_start();
			$_SESSION['id'] = $resultat['ID'];
			$_SESSION['type'] = "perso";
			if($resultat['state'] == 0){
				$json['201'] = $resultat['ID'];
			}
			elseif($resultat['state'] == 1){
				$json['202'] = $resultat['ID'];
			}
			elseif($resultat['state'] == 2){
				$json['2021'] = $resultat['ID'];
			}
			elseif($resultat['state'] == 5){
				$json['203'] = $resultat['ID'];
			}
			else{
				$json['200'] = $resultat['ID'];
			}
		}
		else{
			$json['402'] = "Wrong password";
		}
	}
	else{
		$json['401'] = "email doesn't exist";
	}
	echo json_encode($json);
}