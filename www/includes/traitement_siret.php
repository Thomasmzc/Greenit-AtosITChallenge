<?php
include('connexion.php');
if(isset($_POST['siret']) && isset($_POST['type'])){
	//Open the file.
	$array = array();
	$siret = $_POST['siret'];
	$siret = str_replace(' ', '', $siret);

	if($_POST['type'] == 'Association'){
		$url = "https://entreprise.data.gouv.fr/api/rna/v1/id/".$siret;
		$raw = file_get_contents($url);
		$json = json_decode($raw, true);
		if($json!= NULL){
			// Verification dans la BDD

		 	$getsiret = $bdd->prepare("SELECT * FROM companies WHERE siret = ?");
		 	$getsiret->execute(array($siret));
		 	$nbsiret = $getsiret->rowCount();
		 	if($nbsiret == 0){
		 		$array['200']=array(null, null, $json['association']['adresse_gestion_libelle_voie'], $json['association']['adresse_gestion_acheminement'], null, null);
		 	}
		 	else{
		 		$array['401']='fail1';
		 	}
		}
		else{
		 	$url = "https://entreprise.data.gouv.fr/api/rna/v1/siret/".$siret;
			$raw = file_get_contents($url);
			$json = json_decode($raw, true);
			if($json!= NULL){
			 	
			 	// Verification dans la BDD

			 	$getsiret = $bdd->prepare("SELECT * FROM companies WHERE siret = ?");
			 	$getsiret->execute(array($siret));
			 	$nbsiret = $getsiret->rowCount();
			 	if($nbsiret == 0){
			 		$array['200']=array(null, null, $json['association']['adresse_gestion_libelle_voie'], $json['association']['adresse_gestion_acheminement'], null, null);
			 	}
			 	else{
			 		$array['401']='fail1';
			 	}
			}
			else{
			 	$url = "https://entreprise.data.gouv.fr/api/sirene/v3/etablissements/".$siret;
				$raw = file_get_contents($url);
				$json = json_decode($raw, true);
				if($json!= NULL){
				 	
				 	// Verification dans la BDD

				 	$getsiret = $bdd->prepare("SELECT * FROM companies WHERE siret = ?");
				 	$getsiret->execute(array($siret));
				 	$nbsiret = $getsiret->rowCount();
				 	if($nbsiret == 0){
				 		$array['200']=array($json['etablissement']['activite_principale_registre_metiers'], $json['etablissement']['tranche_effectifs'], $json['etablissement']['geo_l4'], $json['etablissement']['libelle_commune'], $json['etablissement']['longitude'], $json['etablissement']['latitude']);
				 	}
				 	else{
				 		$array['401']='fail1';
				 	}
				}
				else{
				 	$array['402']='fail';
				}
			}
			
		}

	}
	else{
		$url = "https://entreprise.data.gouv.fr/api/sirene/v3/etablissements/".$siret;
		$raw = file_get_contents($url);
		$json = json_decode($raw, true);
		if($json!= NULL){
		 	
		 	// Verification dans la BDD

		 	$getsiret = $bdd->prepare("SELECT * FROM companies WHERE siret = ?");
		 	$getsiret->execute(array($siret));
		 	$nbsiret = $getsiret->rowCount();
		 	if($nbsiret == 0){
		 		$array['200']=array($json['etablissement']['activite_principale_registre_metiers'], $json['etablissement']['tranche_effectifs'], $json['etablissement']['geo_l4'], $json['etablissement']['libelle_commune'], $json['etablissement']['longitude'], $json['etablissement']['latitude']);
		 	}
		 	else{
		 		$array['401']='fail1';
		 	}
		}
		else{
		 	$array['402']='fail';
		}
	}

	
	 echo json_encode($array);
}

?>