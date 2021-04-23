<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){
	$json = array();
	$now = strtotime("now");
	$term = htmlspecialchars($_POST['term']);

    $query = "SELECT ID, title, date_start, date_end, hour_start, hour_end, photo, timestart, location, timing, openness, payment, physical, typeduration FROM event";
    $conditions = array();

    /* Filters */
    if(isset($_SESSION['fduration']) && $_SESSION['fduration'] != "0") {
    	$byduration = $_SESSION['fduration'];
      	array_push($conditions, "typeduration='".$byduration."'");
    }
    if(isset($_SESSION['fdating']) && $_SESSION['fdating'] != "0") {
    	$bydating = $_SESSION['fdating'];
    }
    if(isset($_SESSION['fphysical']) && $_SESSION['fphysical'] != "0") {
    	$byphysical = $_SESSION['fphysical'];
      	array_push($conditions, "physical='".$byphysical."'");
    }
    if(isset($_SESSION['ftiming']) && $_SESSION['ftiming'] != "0") {
    	$bytiming = $_SESSION['ftiming'];
      	array_push($conditions, "timing='".$bytiming."'");
    }
    if(isset($_SESSION['fpayment']) && $_SESSION['fpayment'] != "0") {
    	$bypayment = $_SESSION['fpayment'];
      	array_push($conditions, "payment='".$bypayment."'");
    }
    if(isset($_SESSION['fopenness']) && $_SESSION['fopenness'] != "0") {
    	$byopenness = $_SESSION['fopenness'];
      	array_push($conditions, "openness='".$byopenness."'");
    }


    $sql = $query;
    $sql .= " WHERE topic LIKE ? AND timestart > ?";
    if (count($conditions) > 0) {
    	foreach($conditions as $onecondition) {
      		$sql .= " AND ".$onecondition;
      	}
    }

    $sql .= " ORDER BY timestart";

    /* Request */
	$getsearch = $bdd->prepare($sql);
	$getsearch->execute(array("%".$term."%", $now));
 
	$e = 0;
	while($result = $getsearch->fetch()){

		// mise en forme date
		$dt = DateTime::createFromFormat('m/d/Y', $result['date_start']);
	    $timer = $dt->format('l d F Y');
	    if($result['date_end'] != ""){
	        $dt2 = DateTime::createFromFormat('m/d/Y', $result['date_end']);
	        $timer2 = $dt2->format('l d F Y');
	    }
	    $replacehourS = str_replace(":","h",$result['hour_start']);
	    if($result['hour_end'] != ""){
	        $replacehourF = str_replace(":","h",$result['hour_end']);
	    }
	    if($result['date_end'] != "" && $result['hour_end'] != ""){
	        $datetime = $timer." to ".$timer2." - ".$replacehourS." to ".$replacehourF;
	        $content_date = $timer." to ".$timer2;
	        $content_hour = $replacehourS." to ".$replacehourF;
	    }
	    else if($result['date_end'] != "" && $result['hour_end'] == ""){
	        $datetime = $timer." to ".$timer2." - ".$replacehourS;
	        $content_date = $timer." to ".$timer2;
	        $content_hour = $replacehourS;
	    }
	    else if($result['date_end'] == "" && $result['hour_end'] != ""){
	        $datetime = $timer." - ".$replacehourS." to ".$replacehourF;
	        $content_date = $timer;
	        $content_hour = $replacehourS." to ".$replacehourF;
	    }
	    else if($result['date_end'] == "" && $result['hour_end'] == ""){
	        $datetime = $timer." - ".$replacehourS;
	        $content_date = $timer;
	        $content_hour = $replacehourS;
	    }

		/* check date filter */
		if(isset($_SESSION['fdating']) && $_SESSION['fdating'] != "0") {
    		$dt = DateTime::createFromFormat('m/d/Y', $bydating);
			$timers = $dt->format('Y-m-d');
			$numbertimes = strtotime($timers);

			$dt = DateTime::createFromFormat('m/d/Y', $result['date_start']);
			$timerRS = $dt->format('Y-m-d');
			$numbertimeRS = strtotime($timerRS);

			if($result['date_end'] != null || $result['date_end'] != ""){
				$dt = DateTime::createFromFormat('m/d/Y', $result['date_end']);
				$timerRF = $dt->format('Y-m-d');
				$numbertimeRF = strtotime($timerRF);
			}
			else{
				$numbertimeRF = $numbertimeRS;
			}
			if($numbertimes >= $numbertimeRS && $numbertimes <= $numbertimeRF){
				$json[$e] = array("event",$result['ID'], $result['title'], $datetime,$result['photo'], $result['location'], $result['timing'], $result['payment'], $result['openness'], $content_date, $content_hour);
			}
			else{
				continue;
			}
	    }
	    else{
	    	$json[$e] = array("event",$result['ID'], $result['title'], $datetime,$result['photo'], $result['location'], $result['timing'], $result['payment'], $result['openness'], $content_date, $content_hour);
	    	
	    }
		$e ++;
	}

	
	shuffle($json);

	echo json_encode($json);

}
?>