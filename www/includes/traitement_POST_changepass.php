<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('connexion.php');
if(isset($_POST['email']) && isset($_POST['password'])){
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$lastpass = htmlspecialchars($_POST['lastpass']);
	$type = htmlspecialchars($_POST['type']);

	if($type == "user"){
		$req = $bdd->prepare('SELECT * FROM members WHERE email = ?');
		$req->execute(array($email));
		$nbresult = $req->rowCount();
		if($nbresult > 0){
			$resultat = $req->fetch();

			$code = strlen($lastpass);
			$code = ($code*4)*($code/3);
			$sel = strlen($lastpass);
			$sel2 = strlen($code.$lastpass);
			$texte_hash = sha1($sel.$lastpass.$sel2);
			$texte_hash_2 = md5($texte_hash.$sel2);
			$final = $texte_hash.$texte_hash_2;
			substr($final, 7, 8);
			$final = strtoupper($final);

			if($final === $resultat['password']){
				$code = strlen($password);
				$code = ($code*4)*($code/3);
				$sel = strlen($password);
				$sel2 = strlen($code.$password);
				$texte_hash = sha1($sel.$password.$sel2);
				$texte_hash_2 = md5($texte_hash.$sel2);
				$final = $texte_hash.$texte_hash_2;
				substr($final, 7, 8);
				$final = strtoupper($final);

				$uppass = $bdd->prepare('UPDATE members SET password = ?, state = ? WHERE ID = ?');
				$uppass->execute(array($final, 3, $resultat['ID']));

				session_start();
				$_SESSION['id'] = $resultat['ID'];
				$_SESSION['type'] = "perso";
				$json['200'] = $resultat['ID'];
			}
			else{
				$json['402'] = "Wrong password";
			}
		}
		else{
			$json['401'] = "Email doesn't exist";
		}
	}
	else{
		$req2 = $bdd->prepare('SELECT * FROM team WHERE email = ?');
		$req2->execute(array($email));
		$nbresult2 = $req2->rowCount();
		if($nbresult2 > 0){
			$resultat = $req2->fetch();

			$code = strlen($lastpass);
			$code = ($code*4)*($code/3);
			$sel = strlen($lastpass);
			$sel2 = strlen($code.$lastpass);
			$texte_hash = sha1($sel.$lastpass.$sel2);
			$texte_hash_2 = md5($texte_hash.$sel2);
			$final = $texte_hash.$texte_hash_2;
			substr($final, 7, 8);
			$final = strtoupper($final);

			if($final === $resultat['password']){
				$code = strlen($password);
				$code = ($code*4)*($code/3);
				$sel = strlen($password);
				$sel2 = strlen($code.$password);
				$texte_hash = sha1($sel.$password.$sel2);
				$texte_hash_2 = md5($texte_hash.$sel2);
				$final = $texte_hash.$texte_hash_2;
				substr($final, 7, 8);
				$final = strtoupper($final);

				$uppass = $bdd->prepare('UPDATE team SET password = ? WHERE ID = ?');
				$uppass->execute(array($final, $resultat['ID']));

				session_start();
				$_SESSION['id'] = $resultat['ID'];
				$_SESSION['orga'] = $resultat['id_company'];
				$_SESSION['type'] = "pro";
				$json['205'] = $resultat['ID'];
			}
			else{
				$json['402'] = "Wrong password";
			}
		}
		else{
			$json['401'] = "Email doesn't exist";
		}
	}
	echo json_encode($json);
}