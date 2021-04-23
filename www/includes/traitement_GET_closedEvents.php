<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['id'])){
	include("connexion.php");

	$lat = htmlspecialchars($_POST['lat']);
	$long = htmlspecialchars($_POST['long']);

	$_SESSION['lat'] = $lat;
	$_SESSION['long'] = $long;
	$minlat = $lat - 0.2;
	$maxlat = $lat + 0.2;

	$minlong = $long - 0.2;
	$maxlong = $long + 0.2;
	// Get events 
	$json = array();
	$now = strtotime("now");

	

    $sql = "SELECT * FROM event WHERE timestart > ? AND latitude BETWEEN ? AND ? AND longitude BETWEEN ? AND ? ORDER BY timestart LIMIT 3";

    /* Request */
	$getsearch = $bdd->prepare($sql);
	$getsearch->execute(array($now, $minlat, $maxlat, $minlong, $maxlong));
 
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