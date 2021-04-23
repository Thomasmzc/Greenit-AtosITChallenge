<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
	include('connexion.php');

	$idevent = htmlspecialchars($_POST['idevent']);
	$title = htmlspecialchars($_POST['title']);
	$location = htmlspecialchars($_POST['location']);
	$date_start = htmlspecialchars($_POST['date_start']);
	$date_end = htmlspecialchars($_POST['date_end']);
	$hour_start = htmlspecialchars($_POST['hour_start']);
	$hour_end = htmlspecialchars($_POST['hour_end']);
	$description = htmlspecialchars($_POST['description']);
	$website = htmlspecialchars($_POST['website']);
	$registration = htmlspecialchars($_POST['registration']);
	$physical = htmlspecialchars($_POST['physical']);
	$timing = htmlspecialchars($_POST['timing']);
	$payment = htmlspecialchars($_POST['payment']);
	$openness = htmlspecialchars($_POST['openness']);

	$dt = DateTime::createFromFormat('m/d/Y', $date_start);
	$timer = $dt->format('Y-m-d')." ".$hour_start;
	$numbertime = strtotime($timer);

	// duration
	if($date_end != "" && $date_end != null){
		$dtend = DateTime::createFromFormat('m/d/Y', $date_end);
		$timerend = $dtend->format('Y-m-d');
		$nbdays = ((strtotime($timerend) - strtotime($dt->format('Y-m-d'))) / (60 * 60 * 24));
		if($date_end != $date_start){
			$nbdays = $nbdays + 1;
		} 
		if($hour_end != "" && $hour_end != null){
			$timerend = $dtend->format('Y-m-d')." ".$hour_end;
			$hourstart = $dtend->format('Y-m-d')." ".$hour_start;
			$hourend = $dtend->format('Y-m-d')." ".$hour_end;

			$hourperday = strtotime($hourend) - strtotime($hourstart);

			$duration = $hourperday * $nbdays;
		}
		else{
			$timerend = $dtend->format('Y-m-d');
			$duration = strtotime($timerend) - $numbertime;
		}
		$numbertimeend = strtotime($timerend);
	}
	else{
		$dtend = DateTime::createFromFormat('m/d/Y', $date_start);
		if($hour_end != "" && $hour_end != null){
			$timerend = $dtend->format('Y-m-d')." ".$hour_end;
			$timerend2 = $dtend->format('Y-m-d')." ".$hour_end;
		}
		else{
			$timerend = $timer;
			$timerend2 = $dt->format('Y-m-d')." 23:59";
		}
		$duration = strtotime($timerend) - $numbertime;
		$numbertimeend = strtotime($timerend2);
	}
	

	// type duration
	if($duration == 0){
		$typeduration = "hours";
	}
	else{
		if($date_end != "" && $date_end != null && $date_end != $date_start){
			if($nbdays > 365){
				$typeduration = "years";
			}
			elseif($nbdays > 30){
				$typeduration = "months";
			}
			else{
				$typeduration = "days";
			}
		}
		else{
			$typeduration = "hours";
		}
	}

	$latitud = null;
	$longitud = null;

	if($location != "online" && $location != null && $location != ""){
		// GET ADRESS DETAILS
	    $prepAddr = str_replace(' ','+',$location);
	    $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyDA5lNrENXKxZeyY1UH2-o31NYTOC7NUwM');
	    $output= json_decode($geocode);
	    $latitud = $output->results[0]->geometry->location->lat;
	    $longitud = $output->results[0]->geometry->location->lng;
	}

	$insert = $bdd->prepare("UPDATE event SET title = ?, location = ?, longitude = ?, latitude = ?, date_start = ?, date_end = ?, hour_start = ?, hour_end = ?, description = ?, website = ?, registration = ?, physical = ?, timing = ?, payment = ?, openness = ?, timestart = ?, timeend = ?, duration = ?, typeduration = ? WHERE ID = ? AND organization = ?");
	if($insert->execute(array($title, $location,$longitud, $latitud, $date_start, $date_end, $hour_start, $hour_end, $description, $website, $registration, $physical, $timing, $payment, $openness, $numbertime, $numbertimeend, $duration, $typeduration, $idevent,  $_SESSION['orga']))){
		$id_event = $bdd->lastInsertID();
		$json['200'] = $idevent;
	}
	else{
		$json['400'] = "error";
	}

	echo json_encode($json);

}
?>