<?php
session_start();
if(isset($_SESSION['id'])){

	if(isset($_SESSION['fduration'])){
		$json['200'] = array($_SESSION['fduration'], $_SESSION['fdating'], $_SESSION['fphysical'], $_SESSION['ftiming'], $_SESSION['fpayment'], $_SESSION['fopenness']);
	}
	else{
		$json['200'] = array(0, 0, 0, 0, 0, 0);
	}
	echo json_encode($json);
}
?>