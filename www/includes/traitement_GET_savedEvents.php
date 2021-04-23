<?php
session_start();
if(isset($_SESSION['id'])){
	include('connexion.php');

	$now = strtotime("now");

	$getfav = $bdd->prepare("SELECT ID, event FROM savedEvents WHERE user = ?");
	$getfav->execute(array($_SESSION['id']));
	$nbfav = $getfav->rowCount();
	if($nbfav == 0){
		$json['0'] = "no fav"; 
	}
	else{
		while($fav = $getfav->fetch()){
			$getevent = $bdd->prepare("SELECT ID, title, photo, date_start, date_end, hour_start, hour_end, timestart, timeend FROM event WHERE ID = ? ORDER BY timestart");
			$getevent->execute(array($fav['event']));
			$event = $getevent->fetch();

			if($event['timestart'] >= $now || $event['timestart'] <= $now && $event['timeend'] >= $now){
			    $dt = DateTime::createFromFormat('m/d/Y', $event['date_start']);
			    $timer = $dt->format('l d F Y');
			    if($event['date_end'] != ""){
			        $dt2 = DateTime::createFromFormat('m/d/Y', $event['date_end']);
			        $timer2 = $dt2->format('l d F Y');
			    }
			    $replacehourS = str_replace(":","h",$event['hour_start']);
			    if($event['hour_end'] != ""){
			        $replacehourF = str_replace(":","h",$event['hour_end']);
			    }
			    if($event['date_end'] != "" && $event['hour_end'] != ""){
			        $datetime = $timer." to ".$timer2." - ".$replacehourS." to ".$replacehourF;
			        $content_date = $timer." to ".$timer2;
			        $content_hour = $replacehourS." to ".$replacehourF;
			    }
			    else if($event['date_end'] != "" && $event['hour_end'] == ""){
			        $datetime = $timer." to ".$timer2." - ".$replacehourS;
			        $content_date = $timer." to ".$timer2;
			        $content_hour = $replacehourS;
			    }
			    else if($event['date_end'] == "" && $event['hour_end'] != ""){
			        $datetime = $timer." - ".$replacehourS." to ".$replacehourF;
			        $content_date = $timer;
			        $content_hour = $replacehourS." to ".$replacehourF;
			    }
			    else if($event['date_end'] == "" && $event['hour_end'] == ""){
			        $datetime = $timer." - ".$replacehourS;
			        $content_date = $timer;
			        $content_hour = $replacehourS;
			    }
			    $json[$fav['event']] = array($event['title'], $event['photo'], $content_date);
			}
			else{
				$delfav = $bdd->prepare("DELETE FROM savedEvents WHERE ID = ?");
				$delfav->execute(array($fav['ID']));
			}
		}
	}

    echo json_encode($json);
}
?>