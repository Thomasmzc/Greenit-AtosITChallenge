<?php
session_start();
include('connexion.php');
if(isset($_SESSION['id'])){
	
	$getinfo = $bdd->prepare("SELECT * FROM savedEvents WHERE user = ?");
	$getinfo->execute(array($_SESSION['id']));

	$now = strtotime("now");

	$arrayvalable = array();
	while($infouser = $getinfo->fetch()){
		$getevent = $bdd->prepare("SELECT ID, timestart, timeend FROM event WHERE ID = ?");
		$getevent->execute(array($infouser['event']));
		$event = $getevent->fetch();
		if($event['timestart'] >= $now || $event['timestart'] <= $now && $event['timeend'] >= $now){
			$arrayvalable[$event['timestart']] = $event['ID'];
		}
	}

	$nbfound = count($arrayvalable);
	if($nbfound > 0){
		ksort($arrayvalable);

		$firstone = array_values($arrayvalable)[0];

		$getallevent = $bdd->prepare("SELECT * FROM event WHERE ID = ?");
		$getallevent->execute(array($firstone));

		$result = $getallevent->fetch();

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

	    $json["200"] = array("event",$result['ID'], $result['title'], $datetime,$result['photo'], $result['location'], $result['timing'], $result['payment'], $result['openness'], $content_date, $content_hour);
	}
	else{
		$json['400'] = "none";
	}
	
	echo json_encode($json);

}