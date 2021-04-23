<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['id'])){
	include("connexion.php");

	$now = strtotime("now");

	if(isset($_POST['orga'])){
		$getevent = $bdd->prepare("SELECT * FROM event WHERE organization = ? AND timestart >= ? ORDER BY date_start, hour_start");
		$getevent->execute(array(htmlspecialchars($_POST['orga']), $now));
	}
	elseif($_SESSION['type'] == "pro"){
		$getevent = $bdd->prepare("SELECT * FROM event WHERE organization = ? AND timestart >= ? ORDER BY date_start, hour_start");
		$getevent->execute(array($_SESSION['orga'], $now));
	}
	

	$nbevent = $getevent->rowCount();

	if($nbevent > 0){
		$e = 0;
		while($result = $getevent->fetch()){
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
		    $json[$e] = array("event",$result['ID'], $result['title'], $datetime,$result['photo'], $result['location'], $result['timing'], $result['payment'], $result['openness'], $content_date, $content_hour);
		    $e++;
		}
		usort($json, function($a, $b) {
		    return $a[3] <=> $b[3];
		});
		$New_start_index = 1; 
		  
		$json = array_combine(range($New_start_index, count($json) + ($New_start_index-1)), array_values($json)); 
	}
	else{
		$json['0'] = "Pas d'évènement créé.";
	}

	
	echo json_encode($json);
}
?>