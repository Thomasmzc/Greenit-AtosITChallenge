<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['id'])){
	include('connexion.php');
	$output = array();

	if(isset($_FILES) && is_array($_FILES) && count($_FILES)) {
	     $output['FILES'] = $_FILES;
	     $output['uploaded'] = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
	     $tmp = $_FILES['file']['tmp_name'];

	     function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
		$prefix = generateRandomString();

		function clean($string) {
		   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}

		$getname = $bdd->prepare("SELECT raison FROM companies WHERE ID = ?");
		$getname->execute(array($_SESSION['orga']));
		$infoname = $getname->fetch();
		$filename = clean($infoname['raison']);


		$imageFileType = $output['FILES']['file']['type'];
	   	$imageFileType = strtolower($imageFileType);

	   	$valid_extensions = array("image/jpg","image/jpeg","image/png");

	   	/* Check file extension */
	   if(in_array(strtolower($imageFileType), $valid_extensions)) {
	   	$pos = strrpos($imageFileType, '/');
		$extensionfull = $pos === false ? $imageFileType : substr($imageFileType, $pos + 1);

		/* Assemble */
		$location = "../uploads/".$prefix.$filename.".".$extensionfull;
			/* Upload file */
	      	if(move_uploaded_file($tmp,$location)){

	      		
				
		      	/* EDIT DTB */
		      	$uppicture = $bdd->prepare("UPDATE companies SET logo = ? WHERE ID = ?");
		      	if($uppicture->execute(array($prefix.$filename.".".$extensionfull, $_SESSION['orga']))){
		         	$json['200'] = $location;
		      	}
		      	else{
		      		$json['400'] = $location;
		      	}
	      	}
	      	else{
		      	$json['401'] = $location;
		    }
	    }
	}
	header('Access-Control-Allow-Origin: *');  
	header('Content-Type: application/json');
	echo json_encode($json);
}