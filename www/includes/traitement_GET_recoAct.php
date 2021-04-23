<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == 'perso'){
	include("connexion.php");

	$now = strtotime("now");
	// Check not in favorites
	$getfav = $bdd->prepare("SELECT event FROM savedEvents WHERE user = ?");
	$getfav->execute(array($_SESSION['id']));
	$arrayFav = array();

	while($fav = $getfav->fetch()){
		array_push($arrayFav, $fav['event']);
	}
	// Verif more than 2 event 
	$checkevent = $bdd->prepare("SELECT ID FROM event WHERE timestart > ? ORDER BY RAND() LIMIT 10");
	$checkevent->execute(array($now));
	$nbfound = 0;
	while($ckevent = $checkevent->fetch()){
		if(in_array($ckevent['ID'], $arrayFav)){
		}
		else{
			$nbfound ++;
		}
	}
	if($nbfound > 1){
		// Get interests 
		$getint = $bdd->prepare("SELECT interest FROM members WHERE ID = ? ");
		$getint->execute(array($_SESSION['id']));

		$totalmatch = 0;

		$interest = $getint->fetch();

		$interest_decode = json_decode($interest['interest'], true);

		


		
		// RUN
		if($interest_decode != null){
			$try = 0;
			while($totalmatch < 2 && $try < 20){
				$try ++;
				$randinterest = $interest_decode[array_rand($interest_decode)];
				$getevent = $bdd->prepare("SELECT ID FROM event WHERE title LIKE ? AND timestart > ? OR description LIKE ? AND timestart > ? ORDER BY RAND() LIMIT 2");
				// ADD Order by for push payment
				$getevent->execute(array("%".$randinterest."%", $now, "%".$randinterest."%", $now));
				$nbfound = $getevent->rowCount();
				if($nbfound > 0){
					while($eventdet = $getevent->fetch()){
						if(in_array($eventdet['ID'], $arrayFav)){

						}
						else{
							$geteventdet = $bdd->prepare("SELECT * FROM event WHERE ID = ?");
							// ADD Order by for push payment
							$geteventdet->execute(array($eventdet['ID']));
							while($result = $geteventdet->fetch()){
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
								$json[$result['ID']] = array("event",$result['ID'], $result['title'], $datetime,$result['photo'], $result['location'], $result['timing'], $result['payment'], $result['openness'], $content_date, $content_hour);
								array_push($arrayFav, $result['ID']);
								$totalmatch ++;


							}
						}
					}
				}	
			}
		}


		while($totalmatch < 2){
			$geteventdet = $bdd->prepare("SELECT * FROM event WHERE timestart > ? ORDER BY RAND() LIMIT 1");
			// ADD Order by for push payment
			$geteventdet->execute(array($now));
			while($result = $geteventdet->fetch()){
				// mise en forme date
				if(in_array($result['ID'], $arrayFav)){

				}
				else{
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
					$json[$result['ID']] = array("event",$result['ID'], $result['title'], $datetime,$result['photo'], $result['location'], $result['timing'], $result['payment'], $result['openness'], $content_date, $content_hour);
					array_push($arrayFav, $result['ID']);
					$totalmatch ++;
				}
			}
		}
	} 
	
	echo json_encode($json);


	

}